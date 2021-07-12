@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Client Balance List')
@section('content')

@push("style")
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
</style>
@endpush


<?php

	$title = "withdrawas List";
	$tableHead = array(
		"Suit",
		"Name",
		"BankName",
		"accountName",
		"iban",
		"amount",
		"photo",
		"relationship",
		"status",
		"Creaated At",
		"Updated At",
	);
    $other_actions=[
        "accpet" => "accept-withdraw",
        "refused" => "refused-withdraw",

    ];


	table_view( $title, $tableHead, $clientBalanceArr, false, false,false, $other_actions=$other_actions, 'Actions', 'datatable-tabletools_ignore',true);

?>
	

@endsection