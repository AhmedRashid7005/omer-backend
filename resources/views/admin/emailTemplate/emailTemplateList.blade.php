@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Suit Address List')
@section('content')

	<?php

		$title = "All Email Template List";

		$tableHead = array(
			"Name",
			"Subject",
			"Body",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $emailTemplates, false, route("emailTemplateEdit"), route("emailTemplateDelete"));

	?>

@endsection