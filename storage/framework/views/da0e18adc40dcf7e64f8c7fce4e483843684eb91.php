<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Review Details'); ?>
<?php $__env->startSection('content'); ?>

	<a href="<?php echo e(route('ReviewList')); ?>"><button class="btn btn-success">Review List</button></a>
	<hr>
	<?php if($review): ?>
	<?php

		$title = "Review Data Details";

		details_table_view($title, $review);

	?>

	<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>