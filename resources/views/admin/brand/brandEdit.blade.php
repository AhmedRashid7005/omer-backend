@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Brand Update')
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

				<h2 class="card-title"><strong>Brand Update By Admin</strong></h2>
			</header>
			<div class="card-body">

				@if( $brand )

				<form action="{{route('brandUpdate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <?php
                         global $country_array;

                        form_hidden("id", $brand->id);
                        form_select("country", $country_array, $brand->country);
                        form_select("brand_type_id", $brandTypeList, $brand->brand_type_id);
                        form_input("link", $brand->link);
                        form_input_file("image", false, true);
                        form_input("code", $brand->code);
                        form_submit();
                        ?>            
                </form>

                @endif
			</div>
		</section>
	</div>
</div>
	

@endsection

