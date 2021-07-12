@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Order Product edit')
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
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Order Product Edit By Admin</strong></h2>
			</header>
			<div class="card-body">
				@if($orderProduct)

				<form action="{{route('orderProductUpdate')}}" method="post" enctype="multipart/form-data" id="orderProductForm">
                    @csrf
                        <?php
                        // Global variable
                        global $amount_type;

                        form_hidden("id", $orderProduct->id);
                       	form_input("link", $orderProduct->link);
                       	form_input("name", $orderProduct->name);
                       	form_textarea_html("description", $orderProduct->description);
                       	form_input("parts_no", $orderProduct->parts_no);
                       	form_input("parts_side", $orderProduct->parts_side);
                       	form_input("price", $orderProduct->price);
                       	form_input("quantity", $orderProduct->quantity);
                       	form_input("size", $orderProduct->size);
                       	form_input("weight", $orderProduct->weight);
                       	form_input("color", $orderProduct->color);
                       	form_input("shipping_cost", $orderProduct->shipping_cost);
                       	form_input_date("during_time", $orderProduct->during_time);
                       	form_textarea_html("note", $orderProduct->note);
                       	form_input("quality", $orderProduct->quality);
                       	form_input("product_type", $orderProduct->product_type);
                       	form_input_file("image[]", false, true);

                        ?>


                        <div class="form-group row">
                            <div class="col-lg-4">
                            <input type="submit" name="submit" value="submit" class="btn btn-success" id="submit">
                            </div>
                          
                        </div>

                </form>

                @endif
                
			</div>
		</section>
	</div>
</div>

@endsection