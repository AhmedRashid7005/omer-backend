@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Website Development Reply Details')
@section('content')
	<?php

	$title = "Website Development Reply Details";

	details_table_view($title, $res);

	# ------------------------------------------
	$title = "Website Development Reply List";

	$tableHead = array(
		"Website Development Id",
		"subject",
		"body",
		"Created At",
		"Updated At",
	);

	table_view( $title, $tableHead, $websiteDevelopmentReplies, false, false, route("websiteDevelopmentReplyDelete") );

	?>	
@endsection