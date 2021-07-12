@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Subscriber Package Name List')
@section('content')
	<?php

		$title = "All Subscriber Package Name List";

		$tableHead = array(
			"Name",
			"Arabic Name",
			"Price In Dolar",
			"Price In Saudi riyal",
			"Number Of Days",
			"Suit Identity",
			"Display Position",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $subscribePackageLists, false, route("subscribePackageEdit"), route("subscribePackageDelete"));

	?>

@endsection