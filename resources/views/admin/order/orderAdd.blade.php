@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Order Create')
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


				<h2 class="card-title"><strong>Order
				 Creation By Admin</strong></h2>
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
					<div class="col-md-12 appendHereOrder"></div>
				</div>

			</div>
		</section>	
	</div>
</div>


<div class="row" id="orderFormRow" style="display: none;">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Order Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="{{route('orderStore')}}" method="post" enctype="multipart/form-data" id="orderForm">
                    @csrf
                        <?php
                        //form_input_file("image[][]", true, true);

                        # Global variables
                        global $order_type;
                        global $shipping_type;
                        global $country_full_array;
                        global $saudi_states;


                        form_select("order_type", $order_type);
                        form_input("market_place");
                        form_select("shipping_type_from", $shipping_type);
                        form_select("from_state_country", $country_full_array);
                        form_select("shipping_type_to", $shipping_type);
                        form_select("to_state_country", $saudi_states);
                        form_input("shipping_within");
                        form_input("item_quantity", false, true, false, "number");
                        form_input("other_cost_name[]", false, false);
                        form_input("other_cost_value[]", false, false);


                        ?>

                        <div class="appent_cost"></div>

                        <div class="addMoreOtherCost btn btn-warning pull-right" style="margin-top: 10px; clear:both;"><i class="fas fa-plus" aria-hidden="true"></i> Add More</div>

                        <?php
                        form_submit();
                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>


<div class="row" id="orderProductFormRow" style="display: none;">
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

				<form action="{{route('orderProductStore')}}" method="post" enctype="multipart/form-data" id="orderProductForm">
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
                
                <div class="col-lg-4" style="margin-top: 20px;"> 
                    <a href="{{route('addMinimumPayamount')}}" onclick="return confirm('Are you sure?')"> <button class="btn btn-danger">End Product Adding</button> </a>
                </div>

			</div>
		</section>
	</div>
</div>

<div class="row" id="show_added_order_product_row" style="display: none;">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Order Product list By Admin</strong></h2>
			</header>
			<div class="card-body">

				<div class="show_added_order_product"></div>

			</div>
		</section>
	</div>
</div>
	

@endsection

@push("script")


<script>

$(document).ready(function(){

	var img_index = 0;
	// -----------------------------------------------
	// Append product offer

	$(document).on("click", ".addMoreOffer", function(e){
		e.preventDefault();

		img_index ++;
		// add append code

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

	// add more other fees start
	$(document).on("click", ".addMoreOtherCost", function(e){
		e.preventDefault();

		// add append code

		$(".appent_cost").append('<div class="remove" style="clear:both;"> <hr/> <div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="other_cost_name"><strong>Other Cost Name</strong></label> <div class="col-lg-6"> <input type="text" name="other_cost_name[]" value="" placeholder="Other Cost Name" class="form-control other_cost_name" required="" autocomplete="off"> </div> </div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="other_cost_value"><strong>Other Cost Value</strong></label> <div class="col-lg-6"> <input type="text" name="other_cost_value[]" value="" placeholder="Other Cost Value" class="form-control other_cost_value" required=""> </div></div> <div class="remove_cost btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div> </div>');

		// end adding append code

	});


	$(".appent_cost").on("click", ".remove_cost", function () {
	 $(this).closest(".remove").remove();
	});
	// end add more other fees


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
		       	$("#orderFormRow").hide();
		       	$("#orderProductFormRow").hide();
		       	 $(".searchResult").show();
		         $(".appendHereClient").html(res);
		       }else{
		       	  $(".appendHereClient").html("");
		       }
		    }
		});
	});


	// select Client form search Result..

	$(document).on("click", ".selectedOne", function(){
		var userId = $(this).data("userid");
		// show *
		// Details Add
		$("#orderFormRow").show();

		$.ajax({
		    url: "{{route('selectClient')}}",
		    method: "POST",
		    data: { "_token" : "{{ csrf_token() }}", userId:userId },
		    success: function(res){
		       // This email is already in use
		       if(res != 0){
		       	 // reset the form

		       	 $('#orderForm')[0].reset();

		       	 $("#orderFormRow").show();
		       	 $("#show_added_order_product_row").hide();
		       	 $("#orderProductFormRow").hide();
		       	 $(".appendHereOrder").html('');
		       	 $(".searchResult").show();
		       	 $(".search_heading").html("Your Selected Client");
		         $(".appendHereClient").html(res);
		       }else{
		       	  $(".appendHereClient").html("");
		       }
		    }
		});

	});

	

	// start order form ajax
	$('#orderForm').submit(function(event) {
	    event.preventDefault();
	    var formData = new FormData($(this)[0]);
	    // var formData = 1;
	    console.log($(this)[0]);
		$.ajaxSetup({
	       headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       }
	    });

	    $.ajax({
	        url: '{{ route("orderStore") }}',
	        type: 'POST',              
	        data: formData,
	        processData: false,
	        contentType: false,
	        success: function(res)
	        {
	        	$(".appendHereOrder").html(res);
	            // console.log(res);
	            $("#orderFormRow").hide();
	            $("#orderProductFormRow").show();
	        },
	        error: function(res)
	        {
	            alert("Order Data Creation Failed");
	        }
	    });

	});

	// order product form ajax ...


	// Start order product ajax

	$('#orderProductForm').submit(function(event) {
	    event.preventDefault();
	    var formData = new FormData($(this)[0]);
	    // var formData = 1;
	    console.log($(this)[0]);
		$.ajaxSetup({
	       headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       }
	    });

	    $.ajax({
	        url: '{{ route("orderProductStore") }}',
	        type: 'POST',              
	        data: formData,
	        processData: false,
	        contentType: false,
	        success: function(res)
	        {
	        	// show the added the product ...
	        	$("#show_added_order_product_row").show();
	        	$(".show_added_order_product").html(res);
	        	// -----------------------------

	        	$('.datatable-arafat').DataTable({
	        	    responsive: {
	        	      details: {
	        	        // type: 'column',
	        	        display: $.fn.dataTable.Responsive.display.modal( {
	        	                        header: function ( row ) {
	        	                            var data = row.data();
	        	                            return 'Details for '+data[0]+' '+data[1];
	        	                        }
	        	                    } ),
	        	        renderer: function ( api, rowIdx, columns ) {
	        	            var data = $.map( columns, function ( col, i ) {
	        	                return '<tr>'+
	        	                        '<td>'+col.title+':'+'</td> '+
	        	                        '<td>'+col.data+'</td>'+
	        	                    '</tr>';
	        	            } ).join('');

	        	            return $('<table width="100%"/>').append( data );
	        	        }
	        	      }
	        	    },


	        	   });

	        	
	        	// reset all form data
	        	$("#orderProductForm")[0].reset(); //for debug purpose it is comment
	        	
	        	// clear summer note
	        	// $('.summernote').summernote('code', '<p><br></p>');

	        	$('.summernote').each(function() {
    				$(this).summernote('reset');
				})

	        	// clear all append data ..
	        	$(".remove_offer").closest(".remove").remove();

	            // console.log(data);
	            $("#orderFormRow").hide();
	            $("#orderProductFormRow").show();
	        },
	        error: function(data)
	        {
	            alert("Order Product Data Creation Failed");
	        }
	    });

	});

	// End order product ajax

	

	// end order ajax 

	function switch_local_global(shipping_type, my_key){
		var options_are;
		if(shipping_type == "Global"){
			options_are = '<?php echo from_arr_make_option_as_string($country_full_array); ?>';
		}else{
			options_are = '<?php echo from_arr_make_option_as_string($saudi_states); ?>';
		}

		$("#"+my_key).html(options_are);
	}

	// shipping type form
	$(document).on("change", "#shipping_type_from", function(){
		switch_local_global( $(this).val(), "from_state_country" );
	})

	// shipping type to
	$(document).on("change", "#shipping_type_to", function(){
		switch_local_global( $(this).val(), "to_state_country" );
	})


});

</script>

@endpush