@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Admin Client List')
@section('content')

	<a href="{{route("adminClientList")}}"><button class="btn btn-success">Client List</button></a>
	<hr>

	<?php

		$title = "Client Data Details";

		details_table_view($title, $user);

	?>

	@if( $TapPaymentDataDetails || $PaypalPaymentDataDetails )
	<div>

		<h3 class="text-info text-center">Payment Details</h3>
		<?php
			$title = "Tap Payment Details";
			#TapPayment Data Details
			if($TapPaymentDataDetails){

				foreach($TapPaymentDataDetails as $tap_key => $tap_v){

					details_table_view($title, $tap_v);

				}
			}

			#Paypal PAyment Data Details
			if($PaypalPaymentDataDetails){
				$title = "Paypal Payment Details";
				foreach($PaypalPaymentDataDetails as $paypal_key => $paypal_v){
					
					details_table_view($title, $paypal_v);

				}
			}


		?>
	</div>
	@endif

@endsection