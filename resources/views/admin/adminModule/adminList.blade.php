@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Admins List')
@section('content')
	<?php

		$title = "All Client List";

		$tableHead = array(
			"First Name",
			"Last Name",
			"Email",
			"Phone",
			"Image",
			"Address",
			"Account Status",
			"Admin Role",
		);


		table_view( $title, $tableHead, $adminDatas, false, route("adminEdit"), route("adminDelete") );

	?>

@endsection