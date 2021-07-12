<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Brand List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Brand List";

		$tableHead = array(
			"Brand Type",
			"Country",
			"Link",
			"Image",
			"code",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $newBrandArr, false, route("brandEdit"), route("brandDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>