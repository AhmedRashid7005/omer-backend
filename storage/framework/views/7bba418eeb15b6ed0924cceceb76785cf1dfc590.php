<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Contact Us List'); ?>
<?php $__env->startSection('content'); ?>

<?php

	$title = "All Contact List";

	$tableHead = array(
		"Receiving Department",
		"Name",
		"Email",
		"Phone",
		"Suit",
		"Subject",
		"Message Description",
		"Creaated At",
		"Updated At",
	);


	table_view( $title, $tableHead, $contactUsList, route("contactUsDetails"), route("contactUsReply"), route("contactUsDelete"));

?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>