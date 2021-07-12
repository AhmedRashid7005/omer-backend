@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Coupon Edit')
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

				<h2 class="card-title"><strong>Coupon Edit By Admin</strong></h2>
			</header>
			<div class="card-body">
				@if($coupon)
				<form action="{{route('couponUpdate')}}" method="post">
                    @csrf
                        <?php
                        $amount_type_arr = array(
                        	"fixed" => "Fixed",
                        	"percentage" => "Percentage",
                        );
                        form_hidden("id", $coupon->id);
                        form_input("coupon_code", $coupon->coupon_code);
                        form_textarea("description", $coupon->description);
                        form_select("amount_type", $amount_type_arr, $coupon->amount_type);
                        form_input("amount", $coupon->amount);
                        form_input_date("expiry_date", $coupon->expiry_date);
                        form_input("minimum_spend", $coupon->minimum_spend);
                        form_input("maximum_spend", $coupon->maximum_spend);
                        form_input("use_limit_per_coupon", $coupon->use_limit_per_coupon);
                        form_input("use_limit_per_user", $coupon->use_limit_per_user);
                        form_submit();

                        ?>            
                </form>
                @endif
			</div>
		</section>
	</div>
</div>
	

@endsection
