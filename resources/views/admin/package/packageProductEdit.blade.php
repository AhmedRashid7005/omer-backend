@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Package Product Edit')
@section('content')

@push("style")
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
	.searchForm{
		margin-left: 14px;
		margin-top: 10px;
		border: 1px solid;
	}
	.error{
		color:red;
	}
</style>
@endpush


<div class="row packageProductAdd">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Edit Product For Package By Admin</strong></h2>
			</header>
			<div class="card-body">
				
				@if($packageProduct)
				<form action="{{route('packageProductUpdate')}}" method="post" id="packageProductUpdate" >
					@csrf
				<?php
					form_hidden("id",$packageProduct->id);
					form_input("product_name", $packageProduct->product_name);
					form_textarea("description", $packageProduct->description);
					form_input("quantity", $packageProduct->quantity);
					form_input("price", $packageProduct->price);
					form_textarea("note", $packageProduct->note);
					form_submit();
					?>
				</form>
				@endif

			</div>
		</section>
	</div>
</div>

@endsection
