<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Invoice Add'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("style"); ?>
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
<?php $__env->stopPush(); ?>

<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Invoice Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="<?php echo e(route('invoiceStore')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <?php

                        # Global variables
                        global $amount_type;

                        form_textarea("sender_address");
                        form_textarea("receiver_address");
                        form_input("order_no");
                        form_input("delivery_through");
                        form_input("carrier_name");
                        form_input_number("remaining_order_amount");
                        form_input_number("shipping_cost_warehouse");
                        form_input_number("delivery_cost_to_your_address");
                        form_input("other_fees_name[]", false, false);
                        form_input_number("other_fees_value[]", false, false);
                        
                        ?>

                        <div style="border: 1px solid green; margin-bottom: 10px;">
                        	<div class="appent_more"></div>

                        	<div class="add_more btn btn-warning pull-right" style="margin-top: 10px; clear:both;"><i class="fas fa-plus" aria-hidden="true"></i> Add More</div>

                        </div>
                        
                        <?php

                        form_input_number("insurence_fee");
                        form_input_number("custom_duities");
                        form_input_number("vat");
                        form_select("discount_type", $amount_type, false, false);
                        form_input_number("discount_amount", false, false);

                        form_input("total");

                        form_submit();
                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush("script"); ?>

<script type="text/javascript">
	
	$(document).ready(function(){

		// add more other fees start
		$(document).on("click", ".add_more", function(e){
			e.preventDefault();

			// add append code

			$(".appent_more").append('<div class="remove" style="clear:both;"> <hr/> <div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="other_fees_name"><strong>Other Fees Name</strong></label><div class="col-lg-6"> <input type="text" name="other_fees_name[]" value="" placeholder="Other Fees Name" class="form-control other_fees_name" required=""></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="other_fees_value"><strong>Other Fees Value</strong></label><div class="col-lg-6"> <input type="text" name="other_fees_value[]" value="" placeholder="Other Fees Value" class="form-control other_fees_value" required=""></div></div> <div class="remove_me btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div> </div>');

			// end adding append code

		});


		$(".appent_more").on("click", ".remove_me", function () {
		 $(this).closest(".remove").remove();
		});
		// end add more other fees

		// -----------------------------------------------
		//    all calculation goes here
		// -----------------------------------------------
		
		function total_calculation(){
			
			var total_other_val = 0;
			// total other value calculation
			$('.other_fees_value').each(function(i, obj) {
			    total_other_val += parseFloat($(this).val());
			});

			var remaining_order_amount = parseFloat($("#remaining_order_amount").val());
			var shipping_cost_warehouse = parseFloat($("#shipping_cost_warehouse").val());
			var delivery_cost_to_your_address = parseFloat($("#delivery_cost_to_your_address").val());
			var insurence_fee = parseFloat($("#insurence_fee").val());
			var custom_duities = parseFloat($("#custom_duities").val());
			var vat = parseFloat($("#vat").val());
			var discount_amount = parseFloat($("#discount_amount").val());


			// check if not discount then it is 0
			if(!discount_amount){
				discount_amount = 0;
			}
			// if not vat then it is 0
			if(!vat){
				vat = 0;
			}

			if(!total_other_val){
				total_other_val = 0;
			}


			// Now Do the Total Here
			var total = remaining_order_amount + shipping_cost_warehouse + delivery_cost_to_your_address + insurence_fee + total_other_val + custom_duities;


			// discount amount calculation
			if( $("#discount_type").val() == "Percentage" ){
				// apply on total

				var calculated_discount = total * (discount_amount/100);
				var total = total - calculated_discount;

			}else if($("#discount_type").val() == "Fixed"){

				var total = total - discount_amount;
			}

			// end discount amount calculation

			// vat calculation start
			
			var calculated_vat = total * (vat/100);
			var total = total + calculated_vat;

			// end vat calculation

			// set the total amount
			$("#total").val(total);
		}

		// ----------------------------------------
		// end of all calculations
		// ----------------------------------------

		// fire on the event..

		$(document).on("keyup", "#remaining_order_amount", function(){
			total_calculation();
		});

		$(document).on("keyup", "#shipping_cost_warehouse", function(){
			total_calculation();
		});

		$(document).on("keyup", "#delivery_cost_to_your_address", function(){
			total_calculation();
		});

		$(document).on("keyup", ".other_fees_value", function(){
			total_calculation();
		});

		$(document).on("keyup", "#insurence_fee", function(){
			total_calculation();
		});

		$(document).on("keyup", "#custom_duities", function(){
			total_calculation();
		});

		$(document).on("keyup", "#vat", function(){
			total_calculation();
		});

		$(document).on("change", "#discount_type", function(){
			total_calculation();
		});

		$(document).on("keyup", "#discount_amount", function(){
			total_calculation();
		});


	});

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>