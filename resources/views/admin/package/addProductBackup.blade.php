@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Package Create')
@section('content')

    @push("style")
        <style type="text/css">
            .content-body:not(.card-margin) > .row + .row {
                padding-top: 0px;
            }
            .searchForm{
                margin-left: 14px;
                margin-top: 10px;
                border: 1px solid;
            }
            .error{
                color:red;
            }
        </style>
    @endpush

    @if( !$showAddProductForm )
        <div class="row">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        {{-- 	<a href="{{route('subscribePackageList')}}"><button class="btn btn-success">Subscriber Package List</button></a>
                            <hr> --}}

                        <h2 class="card-title"><strong>Package Creation By Admin</strong></h2>
                    </header>
                    <div class="card-body">

                        <div class="container">
					<span class="col-md-12">
						<strong>Type Suite Number, Clinet Name, Mobile Number Email</strong>
					</span>
                            <input type="text" name="search" value="" placeholder="Enter Client Suite, Name, Mobile, Email" class="col-md-8 form-control clientSearch searchForm" id="clientSearch">
                        </div>

                        <div class="container searchResult" style="display: none;">
                            <h3 class="search_heading">Search Results</h3>
                            <div class="col-md-12 appendHereClient"></div>
                            <div class="dashborad-buttons">
                                <div class="margin-bottom">
                                    <form action="{{route('packageStoreOne')}}" method="post" enctype='multipart/form-data' id="packageDetailsForm_1" >
                                        @csrf
                                        <input type=hidden name=userid value="" />
                                        <br><br>
                                        <div class="row">
                                            <div class='col-md-1'>&nbsp;</div>
                                            <?php
                                            echo "<div class='col-md-9'>"; form_input_file("image[]", false, true, "Image Of Bills"); echo "</div>";
                                            ?>
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="form-group col-md-5 offset-3 mt-2">
                                                <label for=""><b>quantity of products</b></label>
                                                <input name="products_qty" type="text" placeholder="quantity of products" class="form-control">
                                            </div>
                                            <div class="form-group col-md-5 offset-3 mt-1">
                                                <label for=""><b>total on the invoice</b></label>
                                                <input name="total_invoice" type="text" placeholder="total on the invoice" class="form-control">
                                            </div>
                                            <!-- <b>If you want to create a complete package, then please refer the form below!</b>  -->
                                        </div>
                                        <div class="mt-1">
                                            <input type="submit" name="Submit" value="Submit" class="btn btn-success" id="Submit">
                                            <input type="submit" name="Print" value="Print" class="btn btn-primary" id="Print">

                                        <?php /*
									echo "<div class='col-md-1'>"; form_submit("Submit"); echo "</div>";
									echo "<div class='col-md-1'>"; form_submit('Print'); echo "</div>";
								*/?>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    @endif
    <!-- add Package Details add -->
    <div class="row packageDetailsAdd" style="display: none;">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title"><strong>Package Details Adding By Admin</strong></h2>
                </header>
                <div class="card-body">
                    <form action="{{route('packageStore')}}" method="post" enctype='multipart/form-data' id="packageDetailsForm" >
                        @csrf
                        <?php

                        form_select("package_to", $packageTo);
                        form_select("package_status_id", $packageStatusList);
                        form_input("shiping_cost", "", true, "Shipment Value", "text", "Shipment Value");
                        form_input("from");
                        form_input("to");
                        form_input("tracking_no");
                        form_input("weight");
                        form_textarea("note");
                        form_input_file("image[]", true, true, "Product(s) Image(s)");
                        form_input("other_fees_name[]");
                        form_input("other_fees_value[]");
                        ?>

                        <div class="appendHere"></div>

                        <div class="addMore btn btn-warning pull-right" style="margin-top: 10px; clear:both;"><i class="fas fa-plus" aria-hidden="true"></i> Add More Other Fees</div>

                        <div class="row">
                            <?php
                            echo "<div class='col-md-2'>"; form_submit("Submit"); echo "</div>";
                            echo "<div class='col-md-2'>"; form_submit('Print'); echo "</div>";
                            ?>
                            <div class='col-md-8'>&nbsp;</div>
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </div>
    <!-- end Package Details add -->


    <!-- add show inserted package Details Data -->

    @if( $newlyCreatedPackage )
        <div class="row packageDetailsShow">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title"><strong>Package Details By Admin</strong></h2>
                    </header>
                    <div class="card-body">

                        <?php

                        $title = "Package Data";

                        details_table_view($title, $newlyCreatedPackage);

                        ?>

                    </div>
                </section>
            </div>
        </div>

    @endif
    <!-- end show inserted package Details Data -->


    <!-- add package Product  -->

    @if( $showAddProductForm )
        <div class="row packageProductAdd">
            <div class="col">
                <section class="card">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                        </div>

                        <h2 class="card-title"><strong>Add Product For package By Admin</strong></h2>
                    </header>
                    <div class="card-body">

                        <form action="{{route('packageProductStore')}}" method="post" id="packageProductStore" >
                            @csrf
                            <?php
                            form_input("product_name[]");
                            form_textarea("description[]");
                            form_input("quantity[]");
                            form_input("price[]");
                            form_textarea("note[]");
                            ?>

                            <div class="appendHereProduct"></div>

                            <div class="addMoreProduct btn btn-warning pull-right" style="margin-top: 10px; clear:both;"><i class="fas fa-plus" aria-hidden="true"></i> Add More Product</div>
                            <div class="row">

                                <?php
                                echo "<div class='col-md-2'>"; form_submit("Submit"); echo "</div>";
                                echo "<div class='col-md-2'>"; form_submit('Print'); echo "</div>";
                                ?>
                                <div class='col-md-8'>&nbsp;</div>
                            </div>
                        </form>

                    </div>
                </section>
            </div>
        </div>

    @endif
    <!-- end add package Product -->


@endsection

@push("script")

    <script>

        $(document).ready(function(){

            $(document).on("keyup", ".clientSearch", function(){
                // console.log($(this).val());
                var searchKey = $(this).val();

                $.ajax({
                    url: "{{route('findClient')}}",
                    method: "POST",
                    data: { "_token" : "{{ csrf_token() }}", searchKey:searchKey },
                    success: function(res){
                        // This email is already in use
                        if(res != 0){
                            $(".packageDetailsAdd").hide();
                            $(".searchResult").show();
                            $(".appendHereClient").html(res);
                            $(".search_heading").html("Search Result(s):");
                        }else{
                            $(".appendHereClient").html("");
                        }
                    }
                });
            });


            // select Client form search Result..

            $(document).on("click", ".selectedOne", function(){
                var userId = $(this).data("userid");
                // show package Details Add
                $(".packageDetailsAdd").show();

                $.ajax({
                    context: this,
                    url: "{{route('selectClient')}}",
                    method: "POST",
                    data: { "_token" : "{{ csrf_token() }}", userId:userId },
                    success: function(res){
                        // This email is already in use
                        if(res != 0){
                            $(".searchResult").show();
                            $(".search_heading").html("Your Selected Client");
                            $(this).siblings("tr:not('.header-row')").remove();
                            //$(".appendHereClient").html(res);
                            /*$('html, body').animate({
                               scrollTop: $("#packageDetailsForm").offset().top
                           }, 2000);*/
                            $("#packageDetailsForm_1 > input[name='userid']").val($(this).data("userid"));
                        }else{
                            $(".appendHereClient").html("");
                        }
                    }
                });

            });

            // add more other fees start
            $(document).on("click", ".addMore", function(e){
                e.preventDefault();

                // add append code

                $(".appendHere").append('<div class="remove" style="clear:both;"> <hr/><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="other_fees_name[]"><strong>Other Fees Name</strong></label><div class="col-lg-6"> <input type="text" name="other_fees_name[]" value="" placeholder="Other Fees Name" class="form-control other_fees_name" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="other_fees_value[]"><strong>Other Fees Value</strong></label><div class="col-lg-6"> <input type="text" name="other_fees_value[]" value="" placeholder="Other Fees Value" class="form-control other_fees_value" required=""></div></div><div class="removeHere btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div></div>');

                // end adding append code

            });


            $(".appendHere").on("click", ".removeHere", function (event) {
                // alert('click to remove');
                console.log(this);
                $(this).closest(".remove").remove();
            });
            // end add more other fees

            // send save package details

            $(document).on("click", ".save_package_details", function(e){
                // e.preventDefault();

                var error = 0;

                // form validation

                function isValid(idIs){

                    $("."+idIs).remove();

                    if( $("#"+idIs).val() == "" ){

                        $("#"+idIs).after("<div class='"+idIs+" error'>This Field is Required</div>");

                        return false;
                    }

                }

                // validate each and every field
                // no use now
                isValid("package_to");
                var package_to = $("#package_to").val();

                isValid("package_status_id");
                var package_status_id = $("#package_status_id").val();

                isValid("shiping_cost");
                var shiping_cost = $("#shiping_cost").val();

                isValid("from");
                var from = $("#from").val();

                isValid("to");
                var to = $("#to").val();

                isValid("tracking_no");
                var tracking_no = $("#tracking_no").val();

                isValid("weight");
                var weight = $("#weight").val();

                // end form validation
                // End no use now


                var formData = $('#packageDetailsForm').serialize();
                // alert(formData);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Now We not using this ajax..
                $.ajax({
                    url: "{{route('packageStore')}}",
                    method: "POST",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: function(res){

                        $(".packageDetailsShow").show();

                        // if(res != 0){
                        // 	 $(".searchResult").show();
                        // 	 $(".search_heading").html("Your Selected Client");
                        //   $(".appendHereClient").html(res);
                        // }else{
                        // 	  $(".appendHereClient").html("");
                        // }
                    }
                });
            });

            // end save send package details

            // --------------------------------------------------
            // If we found selected cliend then we use this

            var selectedClient = "<?php echo $selectedClient; ?>";
            if( selectedClient ){

                $(".searchResult").show();
                $(".search_heading").html("Your Selected Client");
                $(".appendHereClient").html(selectedClient);
            }

            // --------------------------------------------------



            // ----------------------------------------------------
            // add more Products

            // add more other fees start
            $(document).on("click", ".addMoreProduct", function(e){
                e.preventDefault();

                // add append code

                $(".appendHereProduct").append('<div class="removeProduct" style="clear:both;"> <hr/><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="product_name"><strong>Product Name</strong></label><div class="col-lg-6"> <input type="text" name="product_name[]" value="" placeholder="Product Name" class="form-control product_name" required="" autocomplete="off"></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="description"><strong>Description</strong></label><div class="col-lg-6"><textarea name="description[]" placeholder="Description" class="form-control description" required="" rows="3"></textarea></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="quantity"><strong>Quantity</strong></label><div class="col-lg-6"> <input type="text" name="quantity[]" value="" placeholder="Quantity" class="form-control quantity" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="price"><strong>Price</strong></label><div class="col-lg-6"> <input type="text" name="price[]" value="" placeholder="Price" class="form-control price" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="note"><strong>Note</strong></label><div class="col-lg-6"><textarea name="note[]" placeholder="Note" class="form-control note" required="" rows="3"></textarea></div></div><div class="removeHereProduct btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div></div>');

                // end adding append code

            });


            $(".appendHereProduct").on("click", ".removeHereProduct", function (event) {
                // alert('click to remove');
                $(this).closest(".removeProduct").remove();
            });

            // end add more prodcuts
            // -----------------------------------------------------


        });

    </script>

@endpush

