<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin\Package;
use App\User;
use App\HelperModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{

    public function __construct()
    {
      $this->middleware('adminAuth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function checkIfReady($package)
    {
        if(
            $package->package_to != "" && 
            $package->shipping_cost != "" && 
            $package->from != "" && 
            $package->to != "" && 
            $package->tracking_no != "" && 
            $package->weight != ""
        ) return true;
        return false;

    }
    public function index()
    {
        $users = User::select("id", "name", "email", "created_at")->get()->toArray();

		/* Fetch Packages Count According to Their Type -       */
		// $package_count[1] = count(HelperModel::get_package_wo_image_list());
		// $package_count[2] = count(HelperModel::get_package_w_image_list());
		// $package_count[3] = count(HelperModel::get_package_final_list());
		/********************************************************/

        /* Tarek Mahfouz */
        $package_count[1] = count(HelperModel::get_billed_packages());
        $package_count[2] = count(HelperModel::get_ready_packages());

		/* Fetch Packages List  */
		$packages = Package::get(["id", "package_no","stage_no"]);
		/************************/
		
        // dd($users);
        // HelperModel::flash("I am just kidding ...", "primary");

        /* =============== Tarek Mahfouz ================= */
        $packageTo = HelperModel::packageTo();
        $packageStatusList = HelperModel::packageStatusList();
        $newlyCreatedPackage = "";
        $selectedClient = "";
        $showAddProductForm = false;
        /* =============== Tarek Mahfouz ================= */



		return view("admin.dashboard")->with([
            'packages' => $packages,
            'users' => $users,
            'package_count' => $package_count,

            'packageTo' => $packageTo,
            'packageStatusList' => $packageStatusList,
            'newlyCreatedPackage' => $newlyCreatedPackage,
            'selectedClient' => $selectedClient,
            'showAddProductForm' => $showAddProductForm,

        ]);
    }


}
