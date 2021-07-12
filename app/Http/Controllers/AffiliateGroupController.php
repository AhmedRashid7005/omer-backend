<?php

namespace App\Http\Controllers;

use App\affiliateGroup;
use App\affiliateType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class AffiliateGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $affiliateGroups = affiliateGroup::with(["affiliateType"])->get();
        // dd($affiliateGroups);
        return view("affiliate.affiliateGroup.affiliate_group_list", compact('affiliateGroups'));
    }

    /**
     * create the Affiliate Group form Here
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $affiliateTypes = affiliateType::get();
        // dd($affiliateTypes);
        return view('affiliate.affiliateGroup.create_affiliate_by_group', compact('affiliateTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid_time_limit = get_valid_time_limit($request);
        $data = array(
            "affiliate_type_id" => $request->affiliate_type_id,
            "price" => json_encode(array(
                "client_commision_basic" => $request->client_commision_Basic,
                "guest_discount_basic" => $request->guest_discount_Basic,
                "client_commision_business" => $request->client_commision_Business,
                "guest_discount_business" => $request->guest_discount_Business,
                "client_commision_premium" => $request->client_commision_Premium,
                "guest_discount_premium" => $request->guest_discount_Premium,
            )),
            "valid_time_limit" => $valid_time_limit,
        );

        // create the data ..
        $res = affiliateGroup::create($data);
        if($res){
            Session::flash("message", "Created Successfully");
        }else{
            Session::flash("message", "Oops! Something Went wrong . Failed");
        }

        return redirect()->route("listAffiliateGroup");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\affiliateGroup  $affiliateGroup
     * @return \Illuminate\Http\Response
     */
    public function show(affiliateGroup $affiliateGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\affiliateGroup  $affiliateGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Session::put("update_id", (int) $id);
        $affiliateTypes = affiliateType::get();
        $affiliateGroup  = affiliateGroup::with(["affiliateType"])->find((int)$id);
        // dd($affiliateGroup);
        return view("affiliate.affiliateGroup.edit_affiliate_by_group", compact("affiliateTypes", "affiliateGroup"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\affiliateGroup  $affiliateGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, affiliateGroup $affiliateGroup)
    {
        $update_id = Session::get("update_id");
        $valid_time_limit = get_valid_time_limit($request);
        $data = array(
            "affiliate_type_id" => $request->affiliate_type_id,
            "price" => json_encode(array(
                "client_commision_basic" => $request->client_commision_Basic,
                "guest_discount_basic" => $request->guest_discount_Basic,
                "client_commision_business" => $request->client_commision_Business,
                "guest_discount_business" => $request->guest_discount_Business,
                "client_commision_premium" => $request->client_commision_Premium,
                "guest_discount_premium" => $request->guest_discount_Premium,
            )),
            "valid_time_limit" => $valid_time_limit,
        );

        // create the data ..
        $res = affiliateGroup::where("id", $update_id)->update($data);
        if($res){
            Session::flash("message", "Updated Successfully");
        }else{
            Session::flash("message", "Oops! Something Went wrong . Update Failed");
        }

        return redirect()->route("listAffiliateGroup");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\affiliateGroup  $affiliateGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, affiliateGroup $affiliateGroup)
    {
        $res = affiliateGroup::destroy((int) $id);
        if($res){
            Session::flash("message", "Record Deleted Successfully");
        }else{
            Session::flash("message", "Oops! Something Went wrong . Delete Failed");
        }

        return redirect()->route("listAffiliateGroup");
    }
}
