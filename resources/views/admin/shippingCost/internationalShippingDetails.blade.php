@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Shipping Details')
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
	<a href="{{route('InternationalShippingList',$delivery_type)}}"><button class="btn btn-success"><i class="fas fa-list" aria-hidden="true"></i> {{str_replace("_", " ",$delivery_type )}} Shipping List  </button></a>
	<hr>
</div>

@if($shippingCost)
<?php

	$title = str_replace("_", " ",$delivery_type )." Shipping Details";

	details_table_view($title, $shippingCost);

	$title = "Subscriber Package Details";

	details_table_view($title, $subscriberPackageName);

?>
	
<div class="row" style="margin-top: 20px; margin-bottom: 20px; margin-left: 20px;">
	<a href="{{route('ShippingAddMoreWeight')}}"><button class="btn btn-success"><i class="fas fa-plus" aria-hidden="true"></i> Weight Add  </button></a>
	<hr>
</div>

<?php
	// shippingCostWeight

	$title = str_replace("_", " ",$delivery_type )." Shipping Weight List";

	$tableHead = array(
		"shipping cost id",
		"Weight Type",
		"From",
		"To",
		"price for",
		"price",
		"Created At",
		"Updated At",
	);

	table_view( $title, $tableHead, $shippingCostWeight, false, false, route("ShippingWeightDelete"));

?>


@endif

<div style="margin-top:40px;"></div>



@endsection