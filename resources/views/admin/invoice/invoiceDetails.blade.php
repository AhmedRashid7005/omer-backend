@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Invoice Details')
@section('content')

@push("style")
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
	.searchForm{
		margin-left: 14px;
		margin-top: 10px;
		border: 1px solid;
	}
	.error{
		color:red;
	}
</style>
@endpush

<div class="row" style="margin-top: 20px; margin-bottom: 20px; margin-left: 20px;">
	<a href="{{route('invoiceList')}}"><button class="btn btn-success"><i class="fas fa-list" aria-hidden="true"></i> Invoice List  </button></a>
	<hr>
</div>

@if($invoice)
<?php

	if($invoiceOrder){

		$title = "Invoice Order Details";

		details_table_view($title, $invoiceOrder);
	}

	$title = "Invoice Details";

	details_table_view($title, $invoice);

?>


@endif

<div style="margin-top:40px;"></div>



@endsection