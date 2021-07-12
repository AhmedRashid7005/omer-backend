@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Order  List')
@section('content')

	<?php

		$title = "Order  List";

		$tableHead = array(
			"Order No",
			"User Id",
			"Order Type",
			"Market Place",
			"Shipping Type From",
			"Form State Country",
			"Shipping Type To",
			"To State Country",
			"Shipping Within",
			"Item Quantity",
			"Other Cost Name",
			"Other Cost Value",
			"Minimum Pay Type",
			"Minimum Pay Aamount",
			"Creaated At",
			"Updated At",
		);

		table_view( $title, $tableHead, $orders, route("orderDetails"), route("orderEdit"), route("orderDelete"));

	?>

@endsection