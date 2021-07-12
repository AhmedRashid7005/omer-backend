<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Contact us Reply Details'); ?>
<?php $__env->startSection('content'); ?>
	<?php

	$title = "Contact us Reply Details";

	details_table_view($title, $res);

	# ------------------------------------------
	$title = "Contact Us Reply List";

	$tableHead = array(
		"Contact Us Id",
		"subject",
		"body",
		"Created At",
		"Updated At",
	);

	table_view( $title, $tableHead, $contact_us_replies, false, false, route("contactUsReplyDelete") );

	?>	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>