<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Blog List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Blog List";

		$tableHead = array(
			"Blog Type",
			"Code",
			"Subject",
			"Content",
			"images",
			"Meta Title",
			"Meta Keyword",
			"Meta Description",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $newBlogArr, false, route("blogEdit"), route("blogDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>