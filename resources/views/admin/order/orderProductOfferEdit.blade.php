@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Order Product Offer edit')
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

				<h2 class="card-title"><strong>Order Product Offer Edit By Admin</strong></h2>
			</header>
			<div class="card-body">
				@if($offer)
				<form action="{{route('orderProductOfferUpdate')}}" method="post" enctype="multipart/form-data" id="orderProductForm">
                    @csrf
                        <?php
                        // Global variable
                        global $amount_type;

                        form_hidden("id", $offer->id);
                        form_input("offer_name", $offer->offer_name);
                        form_select("offer_price_type", $amount_type, $offer->offer_price_type);
                        form_input("offer_price_amount", $offer->offer_price_amount);
                        form_textarea_html("offer_price_description", $offer->offer_price_description);

                       	form_submit();
                        ?>

                </form>
                @endif

			</div>
		</section>
	</div>
</div>

@endsection