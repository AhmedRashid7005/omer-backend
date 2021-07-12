<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Invoice  List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Invoice  List";

		$tableHead = array(
			"Invoice No",
			"Order No",
			"Sender Add",
			"Receiver Add",
			"Delivery Through",
			"Carrier Name",
			"Remaining Order Amount",
			"Shipping Cost Warehouse",
			"Delivery Cost Your Add",
			"Other Fee Name",
			"Other Fee Val",
			"Insurence Fee",
			"Custom Duties",
			"Vat",
			"Discount Type",
			"Discount Amount",
			"Total",
			"Creaated At",
			"Updated At",
		);

		table_view( $title, $tableHead, $list, route("invoiceDetails"), route("invoiceEdit"), route("invoiceDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>