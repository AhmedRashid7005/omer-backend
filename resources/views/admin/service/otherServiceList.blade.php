@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Image Service  List')
@section('content')

	<?php

		$title = "Other Service  List";

		$tableHead = array(
			"Plan",
			"Name",
			"Description",
			"Price",
			"Type",
			"Created At",
		);

		table_view( $title, $tableHead, $listArray, false, route("otherServiceEdit"), route("otherServiceDelete"));

	?>

@endsection