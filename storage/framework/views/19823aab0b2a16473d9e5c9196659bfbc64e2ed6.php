<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Suit Address List'); ?>
<?php $__env->startSection('content'); ?>
	<?php

		$title = "All Suit Address List";

		$tableHead = array(
			"Name",
			"Country",
			"Address",
			"Address2",
			"State",
			"City",
			"Zip Code",
			"House & Road Num",
			"Phone",
			"Note",
			"Status",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $suitAddressLists, false, route("suitAddressEdit"), route("suitAddressDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>