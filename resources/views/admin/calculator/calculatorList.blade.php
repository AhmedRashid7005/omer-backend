@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Calculator List')
@section('content')

	<?php

		$title = str_replace("_", " ", $moduleName)." ".str_replace("_", " ", $for)." List";

		$tableHead = array(
			"Plan",
			"From",
			"To",
			"Amount Type",
			"Amount",
			"Created At",
		);

		# We have a odd module cash_back ... 
		# This line is for support that module
		
		if($moduleName == "cash_back"){

			$tableHead = array(
				"Plan",
				"Pay Via",
				"From",
				"To",
				"Amount Type",
				"Amount",
				"Created At",
			);

		}


		table_view( $title, $tableHead, $listArray, false, route("calculatorEdit"), route("calculatorDelete"));

	?>

@endsection