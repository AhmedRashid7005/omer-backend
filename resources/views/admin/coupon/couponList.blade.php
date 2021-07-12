@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Suit Address List')
@section('content')

	<?php

		$title = "All Email Template List";

		$tableHead = array(
			"Coupon Code",
			"Description",
			"Amount Type",
			"Amount",
			"Expiry Date",
			"Minimum Spend",
			"Maximum Spend",
			"Use Limit Per Coupon",
			"Use Limit Per User",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $couponList, false, route("couponEdit"), route("couponDelete"));

	?>

@endsection