<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Image Service  List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Other Service  List";

		$tableHead = array(
			"Plan",
			"Name",
			"Description",
			"Price",
			"Type",
			"Created At",
		);

		table_view( $title, $tableHead, $listArray, false, route("otherServiceEdit"), route("otherServiceDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>