<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Admin Client List By Admin'); ?>
<?php $__env->startSection('content'); ?>
	<?php

		$title = "All Client List Added By Admin";

		$tableHead = array(
			"Name",
			"Suit",
			"Email",
			"Ship Phone",
			"Package Name",
			"Package Fee",
			"Account Status",
		);

		$other_actions = array( 

			"status" => route("adminClientActiveDeactive"),

		 );


		table_view( $title, $tableHead, $adminClientLists, route("adminClientDetails"), route("adminClientEdit"), route("adminClientDelete"), $other_actions );

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>