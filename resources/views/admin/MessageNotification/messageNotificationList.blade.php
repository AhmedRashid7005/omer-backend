@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Email Notification list')
@section('content')
	<?php

		$tableHead = array(
			"Client Id",
			"Suit",
			"Subject",
			"Body",
			"Type",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $res, false, false, $deleteRoute);

	?>

@endsection