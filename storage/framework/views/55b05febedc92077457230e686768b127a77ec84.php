<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Package Details'); ?>
<?php $__env->startSection('content'); ?>

	<a href="<?php echo e(route('packageList')); ?>"><button class="btn btn-success">Package List</button></a>
	<?php if($package): ?>
	<a href="<?php echo e(route('packageProductAdd')); ?>"><button class="btn btn-success"><i class="fas fa-plus" aria-hidden="true"></i> Add Product To Package</button></a>
	<?php endif; ?>
	
	<hr>


	<?php if($package): ?>
	<?php

		$title = "Package Data Details";

		details_table_view($title, $package);

	?>

	<?php endif; ?>


	<!-- Client Details Data -->

	<?php if( $userData ): ?>

	<div class="row packageDetailsShow">
		<div class="col">
			<section class="card">
				<header class="card-header">
					<div class="card-actions">
						<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
						<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
					</div>

					<h2 class="card-title"><strong>Client Details</strong></h2>
				</header>
				<div class="card-body">
					
					<?php

						echo $userData;

					?>
					
				</div>
			</section>
		</div>
	</div>

	<?php endif; ?>
	<!-- end Clients Details Data -->

	<!-- Package Products Data -->

	<?php if( $packageProducts ): ?>

	<?php

		$title = "Package Product List";

		$tableHead = array(
			"Package id",
			"Product Name",
			"Description",
			"Quantity",
			"Price",
			"Note",
			"Creaated At",
			"Updated At",
		);

		table_view( $title, $tableHead, $packageProducts, false, route("packageProductEdit"), route("packageProductDelete"));

	?>

	<?php endif; ?>
	<!-- end Package Product details -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>