<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Advance Payment List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Advance payment List";

		$tableHead = array(
			"Plan",
			"Order Type",
			"Percentage of defferred amount",
			"Percentage added in deferred amount",
			"Creaated At",
		);


		table_view( $title, $tableHead, $listArray, false, route("AdvancePaymentEdit"), route("AdvancePaymentDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>