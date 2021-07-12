<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TransferConfirm;
use App\Admin\SubscriberPackageName;
use App\Admin\Calculator;
use App\Admin\ClientSendEmailNotification;
use App\Admin\ClientGroupBalance;
use  Illuminate\Support\Facades\Auth;
use App\User;
class TransferController extends Controller
{
    public function TransferList()
    {
        $TransferList = array();
        $transfers = TransferConfirm::all();

        if(@count($transfers)){

            foreach ($transfers as $k => $v) {
                $transfer = null;
                if($transfer = $this->makeTransferData( $transfers[$k] )) 
                    $TransferList[$k] = $transfer;
            }
        }
         return view("admin.transfer.TransferList", compact("TransferList"));

    }
    public function TransferDetails($id)
    {
        $id = (int) $id;
        $data = TransferConfirm::find($id);
        $transfer = $this->makeTransferData( $data );
        //dd($review);
        return view("admin.transfer.transferDetails", compact("transfer"));

    }

    public function TransferEdit($id)
    {
        $transfer = TransferConfirm::find($id);
        return view("Admin.transfer.TransferEdit", ['transfer'=>$transfer]);
    }

    public function TransferUpdate(Request $request)
    {
        $res  = TransferConfirm::find($request->id);
        $res->account_owner_name = $request->account_owner_name;
        $res->bank_name = $request->bank_name;
        $res->account_number = $request->account_number;
        $res->amount = $request->amount;
        $res->purpose = $request->purpose;
        $res->date = $request->date;
        $res->status = $request->status;
        $res->save();
        return redirect(route('TransferList'));
    }

    public function ConfirmTransfer($id)
    {
        $res = TransferConfirm::find($id); 
        $user = $res->user;

        return view('admin.transfer.TransferAddBalance', ['user' => $user, 'num'=>$res->operation_number, 'res'=> $res]);

    }
    public function DeleteTransfer($id)
    {
        $res = TransferConfirm::find($id);
        $res->delete();
        return redirect(route('TransferList'));
    }

    public function AddBalance(Request $request)
    {

        $amount = (int)$request->amount;
        $ConfirmAmount = (int)$request->ConfimAmount;
        
        if($ConfirmAmount == $amount)
        {
            
            $transfer = TransferConfirm::find($request->id);
            $transfer->status = 'Added';
            $transfer->save();

            //return "Done Updated";
        
            $user = User::find( $request->user_id);

        
            
        
            $package_id = SubscriberPackageName::where('name', '=', $user->mem_package)->get()->first()->id;
            $res = Calculator::where('subscriber_package_name_id',  $package_id)
            ->where('module_name', 'cash_back')
            ->where('module_for','=' , 'bank transfer')
            ->where('data_from', '<=', $amount)
            ->where('data_to', '>=', $amount)
            ->get();

        
        
            if ($res && $res->count() > 0)
            {
                
                $res = $res[0];
                if($res->amount_type == 'Fixed')
                {
                    $cash = $res->amount;
                }elseif($res->amount_type == 'Percentage')
                {
                   
                    $cash = ($res->amount/100) * $amount;
                }

                
                $allBalance = $amount + $cash;
        
        
                $d = ClientGroupBalance::where('client_or_group_id', '=', $user->id)
                ->where('balance_for', '=', 'client')
                ->where('wallet_status','=', 'Available')
                ->get()->first();
        
                if(isset($d) && $d->count() > 0)
                {

                    $d->amount += $allBalance;
                    $d->save();
                }   
                else
                {
                    ClientGroupBalance::create([
                        'client_or_group_id' => $user->id,
                        'balance_for' => 'client',
                        'wallet_status' => 'Available',
                        'amount' => $allBalance
                    ]);
                }

                $note = ClientSendEmailNotification::create([
                    'client_id' => $user->id,
                    'suit' =>$user->suit,
                    'subject' => 'تم شحن الرصيد بنجاح  ',
                    'body' =>  'تمت عملية الشحن بنجاح و اضافة المبلغ في رصيدك ' . $amount . 'و ذلك عن عملية التحويل البنكي  برقم ' . $request->num,
                    'type' => 'notification',
                    ]);

                
                $note2 = ClientSendEmailNotification::create([
                    'client_id' => $user->id,
                    'suit' =>$user->suit,
                    'subject' => 'تم شحن الإسترداد النقدي بنجاح  ',
                    'body' =>  'تمت عملية شحن الإسترداد النقدي بنجاح و اضافة المبلغ في رصيدك ' . $cash . 'و ذلك عن عملية التحويل البنكي برقم ' . $request->num,
                    'type' => 'notification',
                    ]);
                    return redirect( route('TransferList') );
        
    
            }else
            {
                return "No cash found";
            }
        }
        

    }

    public function RefuseTransfer($id)
    {
        $data = TransferConfirm::find($id);
        $user = $data->user;
        return view("admin.transfer.refuse", ['data' => $data, 'user'=>$user]);
    }
    public function SendRefusedMessage(Request $request)
    {
        $result = TransferConfirm::find($request->id);
        $result->status = 'Refused';
        $result->save();
        $note2 = ClientSendEmailNotification::create([
            'client_id' => $request->user_id,
            'suit' =>$request->suit,
            'subject' => 'هناك مشكلة في التحويل البنكي',
            'body' =>  $request->Message. ' رقم العملية ' . $request->num,
            'type' => 'notification',
            ]);
        return redirect( route('TransferList') );


    }
    private function makeTransferData($transfers)
    {
            $newArr = NULL;
            if( $transfers ){

            if(isset($transfers->photo) && $transfers->photo != '')
            {
                $photo = ' <a href="/'.$transfers->photo. '" >
                <img src="/'.$transfers->photo.'" style="height:50px;width:50px;" />
                </a>
                ';
            }
             $newArr = array(
                 "id" => $transfers->id,
                 "check_box" => "<input type='checkbox' name='ids[]' class='all_id' value=$transfers->id >",
                 "operation_number" => $transfers->operation_number ,
                 "user" => $transfers->user->name,
                 "suit" => $transfers->user->suit,
                 "account_owner_name" => $transfers->account_owner_name,
                 "bank_name" => $transfers->bank_name,
                 "account_number" => $transfers->account_number,
                 "amount" => $transfers->amount,
                 "purpose" => $transfers->purpose,
                 "date" => $transfers->date,
                 "photo" => (isset($transfers->photo) && $transfers->photo != '')? $photo: 'No photos attached',
                 "status" => $transfers->status,
                 "created_at" => $transfers->created_at,
             );
     
            }
            return $newArr;
    }

    

    
}
