@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Advance Payment List')
@section('content')

	<?php

		$title = "Advance payment List";

		$tableHead = array(
			"Plan",
			"Order Type",
			"Percentage of defferred amount",
			"Percentage added in deferred amount",
			"Creaated At",
		);


		table_view( $title, $tableHead, $listArray, false, route("AdvancePaymentEdit"), route("AdvancePaymentDelete"));

	?>

@endsection