@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Review Edit')
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



<!-- add Package Details add -->
<div class="row packageDetailsEdit">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Review Details Edit By Admin</strong></h2>
			</header>
			<div class="card-body">

				@if($review)

				<form action="{{route('ReviewUpdate')}}" method="post" enctype='multipart/form-data' id="packageUpdate" >
					@csrf
				<?php
					form_hidden("id", $review->id);
					form_input("#operation", $review->operation_number);
					form_input("user", $review->user->name);
					form_input("bill number", $review->bill_number);
					form_input("ontime", $review->ontime);
					form_input("covered", $review->covered);
					form_input("identical", $review->identical);
					form_input("recommend", $review->recommend);
					form_input("title", $review->title);
					form_textarea("content", $review->content);

					?>
					<div class="row">		
						<?php
							echo "<div class='col-md-2'>"; form_submit("Submit"); echo "</div>";
						?>
						<div class='col-md-8'>&nbsp;</div>
					</div>
				</form>

				@endif
				
			</div>
		</section>
	</div>
</div>




@endsection

@push("script")
	
<script>
	
$(document).ready(function(){

	// add more other fees start
	$(document).on("click", ".addMore", function(e){
		e.preventDefault();

		// add append code

		$(".appendHere").append('<div class="remove" style="clear:both;"> <hr/><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="other_fees_name[]"><strong>Other Fees Name</strong></label><div class="col-lg-6"> <input type="text" name="other_fees_name[]" value="" placeholder="Other Fees Name" class="form-control other_fees_name" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="other_fees_value[]"><strong>Other Fees Value</strong></label><div class="col-lg-6"> <input type="text" name="other_fees_value[]" value="" placeholder="Other Fees Value" class="form-control other_fees_value" required=""></div></div><div class="removeHere btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div></div>');

		// end adding append code

	});


	$(".appendHere").on("click", ".removeHere", function (event) {
	// alert('click to remove');
	 $(this).closest(".remove").remove();
	});
	// end add more other fees

});

</script>
@endpush