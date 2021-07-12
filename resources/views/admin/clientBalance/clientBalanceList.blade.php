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

	$title = "Client Balance List";

	$tableHead = array(
		"Suit",
		"Name",
		"Email",
		"Wallet Status",
		"Amount",
		"Creaated At",
		"Updated At",
	);


	table_view( $title, $tableHead, $clientBalanceArr, false, route("clientBalanceEdit"), route("clientBalanceDelete"));

?>
	

@endsection