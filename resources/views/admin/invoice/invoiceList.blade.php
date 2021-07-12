@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Invoice  List')
@section('content')

	<?php

		$title = "Invoice  List";

		$tableHead = array(
			"Invoice No",
			"Order No",
			"Sender Add",
			"Receiver Add",
			"Delivery Through",
			"Carrier Name",
			"Remaining Order Amount",
			"Shipping Cost Warehouse",
			"Delivery Cost Your Add",
			"Other Fee Name",
			"Other Fee Val",
			"Insurence Fee",
			"Custom Duties",
			"Vat",
			"Discount Type",
			"Discount Amount",
			"Total",
			"Creaated At",
			"Updated At",
		);

		table_view( $title, $tableHead, $list, route("invoiceDetails"), route("invoiceEdit"), route("invoiceDelete"));

	?>

@endsection