<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Advance Payment Add'); ?>
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

				<a href="<?php echo e(route('AdvancePaymentList')); ?>"><button class="btn btn-info"><i class="fas fa-list" aria-hidden="true"></i> Advance Payment List</button></a>
				<hr>

				<h2 class="card-title"><strong>Advance Payment Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="<?php echo e(route('AdvancePaymentStore')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <?php

                        $order_type = array(

                              "broker" => "broker",
                              "import" => "import",
                              "auto parts" => "auto parts",
                        );

                        form_select("subscriber_package_name_id", $subscriberPackageList);
                        form_select("order_type", $order_type);
                        form_input("percentage_of_defferred_amount");
                        form_input("percentage_added_in_deferred_amount");
                        form_submit();

                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>
	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>