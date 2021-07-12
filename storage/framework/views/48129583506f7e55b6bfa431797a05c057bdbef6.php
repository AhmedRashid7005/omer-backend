<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Suit Address Create'); ?>
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

			

				<h2 class="card-title"><strong>Suit Address By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="<?php echo e(route('suitAddressStore')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <?php
                        
                        global $country_array;
                        global $status_array;
                        form_input("name");
                        form_select("country", $country_array);
                        form_input("address");
                        form_input("state");
                        form_input("city");
                        form_input("zip_code");
                        form_input("house_road_number");
                        form_input("phone");
                        form_textarea_html("note", false, false);
                        form_select("status", $status_array, 1);
                        form_submit();
                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>
	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>