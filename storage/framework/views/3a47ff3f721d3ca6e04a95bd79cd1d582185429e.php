<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Order  List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Order  List";

		$tableHead = array(
			"Order No",
			"User Id",
			"Order Type",
			"Market Place",
			"Shipping Type From",
			"Form State Country",
			"Shipping Type To",
			"To State Country",
			"Shipping Within",
			"Item Quantity",
			"Other Cost Name",
			"Other Cost Value",
			"Minimum Pay Type",
			"Minimum Pay Aamount",
			"Creaated At",
			"Updated At",
		);

		table_view( $title, $tableHead, $orders, route("orderDetails"), route("orderEdit"), route("orderDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>