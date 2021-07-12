@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Suit Address Create')
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

				<h2 class="card-title"><strong>Suit Address By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="{{route('suitAddressStore')}}" method="post">
                    @csrf
                        <?php
                        
                        global $country_array;
                        global $status_array;
                        form_input("name");
                        form_select("country", $country_array);
                        form_input("address");
                        form_input("address2");
                        form_input("state");
                        form_input("city");
                        form_input("zip_code");
                        form_input("house_road_number");
                        form_input("phone");
                        form_textarea_html("note", false, false);
                        form_select("status", $status_array, 1);
                        form_submit();
                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>
	

@endsection
