@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Brand Type Create')
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

				<h2 class="card-title"><strong>Brand Type Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="{{route('brandTypeStore')}}" method="post">
                    @csrf
                        <?php
                        form_input("brand_type[]");
                        ?>

                        <div class="appendHere"></div>

                        <div class="addMore btn btn-warning pull-right"><i class="fas fa-plus" aria-hidden="true"></i> Add More</div>

                        <?php
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

		$(document).on("click", ".addMore", function(e){
			e.preventDefault();

			$(".appendHere").append('<div class="form-group row remove"> <label class="col-lg-3 control-label text-lg-right pt-2" for="brand_type"><strong>Brand Type</strong></label><div class="col-lg-6"> <input type="text" name="brand_type[]" value="" placeholder="Brand Type" class="form-control brand_type" required="" autocomplete="off"></div><div class="removeHere btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div></div>');

		});


		$(".appendHere").on("click", ".removeHere", function (event) {
		// alert('click to remove');
		 $(this).closest(".remove").remove();
		});
	});
</script>

@endpush
