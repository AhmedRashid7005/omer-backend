<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Admin Client List'); ?>
<?php $__env->startSection('content'); ?>

	<a href="<?php echo e(route("adminClientList")); ?>"><button class="btn btn-success">Client List</button></a>
	<hr>

	<?php

		$title = "Client Data Details";

		details_table_view($title, $user);

	?>

	<?php if( $TapPaymentDataDetails || $PaypalPaymentDataDetails ): ?>
	<div>

		<h3 class="text-info text-center">Payment Details</h3>
		<?php
			$title = "Tap Payment Details";
			#TapPayment Data Details
			if($TapPaymentDataDetails){

				foreach($TapPaymentDataDetails as $tap_key => $tap_v){

					details_table_view($title, $tap_v);

				}
			}

			#Paypal PAyment Data Details
			if($PaypalPaymentDataDetails){
				$title = "Paypal Payment Details";
				foreach($PaypalPaymentDataDetails as $paypal_key => $paypal_v){
					
					details_table_view($title, $paypal_v);

				}
			}


		?>
	</div>
	<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>