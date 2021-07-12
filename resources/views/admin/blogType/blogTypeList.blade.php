@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Blog Type List')
@section('content')

	<?php

		$title = "Blog Type List";

		$tableHead = array(
			"Blog Type",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $blogTypeList, false, route("blogTypeEdit"), route("blogTypeDelete"));

	?>

@endsection