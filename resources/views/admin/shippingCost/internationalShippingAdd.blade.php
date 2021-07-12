@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title',' Shipping Add')
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

				<h2 class="card-title"><strong>{{str_replace("_", " ",$delivery_type )}} Shipping Add By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form method="post" action="{{route('ShippingStore')}}" id="ShippingStore">
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
						form_select("subscriber_package_name_id", $subscriberPackageList);
						form_input("company_name");
						form_select("shipping_form", $form_country_city);
						form_select("shipping_to", $to_country_city);
						form_select("method_type", $method_type);
						form_select("method", $method);
						form_input("during_time");
						?>

						<div class="appendHere"></div>

						<div class="addMore btn btn-warning pull-right" style="margin-top: 10px; clear:both;"><i class="fas fa-plus" aria-hidden="true"></i> Add Weight</div>

					<?php
					 	form_submit();
					 ?>


				</form>


			</div>
		</section>
	</div>
</div>


	

@endsection

@push("script")

<script type="text/javascript">
	
	$(document).ready(function(){

		// add more Weight
		$(document).on("click", ".addMore", function(e){
			e.preventDefault();

			// add append code

			$(".appendHere").append('<div class="remove" style="clear:both;"> <hr/> <div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="weight_type[]"><strong>Weight Type</strong></label><div class="col-lg-6"> <select name="weight_type[]" class="form-control populate" required=""><option value="">--Select One--</option><option value="exact_weight">exact_weight</option><option value="range_weight">range_weight</option> </select></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="from[]"><strong>From</strong></label><div class="col-lg-6"> <input type="text" name="from[]" value="" placeholder="From" class="form-control from" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="to[]"><strong>To</strong></label><div class="col-lg-6"> <input type="text" name="to[]" value="" placeholder="To" class="form-control to" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="price_for[]"><strong>Price For</strong></label><div class="col-lg-6"> <select name="price_for[]" class="form-control populate" required=""><option value="">--Select One--</option><option value="per_kg">per_kg</option><option value="range">range</option> </select></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="price[]"><strong>Price</strong></label><div class="col-lg-6"> <input type="text" name="price[]" value="" placeholder="Price" class="form-control price" required=""></div></div> <div class="removeHere btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div></div>');

			// end adding append code

		});


		$(".appendHere").on("click", ".removeHere", function (event) {
		// alert('click to remove');
		 $(this).closest(".remove").remove();
		});

		// end more Weight



	});

</script>

@endpush