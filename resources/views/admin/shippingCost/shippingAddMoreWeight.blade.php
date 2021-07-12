@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Add More Weight')
@section('content')

@push("style")
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
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

			{{-- 	<a href="{{route("subscribePackageList")}}"><button class="btn btn-success">Subscriber Package List</button></a>
				<hr> --}}

				<h2 class="card-title"><strong>Add More Weight By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form method="post" action="{{route('ShippingAddMoreWeightStore')}}" id="ShippingAddMoreWeightStore">
					@csrf

						<?php
							$weight_type = array(
								"exact_weight" => "exact_weight",
								"range_weight" => "range_weight",
							);

							$price_for = array(
								"per_kg" => "per_kg",
								"range" => "range",
							);

							form_select("weight_type", $weight_type);
							form_input("from");
							form_input("to");
							form_select("price_for", $price_for);
							form_input("price");
					 		form_submit();
					 ?>


				</form>


			</div>
		</section>
	</div>
</div>

@endsection