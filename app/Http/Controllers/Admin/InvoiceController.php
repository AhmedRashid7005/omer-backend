<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Invoice;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function invoiceList(){
    	$list = Invoice::get();

    	if(@count($list)){
    		$list = $list->toArray();
    	}

    	// dd($list);

    	return view("admin.invoice.invoiceList", compact("list"));
    }

    public function invoiceAdd(){
    	return view("admin.invoice.invoiceAdd");
    }

    private function processRequestAsArray( $request ){

    	$data = array(
    		"sender_address" => $request->sender_address,
    		"receiver_address" => $request->receiver_address,
    		"order_no" => $request->order_no,
    		"delivery_through" => $request->delivery_through,
    		"carrier_name" => $request->carrier_name,
    		"remaining_order_amount" => $request->remaining_order_amount,
    		"shipping_cost_warehouse" => $request->shipping_cost_warehouse,
    		"delivery_cost_to_your_address" => $request->delivery_cost_to_your_address,
    		"insurence_fee" => $request->insurence_fee,
    		"custom_duities" => $request->custom_duities,
    		"vat" => $request->vat,
    		"discount_type" => $request->discount_type,
    		"discount_amount" => $request->discount_amount,
    		"total" => $request->total,
    	);

    	# In Edit it may not Contain
    	if(isset($request->other_fees_name)){
    		$data["other_fees_name"] = json_encode(array_filter( $request->other_fees_name ));
    		$data["other_fees_value"] = json_encode(array_filter( $request->other_fees_value ));
    	}

    	return $data;
    }

    public function invoiceStore(Request $request){
    	// dd($request);

    	$data = $this->processRequestAsArray($request);
    	$data["invoice_no"] = HelperModel::getRandomDigit(7);

    	$res = Invoice::create($data);

    	HelperModel::defaultFlash($res);

    	return redirect()->route("invoiceList");

    }

    public function invoiceEdit($id = NULL){
    	$id = (int) $id;

    	$invoice = Invoice::find($id);

    	return view("admin.invoice.invoiceEdit", compact("invoice"));
    }

    public function invoiceUpdate(Request $request){
    	// dd($request);

    	$id = (int) $request->id;

    	$data = $this->processRequestAsArray($request);

    	$res = Invoice::where("id", $id)->update($data);

    	HelperModel::defaultFlash($res, "Updating");

    	return redirect()->route("invoiceList");
    }

    public function invoiceDetails($id = NULL){

    	$invoiceOrder = array();

    	$id = (int) $id;

    	$invoice = Invoice::with("order")->find($id);

    	// dd($invoice);

    	if( @count($invoice) ){
    		$invoice = $invoice->toArray();
    		
    		// dd($invoice);
    		$invoice["other_fees_name"] = HelperModel::joinJsonArray( $invoice["other_fees_name"], $invoice["other_fees_value"] );

    		# unset Other Fees Values
    		unset($invoice["other_fees_value"]);

    		$invoiceOrder = $invoice["order"];

    		# Unset Order 
    		unset($invoice["order"]);

    	}

    	// dump($invoiceOrder);
    	// dd($invoice);

    	return view("admin.invoice.invoiceDetails", compact("invoice", "invoiceOrder"));

    }

    public function invoiceDelete($id = NULL){
    	$id = (int) $id;

    	$res = Invoice::where("id", $id)->delete();

    	HelperModel::defaultFlash($res, "Delating");

    	return redirect()->route("invoiceList");
    }


}
