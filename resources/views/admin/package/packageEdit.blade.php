@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Package Edit')
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

				<h2 class="card-title"><strong>Package Details Edit By Admin</strong></h2>
			</header>
			<div class="card-body">

				@if($package)

				<form action="{{route('packageUpdate')}}" method="post" enctype='multipart/form-data' id="packageUpdate" >
					@csrf
				<?php
					form_hidden("id", $package->id);
					form_select("package_to", $packageTo);
					form_select("package_status_id", $packageStatusList, $package->package_status_id);
					form_input("shiping_cost", $package->shipping_cost, true, "Shipping Value", "text", "Shipping Value");
					form_input("from", $package->from);
					form_input("to", $package->to);
					form_input("tracking_no", $package->tracking_no);
					form_input("weight", $package->weight);
					form_textarea("note", $package->note);
					form_input_file("image[]", false, true);

					$other_fees_name = json_decode($package->other_fees_name);
					$other_fees_value = json_decode($package->other_fees_value);
					if(is_array($other_fees_name)) {
						foreach($other_fees_name as $k => $v){
							form_input("other_fees_name[]", $v, false);
							form_input("other_fees_value[]", $other_fees_value[$k], false);
						}					
					}
					?>

					<div class="appendHere"></div>

					<div class="addMore btn btn-warning pull-right" style="margin-top: 10px; clear:both;"><i class="fas fa-plus" aria-hidden="true"></i> Add More Other Fees</div>

					<div class="row">		
						<?php
							echo "<div class='col-md-2'>"; form_submit("Submit"); echo "</div>";
							echo "<div class='col-md-2'>"; 
								if($package->printed == 0)
									form_submit('Print'); 
							echo "</div>";
						?>
						<div class='col-md-8'>&nbsp;</div>
					</div>
				</form>

				@endif
				
			</div>
		</section>
	</div>
</div>
<!-- end Package Details add -->



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