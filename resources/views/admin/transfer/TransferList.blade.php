@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Transfers List')
@section('content')

	<form action="{{ route('TransferList') }}" method="post">
		@csrf
		<input type="hidden" name="package_type" value="ready">
		<?php
			$title = "Transfer List";


			$tableHead = array(
				"<input type='checkbox' name='select_all' id='select_all' style='margin-left: -7px;'>",
				"Operation_number",
				"User",
				"Suit",
				"Account Owner Name",
				"Bank Name",
				"Account Number",
				"Amount",
				"Purpose",
				"Date",
				"Photo",
				"Status",
				"Created At",
			);

			$other_actions = array(				
					"Confirm" => "confirm-transfer",
					"Refuse" => 'RefuseTransfer'
			);
			table_view( $title, $tableHead, $TransferList, route("TransferDetails"), route("TransferEdit"), route("DeleteTransfer"), $other_actions);

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