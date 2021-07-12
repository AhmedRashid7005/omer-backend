@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Admin Client List By Admin')
@section('content')
	<?php

		$title = "All Client List Added By Admin";

		$tableHead = array(
			"Name",
			"Suit",
			"Email",
			"Ship Phone",
			"Package Name",
			"Package Fee",
			"Account Status",
		);

		$other_actions = array( 

			"status" => route("adminClientActiveDeactive"),

		 );


		table_view( $title, $tableHead, $adminClientLists, route("adminClientDetails"), route("adminClientEdit"), route("adminClientDelete"), $other_actions );

	?>

@endsection