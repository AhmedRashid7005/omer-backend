<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Suit Address List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "All Email Template List";

		$tableHead = array(
			"Name",
			"Subject",
			"Body",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $emailTemplates, false, route("emailTemplateEdit"), route("emailTemplateDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>