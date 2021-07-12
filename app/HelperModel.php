<?php

namespace App;

use App\Admin\Package;
use App\Admin\PackageProduct;
use App\Admin\AdminRole;
use App\Admin\ClientSendEmailNotification;
use App\Admin\Image;
use App\Admin\PackageStatus;
use App\Admin\SubscriberPackageName;
use App\Admin\SuitAddress;
use App\MailModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Balance;
use App\Admin\Calculator;
class HelperModel extends Model
{
    public static function UpdatedBalance($user, $info)
    {
        $res = Balance::where('user_id', $user->id)->get()->first();
        if(isset($res) )
        {
            if($info->wallet_status == 'Available')
            {
                $cash = HelperModel::returnCashBack($user, 'bank transfer', $info->amount);
                $res->Available += ($cash == -1) ? $info->amount : $info->amount + $cash;
            }elseif($info->wallet_status == 'Required'){
                $res->Required += $info->amount;

            }
            elseif($info->wallet_status == 'Withdraw'){
                $res->Withdraw += $info->amount;
            }
            elseif($info->wallet_status == 'Pending'){
                $res->Pending += $info->amount;
            }
            elseif($info->wallet_status == 'Receivable'){
                $res->Receivable += $info->amount;
            }
            elseif($info->wallet_status == 'Used'){
                $res->Used += $info->amount;
            }
            elseif($info->wallet_status == 'Points'){
                $res->Points += $info->amount;  
            }
            $res->save();
            return true;
        }else{
            if($info->wallet_status == 'Available')
            {
                $cash = HelperModel::returnCashBack($user, 'bank transfer', $info->amount);
                $d = Balance::create([
                    'Available' => ($cash == -1) ? $info->amount : $info->amount + $cash,
                    'user_id' => $user->id,
                ]);
    

            }elseif($info->wallet_status == 'Required'){
                $d = Balance::create([
                    'Required' => $info->amount,
                    'user_id' => $user->id,
                ]);
            }
            elseif($info->wallet_status == 'Withdraw'){
                $d = Balance::create([
                    'Withdraw' => $info->amount,
                    'user_id' => $user->id,
                ]);
            }
            elseif($info->wallet_status == 'Pending'){
                $d = Balance::create([
                    'Pending' => $info->amount,
                    'user_id' => $user->id,
                ]);
                }
            elseif($info->wallet_status == 'Receivable'){
                $d = Balance::create([
                    'Receivable' => $info->amount,
                    'user_id' => $user->id,
                ]);
                }
            elseif($info->wallet_status == 'Used'){
                $d = Balance::create([
                    'Used' => $info->amount,
                    'user_id' => $user->id,
                ]);
                }
            elseif($info->wallet_status == 'Points'){
                $d = Balance::create([
                    'Points' => $info->amount,
                    'user_id' => $user->id,
                ]);
            }

            if($d && $cash != -1)
            {
                return true;
            }elseif($d && $cash == -1){
                return -1;
            }else{
                return false;
            }

        }
    }

    public static function returnCashBack($user,$method,$amount)
    {

            $package_id = SubscriberPackageName::where('name', '=', $user->mem_package)->get()->first();
            if(isset($package_id))
            {
                $pacakage_id = $package_id->id;
            }else{
                return -1;
            }
            $res = Calculator::where('subscriber_package_name_id',  $package_id)
            ->where('module_for','=' , $method )
            ->where('data_from', '<=', $amount)
            ->where('data_to', '>=', $amount)
            ->get();
            if ($res && $res->count() > 0)
            {
                $res = $res[0];
                if($res->amount_type == 'Fixed')
                {
                    return  $res->amount;
                }elseif($res->amount_type == 'Percentage')
                {

                    return ($res->amount/100) * $amount;
                }
            }
            else
            {
                return -1;
            }
    }

    public static function sendNotification($user_id, $user_suit, $subject, $body)
    {
        $note = ClientSendEmailNotification::create([
            'client_id' => $user_id,
            'suit' =>$user_suit,
            'subject' => $subject,
            'body' =>  $body,
            'type' => 'notification',
            ]);
            if(isset($note) )
            {
                return true;
            }else{
                return false;
            }

    }
    
    public static function flash($value, $className = "")
    {
        if( $className ){
            Session::put("class", $className);
        }
        Session::put("message", $value);
    }

	public static function checkPackageCompletion($package){
		$fields_name = array (
            "package_to",
            "shipping_cost",
            "from",
            "to",
            "tracking_no",
            "weight",
            "note",
		);

		foreach($fields_name as $field_name) {
			if(isset($package->{$field_name}) && $package->{$field_name} !== "") {
				return true;
			}
		}
		return false;
	}
    public static function get_subscriber_package_list()
    {
    	$subscriberPackageNames = SubscriberPackageName::select("id", "name")->get();
    	$subscriberPackageNameList = array();

    	if( $subscriberPackageNames ){
    	    foreach($subscriberPackageNames as $k => $v){
    	        $subscriberPackageNameList[$v->id] = $v->name;
    	    }
    	}

    	return $subscriberPackageNameList;
    }
	
	public static function get_package_wo_image_list()
	{
		$list = array();
		$packages = Package::with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->where('stage_no', 1)->get();

        //dump($packages); 

        if(@count($packages)){

            foreach ($packages as $package) {
				$images = HelperModel::getImageLinkFromImageModuleArrayOrString($package->images, false);
				if(count($images) > 0 || HelperModel::checkPackageCompletion($package) === true) continue;
				$list[] = $package;
            }
        }
		return $list;
    }
	
	public static function get_package_w_image_list()
	{
		$list = array();
		$packages = Package::with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->where('stage_no', 1)->get();

        //dump($packages); 

        if(@count($packages)){

            foreach ($packages as $package) {
				$images = HelperModel::getImageLinkFromImageModuleArrayOrString($package->images, false);
				if(count($images) <= 0 || HelperModel::checkPackageCompletion($package) === true) continue;
				$list[] = $package;
            }
        }
		return $list;
    }
	
    public static function get_billed_packages()
	{
		$list = array();
		$packages = Package::with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->where('stage_no', 1)->get();

        if(@count($packages)){
            foreach ($packages as $package) {
				$list[] = $package;
            }
        }
		return $list;
    }

    public static function get_ready_packages()
	{
		$list = array();
		$packages = Package::with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->where('stage_no', 2)->get();

        if(@count($packages)){
            foreach ($packages as $package) {
				$list[] = $package;
            }
        }
		return $list;
    }

	
	public static function get_package_final_list()
	{
		$list = array();
		$packages = Package::with(["user", "packageStatus", "packageProducts", "images"=> function($query){
                $query->where("module_name", "PackageController");
            }])->where('stage_no', 2)->get();

        //dump($packages); 

        if(@count($packages)){

            foreach ($packages as $package) {
				$images = HelperModel::getImageLinkFromImageModuleArrayOrString($package->images, false);
				if(HelperModel::checkPackageCompletion($package) === false) continue;
				$list[] = $package;
            }
        }
		return $list;
    }

    /**
     *
     * Suit will be
     * K - basic, R for premium, N Business
     *  02 - month
     *  21 - year
     * 10 - 99
     * Example -> for Baisc
     * k012110
     */
    
    public static function createSuit($first){

        $month = date("m"); // Two digits for month
        $year = date("y"); // Two year for month
        $randomDigit = rand(10, 99999); // Two random digits to make the digits count six.
		
        $suit = $first . "-" . $month . $year . $randomDigit;
		
        return $suit;
    }

    public static function sendUserSuitMail($clientName, $to, $clientSuit, $country){

        $suit = SuitAddress::where("country", $country)->where("status", 1)->first();

        if($suit){
            // do all the task here...

            $messageBody = '<html><body>';
            $messageBody .="<br>";
            $messageBody .= '<h1>Your Suite Number And Suite Address</h1>';
            $messageBody .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
            $messageBody .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $clientName . "</td></tr>";
            $messageBody .= "<tr><td><strong>Address1:</strong> </td><td>" . $suit->address . "</td></tr>";
            $messageBody .= "<tr><td><strong>Address2:</strong> </td><td>" .'Suite ' .$clientSuit . "</td></tr>";
            $messageBody .= "<tr><td><strong>Country:</strong> </td><td>" . $suit->country . "</td></tr>";
            $messageBody .= "<tr><td><strong>City:</strong> </td><td>" . $suit->city . "</td></tr>";
            $messageBody .= "<tr><td><strong>State:</strong> </td><td>" . $suit->state . "</td></tr>";
            $messageBody .= "<tr><td><strong>Zip Code:</strong> </td><td>" . $suit->zip_code . "</td></tr>";
            $messageBody .= "<tr><td><strong>House && Road No:</strong> </td><td>" . $suit->house_road_number . "</td></tr>";
            $messageBody .= "<tr><td><strong>Phone Number:</strong> </td><td>" . $suit->phone . "</td></tr>";
            $messageBody .= "</table>";
            $messageBody .= "</body></html>";

            // echo $messageBody;

            $res = MailModel::mailSend($to, "Your Suite Number And Suite Address", $messageBody);

            return true;
        }

       return false;
       
    }

    public static function clientPackageSuitHelper($subscriber_package_name){

        $mem_package = "Basic";
        $mem_fee = 0;
        $subscriber_package_name_id = 0;
        $is_payment_done = 0;
        $suit_identity = 0;

        $subscriber_package_name_is = SubscriberPackageName::find($subscriber_package_name);

        // dump($subscriber_package_name_is);

        if( $subscriber_package_name_is ){

            $mem_package = $subscriber_package_name_is->name;
            $mem_fee = $subscriber_package_name_is->price_in_saudi_riyal;
            $subscriber_package_name_id  =  $subscriber_package_name_is->id;
            $suit_identity = $subscriber_package_name_is->suit_identity;
            $suit_identity = HelperModel::createSuit($suit_identity);
        }

        // dump($mem_package);
        # When it is basic we wanna say payment is done 
        # We use these check in a front-end login for Basic
        if( $mem_package == "Basic" ){
            $is_payment_done = 1;
        }

        
        $data = array(
            "mem_package" => $mem_package,
            "mem_fee" => $mem_fee,
            "subscriber_package_name_id" => $subscriber_package_name_id,
            "is_payment_done" => $is_payment_done,
            "suit_identity" => $suit_identity,
        );

        return $data;
    }

    public static function adminRoleList(){
        $adminRoles = AdminRole::select("id", "name")->get();
        $adminRoleList = array();
        if( $adminRoles ){
            foreach($adminRoles as $k => $v){
                $adminRoleList[$v->id] = $v->name;
            }
        }

        return $adminRoleList;
    }

    public static function make_list( $data, $col_name = "name" ){
        $listData = array();
        if($data){
            foreach ($data as $k => $v) {
                $listData[$v->id] = $v->$col_name;
            }
        }
        return $listData;
    }


    public static function saveEmailNotificationDb($clientList, $subject, $body, $type)
    {

        $res = 0;

        if( $clientList ){

            foreach ($clientList as $k => $v) {
                
                $data = array(
                    "client_id" => $v->id,
                    "suit" => $v->suit,
                    "subject" => $subject,
                    "body" => $body,
                    "type" => $type,
                );

                # Save the data to db
                $res = ClientSendEmailNotification::create($data);
            }
        }

        return $res;

    }


    public static function uploadToImageModule(Request $request, $fileName, $folderName, $moduleName, $contentId)
    {
        $res = false;
        $imgArray = self::uploadFileToFolder($request, $fileName, $folderName);

        if(is_array( $imgArray )){

            foreach ($imgArray as $k => $v) {
                $data = array(
                    "module_name" => $moduleName,
                    "content_id" => $contentId,
                    "img" => $v
                );
                $res = Image::create($data);
            }

            if($res){
                return true;
            }
        }

        return false;
    }

    public static function imageTagAdding($img, $height="200px", $width="150px")
    {
        
        $baseUrl = URL::to('/');

        $img = $baseUrl."/".$img;

        $imageWithTag = "<img src='".$img."' width={$height} height={$width}>";

        return $imageWithTag;

    }

    /**
     *
     * @date 27/01/2021
     * @author arafat | arafat.dml@gmail.com
     * uploadFileToFolder
     * @return single upload File Name
     * @return or Upload File Name as Array
     * @return or False If no File
     *
     */
    

    public static function uploadFileToFolder( Request $request, $fileName, $folderName = "imageModule" )
    {
        
        $uploadFileName = NULL;

        if( $request->hasFile($fileName) ){

            # check if it is multiple file Upload
            if( is_array( $request->file($fileName) ) ){

                foreach ($request->file($fileName) as $k => $v) {
                   $uploadFileName[] = self::uploadSingleFile($v, $folderName);
                }

            }else{
                # We have only Single File
                $file = $request->file($fileName);

                $uploadFileName[] = self::uploadSingleFile($file, $folderName);

            }
            // dd($uploadFileName);

            return $uploadFileName;
        }

        # We do not has any file
        return false;

    }

    /**
     *
     * @date 27/11/2021
     * @author arafat | arafat.dml@gmail.com
     * @package uploadSingleFile
     * We can direct use this to upload a file
     * @return uploadFileName or False
     *
     */
    
    public static function uploadSingleFile( &$file, $folderName = "imageModule" )
    {

        try{
            $ext         = $file->getClientOriginalExtension();

            $filename = Str::random(5).'.'.$ext;

            # move the file to the folder 
            $file->move(storage_path("app/public/{$folderName}/"), $filename);

			$uploadFileName = "storage/app/public/{$folderName}/$filename";
            return $uploadFileName;

        }catch( Exception $e ){
            return false;
        }

    }

    public static function FileModuleFireOnUpdateOrdelete($foreignId, $moduleName)
    {
        $images = Image::where('content_id', $foreignId)->where("module_name", $moduleName)->get();
        if($images){
            foreach($images as $k => $v){
                # We will unlink it here
                @unlink($v->img);
            }
        }

        # Then delete All 
       $res = Image::where('content_id', $foreignId)->where("module_name", $moduleName)->delete();

       return $res;
    }

    public static function defaultFlash($res, $for = "Creation"){

        if( $res ){
            self::flash("Data {$for} Successfull", "success");
        }else{
            self::flash("Data {$for} Failed", "danger");
        }

        return true;
    }

    public static function packageTo(){

        return array(

            "usa" => "USA",
            "china" => "China",
            "saudi" => "Saudi",
            "purchase" => "Purchase",
        );

    }

    public static function packageStatusList(){

        $packageStatusList = PackageStatus::get();
        $packageStatusList = self::make_list( $packageStatusList, "package_status" );

        return $packageStatusList;
    }

    public static function getRandomDigit( $digits = 6 ){

        $randomDigit = rand(pow(10, $digits-1), pow(10, $digits)-1);

        return $randomDigit;
    }

    /**
     *
     * @getImageFromImageModuleArrayOrString
     * @return All image as string
     * @return All Image as Array 
     */
    

    public static function getImageFromImageModuleArrayOrString($imageModule, $returnAsString = false)
    {
        $images = NULL;

        if( $imageModule ){
            foreach ($imageModule as $k => $v ) {

                $images[] = self::imageTagAdding( $v["img"] );
            }

            # Check What We want...
            if( $returnAsString &&  $images){
                $images = implode(" ", $images);
            }
        }

        return $images;

    }
	
	
	/**
     * @getImageFromImageModuleArrayOrString
     * @return All image as string
     * @return All Image as Array 
     */
    

    public static function getImageLinkFromImageModuleArrayOrString($imageModule, $returnAsString = false)
    {
        $images = array();

        if( $imageModule ){
            foreach ($imageModule as $k => $v ) {

                $images[] = $v["img"];
            }

            # Check What We want...
            if( $returnAsString &&  $images){
                $images = implode(" ", $images);
            }
        }

        return $images;

    }

    public static function joinJsonArray($array1, $array2, $joinStr = ":")
    {
        $joinStr = NULL;
        if($array1 && $array1){

            $joinStr = "<ul>";
            $array1 = json_decode($array1);
            $array2 = json_decode($array2);
            // dump($array1);
            // dump($array2);
            // die();
            foreach($array1 as $k => $v){

                $joinStr .= "<li>" . $v.": ".$array2[$k] . "</li>";

            }

            $joinStr .= "</ul>";
        }

        return $joinStr;

    }

    public static function buildHtmlTableforAjaxResponse($data, $name = "", $style="border: 1px solid green;"){
        $html = NULL;
        if( is_array($data) || is_object($data) ){

            $html = "<div style='margin-top:20px; {$style}' > <h3>$name</h3> <table class='table'>";

            foreach ($data as $k => $v) {
                
                $key = str_replace("_", "  ", $k);

                # Add the Data
                $html .= "<tr>";
                $html .= "<td>$key: </td>";
                $html .= "<td> $v </td>";
                $html .= "</tr>";
                # End add the Data

            }

            $html .= "</div> </table>";

        }

        return $html;

    }

    public static function table_view($title = false, $th, $td, $view = true, $edit = true, $delete = true, $other_actions = [], $action = "Actions", $datatable_id = "datatable-tabletools_ignore") {
        // dd($view);

        echo <<< EOD
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">$title</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0 datatable-arafat" id="$datatable_id">
                            <thead>
                                <tr>
EOD;
        # Printing the Table Header ...........
        $id = NULL;
        if (is_object($th) || is_array($th)) {
            foreach ($th as $k => $v) {
                echo "<th>$v</th>";
            }
        }
        # Check if action is set ....
        if ($action) {
            echo "<th>$action</th>";
        }
        # End Printing The Table Header .....

        echo <<<EOD
            </tr>
        </thead>
        <tbody>
EOD;
        # Now Printg the data Using 2 Foreach
        if (is_object($td) || is_array($td)) {
            foreach ($td as $k => $v) {
                echo "<tr>";
                foreach ($v as $kk => $vv) {
                    if ($kk == "id") {
                        $id = $vv;
                    } else {
                        $has_active_deactice_feature = 0;

                        # For Active inActive Checking...
                        if( $kk == "status" ){

                            $has_active_deactice_feature = 1;
                            $status = $vv;
                            if($vv == 0){

                                $vv = "<strong>Deactive</strong>";
                            }else{
                                $vv = "<strong>Active</strong>";
                            }

                        }

                        # For image

                        if($kk == "image"){

                            $img = APP_URL."/".$vv;

                            $vv = "<img src='".$img."' width='200px' height='150px'>";
                        }


                        echo "<td>$vv</td>";
                    }
                }

                # If Actions is Set Then
                if ($action) {
                    echo "<td style='white-space: nowrap;'>";
                    if ($view) {
                        echo <<<EOD
                        <a href="$view/$id "><buttons  class="btn btn-primary" disabled="disabled"><i class="fas fa-eye"></i></button></a>
EOD;
                    }

                    if ($edit) {
                        echo <<<EOD
                        <a href="$edit/$id">
                           <buttons  class="btn btn-success" disabled="disabled"><i class="fas fa-edit"></i></button>
                        </a>
EOD;
                    }

                    # Inject Others Actions Here..

                    if( !empty(is_array($other_actions)) ){
                        foreach($other_actions as $action_key => $action_val){

                        # Matching Get part and process it
                        if(strpos($action_val, "?") !== false){
                            $url = $action_val."&id=$id";
                        }else{
                            $url = $action_val."/$id";
                        }
                        # End matching Get Part and Process it...


                        # Code for Active Deactive Feature

                        if( $has_active_deactice_feature ){

                            $statusMenuName = "Deactive";

                            if($status == 0){
                                $statusMenuName = "Active";
                            }

                            $otherActionName = str_replace("status", $statusMenuName, $action_key);

                            echo <<<EOD
                            <a href="$url" onclick="return confirm('Are you Sure You wanna $statusMenuName This User?')">
                               <buttons  class="btn btn-info" disabled="disabled"> $otherActionName </button>
                            </a>
EOD;
                        }

                        # End Code for Active Deactive Feature
                        else {

                        echo <<<EOD
                        <a href="$url">
                           <buttons  class="btn btn-info" disabled="disabled"> $action_key </button>
                        </a>
EOD;
                        }

                        }
                    }

                    # End Inject Others Actions Here ..

                    if ($delete) {
                        echo <<<EOD

                        <a href="$delete/$id" onclick="return confirm('are you sure You Wanna Delete ? It Will Batch delete Data From Multiple Table Where It is Related to ! ')">
                            <buttons  class="btn btn-danger" disabled="disabled"><i class="far fa-trash-alt"></i></button>
                        </a>
EOD;
                    }

                    echo "</td>";
                }
                echo "</tr>";
            }
        }
    # Now Close All the Previous Open Tags
        echo <<<EOD
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
EOD;
    }

    public static function details_table_view($title = false, $data) {
        echo <<< EOD
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title">$title</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-bordered table-striped mb-0">
                            <tbody>
EOD;
        if (is_object($data) || is_array($data)) {
            if ($data) {
                // pr($data);
                foreach ($data as $k => $v) {
                    // pr($v);
                    echo "<tr>";
                    echo "<td>";
                    echo ucwords(str_replace("_", " ", $k));
                    echo "</td>";

                    echo "<td>";
                    echo $v;
                    echo "</td>";

                }
            }
        }

    # Now Close All the Previous Open Tags
        echo <<<EOD
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
EOD;

    }

    


}
