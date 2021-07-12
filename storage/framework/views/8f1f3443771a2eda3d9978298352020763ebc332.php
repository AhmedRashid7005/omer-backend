<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', ' Shipping  List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = str_replace("_", " ",$delivery_type )." Shipping";

		$tableHead = array(
			"Plan",
			"Company Name",
			"Shipping From",
			"Shipping To",
			"Delivery Method",
			"During Time",
			"Created At",
		);

		table_view( $title, $tableHead, $listArray, route('InternationalShippingDetails'), route("InternationalShippingEdit"), route("ShippingDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>