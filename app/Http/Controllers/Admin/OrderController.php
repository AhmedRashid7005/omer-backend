<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Order;
use App\Admin\OrderProduct;
use App\Admin\OrderProductOffer;
use App\HelperModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderController extends Controller
{

	public function orderList(){
        $orders = Order::get();

        if(@count($orders)){
            $orders = $orders->toArray();
        }

		return view("admin.order.orderList", compact('orders'));
	}
    
    public function orderAdd(){

    	return view("admin.order.orderAdd");
    }

    public function orderStore(Request $request){
    	// dump($request);
    	
        $orderData = array(
            "order_no" => HelperModel::getRandomDigit(5),
            "user_id" => Session::get("clientIdForPackage"),
            "order_type" => $request->order_type,
            "market_place" => $request->market_place,
            "shipping_type_from" => $request->shipping_type_from,
            "from_state_country" => $request->from_state_country,
            "shipping_type_to" => $request->shipping_type_to,
            "to_state_country" => $request->to_state_country,
            "shipping_within" => $request->shipping_within,
            "item_quantity" => $request->item_quantity,
            "other_cost_name" => json_encode($request->other_cost_name),
            "other_cost_value" => json_encode($request->other_cost_value),

        );

        $order = Order::create($orderData);
        
        if($order){
            $orderId = $order->id;
        }else{
            $orderId = 0;
        }
        # Keep the data in Session ...
        Session::put("orderId", $orderId);

        HelperModel::details_table_view("Order Data", $orderData);

    }

    private function orderProductStoreWithOffer($orderId, $request) {

        # Chnage Because Client Requirement Changed..

        $product_length = @count($request->link);

        $mainProductId = $offerProductIds = NULL;

        # loop
        for ($i = 0; $i < $product_length; $i++) {

            $orderProduct = array(
                "order_id" => $orderId,
                "link" => $request->link[$i],
                "name" => $request->name[$i],
                "description" => $request->description[$i],
                "parts_no" => $request->parts_no[$i],
                "parts_side" => $request->parts_side[$i],
                "price" => $request->price[$i],
                "quantity" => $request->quantity[$i],
                "size" => $request->size[$i],
                "weight" => $request->weight[$i],
                "color" => $request->color[$i],
                "shipping_cost" => $request->shipping_cost[$i],
                "during_time" => $request->during_time[$i],
                "note" => $request->note[$i],
                "quality" => $request->quality[$i],
                "product_type" => $request->product_type[$i],
                "main_or_offer_product" => "main",
            );

            # Check if the product has offer product
            if( $i != 0 ){
                $orderProduct["main_or_offer_product"] = "offer";
            }

            # Order Product Create ...

            $orderProduct = OrderProduct::create($orderProduct);

            # Insert the image
            if( $orderProduct ){

                $orderProductId = $orderProduct->id;

                # Now We Need to Save the Order Product Image
                $imgName = "image_".$i;


                HelperModel::uploadToImageModule($request, $imgName, "imageModule", "orderProduct", $orderProductId);

                # End Saving Order Product Image ......
            }

            # Set the Main Product id
            if( $i == 0 && $orderProduct ){
                $mainProductId = $orderProduct->id;
            }

            # Insert Offer ProductIds
            if( $i != 0 && $orderProduct ){
                $offerProductIds[] = $orderProduct->id;
            }

        } # For Loop End

        # The Loop is End So check if it has offer then insert the data..
        if( @count($request->link) > 1 ){
            
            $orderProductOfferData = array(
                "order_product_id" => $mainProductId,
                "offer_product_ids" => json_encode($offerProductIds),
            );

            $orderProductOffer = OrderProductOffer::create($orderProductOfferData);
        }

        return $orderProduct;

    }

    public function orderProductStore(Request $request){

        // dd($request);

        $orderId = Session::get("orderId");

        $orderProduct = $this->orderProductStoreWithOffer($orderId, $request);

        # $orderProductId

        // $orderProductId = $orderProduct->id;

        # Print Order Product List ..
        /*$orderProduct = OrderProduct::where("order_id", $orderId)->with(["images"=> function($query) use ($orderProductId) {
                $query->where("module_name", "orderProduct")->where("content_id", $orderProductId);
            }])->get();*/

        $orderProduct = OrderProduct::where("order_id", $orderId)->where("main_or_offer_product", "main")->with("images")->get();

        if($orderProduct){
            $orderProductArr = array();

            # ---------------------------------------
            # Process the Data ..

            foreach ($orderProduct as $k => $v) {
               $orderProductArr[$k]["id"] = $v->id;
               $orderProductArr[$k]["link"] = $v->link;
               $orderProductArr[$k]["name"] = $v->name;
               $orderProductArr[$k]["description"] = $v->description;
               $orderProductArr[$k]["images"] = HelperModel::getImageFromImageModuleArrayOrString($v->images, true);
               $orderProductArr[$k]["parts_no"] = $v->parts_no;
               $orderProductArr[$k]["parts_side"] = $v->parts_side;
               $orderProductArr[$k]["price"] = $v->price;
               $orderProductArr[$k]["quantity"] = $v->quantity;
               $orderProductArr[$k]["size"] = $v->size;
               $orderProductArr[$k]["weight"] = $v->weight;
               $orderProductArr[$k]["color"] = $v->color;
               $orderProductArr[$k]["shipping_cost"] = $v->shipping_cost;
               $orderProductArr[$k]["during_time"] = $v->during_time;
               $orderProductArr[$k]["note"] = $v->note;
               $orderProductArr[$k]["quality"] = $v->quality;
               $orderProductArr[$k]["product_type"] = $v->product_type;
            }

            # End prcoessing data
            # ---------------------------------------

            $title = "Order Product List";
            $th = array(
                "Link",
                "Name",
                "Description",
                "Images",
                "Parts No",
                "Parts Side",
                "Price",
                "Quantity",
                "Size",
                "Weight",
                "Color",
                "Shipping Cost",
                "During Time",
                "Note",
                "Quality",
                "Product Type",
            );

            HelperModel::table_view($title, $th, $orderProductArr, false, false, false, false, false);

            // dump($orderProductArr);

        }

    }

    /**
     *
     * arafat | arafat.dml@gmail.com
     * Date: 21/02/2021
     * calculatingTotalOrderPrice
     * This method Will Return
     * The Total Price Of the Order
     *
     */
    

    private function calculatingTotalOrderPrice($orderId){
        
        $totalOtherCostValue = $totalProductPrice = $totalShippingCost = 0;

        $order = Order::with(["orderProduct", "orderProduct.orderProductOffer"])->find($orderId);
        // dd($order);

        $totalOtherCostValue = array_sum( json_decode($order->other_cost_value) );
        // dump($totalOtherCostValue);

        if( @count( $order->orderProduct ) ){

          foreach( $order->orderProduct as $k => $v ){

            $totalProductPrice += (float) ( ( (float) $v->price ) * ( (int) $v->quantity ) );

            $totalShippingCost += (float) $v->shipping_cost;

          }

        }


        $totalOrderPrice = ( $totalOtherCostValue + $totalProductPrice + $totalShippingCost );

        return $totalOrderPrice;

    }

    public function addMinimumPayamount(){

        if( !Session::has("orderId") ){
            HelperModel::flash("Something Went Worng We Cound Not Found Any order Id In Session", "danger");

            return redirect()->route("orderList");
        }


        $orderId = Session::get("orderId");

        $order = Order::find($orderId);

        if($order){

            $order = $order->toArray();
        }

        $totalOrderPrice = $this->calculatingTotalOrderPrice($orderId);

        return view("admin.order.orderMinimumPayamountAdd", compact("totalOrderPrice", "order"));
    }

    public function storeMinimumPayamount(Request $request){

        // dd($request);

        // here Destro the Order id Form Session
        if( !Session::has("orderId") ){
            HelperModel::flash("Something Went Worng We Cound Not Found Any order Id In Session", "danger");
             return redirect()->route("orderList");
        }

        $orderId = Session::get("orderId");

        $orderData = array(
            "minimum_pay_type" => $request->minimum_pay_type,
            "minimum_pay_amount" => $request->minimum_pay_amount,
        );

        $order = Order::where("id", $orderId)->update($orderData);

        if($order){
            # Forget the Previous Session Data .... 

            Session::forget("orderId");
            Session::forget("clientIdForPackage");

            HelperModel::flash("Order Data Created Successfully", "success");
        }else{
            HelperModel::flash("Minimum Pay Amount Adding Failed in Order", "success");
        }

        return redirect()->route("orderList");

    }

    public function orderMinimumPayamountEdit($id){
        $id = (int) $id;

        $order = Order::find($id);

        $totalOrderPrice = $this->calculatingTotalOrderPrice($id);

        return view("admin.order.orderMinimumPayamountEdit", compact("order", "totalOrderPrice"));

    }

    public function orderMinimumPayamountUpdate(Request $request){
        // dd($request); 

        $id = $request->id;

        $orderData = array(
            "minimum_pay_type" => $request->minimum_pay_type,
            "minimum_pay_amount" => $request->minimum_pay_amount,
        );

        $order = Order::where("id", $id)->update($orderData);

        if($order){
            HelperModel::flash("Order Minimum Pay Amount Update Successfull", "success");
        }else{
            HelperModel::flash("Order Minimum Pay Amount Update Failed", "danger");
        }

        # Redirect
        return redirect()->route("orderDetails",$id);

    }


    public function orderEdit($id = NULL){
        $id = (int) $id;

        $order = Order::find($id);

        return view("admin.order.orderEdit", compact("order"));

    }

    public function orderUpdate(Request $request){
        // dd($request);

        $orderId = (int) $request->id;

        $orderData = array(
            "order_type" => $request->order_type,
            "market_place" => $request->market_place,
            "shipping_type_from" => $request->shipping_type_from,
            "from_state_country" => $request->from_state_country,
            "shipping_type_to" => $request->shipping_type_to,
            "to_state_country" => $request->to_state_country,
            "shipping_within" => $request->shipping_within,
            "item_quantity" => $request->item_quantity,
            "other_cost_name" => json_encode( array_filter( $request->other_cost_name ) ),
            "other_cost_value" => json_encode( array_filter( $request->other_cost_value ) ),
        );

        $order = Order::where("id", $orderId)->update($orderData);

        if($order){
            HelperModel::flash("Order Data Updated Successfull . If you change Other Cost Don't Forget to Update The Minimum Pay Type In Order Details", "success");
        }else{
            HelperModel::flash("Order Update Failed", "danger");
        }

        # Now Redirect
        return redirect()->route("orderList");

    }

    public function orderDetails($id = NULL){
        
        $id = (int) $id;

        # We will use it in order Product Store
        Session::put("orderDetailsId", $id);
        # end

        # Query the Order Id
        $order = Order::with(["user" => function ($query){
           $query->select('id','suit','name','ship_phone','email','mem_package','bill_add_1','bill_add_2');
        }])->find($id);

        // $order = Order::with(["user"])->find($id);

        $minimumPayAmount = $user = array();

        if($order){

            // dd($order);
            # --------------------------------------------
            # Generating Minimium Payamount Type table

            $totalOrderPrice = $this->calculatingTotalOrderPrice($id);
            
            $minimumPayAmount = array(
                "total_order_price"     => $totalOrderPrice ,
                "minimum_pay_type"      => $order->minimum_pay_type,
                "minimum_pay_amount"    => $order->minimum_pay_amount,
            );


            if( $order->minimum_pay_type == "Percentage"){
                $calculated_pay_amount = ( (float) $totalOrderPrice * ( (float) $order->minimum_pay_amount /100 ) );

                # Append it to the Array
                $minimumPayAmount["calculated_pay_amount"] = $calculated_pay_amount;

            }
            
            
            # End Generating Minimium Payamount Type table
            # ---------------------------------------------


            $order = $order->toArray();
            $user = $order["user"];

            #unset the user Array
            unset($order["user"]);

            #-----------------------------------------
            # Process Json encoded data ....

            $twoJsonDataMerge = HelperModel::joinJsonArray($order["other_cost_name"], $order["other_cost_value"]);
            // dump($twoJsonDataMerge);
            #-----------------------------------------

            $order["other_cost_name"] =  $twoJsonDataMerge;

            # unset that fields ..
            unset($order["other_cost_value"]);

        }

        // dd($user);

        # Print Order Product List ..
        $orderProduct = OrderProduct::where("order_id", $id)->where("main_or_offer_product", "main")->with(["images"])->get();

        // dd($orderProduct);

        $orderProductArr = $this->processProductData($orderProduct);

        return view("admin.order.orderDetails", compact("order", "orderProductArr", "user", "minimumPayAmount"));

    }


    private function processProductData($orderProduct){

        $orderProductArr = array();

        if($orderProduct){

            # ---------------------------------------
            # Process the Data ..

            foreach ($orderProduct as $k => $v) {
               $orderProductArr[$k]["id"] = $v->id;
               $orderProductArr[$k]["link"] = $v->link;
               $orderProductArr[$k]["name"] = $v->name;
               $orderProductArr[$k]["description"] = $v->description;
               $orderProductArr[$k]["images"] = HelperModel::getImageFromImageModuleArrayOrString($v->images, true);
               $orderProductArr[$k]["parts_no"] = $v->parts_no;
               $orderProductArr[$k]["parts_side"] = $v->parts_side;
               $orderProductArr[$k]["price"] = $v->price;
               $orderProductArr[$k]["quantity"] = $v->quantity;
               $orderProductArr[$k]["size"] = $v->size;
               $orderProductArr[$k]["weight"] = $v->weight;
               $orderProductArr[$k]["color"] = $v->color;
               $orderProductArr[$k]["shipping_cost"] = $v->shipping_cost;
               $orderProductArr[$k]["during_time"] = $v->during_time;
               $orderProductArr[$k]["note"] = $v->note;
               $orderProductArr[$k]["quality"] = $v->quality;
               $orderProductArr[$k]["product_type"] = $v->product_type;
            }

        }

        return $orderProductArr;

    }



    public function orderDelete($id = NULL){
        # What we Needed to be Deleted ?
        # Order Data Using OrderId
        $order = Order::where("id", $id)->delete();

        # This for deleting img and Offer
        $orderProducts = OrderProduct::where("order_id", $id)->get();
        
        # All Order Product Data Using OrderId
        $orderProduct = OrderProduct::where("order_id", $id)->delete();

        $orderProductOffer = NULL;

        if(@count($orderProducts)){
            
            foreach ($orderProducts as $k => $v) {
                
                $orderProductId = $v->id;

                # ALL Order Product Images using each Order ProductId
                HelperModel::FileModuleFireOnUpdateOrdelete($orderProductId, "orderProduct");

                # All Order Product Offer using each order ProductId
                $orderProductOffer = OrderProductOffer::where("order_product_id", $orderProductId)->delete();

            }

        }

        if( $order ||  $orderProduct || $orderProductOffer){
            HelperModel::flash("Data Delation Successfull", "success");
        }else{
            HelperModel::flash("Data Delation Failed!", "danger");
        }

        # Now Redirect ...
        return redirect()->route("orderList");
        
    }

    public function addNewOrderProduct(){

        return view("admin.order.orderProductAdd");
    }

    public function NewOrderProductStore(Request $request){
        // dd($request);
        if( !Session::has("orderDetailsId") ){
            HelperModel::flash("Something Went Worng We Cound Not Found Any order Id In Session", "danger");
             return redirect()->route("orderList");
        }

        $orderId = Session::get("orderDetailsId");
        $orderProduct = $this->orderProductStoreWithOffer($orderId, $request);

        if($orderProduct){
            HelperModel::flash("Order Product Adding Successfull", "success");
        }else{
            HelperModel::flash("Order Product Adding Successfull", "success");

        }

        # Redirect
        return redirect()->route("orderDetails",$orderId);

    }

    public function orderProductDetails($id = NULL){
        $id = (int) $id;

        # We will use This Session Id In Offer Adding
        Session::put("orderProductDetailsId", $id);
        # End

        $orderProduct = OrderProduct::with(["images", "orderProductOffer"])->find($id);

        // dd($orderProduct);

        
        $orderProductOffer = array();

        if( $orderProduct ){
            $orderProduct = $orderProduct->toArray();

            $orderProduct["images"] =  HelperModel::getImageFromImageModuleArrayOrString($orderProduct["images"], true);

            $orderProductOffer = $orderProduct["order_product_offer"];

            # unset it
            unset($orderProduct["order_product_offer"]);

        }

        // dump($orderProductOffer);
        // dd($orderProduct);

        if( $orderProductOffer ){
            $orderProductOffer = json_decode($orderProductOffer["offer_product_ids"]);

            # Query the Db ...
            $orderProductOffer = OrderProduct::whereIn("id", $orderProductOffer)->with("images")->get();
        }

        // dd($orderProductOffer);

        $orderProductOffer = $this->processProductData($orderProductOffer);


        return view("admin.order.orderProductDetails", compact("orderProduct", "orderProductOffer"));

    }

    public function orderProductEdit($id = NULL){
        $id = (int) $id;

        $orderProduct = OrderProduct::find($id);

        // dd($orderProduct);

        return view("admin.order.orderProductEdit", compact("orderProduct"));

    }

    public function orderProductUpdate(Request $request){
        // dd($request);

        $id = (int) $request->id;

        $orderProduct = array(
           "link" => $request->link,
           "name" => $request->name,
           "description" => $request->description,
           "parts_no" => $request->parts_no,
           "parts_side" => $request->parts_side,
           "price" => $request->price,
           "quantity" => $request->quantity,
           "size" => $request->size,
           "weight" => $request->weight,
           "color" => $request->color,
           "shipping_cost" => $request->shipping_cost,
           "during_time" => $request->during_time,
           "note" => $request->note,
           "quality" => $request->quality,
           "product_type" => $request->product_type,
        );

        # Update Operation

        $orderProduct = OrderProduct::where("id", $id)->update($orderProduct);

        if( $request->hasFile('image') ){

            # if New Image Submitted Delete Old Imgs
            # ALL Order Product Images using each Order ProductId
            HelperModel::FileModuleFireOnUpdateOrdelete($id, "orderProduct");

            # upload New Images
            HelperModel::uploadToImageModule($request, "image", "imageModule", "orderProduct", $id);

        }

        if( !Session::has("orderDetailsId") ){
            HelperModel::flash("Something Went Worng We Cound Not Found Any order Id In Session", "danger");
             return redirect()->route("orderList");
        }

        $orderId = Session::get("orderDetailsId");


        if($orderProduct){
            HelperModel::flash("Order Product Updating Successfull", "success");
        }else{
            HelperModel::flash("Order Product Updating Successfull", "success");

        }

        # Redirect
        return redirect()->route("orderDetails",$orderId);
       
    }

    public function orderProductDelete($id = NULL){

        $id = (int) $id;

        $orderProductOffers = OrderProductOffer::where("order_product_id", $id)->first();

        // dd($orderProductOffers);

        # Delete orderProduct using $orderProductId
        $orderProduct = OrderProduct::where("id", $id)->delete();

        # Delete All its Images using $orderProductId
        HelperModel::FileModuleFireOnUpdateOrdelete($id, "orderProduct");

        # Delete All order Product Offer
        $orderProductOffer = OrderProductOffer::where("order_product_id", $id)->delete();


        if($orderProduct || $orderProductOffer){
            HelperModel::flash("Order Product Delation Successfull", "success");
        }else{
            HelperModel::flash("Order Product Delation Failed", "danger");
        }

        if( !Session::has("orderDetailsId") ){
            HelperModel::flash("Something Went Worng We Cound Not Found Any order Id In Session", "danger");
             return redirect()->route("orderList");
        }

        $orderId = Session::get("orderDetailsId");

        # Redirect
        return redirect()->route("orderDetails",$orderId);

    }

    public function addNewOrderProductOffer(){

        return view("admin.order.orderProductOfferAdd");
    }

    public function newOrderProductOfferStore(Request $request){

        // dd($request);

        if( !Session::has("orderProductDetailsId") ){
            HelperModel::flash("Something Went Worng We Cound Not Found Any order Id In Session", "danger");
             return redirect()->route("orderList");
        }

        $orderProductId = Session::get("orderProductDetailsId");

        $offerData = array(
            "order_product_id" => $orderProductId,
            "offer_name" => $request->offer_name,
            "offer_price_type" => $request->offer_price_type,
            "offer_price_amount" => $request->offer_price_amount,
            "offer_price_description" => $request->offer_price_description,
        );

        $offer = OrderProductOffer::create($offerData);

        # Flah Message
        if($offer){

            HelperModel::flash("Order Product Offer Adding Successfull", "success");
        }else{

            HelperModel::flash("Order Product Offer Adding Failed", "danger");

        }

        # Redirect
        return redirect()->route("orderProductDetails",$orderProductId);
    }

    public function orderProductOfferEdit($id = NULL){
        $id = (int) $id;

        $offer = OrderProductOffer::find($id);

        return view("admin.order.orderProductOfferEdit", compact("offer"));
    }

    public function orderProductOfferUpdate(Request $request){

        // dd($request);

        if( !Session::has("orderProductDetailsId") ){
            HelperModel::flash("Something Went Worng We Cound Not Found Any order Id In Session", "danger");
             return redirect()->route("orderList");
        }

        $orderProductId = Session::get("orderProductDetailsId");

        $id = (int) $request->id;

        $offerData = array(
            "offer_name" => $request->offer_name,
            "offer_price_type" => $request->offer_price_type,
            "offer_price_amount" => $request->offer_price_amount,
            "offer_price_description" => $request->offer_price_description,
        );

        $offer = OrderProductOffer::where("id", $id)->update($offerData);

        # Flah Message
        if($offer){

            HelperModel::flash("Order Product Offer Updating Successfull", "success");
        }else{

            HelperModel::flash("Order Product Offer Updating Failed", "danger");

        }

        # Redirect
        return redirect()->route("orderProductDetails",$orderProductId);

    }

    public function orderProductOfferDelete($id = NULL){

        if( !Session::has("orderProductDetailsId") ){
            HelperModel::flash("Something Went Worng We Cound Not Found Any order Id In Session", "danger");
             return redirect()->route("orderList");
        }

        $orderProductId = Session::get("orderProductDetailsId");


        # Delete the Order Product Offer Only

        $id = (int) $id;

        $offer = OrderProductOffer::where("id", $id)->delete();

        # Flah Message
        if($offer){

            HelperModel::flash("Order Product Offer Delete Successfull", "success");
        }else{

            HelperModel::flash("Order Product Offer Delete Failed", "danger");

        }

        # Redirect
        return redirect()->route("orderProductDetails",$orderProductId);

    }


}
