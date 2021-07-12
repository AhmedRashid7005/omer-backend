<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Email Notification list'); ?>
<?php $__env->startSection('content'); ?>
	<?php

		$tableHead = array(
			"Client Id",
			"Suit",
			"Subject",
			"Body",
			"Type",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $res, false, false, $deleteRoute);

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>