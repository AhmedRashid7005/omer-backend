@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Conflict Response')
@section('content')


	<form action="{{ route('printPackages') }}" method="post">
		@csrf
		<input type="hidden" name="package_type" value="ready">
		<?php
			$title = "Conflict List";

			$tableHead = array(
				"<input type='checkbox' name='select_all' id='select_all' style='margin-left: -7px;'>",
				"owner",
				"owner_role",
				"reponse",
				"photos",
				"created_at",
			);  
			$other_actions = array(				
					//"Transfer" => "transfer-review"
			);
			table_view( $title, $tableHead, $data, false, false, false, $other_actions, false, "datatable-tabletools_ignore", true);
		?>
	</form>
	@if($conflict->status != 'منتهي')
	<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">

				<h2 class="card-title d-flex justify-content-center"><strong>Add Message to This Conflict</strong></h2>
			</header>
			<div class="card-body">

				<form method="post" action="{{route('AddResponseToConflictAdmin', $conflict->id)}}" id="client_balance_form">
					@csrf
					<textarea name="Message" class="form-control" id="" cols="15" rows="5"></textarea>
					<select name="Status" class="form-control" style="width:400px">
						<option value="جار المراجعة">جار المراجعة</option>
						<option value="منتهي">منتهي</option>
						<option value="تم الرد">تم الرد </option>
					</select>
					<button type="submit" class="btn btn-success">Send</button>
				</form>


			</div>
		</section>
	</div>
</div>
@else
<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<h2 class="card-title d-flex justify-content-center"><strong>This Conflict is ended.</strong></h2>
			</header>
		</section>
	</div>
</div>
@endif
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