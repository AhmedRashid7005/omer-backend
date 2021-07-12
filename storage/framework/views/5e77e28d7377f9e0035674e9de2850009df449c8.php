<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Blog Type Create'); ?>
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

			

				<h2 class="card-title"><strong>Blog Type Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="<?php echo e(route('blogTypeStore')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <?php
                        form_input("blog_type[]");
                        ?>

                        <div class="appendHere"></div>

                        <div class="addMore btn btn-warning pull-right"><i class="fas fa-plus" aria-hidden="true"></i> Add More</div>

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

		$(document).on("click", ".addMore", function(e){
			e.preventDefault();

			$(".appendHere").append('<div class="form-group row remove"> <label class="col-lg-3 control-label text-lg-right pt-2" for="blog_type"><strong>Blog Type</strong></label><div class="col-lg-6"> <input type="text" name="blog_type[]" value="" placeholder="blog Type" class="form-control blog_type" required="" autocomplete="off"></div><div class="removeHere btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div></div>');

		});


		$(".appendHere").on("click", ".removeHere", function (event) {
		// alert('click to remove');
		 $(this).closest(".remove").remove();
		});
	});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>