@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'dashboard')
@section('content')

<style>

.dashborad-buttons a {
	margin: 1em;
}

.dashborad-buttons .btn {
	font-size: 1.5rem;
}

</style>

<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

	
    <h3 class="text-center text-danger">Welcome to Admin Dashboard</h3>
	<strong>Quick Package Edit</strong>
	<input type="text" name="search" value="" placeholder="Enter Package No to edit !" class="col-md-8 form-control clientSearch searchForm" id="package_autocomplete">
	<div class="container dashborad-buttons">
		<div class="row margin-bottom">
			<a href="{{route("packageAdd")}}"><button class="btn btn-primary">Create Package</button></a>
			<a href="{{route("photoPackageList")}}"><button class="btn btn-primary">First Stage (<?=$package_count[1]?>)</button></a>
			<a href="{{route("completePackageList")}}"><button class="btn btn-primary">Second Stage (<?=$package_count[2]?>)</button></a>
			<a href="{{route("packageList")}}"><button class="btn btn-primary">Ready Packages (<?=$package_count[3]?>)</button></a>
		</div>
    </div>
    <?php
		
        /* table_view(
             "User List",
             ["name", "email", "Created at"],
             $users
         ); */
    ?>

@endsection

@push("script")
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
	$(document).ready(function() {
		var data = [
		<?php
			foreach($packages as $package):
				$route = $package->ready ? route("packageDetails", ['id' => $package->id]) : route("packageEdit", ['id' => $package->id]);
		?>		
			{flag: <?= "'".$package->package_status_id."'"?>, label: <?="'" . $package->package_no . "'"?>, value: <?="'" . $route . "'" ?>},
		<?php
			endforeach;
		?>
		];
		
    	$("input#package_autocomplete").autocomplete({
			source: data,
			focus: function (event, ui) {
				// console.log(ui);
				$(event.target).val(ui.item.label);
				return false;
			},
			select: function (event, ui) {
				$(event.target).val(ui.item.label);
				window.location = ui.item.value;
				return false;
			}
		});
  	});
  </script>
@endpush


@push("script")

	<script>

		$('#addProducts').on('click', function() {
			$('#addProductsDiv').css('display', 'block');
		});
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
