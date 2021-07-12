<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Package Status List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Package Status List";

		$tableHead = array(
			"Package Status",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $packageStatuses, false, route("packageStatusEdit"), route("packageStatusDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>