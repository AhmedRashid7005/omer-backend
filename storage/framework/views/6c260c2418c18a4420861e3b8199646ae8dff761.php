<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Calculator List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = str_replace("_", " ", $moduleName)." ".str_replace("_", " ", $for)." List";

		$tableHead = array(
			"Plan",
			"From",
			"To",
			"Amount Type",
			"Amount",
			"Created At",
		);

		# We have a odd module cash_back ... 
		# This line is for support that module
		
		if($moduleName == "cash_back"){

			$tableHead = array(
				"Plan",
				"Pay Via",
				"From",
				"To",
				"Amount Type",
				"Amount",
				"Created At",
			);

		}


		table_view( $title, $tableHead, $listArray, false, route("calculatorEdit"), route("calculatorDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>