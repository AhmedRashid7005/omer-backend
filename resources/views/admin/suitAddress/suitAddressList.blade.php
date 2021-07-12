@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Suit Address List')
@section('content')
	<?php

		$title = "All Suit Address List";

		$tableHead = array(
			"Name",
			"Country",
			"Address",
			"Address2",
			"State",
			"City",
			"Zip Code",
			"House & Road Num",
			"Phone",
			"Note",
			"Status",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $suitAddressLists, false, route("suitAddressEdit"), route("suitAddressDelete"));

	?>

@endsection