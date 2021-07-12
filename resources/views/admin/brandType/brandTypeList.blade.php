@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Brand Type List')
@section('content')

	<?php

		$title = "Brand Type List";

		$tableHead = array(
			"Brand Type",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $brandTypeList, false, route("brandTypeEdit"), route("brandTypeDelete"));

	?>

@endsection