<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Client Balance Edit'); ?>
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

			

				<h2 class="card-title"><strong>Client Balance Edit Admin</strong></h2>
			</header>
			<div class="card-body">
				<?php if($clientBalance): ?>
				<?php

					$title = "Client Data Details";
					$clientData = array(
						"Suit" => $clientBalance->user->suit,
						"Name" => $clientBalance->user->name,
						"Email" => $clientBalance->user->email,
						"Phone" => $clientBalance->user->ship_phone,
					);

					details_table_view($title, $clientData);
				?>

				<form method="post" action="<?php echo e(route('clientBalanceUpdate')); ?>" id="client_balance_form">
					<?php echo csrf_field(); ?>

					<?php
						global $wallet_status;

						form_hidden("id", $clientBalance->id);
						form_select("wallet_status", $wallet_status, $clientBalance->wallet_status);
						form_input_number("amount", $clientBalance->amount);
						form_input_number("confirm_amount");
						form_submit();

					?>


				</form>

				<?php endif; ?>
			</div>
		</section>
	</div>
</div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startPush("script"); ?>
<script type="text/javascript">
	
	$(document).ready(function(){

		// checking the amount confirm on form submit

		$("#client_balance_form").on("submit", function(e){
			// e.preventDefault();

			var amount = ( $("#amount").val() ).trim();
			var confirm_amount = ( $("#confirm_amount").val() ).trim();

			if(amount != confirm_amount){
				e.preventDefault();
				alert("Confirm Amount Does not Match");
			}

		});

	})

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>