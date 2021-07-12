<?php

namespace App\Http\Controllers\Admin;

use App\Admin\RechargeCard;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RechargeCardController extends Controller
{
    public function rechargeCardList(){

    	$list = RechargeCard::get();

    	// dd($list);
    	$listArr = array();

    	if( @count($list) ){
    		foreach ($list as $k => $v) {
    			
    			$id = $v->id;
                $listArr[$k]["id"] = $id;
    			$listArr[$k]["check_box"] = "<input type='checkbox' name='ids[]' class='all_id' value=$id >";
    			$listArr[$k]["state"] = $v->state;
    			$listArr[$k]["card_number"] = $v->card_number;
    			$listArr[$k]["amount"] = $v->amount;
    			$listArr[$k]["card_expiry"] = $v->card_expiry;
    			$listArr[$k]["status"] = $v->status;
    			$listArr[$k]["password"] = $v->password;
    			$listArr[$k]["created_at"] = $v->created_at;

    			# clip board text
    			$clipBoardText = "Amount: ".$v->amount."\nCard Number: ".$v->card_number."\nExpiry Date: ".$v->card_expiry;
    			# end clip board text

    			$listArr[$k]["copy"] = "<span class='btn btn-success ar_copy' data-clipboard-text='$clipBoardText'>Copy</span>";

    		}
    	}

    	return view("admin.rechargeCard.rechargeCardList", compact("listArr"));

    }

    public function rechargeCardAdd(){

    	return view("admin.rechargeCard.rechargeCardAdd");
    }

    public function rechargeCardStore(Request $request){

    	// dump( HelperModel::getRandomDigit(8) );
    	// dump($cardNumber);
    	// dd($request);

    	$card_expiry = $request->expiry_date;

    	if(isset($request->valid_for_ever)){
    		$card_expiry = $request->valid_for_ever;
    	}

    	# Make the Card Entry Using Loop
    	for ($i=0; $i < $request->number_of_cards; $i++) { 
    		
    		$cardNumber = $this->rechargeCardNumberGeneration($request->state);

    		$data = array(

    			"state" 		=> $request->state,
    			"card_number" 	=> $cardNumber,
    			"amount" 		=> $request->amount,
    			"card_expiry" 	=> $card_expiry,
    			"status" 		=> $request->status,
				"password"		=> rand(10000000, 99999999)
    		);

    		$res = RechargeCard::create($data);

    	}

    	# End of entry ... 
    	HelperModel::defaultFlash($res);

    	return redirect()->route("rechargeCardList");

    }

    private function rechargeCardNumberGeneration($state){
    	/*
    	*****
    	** @author arafat | arafat.dml@gmail.com
    	*****
    	* instruction :
    	* 1. 1st 4 form the state
    	* 2. space last 2 of current Year 
    	* 3. space 2 digit current Month 
    	* 4. space 8 randon Digit
		*****
    	*/

		$first 			= strtoupper( substr($state, 0, 4) )." ";
		$second 		= date("y")." ";
		$third 			= date("m")." ";
		$fourth 		= HelperModel::getRandomDigit(8);

		$cardNumber = $first.$second.$third.$fourth;

		return $cardNumber;

    }

    public function rechargeCardActivateDeActivate($id = NULL){

    	$id = (int) $id;

    	$rechargeCard = RechargeCard::find($id);
        // dd($rechargeCard);
        
    	# On Status Do the Oposite..
    	$status = 0;
    	if($rechargeCard->status == 0){
    		$status = 1;
    	}

    	# Do the Update Operation..
    	$res = RechargeCard::where("id", $id)->update(["status" => $status]);

    	# End of entry ... 
    	HelperModel::defaultFlash($res, "Status Changing");

    	return redirect()->route("rechargeCardList");


    }

    public function rechargeCardDelete($id = NULL){

    	$id = (int) $id;

    	$res = RechargeCard::where("id", $id)->delete();
    	# End of entry ... 
    	HelperModel::defaultFlash($res, "Delating");

    	return redirect()->route("rechargeCardList");

    }

    public function rechargeCardbulkAction(Request $request){
    	
    	# Checking No id Errors
    	if( !isset($request->ids) ){
    		HelperModel::defaultFlash(false, "Error ! Please Select At Least One Row, Action ");
    		return redirect()->route("rechargeCardList");
    	}

    	// dd($request);

    	$res = false;

    	if($request->action_name == "Active"){

    		$res = RechargeCard::whereIn("id", $request->ids)->update(["status" => 1]);

    	}else if($request->action_name == "DeActive"){

    		$res = RechargeCard::whereIn("id", $request->ids)->update(["status" => 0]);

    	}else if($request->action_name == "Delete"){

    		$res = RechargeCard::whereIn("id", $request->ids)->delete();

    	}else if($request->action_name == "Copy"){
    		
    		$res = RechargeCard::whereIn("id", $request->ids)->get();

    		$resArr = array();
    		$clipBoardText = NULL;

    		if( @count($res) ){

    			$resArr = array();

    			foreach ($res as $k => $v) {
    				# clip board text
    				$clipBoardText .= "\nAmount: ".$v->amount."\nCard Number: ".$v->card_number."\nExpiry Date: ".$v->card_expiry."\n\n";
    				# end clip board text

    			/*	$resArr[$k]["Amount"] 		=  "Amount: ".$v->amount;
    				$resArr[$k]["Card_Number"] 	=  "Card Number: ".$v->card_number;
    				$resArr[$k]["Expiry_Date"] 	=  "Expiry Date: ".$v->card_expiry;*/

    				$resArr[$k]["Amount"] 		=  $v->amount;
    				$resArr[$k]["Card_Number"] 	=  $v->card_number;
    				$resArr[$k]["Expiry_Date"] 	=  $v->card_expiry;
    			}

    		}

    		# Show the Result In a Page...
    		return view("admin.rechargeCard.rechargeCardCopyPrint", compact("resArr", "clipBoardText"));
    		
    	}

    	# Its Show Time ...

    	HelperModel::defaultFlash($res, $request->action_name);
    	return redirect()->route("rechargeCardList");


    }


}
