<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Message Module'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("style"); ?>
<style>
	table th {
	   text-align: center; 
	}

	.table-center {
	   margin: auto;
	   width: 50% !important; 
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

			

				<h2 class="card-title"><strong>Send Message to Client <?php  if( isset($request) ) echo $request->old('name'); ?> </strong></h2>
			</header>
			<div class="card-body">

				<div style="border: 2px solid green; margin-bottom: 20px; padding: 20px 20px 20px 20px;">
					<h3 class="text-success text-center"><strong>Search Client</strong></h3>

					<?php if( Session::has("search_name") || Session::has("search_email") || Session::has("search_suit") || Session::has("search_mobile_number") ): ?>

						<h3 class="text-danger">You are Searching with Below Data</h3>

						<table class="table table-no-more table-bordered table-striped mb-0">
							<tr>
								<td>Name: <strong><?php echo e(Session::get("search_name")); ?></strong></td>
								<td>Email: <strong><?php echo e(Session::get("search_email")); ?></strong></td>
							</tr>
							<tr>
								<td>Suit: <strong><?php echo e(Session::get("search_suit")); ?></strong></td>
								<td>Mobile Number: <strong><?php echo e(Session::get("search_mobile_number")); ?> </strong></td>
							</tr>
						</table>

					<?php endif; ?>

					<table class="table table-responsive text-center table-center">
						<form action="<?php echo e(route('sendMessagePost')); ?>" method="post">
						<?php echo csrf_field(); ?>
						<tr>
							<td>
								<label for="name"><strong>Name:</strong></label>
								<input type="text" name="name" placeholder="Name">
							</td>
							<td>
								<label for="email"><strong>Client Email:</strong></label>
								<input type="email" name="email" placeholder="Email">
							</td>
						</tr>
						<tr>
							<td>
								<label for="suit_number"><strong>Suit No:</strong></label>
								<input type="text" name="suit" placeholder="Suit Number">
							</td>
							<td>
								<label for="mobile_number"><strong>Mobile Num:</strong></label>
								<input type="text" name="mobile_number" placeholder="Mobile Number">
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" class="btn btn-primary" name="Search" value="Search" style="margin-top: 20px;">
							</td>
						</tr>
					</form>
					</table>
				</div>
			</div>
		</section>


		<?php if(isset($res)): ?>

		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>
				<h2 class="card-title"><strong>Selet One Or More Client</strong></h2>
			</header>


			<div class="card-body">
				<table class="table table-no-more table-bordered table-striped mb-0">
					<form action="<?php echo e(route('processPostMessage')); ?>" method="post" id="SendMailForm">
						<?php echo csrf_field(); ?>
					<tr>
						<td colspan="6">
							<input type="checkbox" name="select_all" id="select_all">
							<label for="select_all"> Select All </label>
						</td>
					</tr>
					
					<?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						<tr>
							<td>
								<input type="checkbox" name="client_ids[]" value="<?php echo e($v->id); ?>" class="mark_as_checked">
							</td>
							<td>
								<?php echo e($v->name); ?>

							</td>
							<td>
								<?php echo e($v->suit); ?>

							</td>
							<td>
								<?php echo e($v->email); ?>

							</td>
							<td>
								<?php echo e($v->mem_package); ?>

							</td>
							<td>
								<a href="<?php echo e(route('adminClientDetails',$v->id)); ?>"><span class="btn btn-info">Details</span></a>
							</td>
						</tr>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<tr>
						<td colspan="6">
							<span id="SendMail" class="form-control btn btn-primary col-md-2">Send Mail</span>
						</td>
					</tr>
					</form>

				</table>
			</div>

		<?php endif; ?>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush("script"); ?>

<script>
	
	$(document).ready(function(){

		$(document).on("change", "#select_all", function(){

			if( $(this).is(":checked") ){
				$(".mark_as_checked").prop("checked", "checked");
			}else{
				$(".mark_as_checked").prop("checked", false);
			}
		});

		// Now Check and Send ..

		$(document).on("click", "#SendMail", function(){

			if( $(".mark_as_checked").is(":checked") ){
				$("#SendMailForm").submit();
			}else{
				alert("For Sending Mail Please Check At Least One Client");
			}

		});

	});

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>