@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Client Balance Edit')
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

				<h2 class="card-title"><strong>Client Balance Edit Admin</strong></h2>
			</header>
			<div class="card-body">
				@if($clientBalance)
				<?php

					$title = "Client Data Details";
					$clientData = array(
						"Suit" => $clientBalance->user->suit,
						"Name" => $clientBalance->user->name,
						"Email" => $clientBalance->user->email,
						"Phone" => $clientBalance->user->ship_phone,
					);

					details_table_view($title, $clientData);
				?>

				<form method="post" action="{{route('clientBalanceUpdate')}}" id="client_balance_form">
					@csrf

					<?php
						global $wallet_status;

						form_hidden("id", $clientBalance->id);
						form_select("wallet_status", $wallet_status, $clientBalance->wallet_status);
						form_input_number("amount", $clientBalance->amount);
						form_input_number("confirm_amount");
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

		// checking the amount confirm on form submit

		$("#client_balance_form").on("submit", function(e){
			// e.preventDefault();

			var amount = ( $("#amount").val() ).trim();
			var confirm_amount = ( $("#confirm_amount").val() ).trim();

			if(amount != confirm_amount){
				e.preventDefault();
				alert("Confirm Amount Does not Match");
			}

		});

	})

</script>
@endpush