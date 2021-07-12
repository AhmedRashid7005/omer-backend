@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Brand List')
@section('content')

	<?php

		$title = "Brand List";

		$tableHead = array(
			"Brand Type",
			"Country",
			"Link",
			"Image",
			"code",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $newBrandArr, false, route("brandEdit"), route("brandDelete"));

	?>

@endsection