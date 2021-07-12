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

	$title = "Client All Balance List";

	$tableHead = array(
		"Suit",
		"Name",
		"Available",
		"Required",
		"Withdraw",
		"Pending",
		"Receivable",
		"Used",
		"Points",
		"Loan",
		"Creaated At",
		"Updated At",
	);


	table_view( $title, $tableHead, $clientBalanceArr, false, route("clientAllBalanceEdit"), route("clientBalanceDelete"));

?>
	

@endsection