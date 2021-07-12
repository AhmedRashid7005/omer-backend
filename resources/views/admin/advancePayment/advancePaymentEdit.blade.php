@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Advance Payment Edit')
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

				<a href="{{route('AdvancePaymentList')}}"><button class="btn btn-info"><i class="fas fa-list" aria-hidden="true"></i> Advance Payment List</button></a>
				<hr>

				<h2 class="card-title"><strong>Advance Payment Edit By Admin</strong></h2>
			</header>
			<div class="card-body">
				@if($data)

				<form action="{{route('AdvancePaymentUpdate')}}" method="post">
                    @csrf
                        <?php

                        $order_type = array(

                              "broker" => "broker",
                              "import" => "import",
                              "auto parts" => "auto parts",
                        );

                        form_hidden("id", $data->id);
                        form_select("subscriber_package_name_id", $subscriberPackageList, $data->subscriber_package_name_id);
                        form_select("order_type", $order_type, $data->order_type);
                        form_input("percentage_of_defferred_amount", $data->percentage_of_defferred_amount);
                        form_input("percentage_added_in_deferred_amount", $data->percentage_added_in_deferred_amount);
                        form_submit();

                        ?>            
                </form>

                @endif

			</div>
		</section>
	</div>
</div>
	

@endsection
