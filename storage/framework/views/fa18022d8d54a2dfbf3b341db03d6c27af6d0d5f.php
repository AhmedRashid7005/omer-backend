<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Package  List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "Package  List";

		$tableHead = array(
			"Package No",
			"Client",
			"Created At",
			"Package Name",
			"Images",
			"Printed",
		);

		table_view( $title, $tableHead, $packageList, "", route("packageEdit"), route("packageDelete"), array( "Print A" => "package-print/a", "Print B" => "package-print/b" ));
	?>
	<a target=_target href="<?php echo e(route('packagePrintAll', ['type' => 'a', 'id' => 2])); ?>"><buttons class="btn btn-info" disabled="disabled"> Print All (A) </buttons></a> 
	<a target=_target href="<?php echo e(route('packagePrintAll', ['type' => 'b', 'id' => 2])); ?>"><buttons class="btn btn-info" disabled="disabled"> Print All (B) </buttons></a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>