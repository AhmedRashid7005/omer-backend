@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Package Status List')
@section('content')

	<?php

		$title = "Package Status List";

		$tableHead = array(
			"Package Status",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $packageStatuses, false, route("packageStatusEdit"), route("packageStatusDelete"));

	?>

@endsection