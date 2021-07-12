@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Review Details')
@section('content')

	<a href="{{route('TransferList')}}"><button class="btn btn-success">Transfer List</button></a>
	<hr>
	@if($transfer)
	<?php

		$title = "Transfer Confirmation Data Details";

		details_table_view($title, $transfer);

	?>

	@endif

@endsection