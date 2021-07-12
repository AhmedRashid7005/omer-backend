@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Order Product Add')
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


<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Order Product Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="{{route('NewOrderProductStore')}}" method="post" enctype="multipart/form-data" id="orderProductForm">
                    @csrf
                        <?php
                        // Global variable
                        global $amount_type;

                       form_input("link[]");
                       	form_input("name[]");
                       	form_textarea("description[]");
                       	form_input("parts_no[]");
                       	form_input("parts_side[]");
                       	form_input("price[]");
                       	form_input("quantity[]");
                       	form_input("size[]");
                       	form_input("weight[]");
                       	form_input("color[]");
                       	form_input("shipping_cost[]");
                       	form_input("during_time[]");
                       	form_textarea("note[]");
                       	form_input("quality[]");
                       	form_input("product_type[]");
                       	form_input_file("image_0[]", true, true);

                        ?>

                        <div class="appent_offer" style="border: 1px solid green;margin-bottom:20px;"></div>

                        <div class="addMoreOffer btn btn-warning pull-right" style="margin-top: 10px; clear:both;"><i class="fas fa-plus" aria-hidden="true"></i> Add Offer</div>

                        <div class="form-group row">
                            <div class="col-lg-4">
                            <input type="submit" name="submit" value="submit" class="btn btn-success" id="submit">
                            </div>
                          
                        </div>

                </form>


			</div>
		</section>
	</div>
</div>


@endsection

@push("script")

<script>
	
	$(document).ready(function(){

		// -----------------------------------------------
		// Append product offer

		var img_index = 0;

		$(document).on("click", ".addMoreOffer", function(e){
			e.preventDefault();

			// add append code

			img_index ++;

			$(".appent_offer").append('<div class="remove" style="clear:both;"> <hr/> <div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="link[]"><strong>Link</strong></label><div class="col-lg-6"> <input type="text" name="link[]" value="" placeholder="Link" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="name[]"><strong>Name</strong></label><div class="col-lg-6"> <input type="text" name="name[]" value="" placeholder="Name" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="description[]"><strong>Description</strong></label><div class="col-lg-6"><textarea name="description[]" placeholder="Description" class="form-control" required="" rows="3"></textarea></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="parts_no[]"><strong>Parts No</strong></label><div class="col-lg-6"> <input type="text" name="parts_no[]" value="" placeholder="Parts No" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="parts_side[]"><strong>Parts Side</strong></label><div class="col-lg-6"> <input type="text" name="parts_side[]" value="" placeholder="Parts Side" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="price[]"><strong>Price</strong></label><div class="col-lg-6"> <input type="text" name="price[]" value="" placeholder="Price" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="quantity[]"><strong>Quantity</strong></label><div class="col-lg-6"> <input type="text" name="quantity[]" value="" placeholder="Quantity" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="size[]"><strong>Size</strong></label><div class="col-lg-6"> <input type="text" name="size[]" value="" placeholder="Size" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="weight[]"><strong>Weight</strong></label><div class="col-lg-6"> <input type="text" name="weight[]" value="" placeholder="Weight" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="color[]"><strong>Color</strong></label><div class="col-lg-6"> <input type="text" name="color[]" value="" placeholder="Color" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="shipping_cost[]"><strong>Shipping Cost</strong></label><div class="col-lg-6"> <input type="text" name="shipping_cost[]" value="" placeholder="Shipping Cost" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="during_time"><strong>During Time</strong></label><div class="col-lg-6"> <input type="text" name="during_time[]"  value="" placeholder="During Time" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="note[]"><strong>Note</strong></label><div class="col-lg-6"><textarea name="note[]" placeholder="Note" class="form-control" required="" rows="3"></textarea></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="quality[]"><strong>Quality</strong></label><div class="col-lg-6"> <input type="text" name="quality[]" value="" placeholder="Quality" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="product_type[]"><strong>Product Type</strong></label><div class="col-lg-6"> <input type="text" name="product_type[]" value="" placeholder="Product Type" class="form-control" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="image"><strong>Image</strong></label><div class="col-lg-6"><div class="fileupload fileupload-new" data-provides="fileupload"><div class="input-append"><div class="uneditable-input"> <i class="fas fa-file fileupload-exists"></i> <span class="fileupload-preview"></span></div> <span class="btn btn-default btn-file"> <span class="fileupload-exists">Change</span> <span class="fileupload-new">Select file</span> <input type="file" name="image_'+img_index+'[]" multiple="" required=""> <span form-control=""></span> </span> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a></div></div></div></div> <div class="remove_offer btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div> </div>');

			// end adding append code
			// summer note code
			$('.summernote').summernote();

		});


		$(".appent_offer").on("click", ".remove_offer", function () {

		 img_index --;
		 
		 $(this).closest(".remove").remove();

		});
		// end add more other fees

		//  -----------------------------------------------
		// End Append Product offer
		
	});

</script>

@endpush