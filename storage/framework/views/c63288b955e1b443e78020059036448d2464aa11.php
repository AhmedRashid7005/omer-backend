<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Send Email'); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>
				<h2 class="card-title"><strong>Refuse the Bank request Transfer</strong></h2>
			</header>
			<div class="card-body">

				<form action="<?php echo e(route('SendNotificationRefusedBankTransferWithdraw')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <?php

                        form_hidden('transfer_id', $id);
                        form_textarea_html("reason", false, false);
                        form_submit();
                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush("script"); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>