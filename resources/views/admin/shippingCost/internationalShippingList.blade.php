@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', ' Shipping  List')
@section('content')

	<?php

		$title = str_replace("_", " ",$delivery_type )." Shipping";

		$tableHead = array(
			"Plan",
			"Company Name",
			"Shipping From",
			"Shipping To",
			"Delivery Method",
			"During Time",
			"Created At",
		);

		table_view( $title, $tableHead, $listArray, route('InternationalShippingDetails'), route("InternationalShippingEdit"), route("ShippingDelete"));

	?>

@endsection