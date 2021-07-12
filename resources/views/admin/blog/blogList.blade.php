@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Blog List')
@section('content')

	<?php

		$title = "Blog List";

		$tableHead = array(
			"Blog Type",
			"Code",
			"Subject",
			"Content",
			"images",
			"Meta Title",
			"Meta Keyword",
			"Meta Description",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $newBlogArr, false, route("blogEdit"), route("blogDelete"));

	?>

@endsection