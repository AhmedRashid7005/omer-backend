@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Website Development List')
@section('content')

<?php

	$title = "All Website Development Message List";

	$tableHead = array(
		"Topic",
		"Name",
		"Email",
		"Phone",
		"Description",
		"Do this Personally",
		"image",
		"Creaated At",
		"Updated At",
	);


	table_view( $title, $tableHead, $websiteDevelopemt, route("websiteDevelopmentDetails"), route("websiteDevelopmentReply"), route("websiteDevelopmentDelete"));

?>


@endsection