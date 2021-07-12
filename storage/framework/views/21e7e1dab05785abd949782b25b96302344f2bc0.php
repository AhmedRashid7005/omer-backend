<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Blog Create'); ?>
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

			

				<h2 class="card-title"><strong>Blog Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="<?php echo e(route('blogStore')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <?php
                        form_select("blog_type_id", $blogTypeList);
                        form_input("code");
                        form_input("subject");
                        form_textarea_html("content");
                        form_input_file("image", true, true);
                        form_input("meta_title");
                        form_input("meta_keyword");
                        form_input("meta_description");
                        form_submit();
                        ?>
                </form>

			</div>
		</section>
	</div>
</div>
	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>