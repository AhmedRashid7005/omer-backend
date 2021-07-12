<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Refuse Transfer Confirmation'); ?>
<?php $__env->startSection('content'); ?>


    <form action="<?php echo e(route('SendRefusedMessage')); ?>" method="post" enctype='multipart/form-data' id="packageUpdate" >
					<?php echo csrf_field(); ?>
				<?php
					form_hidden("id", $data->id);
					form_hidden("user_id", $user->id);
					form_input("num", $data->operation_number);
                    form_input("User", $user->name);
					form_input("suit", $user->suit);
					form_textarea("Message");
					?>
					<div class="row">		
                    <button class="btn btn-success" type="submit" style="margin-left:40%;width:100px">send</button>
					</div>
				</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>