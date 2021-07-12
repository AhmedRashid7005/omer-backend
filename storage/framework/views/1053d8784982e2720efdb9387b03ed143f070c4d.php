<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Recharge Card Add'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("style"); ?>
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
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

			

				<h2 class="card-title"><strong>Recharge Card Add Admin</strong></h2>
			</header>
			<div class="card-body">

				<form method="post" action="<?php echo e(route('rechargeCardStore')); ?>" id="recharge_card_form">
					<?php echo csrf_field(); ?>

					<?php
						global $saudi_states;
						global $status_array;

						form_select("state", $saudi_states);
						form_input_number("number_of_cards");
						form_input_number("amount");
						form_input_number("confirm_amount");
						simple_checkbox("valid_for_ever", "valid_for_ever", false, false, "valid_for_ever", "valid for ever");
						form_input_date("expiry_date");
						form_select("status", $status_array, 1);
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

		// checking the amount confirm on form submit

		$("#recharge_card_form").on("submit", function(e){
			// e.preventDefault();

			var amount = ( $("#amount").val() ).trim();
			var confirm_amount = ( $("#confirm_amount").val() ).trim();

			if(amount != confirm_amount){
				e.preventDefault();
				alert("Confirm Amount Does not Match");
			}

		});

		$(document).on("change", "#valid_for_ever", function(){
			if($(this).prop("checked")){
				$(".date_main_div").hide();
				$("#expiry_date").prop('required',false);
			}else{
				$(".date_main_div").show();
				$("#expiry_date").prop('required',true);
			}
		})

	});

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>