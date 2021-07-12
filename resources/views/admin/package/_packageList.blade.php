@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Package  List')
@section('content')

    <?php

    $title = "Package  List";

    $tableHead = array(
        "Package No",
        "Printed",
        "Package Status",
        "Client",
        "Package To",
        "Shipment Value",
        "From",
        "To",
        "Tracking No",
        "Weight",
        "Note",
        "Other Fess",
        "Images",
        "Products Qty",
        "Total Invoice",
        "Creaated At",
        "Updated At",
    );

    $other_actions = array(
        "Add Products" => "add-product",
        "Print A" => "package-print/a",
        "Print B" => "package-print/b"
    );

    table_view( $title, $tableHead, $packageList, route("packageDetails"), route("packageEdit"), route("packageDelete"), $other_actions);

    ?>
    <a target=_target href="{{route('packagePrintAll', ['type' => 'a', 'id' => 3])}}"><buttons class="btn btn-info" disabled="disabled"> Print All (A) </buttons></a>
    <a target=_target href="{{route('packagePrintAll', ['type' => 'b', 'id' => 3])}}"><buttons class="btn btn-info" disabled="disabled"> Print All (B) </buttons></a>

@endsection