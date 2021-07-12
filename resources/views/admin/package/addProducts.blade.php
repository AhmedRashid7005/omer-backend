@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Package Product Add')
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

                    <form action="{{route('packageProductStoreFromPackageDetails')}}" method="post" id="packageProductStoreFromPackageDetails" >
                        @csrf
                        <input type="hidden" name="package_id" value="{{ request()->package_id }}">
                        <?php
                            form_input("product_name[]");
                            form_textarea("description[]");
                            form_input("quantity[]");
                            form_input("price[]");
                            form_textarea("note[]");
                        ?>

                        <div class="appendHereProduct"></div>

                        <div class="addMoreProduct btn btn-warning pull-right" style="margin-top: 10px; clear:both;"><i class="fas fa-plus" aria-hidden="true"></i> Add More Product</div>

                        <?php
                        form_submit();
                    
                        ?>
                    </form>

                </div>
            </section>
        </div>
    </div>

@endsection

@push("script")

    <script>

        $(document).ready(function(){

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