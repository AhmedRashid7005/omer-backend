@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Contact Us List')
@section('content')

<?php

	$title = "All Contact List";

	$tableHead = array(
		'contactNum',
		"Receiving Department",
		"Name",
		"Email",
		"Phone",
		"Suit",
		"Subject",
		"file",
		"Message Description",
		"Creaated At",
		"Updated At",
	);


	table_view( $title, $tableHead, $contactUsList, route("contactUsDetails"), route("contactUsReply"), route("contactUsDelete"));

?>


@endsection