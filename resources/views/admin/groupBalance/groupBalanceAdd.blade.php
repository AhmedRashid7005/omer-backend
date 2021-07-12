@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Group Balance Add')
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

				<h2 class="card-title"><strong>Group Balance Add Admin</strong></h2>
			</header>
			<div class="card-body">
				
				<form action="{{route('groupBalanceStore')}}" method="post" id="group_balance_form">
					@csrf
					<?php
						global $wallet_status;

						form_select("subscriber_package_id", $packageList);
						form_select("wallet_status", $wallet_status);
						form_input_number("amount");
						form_input_number("confirm_amount");
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

		$("#group_balance_form").on("submit", function(e){
			// e.preventDefault();

			var amount = ( $("#amount").val() ).trim();
			var confirm_amount = ( $("#confirm_amount").val() ).trim();

			if(amount != confirm_amount){
				e.preventDefault();
				alert("Confirm Amount Does not Match");
			}

		});

	});

</script>

@endpush