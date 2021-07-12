@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Order Edit')
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

				<h2 class="card-title"><strong>Order Update By Admin</strong></h2>
			</header>
			<div class="card-body">

				@if($order)

				<form action="{{route('orderUpdate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <?php
                        //form_input_file("image[][]", true, true);

                        # Global variables
                        global $order_type;
                        global $shipping_type;
                        global $country_full_array;
                        global $saudi_states;

                        # Add Logic for from to type
                        $from_state_country_previous = $to_state_country_previous = array();

                        # 1
                        if($order->shipping_type_from == "Local"){
                        	$from_state_country_previous = $saudi_states;
                        }else{
                        	$from_state_country_previous = $country_full_array;
                        }

                        # 2
                        if($order->shipping_type_to == "Local"){
                        	$to_state_country_previous = $saudi_states;
                        }else{
                        	$to_state_country_previous = $country_full_array;
                        }

                        # End

                        form_hidden("id", $order->id);
                        form_select("order_type", $order_type, $order->order_type);
                        form_input("market_place", $order->market_place);
                        form_select("shipping_type_from", $shipping_type, $order->shipping_type_from);
                        form_select("from_state_country", $from_state_country_previous, $order->from_state_country);
                        form_select("shipping_type_to", $shipping_type, $order->shipping_type_to);
                        form_select("to_state_country", $to_state_country_previous, $order->to_state_country);
                        form_input_date("shipping_within", $order->shipping_within);
                        form_input("item_quantity", $order->item_quantity, true, false, "number");


                        $other_cost_name = json_decode($order->other_cost_name);
                        $other_cost_value = json_decode($order->other_cost_value);
                        
                        foreach($other_cost_name as $k => $v){
                        	form_input("other_cost_name[]", $v, false);
                        	form_input("other_cost_value[]", $other_cost_value[$k], false);
                        }	
                        ?>

                        <div class="appent_cost"></div>

                        <div class="addMoreOtherCost btn btn-warning pull-right" style="margin-top: 10px; clear:both;"><i class="fas fa-plus" aria-hidden="true"></i> Add More</div>

                        <?php

                        form_submit();
                        ?>            
                </form>

               @endif

			</div>
		</section>
	</div>
</div>


@endsection

@push("script")

<script type="text/javascript">
	
	$(document).ready(function(){

		function switch_local_global(shipping_type, my_key){
			var options_are;
			if(shipping_type == "Global"){
				options_are = '<?php echo from_arr_make_option_as_string($country_full_array); ?>';
			}else{
				options_are = '<?php echo from_arr_make_option_as_string($saudi_states); ?>';
			}

			$("#"+my_key).html(options_are);
		}

		// shipping type form
		$(document).on("change", "#shipping_type_from", function(){
			switch_local_global( $(this).val(), "from_state_country" );
		})

		// shipping type to
		$(document).on("change", "#shipping_type_to", function(){
			switch_local_global( $(this).val(), "to_state_country" );
		})


		// add more other fees start
		$(document).on("click", ".addMoreOtherCost", function(e){
			e.preventDefault();

			// add append code

			$(".appent_cost").append('<div class="remove" style="clear:both;"> <hr/> <div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="other_cost_name"><strong>Other Cost Name</strong></label> <div class="col-lg-6"> <input type="text" name="other_cost_name[]" value="" placeholder="Other Cost Name" class="form-control other_cost_name" required="" autocomplete="off"> </div> </div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="other_cost_value"><strong>Other Cost Value</strong></label> <div class="col-lg-6"> <input type="text" name="other_cost_value[]" value="" placeholder="Other Cost Value" class="form-control other_cost_value" required=""> </div></div> <div class="remove_cost btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div> </div>');

			// end adding append code

		});


		$(".appent_cost").on("click", ".remove_cost", function () {
		 $(this).closest(".remove").remove();
		});
		// end add more other fees


	});

</script>

@endpush