@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Image Service  List')
@section('content')

	<?php

		$title = "Image Service  List <br/> <br/>  <strong> If Service Type Fixed then The Price is For Each 1 Photo, <br/><br/> Other Wise if Service Type is Range then The Price For the Range </strong>";

		$tableHead = array(
			"Plan",
			"Service Type",
			"From",
			"To",
			"Price",
			"Created At",
		);

		table_view( $title, $tableHead, $listArray, false, route("imageVideoServiceEdit"), route("imageVideoServiceDelete"));

	?>

@endsection