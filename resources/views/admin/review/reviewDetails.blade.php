@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Review Details')
@section('content')

	<a href="{{route('ReviewList')}}"><button class="btn btn-success">Review List</button></a>
	<hr>
	@if($review)
	<?php

		$title = "Review Data Details";

		details_table_view($title, $review);

	?>

	@endif

@endsection