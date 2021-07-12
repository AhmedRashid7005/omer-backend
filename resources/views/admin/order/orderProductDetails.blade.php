@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Order Product Details')
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

@if($orderProduct)
<?php

	$title = "Order Product Details";

	details_table_view($title, $orderProduct);

?>

{{-- <div class="row" style="margin-top: 20px; margin-bottom: 20px; margin-left: 20px;">
	<a href="{{route('addNewOrderProductOffer')}}"><button class="btn btn-success"><i class="fas fa-plus" aria-hidden="true"></i> Add Offer To Order Product</button></a>
	<hr>
</div> --}}

@endif

<div style="margin-top:40px;"></div>


@if( $orderProductOffer )

<?php

	$title = "Order Product Offer List";

	$th = array(
	    "Link",
	    "Name",
	    "Description",
	    "Images",
	    "Parts No",
	    "Parts Side",
	    "Price",
	    "Quantity",
	    "Size",
	    "Weight",
	    "Color",
	    "Shipping Cost",
	    "During Time",
	    "Note",
	    "Quality",
	    "Product Type",
	);

	table_view( $title, $th, $orderProductOffer, false, route("orderProductEdit"), route("orderProductDelete"));

?>

@endif

@endsection