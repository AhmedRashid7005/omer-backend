<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Blog Type List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Blog Type List";

		$tableHead = array(
			"Blog Type",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $blogTypeList, false, route("blogTypeEdit"), route("blogTypeDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>