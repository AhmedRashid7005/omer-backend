<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Admins List'); ?>
<?php $__env->startSection('content'); ?>
	<?php

		$title = "All Client List";

		$tableHead = array(
			"First Name",
			"Last Name",
			"Email",
			"Phone",
			"Image",
			"Address",
			"Account Status",
			"Admin Role",
		);


		table_view( $title, $tableHead, $adminDatas, false, route("adminEdit"), route("adminDelete") );

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>