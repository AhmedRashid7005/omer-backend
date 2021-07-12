@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title',' Shipping Edit')
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

				<h2 class="card-title"><strong>{{str_replace("_", " ",$delivery_type )}} Shipping Edit By Admin</strong></h2>
			</header>
			<div class="card-body">
				@if($internationalShipping)

				<form method="post" action="{{route('ShippingUpdate')}}" id="ShippingUpdate">
					@csrf

					<?php

						global $country_full_array;
						global $saudi_states;

						$method_type = array(
							"delivery" => "delivery",
							"receipt" => "receipt",
						);

						$method = array(
							"home delivery" => "home delivery",
							"branch delivery" => "branch delivery",
						);


						$form_country_city = array();
						$to_country_city = array();

						if($delivery_type == "local_delivery"){

							$form_country_city 	= $saudi_states;
							$to_country_city 	= $saudi_states;

						}else if($delivery_type == "local_receipt"){
							$form_country_city 	= $saudi_states;
							$to_country_city 	= array("ware house address" => "ware house address");

							# new mthod
							$method = array(
							"delivery men" => "delivery men",
							"branch delivery" => "branch delivery",
							);

						}else{
							# Default is International
							$form_country_city 	= $country_full_array;
							$to_country_city 	= $country_full_array;
						}


						form_hidden("delivery_type", $delivery_type);
						form_hidden("id", $internationalShipping->id);
						form_select("subscriber_package_name_id", $subscriberPackageList, $internationalShipping->subscriber_package_name_id);
						form_input("company_name", $internationalShipping->company_name);
						form_select("shipping_form", $form_country_city, $internationalShipping->shipping_form);
						form_select("shipping_to", $to_country_city, $internationalShipping->shipping_to);
						form_select("method_type", $method_type, $internationalShipping->method_type);
						form_select("method", $method, $internationalShipping->method);
						form_input("during_time", $internationalShipping->during_time);

					 	form_submit();
					 ?>


				</form>

				@endif

			</div>
		</section>
	</div>
</div>


	

@endsection