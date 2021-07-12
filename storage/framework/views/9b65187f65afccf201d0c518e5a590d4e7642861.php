<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Image  or Video Service Edit'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("style"); ?>
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
	.searchForm{
		margin-left: 14px;
		margin-top: 10px;
		border: 1px solid;
	}
	.error{
		color:red;
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

				<h2 class="card-title"><strong>Image Or Video Service Update By Admin</strong></h2>
			</header>
			<div class="card-body">

				<?php if($data): ?>

				<form action="<?php echo e(route('imageVideoServiceUpdate')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <?php

                        # Lets Help for Redirect
                        Session::put("redirect_to_ar", $data->service_for);
                        # End Help

                        # Global variables
                        global $service_type;
                        global $service_for;

                        form_hidden("id", $data->id);
                        form_select("subscriber_package_name_id", $subscriber_package_name_id, $data->subscriber_package_name_id);
                        
                        form_select("service_for", $service_for, $data->service_for);
                        form_select("service_type", $service_type, $data->service_type);
                        

                        form_input("from", $data->from);
                        form_input("to", $data->to);
                        form_input("price", $data->price);


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