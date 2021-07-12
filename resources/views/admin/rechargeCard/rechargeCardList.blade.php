@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Recharge Card List')
@section('content')

@push("style")
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
</style>
@endpush

<h3 class="text-info"> All Recharge Card List </h3>
<form action="{{route('rechargeCardbulkAction')}}" method="post">
	@csrf

	<div class="col-md-4" style="margin-top: 10px; margin-bottom: 10px;">
		
		<select name="action_name" required="" style="border: 3px solid black;">
			<option value="">--Select One--</option>
			<option value="Active">Active</option>
			<option value="DeActive">DeActive</option>
			<option value="Delete">Delete</option>
			<option value="Copy">Copy</option>
		</select>

		<input type="submit" name="submit" value="Bulk Action" style="border: 3px solid black; background: green;">

	</div

	<?php

		$title = "";

		$tableHead = array(
			"<input type='checkbox' name='select_all' id='select_all' style='margin-left: -7px;'>",
			"State",
			"Card Number",
			"Amount",
			"Expiry Date",
			"Status",
			'password',
			"Creaated At",
			"Copy",
		);


		table_view( $title, $tableHead, $listArr, false, false, route("rechargeCardDelete"), ["status Card" => route("rechargeCardActivateDeActivate")]);
	?>


</form>
	

@endsection

@push("script")

<script type="text/javascript">
	
	$(document).ready(function(){

		$(document).on("change", "#select_all", function(){

			if($(this).prop("checked")){
				$(".all_id").prop("checked", true);
			}else{
				$(".all_id").prop("checked", false);
			}

		});

		// for clip board
			$(document).on("click", ".ar_copy", function(e){

		    var clipboard = new ClipboardJS(this);
		    var that = this;
		    clipboard.on('success', function(e) {
		        // console.log(e);
		        $(that).html("Copied");
		    });

		    clipboard.on('error', function(e) {
		        // console.log(e);
		    });
		});
		// end for clip board

	});

</script>

@endpush