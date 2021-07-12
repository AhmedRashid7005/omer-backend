@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Suit Address Edit')
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

				<h2 class="card-title"><strong>Suit Address Edit By Admin</strong></h2>
			</header>
			<div class="card-body">
				@if($suitAddress)
				<form action="{{route('suitAddressUpdate')}}" method="post">
                    @csrf
                        <?php
                        
                        global $country_array;
                        global $status_array;

                        form_hidden("id", $suitAddress->id);
                        form_input("name", $suitAddress->name);
                        form_select("country", $country_array, $suitAddress->country);
                        form_input("address", $suitAddress->address);
                        form_input("address2", $suitAddress->address2);
                        form_input("state", $suitAddress->state);
                        form_input("city", $suitAddress->city);
                        form_input("zip_code", $suitAddress->zip_code);
                        form_input("house_road_number", $suitAddress->house_road_number);
                        form_input("phone", $suitAddress->phone);
                        form_textarea_html("note", $suitAddress->note, false);
                        form_select("status", $status_array, $suitAddress->status);
                        form_submit();
                        ?>            
                </form>
                @endif
			</div>
		</section>
	</div>
</div>
	

@endsection
