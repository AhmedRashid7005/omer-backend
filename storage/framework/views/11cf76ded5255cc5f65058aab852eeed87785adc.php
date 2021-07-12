<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Subscriber Package Name List'); ?>
<?php $__env->startSection('content'); ?>
	<?php

		$title = "All Subscriber Package Name List";

		$tableHead = array(
			"Name",
			"Arabic Name",
			"Price In Dolar",
			"Price In Saudi riyal",
			"Number Of Days",
			"Suit Identity",
			"Display Position",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $subscribePackageLists, false, route("subscribePackageEdit"), route("subscribePackageDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>