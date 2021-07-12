<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Image Service  List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Image Service  List <br/> <br/>  <strong> If Service Type Fixed then The Price is For Each 1 Photo, <br/><br/> Other Wise if Service Type is Range then The Price For the Range </strong>";

		$tableHead = array(
			"Plan",
			"Service Type",
			"From",
			"To",
			"Price",
			"Created At",
		);

		table_view( $title, $tableHead, $listArray, false, route("imageVideoServiceEdit"), route("imageVideoServiceDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>