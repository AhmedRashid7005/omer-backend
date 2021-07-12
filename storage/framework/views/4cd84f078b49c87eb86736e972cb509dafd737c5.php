<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Website Development List'); ?>
<?php $__env->startSection('content'); ?>

<?php

	$title = "All Website Development Message List";

	$tableHead = array(
		"Topic",
		"Name",
		"Email",
		"Phone",
		"Description",
		"Do this Personally",
		"image",
		"Creaated At",
		"Updated At",
	);


	table_view( $title, $tableHead, $websiteDevelopemt, route("websiteDevelopmentDetails"), route("websiteDevelopmentReply"), route("websiteDevelopmentDelete"));

?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>