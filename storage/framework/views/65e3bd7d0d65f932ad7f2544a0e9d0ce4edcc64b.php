<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Brand Create'); ?>
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

			

				<h2 class="card-title"><strong>Brand Creation By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="<?php echo e(route('brandStore')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <?php
                         global $country_array;

                        form_select("country", $country_array);
                        form_select("brand_type_id", $brandTypeList);
                        form_input("link");
                        form_input_file("image", true, true);
                        form_input("code");
                        ?>
                      <!--   <div><hr></div>
                        <div class="appendHere"></div>

                        <div class="addMore btn btn-warning pull-right"><i class="fas fa-plus" aria-hidden="true"></i> Add More</div> -->
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

			$(".appendHere").append('<div class="remove"><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="link"><strong>Link</strong></label><div class="col-lg-6"> <input type="text" name="link[]" value="" placeholder="Link" class="form-control link" required="" autocomplete="off"></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="image"><strong>Image</strong></label><div class="col-lg-6"><div class="fileupload fileupload-new" data-provides="fileupload"><div class="input-append"><div class="uneditable-input"> <i class="fas fa-file fileupload-exists"></i> <span class="fileupload-preview"></span></div> <span class="btn btn-default btn-file"> <span class="fileupload-exists">Change</span> <span class="fileupload-new">Select file</span> <input type="file" name="image[]" multiple="" required=""> <span form-control=""></span> </span> <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a></div></div></div></div><div class="form-group row"> <label class="col-lg-3 control-label text-lg-right pt-2" for="code"><strong>Code</strong></label><div class="col-lg-6"> <input type="text" name="code[]" value="" placeholder="Code" class="form-control code" required="" autocomplete="off"></div> <div class="removeHere btn btn-danger pull-right"><i class="fas fa-trash" aria-hidden="true"></i> Remove</div> </div><hr></div>');

		});


		$(".appendHere").on("click", ".removeHere", function (event) {
		// alert('click to remove');
		 $(this).closest(".remove").remove();
		});
	});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>