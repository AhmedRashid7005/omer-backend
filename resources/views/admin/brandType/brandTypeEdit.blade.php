@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Brand Type Update')
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

				<h2 class="card-title"><strong>Brand Type Update By Admin</strong></h2>
			</header>
			<div class="card-body">
				@if(brandType)
				<form action="{{route('brandTypeUpdate')}}" method="post">
                    @csrf
                        <?php
                        form_hidden("id", $brandType->id);
                        form_input("brand_type", $brandType->brand_type);
                        form_submit();
                        ?>           
                </form>
                @endif

			</div>
		</section>
	</div>
</div>
	

@endsection