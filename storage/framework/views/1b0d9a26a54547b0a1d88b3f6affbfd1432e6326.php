<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Other Service Add'); ?>
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

				<h2 class="card-title"><strong>Other Service Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="<?php echo e(route('otherServiceStore')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <?php
                        form_select("type", $types);

                        form_select("subscriber_package_name_id[]", $subscriber_package_name_id);

                        form_input("name[]");
                        form_textarea("description[]");
                        form_input("price[]");


                        ?>

                        <div class="appent_more"></div>

                        <div class="add_more btn btn-warning pull-right" style="margin-top: 10px; clear:both;"><i class="fas fa-plus" aria-hidden="true"></i> Add More</div>

                        <?php
                        form_submit();
                        ?>            
                </form>

			</div>
		</section>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush("script"); ?>

<script type="text/javascript">
	
	$(document).ready(function(){

		// add more other fees start
		$(document).on("click", ".add_more", function(e){
			e.preventDefault();

			// add append code

			$(".appent_more").append('<div class="remove" style="clear:both;"> <hr/> <div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="subscriber_package_name_id[]"><strong>Subscriber Package Name Id</strong></label><div class="col-lg-6"> <select name="subscriber_package_name_id[]" class="form-control populate" required><option value>--Select One--</option><option value="1">Basic</option><option value="2">Premium</option><option value="3">Business</option> </select></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="name[]"><strong>Name</strong></label><div class="col-lg-6"> <input type="text" name="name[]" value="" placeholder="Name" class="form-control" required></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="description[]"><strong>Description</strong></label><div class="col-lg-6"><textarea name="description[]" placeholder="Description" class="form-control" required rows="3"></textarea></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="price[]"><strong>Price</strong></label><div class="col-lg-6"> <input type="text" name="price[]" value="" placeholder="Price" class="form-control" required></div></div> <div class="remove_me btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div> </div>');

			// end adding append code

		});


		$(".appent_more").on("click", ".remove_me", function () {
		 $(this).closest(".remove").remove();
		});
		// end add more other fees


	});

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>