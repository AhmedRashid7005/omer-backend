@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Order Edit Minimum Payamount')
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


<?php
	if($order){
		$orderData = $order->toArray();
		details_table_view("Order Details", $orderData);
	}
	
?>

<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Order Minumum PayAmount Update By Admin</strong></h2>
			</header>
			<div class="card-body">

				@if($order)

				<form action="{{route('orderMinimumPayamountUpdate')}}" method="post">

					@csrf

					<?php
					global $amount_type;

					form_hidden("id", $order->id);
					form_input_number("order_total_price", $totalOrderPrice);
					form_select("minimum_pay_type", $amount_type, $order->minimum_pay_type);
					form_input_number("minimum_pay_amount", $order->minimum_pay_amount);

					#-------------------------------------------
					
					$calculated_pay_amount = 0;
					$display = "none";

					if($order->minimum_pay_type == "Percentage"){
						$display = "";
						$calculated_pay_amount = $totalOrderPrice * (  (float) $order->minimum_pay_amount/100 );
					}

					#------------------------------------------
					?>

					<div class="form-group row calculated_pay_amount" style="display: {{$display}};">
					    <label class="col-lg-3 control-label text-lg-right pt-2" for="calculated_pay_amount"><strong>Calculated Pay Amount</strong></label>
					    <div class="col-lg-6">
					    <input type="text" name="calculated_pay_amount" value="{{$calculated_pay_amount}}" placeholder="Calculated Pay Amount" class="form-control" id="calculated_pay_amount" style="" autocomplete="off">
					    </div>
					</div>

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

<script>
	
	$(document).ready(function(){

		function show_calculated_amount(){

			var pay_amount = parseFloat( $("#minimum_pay_amount").val() );

			var total = parseFloat( $("#order_total_price").val());

			if( $("#minimum_pay_type").val() == "Percentage" ){

				var res = total * (pay_amount/100);

				if(res){
					$("#calculated_pay_amount").val(res);
				}
				
			}	

		}

		$(document).on("change", "#minimum_pay_type", function(){

			if($(this).val()  == "Percentage"){
				// show
				$(".calculated_pay_amount").show();
				show_calculated_amount();

			}else{
				// hide
				$(".calculated_pay_amount").hide();
			}

		});

		// if the selection is percentage then Calculation
		$(document).on("keyup", "#minimum_pay_amount", function(){
			// console.log($(this).val());
			show_calculated_amount();
		});


	});

</script>

@endpush