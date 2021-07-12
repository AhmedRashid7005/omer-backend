@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Subscriber Package Name Update')
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

				<a href="{{route("subscribePackageList")}}"><button class="btn btn-success">Subscriber Package List</button></a>
				<hr>

				<h2 class="card-title"><strong>Update Subscriber Package Name By Admin</strong></h2>
			</header>
			<div class="card-body">
				@if($subscribePackage)
				<form action="{{route('subscribePackageUpdate')}}" method="post">
                    @csrf
                        <?php
                        form_hidden("id", $subscribePackage->id);
                        form_input("name", $subscribePackage->name);
                        form_input("arabic_name", $subscribePackage->arabic_name);
                        form_input("price_in_dolar", $subscribePackage->price_in_dolar);
                        form_input("price_in_saudi_riyal", $subscribePackage->price_in_saudi_riyal);
                        form_input("number_of_days", $subscribePackage->number_of_days);
                        form_input("suit_identity", $subscribePackage->suit_identity);
                        form_input("display_position", $subscribePackage->display_position);
                        form_submit();
                        ?>            
                </form>
                @endif
			</div>
		</section>
	</div>
</div>
	

@endsection
