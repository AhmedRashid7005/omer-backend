@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Review Details')
@section('content')

	<a href="{{route('ConflictList')}}"><button class="btn btn-success">Conflict List</button></a>
	<hr>
	@if($conflict)
	<?php

		$title = "Conflict Data Details";

		details_table_view($title, $conflict);

	?>

	@endif

@endsection