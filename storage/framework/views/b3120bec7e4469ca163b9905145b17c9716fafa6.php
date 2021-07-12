<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Subscriber Package Name Update'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("style"); ?>
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
</style>
<?php $__env->stopPush(); ?>


<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<a href="<?php echo e(route("subscribePackageList")); ?>"><button class="btn btn-success">Subscriber Package List</button></a>
				<hr>

				<h2 class="card-title"><strong>Update Subscriber Package Name By Admin</strong></h2>
			</header>
			<div class="card-body">
				<?php if($subscribePackage): ?>
				<form action="<?php echo e(route('subscribePackageUpdate')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <?php
                        form_hidden("id", $subscribePackage->id);
                        form_input("name", $subscribePackage->name);
                        form_input("arabic_name", $subscribePackage->arabic_name);
                        form_input("price_in_dolar", $subscribePackage->price_in_dolar);
                        form_input("price_in_saudi_riyal", $subscribePackage->price_in_saudi_riyal);
                        form_input("number_of_days", $subscribePackage->number_of_days);
                        form_input("suit_identity", $subscribePackage->suit_identity);
                        form_input("display_position", $subscribePackage->display_position);
                        form_submit();
                        ?>            
                </form>
                <?php endif; ?>
			</div>
		</section>
	</div>
</div>
	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>