<?php

namespace App\Http\Controllers;

use App\affiliateType;
use Illuminate\Http\Request;

class AffiliateTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("affiliate.affiliate");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\affiliateType  $affiliateType
     * @return \Illuminate\Http\Response
     */
    public function show(affiliateType $affiliateType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\affiliateType  $affiliateType
     * @return \Illuminate\Http\Response
     */
    public function edit(affiliateType $affiliateType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\affiliateType  $affiliateType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, affiliateType $affiliateType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\affiliateType  $affiliateType
     * @return \Illuminate\Http\Response
     */
    public function destroy(affiliateType $affiliateType)
    {
        //
    }
}
