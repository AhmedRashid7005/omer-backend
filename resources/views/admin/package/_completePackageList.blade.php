@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Package  List')
@section('content')

    <?php

    $title = "Second Stage";

    $tableHead = array(
        "Package No",
        "Client",
        "Products Qty",
        "Total Invoice",
        "Package Name",
        "Images",
        "Created At",
        "Printed",
    );

    table_view( $title, $tableHead, $packageList, "", route("packageEdit"), route("packageDelete"), array( "Print A" => "package-print/a", "Print B" => "package-print/b" ));
    ?>
    <a target=_target href="{{route('packagePrintAll', ['type' => 'a', 'id' => 2])}}"><buttons class="btn btn-info" disabled="disabled"> Print All (A) </buttons></a>
    <a target=_target href="{{route('packagePrintAll', ['type' => 'b', 'id' => 2])}}"><buttons class="btn btn-info" disabled="disabled"> Print All (B) </buttons></a>
@endsection