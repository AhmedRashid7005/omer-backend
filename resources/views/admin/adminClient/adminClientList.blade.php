@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Admin Client List')
@section('content')
	<?php

		$title = "All Client List";

		$tableHead = array(
			"First Name",
			"Second Name",
			"Suit",
			"Email",
			"Ship Phone",
			"Package Name",
			"Package Fee",
			"Account Status",
			"Authenticated"
		);

		$other_actions = array( 

			"status" => route("adminClientActiveDeactive"),
			'Note' => 'sendNOTE',
			'message' => 'sendMessage'

			// "Print A" => "package-print/a",
			// "Print B" => "package-print/b"
		 );


		table_view( $title, $tableHead, $adminClientLists, route("adminClientDetails"), route("adminClientEdit"), route("adminClientDelete"), $other_actions );

	?>

@endsection