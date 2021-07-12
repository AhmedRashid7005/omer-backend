<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Review Details'); ?>
<?php $__env->startSection('content'); ?>

	<a href="<?php echo e(route('TransferList')); ?>"><button class="btn btn-success">Transfer List</button></a>
	<hr>
	<?php if($transfer): ?>
	<?php

		$title = "Transfer Confirmation Data Details";

		details_table_view($title, $transfer);

	?>

	<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>