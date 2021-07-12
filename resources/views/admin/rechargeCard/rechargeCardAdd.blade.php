@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Recharge Card Add')
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

				<h2 class="card-title"><strong>Recharge Card Add Admin</strong></h2>
			</header>
			<div class="card-body">

				<form method="post" action="{{route('rechargeCardStore')}}" id="recharge_card_form">
					@csrf

					<?php
						global $saudi_states;
						global $status_array;

						form_select("state", $saudi_states);
						form_input_number("number_of_cards");
						form_input_number("amount");
						form_input_number("confirm_amount");
						simple_checkbox("valid_for_ever", "valid_for_ever", false, false, "valid_for_ever", "valid for ever");
						form_input_date("expiry_date");
						form_select("status", $status_array, 1);
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

		// checking the amount confirm on form submit

		$("#recharge_card_form").on("submit", function(e){
			// e.preventDefault();

			var amount = ( $("#amount").val() ).trim();
			var confirm_amount = ( $("#confirm_amount").val() ).trim();

			if(amount != confirm_amount){
				e.preventDefault();
				alert("Confirm Amount Does not Match");
			}

		});

		$(document).on("change", "#valid_for_ever", function(){
			if($(this).prop("checked")){
				$(".date_main_div").hide();
				$("#expiry_date").prop('required',false);
			}else{
				$(".date_main_div").show();
				$("#expiry_date").prop('required',true);
			}
		})

	});

</script>

@endpush