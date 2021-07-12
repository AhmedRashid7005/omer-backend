<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Brand Type List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Brand Type List";

		$tableHead = array(
			"Brand Type",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $brandTypeList, false, route("brandTypeEdit"), route("brandTypeDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>