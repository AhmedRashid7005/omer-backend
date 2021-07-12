@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Package  List')
@section('content')

	<form action="{{ route('printPackages') }}" method="post">
		@csrf
		<input type="hidden" name="package_type" value="first">
		<?php
		$title = "First Stage";
		$tableHead = array(
				"<input type='checkbox' name='select_all' id='select_all' style='margin-left: -7px;'>",
				"Package No",
				"Client",
				"Products Qty",
				"Total Invoice",
				"Package Name",
				"Created At",
				"Printed",
		);
		table_view( $title, $tableHead, $packageList, "", route("packageEdit"), route("packageDelete"));
		?>
		<input type="submit" class="btn btn-info" value="Print All (A)" name="a"/>
		<input type="submit" class="btn btn-info" value="Print All (B)" name="b"/>
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