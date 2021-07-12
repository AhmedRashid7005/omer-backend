<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use App\Admin\ClientGroupBalance;
use App\Admin\ClientSendEmailNotification;

class ReviewController extends Controller
{
    public function ListReviews()
    {
        $reviewList = array();
        $reviews = Review::all();

        if(@count($reviews)){

            foreach ($reviews as $k => $v) {
                $result = null;
                if($result = $this->makeReviewData( $reviews[$k] )) 
                    $reviewList[$k] = $result;
            }
        }
         return view("admin.review.reviewList", compact("reviewList"));


    }

    public function ReviewDetails($id)
    {
        $id = (int) $id;
        $data = Review::find($id);
        $review = $this->makeReviewData( $data );
        //dd($review);
        return view("admin.review.reviewDetails", compact("review"));

    }
    public function transferReview($id)
    {
        $res = Review::find($id); 
        $user = $res->user;

        return view('admin.review.addBalance', ['user' => $user, 'num'=>$res->operation_number]);
    }
    public function AddBalance(Request $request)
    {
        $id = $request->id;
        //update the status of the review
        $rev = Review::find($id);
        $rev->status = 'done';
        $rev->save();

        $suit = $request->suit;
        $d = ClientGroupBalance::where('client_or_group_id', '=', $id)
            ->where('balance_for', '=', 'client')
            ->where('wallet_status','=', 'Available')
            ->get();

        if(isset($d) && $d->count() > 0)
        {
            $d = $d[0];
            $d->amount += $request->amount;
            $d->save();
        }   
        else
        {
            ClientGroupBalance::create([
                'client_or_group_id' => $id,
                'balance_for' => 'client',
                'wallet_status' => 'Available',
                'amount' => $request->amount
            ]);
        }
        $note = ClientSendEmailNotification::create([
            'client_id' => $id,
            'suit' =>$suit,
            'subject' => 'تم شحن الرصيد بنجاح  ',
            'body' =>  'تمت عملية الشحن بنجاح و اضافة المبلغ في رصيدك ' . $request->amount . 'و ذلك عن عملية التقييم برقم ' . $request->num,
            'type' => 'notification',
            ]);
            return redirect( route('ReviewList') );

    }


    public function ReviewEdit($id)
    {
        $review = Review::find($id);
        return view("Admin.review.ReviewEdit", ['review'=>$review]);
    }

    public function ReviewUpdate(Request $request)
    {
        $res  = Review::find($request->id);
        $res->bill_number = $request->bill_number;
        $res->ontime = $request->ontime;
        $res->covered = $request->covered;
        $res->identical = $request->identical;
        $res->recommend = $request->recommend;
        $res->title = $request->title;
        $res->content = $request->content;
        $res->save();
        return redirect(route('ReviewList'));
    }

    public function DeleteReview($id)
    {
        $res = Review::find($id);
        $res->delete();
        return redirect(route('ReviewList'));
    }

    private function makeReviewData($reviews)
    {
        $newArr = NULL;
        if( $reviews ){
        $photos = json_decode($reviews->photos);
         if(isset($photos) && count($photos)> 0)
         {
             $d='';
             foreach($photos as $p)
             {
                $d .= '
                <a href="' . asset($p). '" >
                   <img src="'.asset($p).'" style="width:50px;height:50px" />
                   </a> 
                   ';
             }
         }
         $newArr = array(
             "id" => $reviews->id,
             "check_box" => "<input type='checkbox' name='ids[]' class='all_id' value=$reviews->id >",
             "operation_number" => $reviews->operation_number ,
             "user" => $reviews->user->name,
             "suit" => $reviews->user->suit,
             "bill_number" => $reviews->bill_number,
             "ontime" => $reviews->ontime . '<i class="fa fa-star" aria-hidden="true" style="color:orange"></i>',
             "covered" => $reviews->covered . '<i class="fa fa-star" aria-hidden="true" style="color:orange"></i>',
             "identical" => $reviews->identical . '<i class="fa fa-star" aria-hidden="true" style="color:orange"></i>',
             "recommend" => $reviews->recommend . '<i class="fa fa-star" aria-hidden="true" style="color:orange"></i>',
             "title" => $reviews->title,
             "photos" => isset($d)? $d : 'No photos attached',
             "shareLinks" => $reviews->shareLinks,
             "share" => $reviews->share,
             "status" => $reviews->status, //new or done
             "created_at" => $reviews->created_at,
         );
 
        }
        return $newArr;
    }
}