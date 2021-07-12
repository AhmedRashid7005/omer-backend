@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Order Details')
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

<div class="row">
	<div class="col-md-5"><a href="{{route('orderList')}}"><button class="btn btn-success">Order List</button></a></div>

	@if($order)
	<div class="col-md-5"><a href="{{route('orderMinimumPayamountEdit',$order['id'])}}"><button class="btn btn-info"><i class="fas fa-edit" aria-hidden="true"></i> Edit Minimum Pay Amount</button></a></div>
	@endif
</div>

<hr>


@if($minimumPayAmount)
<?php

	$title = "Minimum Pay Data Details";

	details_table_view($title, $minimumPayAmount);

?>

@endif

<div style="margin-top:40px;"></div>

@if($order)
<?php

	$title = "Order Data Details";

	details_table_view($title, $order);

?>

@endif


<!-- Client Details Data -->

@if( $user )

<div class="row packageDetailsShow">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Client Details</strong></h2>
			</header>
			<div class="card-body">
				
				<?php

					$title = "Client Data Details";

					details_table_view($title, $user);

				?>
				
			</div>
		</section>
	</div>
</div>

@endif
<!-- end Clients Details Data -->


<!-- add product to package button -->
@if($order)
<div class="row" style="margin-top: 20px; margin-bottom: 20px; margin-left: 20px;">
	<a href="{{route('addNewOrderProduct')}}"><button class="btn btn-success"><i class="fas fa-plus" aria-hidden="true"></i> Add Product To Order</button></a>
	<hr>
</div>
@endif

<!-- End add product to package button -->

<!-- Package Products Data -->

@if( $orderProductArr )

<?php

	$title = "Order Product List";

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

	table_view( $title, $th, $orderProductArr, route("orderProductDetails"), route("orderProductEdit"), route("orderProductDelete"));

?>

@endif
<!-- end Package Product details -->


@endsection