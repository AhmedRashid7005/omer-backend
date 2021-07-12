<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'dashboard'); ?>
<?php $__env->startSection('content'); ?>

<style>

.dashborad-buttons a {
	margin: 1em;
}

.dashborad-buttons .btn {
	font-size: 1.5rem;
}

</style>

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>

	
    <h3 class="text-center text-danger">Welcome to Admin Dashboard</h3>
	<strong>Quick Package Edit</strong>
	<input type="text" name="search" value="" placeholder="Enter Package No to edit !" class="col-md-8 form-control clientSearch searchForm" id="package_autocomplete">
	<div class="container dashborad-buttons">
		<div class="row margin-bottom">
            <a href=""><button class="btn btn-primary">Search</button></a>
			<a href="<?php echo e(route("packageAdd")); ?>"><button class="btn btn-primary">Create Package</button></a>
			<a href="<?php echo e(route("photoPackageList")); ?>"><button class="btn btn-primary">Photo package (<?=$package_count[1]?>)</button></a>
			<a href="<?php echo e(route("completePackageList")); ?>"><button class="btn btn-primary">Complete package (<?=$package_count[2]?>)</button></a>
		</div>
		<div class="row margin-bottom">
            <a href="<?php echo e(route("packageList")); ?>"><button class="btn btn-primary">Packages (<?=$package_count[3]?>)</button></a>
			<a href=""><button class="btn btn-primary">Special requests</button></a>
			<a href=""><button class="btn btn-primary">Processing orders</button></a>
			<a href="<?php echo e(route("packageAdd")); ?>"><button class="btn btn-primary">Shopping orders</button></a>
		</div>
		<div class="row margin-bottom">
			<a href=""><button class="btn btn-primary">Protection orders</button></a>
			<a href=""><button class="btn btn-primary">Delivery orders</button></a>
		</div>
    </div>
    <?php
		
        /* table_view(
             "User List",
             ["name", "email", "Created at"],
             $users
         ); */
    ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush("script"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script>
	$(document).ready(function() {
		var data = [
<?php
		foreach($packages as $package):
?>		
			{label: <?="'" . $package->package_no . "'"?>, value: <?="'" . route("packageEdit", ['id' => $package->id]) . "'" ?>},
<?php
		endforeach;
?>
		];
		
    	$("input#package_autocomplete").autocomplete({
			source: data,
			focus: function (event, ui) {
				$(event.target).val(ui.item.label);
				return false;
			},
			select: function (event, ui) {
				$(event.target).val(ui.item.label);
				window.location = ui.item.value;
				return false;
			}
		});
  	});
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>