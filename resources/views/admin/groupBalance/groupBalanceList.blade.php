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
		"Plan",
		"Wallet Status",
		"Amount",
		"Creaated At",
		"Updated At",
	);


	table_view( $title, $tableHead, $groupBalanceArr, false, route("groupBalanceEdit"), route("groupBalanceDelete"));

?>

	

@endsection