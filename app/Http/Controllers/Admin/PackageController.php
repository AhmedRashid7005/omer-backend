<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Package;
use App\Admin\PackageProduct;
use App\HelperModel;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{

    /* Deprecated // Tarek Mahfouz */
    public function packageList(){
    	$packageList = array();
        $packages = Package::with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->get();

        //dump($packages); 

        if(@count($packages)){

            foreach ($packages as $k => $v) {
				
				$result = null;
				if($result = $this->makePackageData( $packages[$k] )) 
				$packageList[$k] = $result;
            }
        }
		
        // dd($packageList);

        return view("admin.package.packageList", compact("packageList"));

    }

    /* Deprecated // Tarek Mahfouz */
	public function photoPackageList(){
    	$packageList = array();
        $packages = Package::with(["user", "packageStatus"])->get();
		
		/* $packagesProducts = Package::with("packageProducts")->where('id', '=',5)
                    ->get(); */

        // dd($packages);
        if(@count($packages)){

            foreach ($packages as $k => $v) {
				//dd($images);
				$result = null;
				if($result = $this->makePhotoPackageData( $packages[$k] )) 
					$packageList[$k] = $result;
            }
        }

         // dd($packageList);

        return view("admin.package.photoPackageList", compact("packageList"));

    }
	
    /* Deprecated // Tarek Mahfouz */
	public function completePackageList(){
    	$packageList = array();
        $packages = Package::with(["user", "packageStatus"])->get();

        //dump($packages); 

        if(@count($packages)){

            foreach ($packages as $k => $v) {
				//dd($images);
				$result = null;
				if($result = $this->makeCompletePackageData( $packages[$k] )) 
					$packageList[$k] = $result;
            }
        }

         //dd($packageList);

        return view("admin.package.completePackageList", compact("packageList"));

    }
    
    private function clientHtmlView( $user, $class = "selectionDone" ){
        
        $userId = $user->id;
        $suit = $user->suit;
        $name = $user->first_name;
        $mobileNum = $user->ship_phone;
        $email = $user->email;
        $billingAdd = $user->bill_add_1." ".$user->bill_add_2;
        $packageType = $user->mem_package;

        //$html = "<div style='border: 2px solid grey; cursor: pointer;' data-userid={$userId} class={$class}>";
        //$html .= "<table class='table'>";
		
                $html = "<td> $suit </td>";
        $html .= "<td> $name </td>";
        $html .= "<td> $mobileNum </td>";
        $html .= "<td> $email </td>";
        $html .= "<td> $billingAdd </td>";
        $html .= "<td> $packageType </td>";

        return $html;
    }

    private function makePackageData( $package ){
        // dd($package);
        $newArr = NULL;

       if( $package ){

        # Get images ...

        $images = HelperModel::getImageFromImageModuleArrayOrString($package->images, true);
		
		if(HelperModel::checkPackageCompletion($package) === false) return $newArr;
		
        #-----------------------------------------
        # Process Json encoded data ....

        $twoJsonDataMerge = HelperModel::joinJsonArray($package->other_fees_name, $package->other_fees_value);
        // dump($twoJsonDataMerge);
        #-----------------------------------------
		
		
        # Now We need to re Write The Array..
        $newArr = array(
            "id" => $package->id,
            "check_box" => "<input type='checkbox' name='ids[]' class='all_id' value=$package->id >",
            "package_no" => isset($package->package_no)?($package->package_no):(""),
			"printed" => ($package->printed == 0)? ("No") : ("Yes"),
            "package_status" => isset($package->packageStatus->package_status)? ($package->packageStatus->package_status):(""),
            "user" => $package->user->name." (".$package->user->suit.")",
            "package_to" => $package->package_to,
            "shipment_value" => $package->shipping_cost, // The Title has been changed from cost to value just for displaying. In the database, it would be same.
            "from" => $package->from,
            "to" => $package->to,
            'sended' => ($package->sended0>0)? ('No'): ('Yes'),
            "tracking_no" => $package->tracking_no,
            "weight" => $package->weight,
            "note" => $package->note,
            "other_fees" => $twoJsonDataMerge,
            "images" => $images,
            "products_qty" => $package->products_qty,
            "total_invoice" => $package->total_invoice,
            "created_at" => $package->created_at,
            "updated_at" => $package->updated_at,
        );

       }

       return $newArr;

    }
	
	private function makePhotoPackageData( $package ){
        $newArr = NULL;

       if( $package ){
			// dd($package);
        # Get images ...

        $images = HelperModel::getImageLinkFromImageModuleArrayOrString($package->images, false);

		if(count($images) > 0) return $newArr;
		if (HelperModel::checkPackageCompletion($package) === true) return $newArr;
        #-----------------------------------------
        # Process Json encoded data ....

        $twoJsonDataMerge = HelperModel::joinJsonArray($package->other_fees_name, $package->other_fees_value);
        // dump($twoJsonDataMerge);
        #-----------------------------------------

        # Now We need to re Write The Array..
        $newArr = array(
            "id" => $package->id,
            "check_box" => "<input type='checkbox' name='ids[]' class='all_id' value=$package->id >",
            "package_no" => $package->package_no,
            "user" => $package->user->name." (".$package->user->suit.")",
            "products_qty" => $package->products_qty,
            "total_invoice" => $package->total_invoice,
			"user_package" => $package->user->mem_package,
            "created_at" => $package->created_at,
			"printed" => ($package->printed == 0)? ("No") : ("Yes"),
        );

       }

       return $newArr;

    }
	
	private function makeCompletePackageData( $package ){
        $newArr = NULL;

       if( $package ){
			// dd($package);
        # Get images ...

        $images = HelperModel::getImageFromImageModuleArrayOrString($package->images, true);
		if(strlen($images) <= 0 || HelperModel::checkPackageCompletion($package) === true) return $newArr;
        #-----------------------------------------
        # Process Json encoded data ....

        #-----------------------------------------
		$images = addslashes($images);
		$images = <<<IMAGE
			<a onclick="var win = window.open('', 'Images', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=200,top='+(screen.height-400)+',left='+(screen.width-840)); win.document.body.innerHTML = '{$images}';" href='#'>View Image(s)</a>
IMAGE;
        # Now We need to re Write The Array..
		$newArr = array(
            "id" => $package->id,
            "check_box" => "<input type='checkbox' name='ids[]' class='all_id' value=$package->id >",
            "package_no" => $package->package_no,
            "user" => $package->user->name." (".$package->user->suit.")",
            "products_qty" => $package->products_qty,
            "total_invoice" => $package->total_invoice,
			"user_package" => $package->user->mem_package,
			"images" => $images,
            "created_at" => $package->created_at,
			"printed" => ($package->printed == 0)? ("No") : ("Yes"),
        );
       }

       return $newArr;

    }

    public function findClient(Request $request){
        // echo $request->searchKey;

        $res = array();
        $searchKey = $request->searchKey;

        if( $searchKey ){
            # Query the Search
            $res = User::with("subscriberPackageName")->where('name', 'like','%'.$searchKey.'%')
                    ->orWhere('email', 'like','%'.$searchKey.'%')
                    ->orWhere('ship_phone', 'like','%'.$searchKey.'%')
                    ->orWhere('suit', 'like','%'.$searchKey.'%')
                    ->orderBy('id', 'desc')
                    ->get();
        }
    
        // dd($res);
        if(@count($res)){
            
            $html = "";
            
            # Generating the data.....
			$html .= "<div style='border: 2px solid grey; cursor: pointer;'>";
			$html 	.= "<table class='table'>";
			$html 	.= "<thead><tr class='header-row'><th>Suit Number:</th><th>Name:</th><th>Mobile:</th><th>Email:</th><th>Billing:</th><th>Package:</th></tr></thead>";
            $html .= "<tbody>";
			foreach ($res as $k => $v) {

                $html .= "<tr data-userid={$v->id} class='selectedOne'>" . $this->clientHtmlView($v, "selectedOne") . "</tr>";
                
            }
			$html .= "</tbody>";
			$html 	.= "</table>";
			$html .= "</div>";
			//dd($html);
		   echo $html;

        }else{
            echo 0;
        }

    }

    

    public function selectClient(Request $request){
        // dd($request);
        $userId = (int) $request->userId;

        # Set it Session We need it When we 
        # Store the Package....

        Session::put("clientIdForPackage", $userId);

        # End Set it Session

        $user = User::find($userId);

        $html = $this->clientHtmlView($user);

        // dd($user);

        echo $html;
    }

    public function packageAdd(){

    	$packageTo = HelperModel::packageTo();

        $packageStatusList = HelperModel::packageStatusList();

        # We we come here if Package Created..
        $newlyCreatedPackage = "";
        $selectedClient = "";
        $showAddProductForm = false;

        # Check if it has selected client and a 
        # Newly created Package...
        /*if(Session::has("clientIdForPackage") && Session::has("insertedPackageId"))
        {
            # --------------------------------------------
            # When it appear it show Add Product Form...
            $showAddProductForm = true;
            # -------------------------------------------

            # Retrive Id form Session...
            $selectedClientId       = Session::get("clientIdForPackage");
            $insertedPackageId      = Session::get("insertedPackageId");

            # Query the Database ...  Wao It is Fun haa?

            $selectedClient         = User::find($selectedClientId);

            $newlyCreatedPackage    = Package::with(["user", "packageStatus", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->find($insertedPackageId);

            // dump($selectedClient);
            // dump($newlyCreatedPackage);

            $selectedClient = $this->clientHtmlView($selectedClient);

            // dump($selectedClient);
            
            $newlyCreatedPackage = $this->makePackageData( $newlyCreatedPackage );

            // dump($newlyCreatedPackage);

        }*/

        return view("admin.package.packageAdd", compact('packageTo', 'packageStatusList', 'newlyCreatedPackage', 'selectedClient', 'showAddProductForm'));
    }

    public function packageStore(Request $request){

        // dd($request->all());
        $stage_no = $request->filled('stage_no') && $request->stage_no == 2 ? 2 : 1;
        $data = array( 
            "package_no" => HelperModel::getRandomDigit(),
            "stage_no" => $stage_no,
            "package_status_id" => $request->package_status_id,
            "user_id" => Session::get("clientIdForPackage"),
            "package_to" => $request->package_to,
            "shipping_cost" => $request->shiping_cost,
            "from" => $request->from,
            "to" => $request->to,
            "tracking_no" => $request->tracking_no,
            "weight" => $request->weight,
            "note" => $request->note,
            'products_qty' => $request->products_qty,
            'total_invoice' => $request->total_invoice,
            "other_fees_name" => json_encode( $request->other_fees_name ),
            "other_fees_value" => json_encode( $request->other_fees_value ),
        );


		if(isset($request->Print)) {
			$data["printed"] = 1;	
		}
        # Save the data
        $res = Package::create($data);

        # Check if File Submitted
        if($request->hasFile('image') && $res){ 
            # Set the Inserted package Id On session
            Session::put("insertedPackageId", $res->id);

            HelperModel::uploadToImageModule($request, "image", "imageModule", "PackageController", $res->id);
        }		
        if( $res ){
            HelperModel::flash("Data Creation Successfull", "success");
        }else{
            HelperModel::flash("Data Creation Failed", "danger");
        }

        # We need some work here .. wait ...
        if($request->readyPackage) {
            return redirect()->route('addProductToPackage', ['package_id' => $res->id]);
        }
        return redirect()->route("packageAdd");

    }
	
	
	public function packageStoreOne(Request $request){

        $valid = Validator::make($request->all(), [
            'products_qty' => 'nullable|numeric',
            'total_invoice' => 'nullable|numeric'
        ]);

        if($valid->fails()) {
            HelperModel::flash("Data not Valid", "danger");
            return redirect()->route("packageAdd");
        }
        $data = array( 
            "package_no" => HelperModel::getRandomDigit(),
            "user_id" => $request->userid,
            'products_qty' => $request->products_qty,
            'total_invoice' => $request->total_invoice,
        );
		if(isset($request->Print)) {
			$data["printed"] = 1;	
		}
		
        # Save the data
        $res = Package::create($data);

		if($request->hasFile('image') && $res){
            HelperModel::uploadToImageModule($request, "image", "imageModule", "PackageController", $res->id);
        }
		
        # Check if File Submitted
        
        if( $res ){
            HelperModel::flash("Data Creation Successfull", "success");
        }else{
            HelperModel::flash("Data Creation Failed", "danger");
        }

        # We need some work here .. wait ...

        return redirect()->route("packageAdd");

    }

    public function packageDetails($id){
        $id = (int) $id;

        $packageData = Package::with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->find($id);

        // dump($packageData);

        $package = $this->makePackageData( $packageData );

        $packageProducts = $userData = NULL;

        if(@count($packageData->packageProducts)){
            $packageProducts = $packageData->packageProducts->toArray();
        }

        // dd($packageProducts);

        if(@count($packageData->user)){

            $userData = $this->clientHtmlView(  $packageData->user );
        }

        #-----------------------------------------
        # We Need to Set the Package Details id in
        # Session because We wanna give the 
        # Add product to Package Facility form
        # Package Details
        #-----------------------------------------
        if( @count($packageData) ){
            Session::put("packageDetailsId", $id);
        }
        
        # End Set Session

        return view("admin.package.packageDetails", compact("userData", "package", "packageProducts"));

    }


    /*==============================================
    =            Package Product Module            =
    ==============================================*/

    public function packageProductAdd(){

        # We need to check that we have 
        # Package Id in Session

        if(! Session::has("packageDetailsId")){
            HelperModel::flash("Someting Went Wrong When Try to add Package Product", "danger");
            return redirect()->route("packageList");
        }

        return view("admin.package.packageProductAdd");
    }

    public function packageProductStoreFromPackageDetails(Request $request){

        # We need to check that we have 
        # Package Id in Session

        if(! Session::has("packageDetailsId") && !$request->filled('package_id')){
            HelperModel::flash("Someting Went Wrong When Try to add Package Product", "danger");
            return redirect()->route("packageList");
        }


        $packageDetailsId = $request->filled('package_id') ?
            $request->package_id :
            Session::get("packageDetailsId");

        $res = $this->processPackageProductData( $request,  $packageDetailsId);


       # Set Flash ..
       HelperModel::defaultFlash($res);

       return redirect()->route("packageDetails",$packageDetailsId);

    }

    private function processPackageProductData(Request $request, $packageId)
    {

        $totalCount = @count($request->product_name);

         $productDataCreation = NULL;

        for ($i=0; $i < $totalCount; $i++) { 
            
            # Here we will organize the data and insert in db
            $data = array(
             "package_id" => $packageId,
             "product_name" => $request->product_name[$i],
             "description" => $request->description[$i],
             "quantity" => $request->quantity[$i],
             "price" => $request->price[$i],
             "note" => $request->note[$i], 
            );

            $productDataCreation = PackageProduct::create($data);

            $package = Package::find($packageId);
            if ($package->products_qty == $package->packageProducts->count())
            {
                $package->sended = 1;
                $package->save();
            }
            

        }
		if(isset($request->Print)) {
			$res = Package::where("id", $packageId)->update(array("printed" => 1));
		}

        return $productDataCreation;

    }
    
    public function packageProductStore(Request $request){
        // dump($request);
        # Remember we will forget all the session data here..


        $productDataCreation = $this->processPackageProductData( $request, Session::get("insertedPackageId") );

       # -------------------------------------
       # Now we need to Forget the Session data
       # -------------------------------------

       Session::forget("clientIdForPackage");
       Session::forget("insertedPackageId");

       #-----------------------------------------
       # end For get Session data
       #-----------------------------------------

       # Now Redirect ...

       if( $productDataCreation ){
           HelperModel::flash("Data Creation Successfull", "success");
       }else{
           HelperModel::flash("Data Creation Failed", "danger");
       }

       # We need some work here .. wait ...

       return redirect()->route("packageList");

    }

    public function addProductToPackage($package_id, Request $request){

        return view("admin.package.addProducts");

    }

    public function packageProductEdit($id = NULL){
        $id = (int) $id;
        $packageProduct = PackageProduct::find($id);

        return view("admin.package.packageProductEdit", compact("packageProduct"));
    }

    public function packageProductUpdate(Request $request){
        // dd($request);
        $id = (int) $request->id;

        $data = array(
            "product_name" => $request->product_name,
            "description" => $request->description,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "note" => $request->note,
        );

        $packageDetailsId = Session::get("packageDetailsId");

        $res = PackageProduct::where("id", $id)->update($data);

        HelperModel::defaultFlash($res, "Package Product Updating");

        return redirect()->route("packageDetails",$packageDetailsId);
    }

    public function packageProductDelete($id = NULL){

        $id = (int) $id;

        $res = PackageProduct::where("id", $id)->delete();

        HelperModel::defaultFlash($res, "Package Product Delation");

        $packageDetailsId = Session::get("packageDetailsId");

        return redirect()->route("packageDetails",$packageDetailsId);
    }    
    
    /*=====  End of Package Product Module  ======*/
    



    public function packageEdit($id = NULL){
    	$id = (int) $id;

        $package = Package::find($id);

        #-------------------------------
        $packageTo = HelperModel::packageTo();

        $packageStatusList = HelperModel::packageStatusList();
        #-------------------------------

        return view("admin.package.packageEdit", compact("package", "packageTo", "packageStatusList"));
    }
	
	public function packagePrint($type = 'a', $id = NULL){
    	$id = (int) $id;

        $package = Package::find($id);
		$list = array();
		$list[] = $package;
		
        Package::where("id", $id)->update(array("printed" => 1));
		
        return view("admin.package.packagePrint", compact("list", "type"));
    }
	
	public function packagePrintAll($type = 'a', $id = NULL){
    	$id = (int) $id;
		$list = array();
		
		$ids = array();
		
		if($id == 1) {
			$list = HelperModel::get_package_wo_image_list();
		}
		elseif($id == 2) {
			$list = HelperModel::get_package_w_image_list();
		}
		elseif($id == 3) {
			$list = HelperModel::get_package_final_list();
		}		
		foreach($list as $package) {
			$ids[] = $package->id;	
		}

		Package::whereIn("id", $ids)->update(array("printed" => 1));
        return view("admin.package.packagePrint", compact("list", "type"));
    }

    public function packageUpdate(Request $request)
    {
        # array_fileter remove empty array values
        $id  = (int) $request->id;

		/* Check if Product Added - Start */
		
		$haveProducts = false;
		
		$packagesProducts = Package::with("packageProducts")->where('id', '=', $id)
            ->first();
		if($packagesProducts && count($packagesProducts->packageProducts) > 0) $haveProducts = false;
		
		/* Check if Product Added - End  */

        $data = array( 
            "package_status_id" => $request->package_status_id,
            "package_to" => $request->package_to,
            "stage_no" => 2,
            "shipping_cost" => $request->shiping_cost,
            "from" => $request->from,
            "to" => $request->to,
            "tracking_no" => $request->tracking_no,
            "weight" => $request->weight,
            "note" => $request->note
        );
		if(isset($request->other_fees_name) && is_array($request->other_fees_name)) {
			$data["other_fees_name"] = json_encode( array_filter($request->other_fees_name) );
		}
		if(isset($request->other_fees_value) && is_array($request->other_fees_value)) {
			$data["other_fees_value"] = json_encode( array_filter($request->other_fees_value) );
		}
        # Save the data
        $res = Package::where("id", $id)->update($data);

        # Check if File Submitted
        if($request->hasFile('image') && $res){

            # For updating First We Need to Delete the 
            # Old Image form db And Form Folder
            HelperModel::FileModuleFireOnUpdateOrdelete($id, "PackageController");

            HelperModel::uploadToImageModule($request, "image", "imageModule", "PackageController", $id);
        }
        
        if( $res ){
            HelperModel::flash("Data Updating Successfull", "success");
        }else{
            HelperModel::flash("Data Updating Failed", "danger");
        }

        # We need some work here .. wait ...
		
		/* if($haveProducts === false) {
			Session::put("insertedPackageId", $id);
			return redirect()->route("packageAdd");
		} */

        return redirect()->route('addProductToPackage', [$id]);
        // return redirect()->route("packageList");
    	
    }

    public function packageDelete($id = NULL){
    	$id = (int) $id;

        $package = Package::where("id", $id)->first();
        $stage_no = $package->stage_no;

        $res = $package->delete();

        if($res){
            # Delete the Images...
            HelperModel::FileModuleFireOnUpdateOrdelete($id, "PackageController");
            # Delete the Package Product
            $packageProductDelete  = PackageProduct::where("package_id", $id)->delete();
            HelperModel::flash("Data Delation Successfull", "success");

        }else{
            HelperModel::flash("Data Updating Failed", "danger");
        }

        if($stage_no == 2) {
            return redirect()->route("readyPackageList");
        }
        return redirect()->route("billedPackageList");

    }



    /* ================ Tarek Mahfouz =================== */
    public function printPackages(Request $request)
    {
        //return $request->all();
        if(!$request->filled('ids') || !is_array($request->ids)) {
            HelperModel::flash("Select Packages", "danger");
            return redirect()->back();
        }
        $list = $ids = [];
        $type = $request->filled('a') ? 'a' : 'b';

        /* ============================ */
        if($request->package_type == 'first') {
            $packages = Package::with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->whereIn('id', $request->ids)->get();
        }
        elseif($request->package_type == 'second') {
            $packages = Package::with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->whereIn('id', $request->ids)->get();
            if(@count($packages)){
                foreach ($packages as $package) {
                    $images = HelperModel::getImageLinkFromImageModuleArrayOrString($package->images, false);
                    if(count($images) <= 0 || HelperModel::checkPackageCompletion($package) === true) continue;
                    $list[] = $package;
                }
            }
        }
        elseif($request->package_type == 'ready') {
            $packages = Package::with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->whereIn('id', $request->ids)->get();

            if(@count($packages)){
                foreach ($packages as $package) {
                    $images = HelperModel::getImageLinkFromImageModuleArrayOrString($package->images, false);
                    if(HelperModel::checkPackageCompletion($package) === false) continue;
                    $list[] = $package;
                }
            }
        }
        else {
            $packages = [];
        }


        if(count($packages)){
            foreach ($packages as $package) {
                $images = HelperModel::getImageLinkFromImageModuleArrayOrString($package->images, false);
                if(count($images) > 0 || HelperModel::checkPackageCompletion($package) === true) continue;
                $list[] = $package;
            }
        }

        foreach($list as $package) {
            $ids[] = $package->id;
        }
        Package::whereIn("id", $ids)->update(array("printed" => 1));
        return view("admin.package.packagePrint", compact("list", "type"));
    }

    public function billedPackageList(){
    	$packageList = array();
        $packages = Package::where('stage_no', 1)
            ->with(["user", "packageStatus"])
            ->orderBy('created_at', 'DESC')
            ->get();

        //dump($packages); 

        if(@count($packages)){
            foreach ($packages as $k => $v) {
				$result = null;
				if($result = $this->prepareBilledPackages( $packages[$k] )) 
					$packageList[$k] = $result;
            }
        }

        return view("admin.package.completePackageList", compact("packageList"));

    }
    public function readyPackageList(){
    	$packageList = array();
        $packages = Package::where('stage_no', 2)->with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->orderBy('created_at', 'DESC')->get();

        //dump($packages); 

        if(@count($packages)){

            foreach ($packages as $k => $v) {
				$result = null;
				if($result = $this->prepareReadyPackageData( $packages[$k] )) 
				    $packageList[$k] = $result;
            }
        }
		
        // dd($packageList);

        return view("admin.package.packageList", compact("packageList"));

    }
    public function sendPackageToClient($package_id)
    {
        $p = Package::find($package_id);
        $p->sended = 1;
        $p->save();
        return redirect(route('readyPackageList'));
    }

    private function prepareBilledPackages( $package ){
        $newArr = array(
            "id" => $package->id,
            "check_box" => "<input type='checkbox' name='ids[]' class='all_id' value=$package->id >",
            "package_no" => $package->package_no,
            "user" => $package->user->name." (".$package->user->suit.")",
            "products_qty" => $package->products_qty,
            "total_invoice" => $package->total_invoice,
			"user_package" => $package->user->mem_package,
            "images" => "",
            "created_at" => $package->created_at,
			"printed" => ($package->printed == 0)? ("No") : ("Yes"),
            "sended" => ($package->sended==0)? ('No') : ("Yes")
        );

       if( $package ){
            $images = HelperModel::getImageFromImageModuleArrayOrString($package->images, true);
            if(strlen($images) <= 0 || HelperModel::checkPackageCompletion($package) === true) return $newArr;
            #-----------------------------------------
            # Process Json encoded data ....

            #-----------------------------------------
            $images = addslashes($images);
            $images = <<<IMAGE
                <a onclick="var win = window.open('', 'Images', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=200,top='+(screen.height-400)+',left='+(screen.width-840)); win.document.body.innerHTML = '{$images}';" href='#'>View Image(s)</a>
            IMAGE;
            # Now We need to re Write The Array..
            
            $newArr["images"] = $images;
       }

       return $newArr;

    }
    private function prepareReadyPackageData( $package ){
        $newArr = array(
            "id" => $package->id,
            "check_box" => "<input type='checkbox' name='ids[]' class='all_id' value=$package->id >",
            "package_no" => isset($package->package_no)?($package->package_no):(""),
			"printed" => ($package->printed == 0)? ("No") : ("Yes"),
            "package_status" => isset($package->packageStatus->package_status)? ($package->packageStatus->package_status):(""),
            "user" => $package->user->name." (".$package->user->suit.")",
            "package_to" => $package->package_to,
            "shipment_value" => $package->shipping_cost, // The Title has been changed from cost to value just for displaying. In the database, it would be same.
            "from" => $package->from,
            "to" => $package->to,
            "tracking_no" => $package->tracking_no,
            "weight" => $package->weight,
            "note" => $package->note,
            "other_fees" => "",
            "images" => "",
            "sended" => ($package->sended == 0 )? ('No') : ('Yes'),
            "products_qty" => $package->products_qty,
            "total_invoice" => $package->total_invoice,
            "created_at" => $package->created_at,
            "updated_at" => $package->updated_at,
        );

       if( $package ) {
            $images = HelperModel::getImageFromImageModuleArrayOrString($package->images, true);
            if(HelperModel::checkPackageCompletion($package) === false) 
                return $newArr;
            
            $newArr['other_fees'] = HelperModel::joinJsonArray($package->other_fees_name, $package->other_fees_value);
            
            $newArr['images'] = $images;
       }
       return $newArr;
    }
    /* ================ End Edit =================== */


}
