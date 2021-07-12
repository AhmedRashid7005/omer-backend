@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Contact us Reply Details')
@section('content')
	<?php

	$title = "Contact us Reply Details";

	details_table_view($title, $res);

	# ------------------------------------------
	$title = "Contact Us Reply List";

	$tableHead = array(
		"Contact Us Id",
		"subject",
		"body",
		"Created At",
		"Updated At",
	);

	table_view( $title, $tableHead, $contact_us_replies, false, false, route("contactUsReplyDelete") );

	?>	
@endsection