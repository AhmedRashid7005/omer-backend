<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Coupon Create'); ?>
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

			

				<h2 class="card-title"><strong>Coupon Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="<?php echo e(route('couponStore')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <?php
                        $amount_type_arr = array(
                        	"fixed" => "Fixed",
                        	"percentage" => "Percentage",
                        );

                        form_input("coupon_code");
                        form_textarea("description");
                        form_select("amount_type", $amount_type_arr);
                        form_input("amount");
                        form_input_date("expiry_date");
                        form_input("minimum_spend");
                        form_input("maximum_spend");
                        form_input("use_limit_per_coupon");
                        form_input("use_limit_per_user");
                        form_submit();

                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>
	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>