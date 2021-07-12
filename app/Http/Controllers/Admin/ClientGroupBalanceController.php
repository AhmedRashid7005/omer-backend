<?php

namespace App\Http\Controllers\Admin;

use App\Admin\ClientGroupBalance;
use App\Balance;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\BankTransferWithdrawModel;
use App\Admin\EmailTemplate;
use App\Message;
use Illuminate\Support\Facades\Auth;

class ClientGroupBalanceController extends Controller
{
    /*======================================
    =            cliend balance            =
    ======================================*/
    
    public function clientBalanceList(){

        $clientBalance = ClientGroupBalance::with("user")->where("balance_for", "client")->get();

        // dd($clientBalance);

        # Now print the data the way we want ..
        $clientBalanceArr = array();

        if( @count($clientBalance) ){

            foreach ($clientBalance as $k => $v) {
                $clientBalanceArr[$k]["id"] = $v->id;
                $clientBalanceArr[$k]["suit"] = $v->user->suit;
                $clientBalanceArr[$k]["name"] = $v->user->name;
                $clientBalanceArr[$k]["email"] = $v->user->email;
                $clientBalanceArr[$k]["wallet_status"] = $v->wallet_status;
                $clientBalanceArr[$k]["amount"] = $v->amount;
                $clientBalanceArr[$k]["created_at"] = $v->created_at;
                $clientBalanceArr[$k]["updatted_at"] = $v->updated_at;
            }

        }

        // dd($clientBalanceArr);

        return view("admin.clientBalance.clientBalanceList", compact("clientBalanceArr"));

    }
    public function clientAllBalanceList()
    {
        $clientBalance = Balance::all();
        $clientBalanceArr = array();

        if( $clientBalance->count() > 0) {
 
            foreach ($clientBalance as $k => $v) {
                $clientBalanceArr[$k]["id"] = $v->id;
                $clientBalanceArr[$k]["suit"] = $v->user->suit;
                $clientBalanceArr[$k]["name"] = $v->user->name;
                $clientBalanceArr[$k]["Available"] = $v->Available;
                $clientBalanceArr[$k]["Required"] = $v->Required;
                $clientBalanceArr[$k]["Withdraw"] = $v->Withdraw;
                $clientBalanceArr[$k]["Pending"] = $v->Pending;
                $clientBalanceArr[$k]["Receivable"] = $v->Receivable;
                $clientBalanceArr[$k]["Used"] = $v->Used;
                $clientBalanceArr[$k]["Points"] = $v->Points;
                $clientBalanceArr[$k]["Loan"] = $v->Loan;
                $clientBalanceArr[$k]["created_at"] = $v->created_at;
                $clientBalanceArr[$k]["updatted_at"] = $v->updated_at;
            }

        }

        return view("admin.clientBalance.clientAllBalanceList", compact("clientBalanceArr"));



    }

    public function clientBalanceAdd(){

        return view("admin.clientBalance.clientBalanceAdd");

    }


    public function clientBalanceStore(Request $request){
        $clientId = Session::get("clientIdForPackage");

        // dump($clientId);
        // dd($request);
        $opnum1 = "WT-0" . time();
        $data = array(
            'operation_number' => $opnum1,
            "client_or_group_id" => $clientId,
            "balance_for" => "client",
            "wallet_status" => $request->wallet_status,
            "amount" => $request->amount,
        );

        $res = ClientGroupBalance::create($data);

        $user = User::find($clientId);
        $d = HelperModel::UpdatedBalance($user, $request);
        if($d && $d != -1){
            HelperModel::defaultFlash($res);
            $subject = 'تم شحن رصيد إلي حسابك' ;
            $content = 'تم تحويل مبلغ ' . $request->amount . ' إلي رصيدك المتاح برقم عملية' . $opnum1;
            HelperModel::sendNotification($user->id,$user->suit,$subject, $content);
            $subject = 'تم شحن مبلغ الإسترداد إلي حسابك' ;
            $content = 'تم تحويل مبلغ الإسترداد النقدي إلي رصيدك المتاح برقم عملية' . $opnum1;
            HelperModel::sendNotification($user->id,$user->suit,$subject, $content);
        }elseif($d && $d == -1){
            $subject = 'تم شحن رصيد إلي حسابك' ;
            $content = 'تم تحويل مبلغ ' . $request->amount . ' إلي رصيدك المتاح برقم عملية' . $opnum1;
            HelperModel::sendNotification($user->id,$user->suit,$subject, $content);
        }

        return redirect()->route("clientBalanceList");
        
    }

    public function clientBalanceEdit($id = NULL){
        $id = (int) $id;
        $clientBalance = ClientGroupBalance::with("user")->find($id);

        return view("admin.clientBalance.clientBalanceEdit", compact("clientBalance"));

    }
    public function clientAllBalanceEdit($id)
    {
        $clientBalance = Balance::find($id);
        return view("admin.clientBalance.clientAllBalanceEdit", compact("clientBalance"));

    }

    public function clientBalanceUpdate(Request $request){

        // dd($request);

        $id = (int) $request->id;

        $data = array(
            "wallet_status" => $request->wallet_status,
            "amount" => $request->amount,
        );

        $res = ClientGroupBalance::where("id", $id)->update($data);

        HelperModel::defaultFlash($res, "Updating");

        return redirect()->route("clientBalanceList");

    }

    public function clientBalanceDelete($id = NULL){

        $id = (int) $id;

        $res = ClientGroupBalance::where("id", $id)->delete();

        HelperModel::defaultFlash($res, "Delating");

        return redirect()->route("clientBalanceList");

    }

    
    /*=====  End of cliend balance  ======*/


    /*=====================================
    =            group balance            =
    =====================================*/
    
    public function groupBalanceList(){
        
        $groupBalance = ClientGroupBalance::with("SubscriberPackageName")->where("balance_for", "group")->get();

        // dd($groupBalance);

        # Now print the data the way we want ..
        $groupBalanceArr = array();

        if( @count($groupBalance) ){

            foreach ($groupBalance as $k => $v) {
                $groupBalanceArr[$k]["id"] = $v->id;
                $groupBalanceArr[$k]["plan"] = $v->SubscriberPackageName->name;
                $groupBalanceArr[$k]["wallet_status"] = $v->wallet_status;
                $groupBalanceArr[$k]["amount"] = $v->amount;
                $groupBalanceArr[$k]["created_at"] = $v->created_at;
                $groupBalanceArr[$k]["updatted_at"] = $v->updated_at;
            }

        }

        // dd($groupBalanceArr);

        return view("admin.groupBalance.groupBalanceList", compact("groupBalanceArr"));


    }


    public function groupBalanceAdd(){

        $packageList = HelperModel::get_subscriber_package_list();

        return view("admin.groupBalance.groupBalanceAdd", compact("packageList"));

    }


    public function groupBalanceStore(Request $request){
        // dd($request);

        $data = array(
            "client_or_group_id" => $request->subscriber_package_id,
            "balance_for" => "group",
            "wallet_status" => $request->wallet_status,
            "amount" => $request->amount,
        );

        $res = ClientGroupBalance::create($data);

        HelperModel::defaultFlash($res);

        return redirect()->route("groupBalanceList");
        
    }

    public function groupBalanceEdit($id = NULL){

        $id = (int) $id;

        $groupBalance = ClientGroupBalance::find($id);
        // dd($groupBalance);

        $packageList = HelperModel::get_subscriber_package_list();

        return view("admin.groupBalance.groupBalanceEdit", compact("packageList", "groupBalance"));
    }

    public function groupBalanceUpdate(Request $request){
        // dd($request);

        $id = (int) $request->id;

        $data = array(
            "client_or_group_id" => $request->subscriber_package_id,
            "wallet_status" => $request->wallet_status,
            "amount" => $request->amount,
        );

        $res = ClientGroupBalance::where("id", $id)->update($data);

        HelperModel::defaultFlash($res, "Updating");

        return redirect()->route("groupBalanceList");

    }

    public function groupBalanceDelete($id = NULL){
        $id = (int) $id;

        $res = ClientGroupBalance::where("id", $id)->delete();

        HelperModel::defaultFlash($res, "Delating");

        return redirect()->route("groupBalanceList");

    }    
    
    /*=====  End of group balance  ======*/
    

    /*=====================================
    =            Recharge Card            =
    =====================================*/
    
    public function rechargeCardList(){

    }

    public function rechargeCardAdd(){

    }
    
    
    /*=====  End of Recharge Card  ======*/
    

    public function ViewAllBankTransferData()
    {
        $clientBalance = BankTransferWithdrawModel::all();
        $clientBalanceArr = array();

        if( $clientBalance->count() > 0) {
 
            foreach ($clientBalance as $k => $v) {
                $clientBalanceArr[$k]["id"] = $v->id;
                $clientBalanceArr[$k]["suit"] = $v->user->suit;
                $clientBalanceArr[$k]["name"] = $v->user->name;
                $clientBalanceArr[$k]["BankName"] = $v->BankName;
                $clientBalanceArr[$k]["accountName"] = $v->accountName;
                $clientBalanceArr[$k]["iban"] = $v->iban;
                $clientBalanceArr[$k]["amount"] = $v->amount;
                $clientBalanceArr[$k]["photo"] = '
                <a href="' . asset($v->photo). '" >
                   <img src="'.asset($v->photo).'" style="width:50px;height:50px" />
                   </a> 
                   ';
                $clientBalanceArr[$k]["relationship"] = $v->relationship;
                $clientBalanceArr[$k]["status"] = $v->status;
                $clientBalanceArr[$k]["created_at"] = $v->created_at;
                $clientBalanceArr[$k]["updatted_at"] = $v->updated_at;
            }

        }

        return view("admin.withdraws.withdrawsList", compact("clientBalanceArr"));


        return view('');
    }
    public function AcceptBankWithdraw($id)
    {
        $res = BankTransferWithdrawModel::find($id);
        $res2 = User::find($res->user_id);

        if(isset($res) && $res->count() > 0 && isset($res2) && $res2->count() > 0)
        {
            $info = new \stdClass();
            $info->wallet_status = 'Available';
            $info->amount = - $res->amount;
            $user = $res2;
            $d = HelperModel::UpdatedBalance($user, $info);
            $res->status = 'Accepted';
            $res->save();
            $opnum1 = "WT-0" . time();
            $data = array(
                "client_or_group_id" => $user->id,
                "balance_for" => "client",
                "operation_number" => $opnum1,
                "wallet_status" => 'Available',
                "amount" => -$res->amount,
            );
            $res2 = ClientGroupBalance::create($data);

            $subject ='تم التحويل بنجاح';
            $content = 'تم قبول طلبك لتحويل المبلغ من رصيدك المتاح إلي حسابك البنكي رقم العملية ' . $opnum1;

            HelperModel::sendNotification($user->id, $user->suit,$subject, $content );
            return redirect(route('ViewAllBankTransferData'));
        }
        else{
            return redirect(route('ViewAllBankTransferData'));

        }
    }
    public function RefusedBankTransfer($id)
    {
        return view('admin.withdraws.refuse', ['id' => $id]);
    }
    public function SendNotificationRefusedBankTransferWithdraw(Request $request)
    {
        $msg = $request->reason;
        $res = BankTransferWithdrawModel::find($request->transfer_id);
        if(isset($res) && $res->count() > 0)
        {
            $user = $res->user;
            $res->reason = $request->reason;
            $res->status = 'Rejected';
            $res->save();
            $subject ='تم رفض عملية التحويل';
            $content = $request->reason;
            HelperModel::sendNotification($user->id, $user->suit,$subject, $content );
            return redirect(route('ViewAllBankTransferData'));

        }else{
            return redirect(route('ViewAllBankTransferData'));

        }
    }

    public function SendNote($id)
    {
        $res = User::where('id',$id);
        if($res && $res->count() > 0)
        {  
            $res = $res->get();
            $subscriberPackageNames = HelperModel::get_subscriber_package_list();
            $subscriberPackageNames["person"] = "Person";
        	$mail_type = EmailTemplate::OrderBy("id", "DESC")->get();
            if($mail_type){
                $mail_type = HelperModel::make_list($mail_type);
                // dd($mail_type);
            }

            $mail_type["new"] = "New";


            return view("admin.MessageNotification.notification", compact('subscriberPackageNames', 'res', 'mail_type'));
        }
    }

    public function sendE_MAIL($id)
    {
        return view("admin.MessageNotification.SendMessageNew",['id'=> $id]);
    }
    public function storeNewMessage(Request $request)
    {

        $res = Message::create([
            'sender_id' => 0,
            'receiver_id' => $request->receiver_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect(route('adminClientList'));

    }

}
