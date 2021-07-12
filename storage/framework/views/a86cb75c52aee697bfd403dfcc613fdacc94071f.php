<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Client Balance List'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("style"); ?>
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
</style>
<?php $__env->stopPush(); ?>


<?php

	$title = "Client Balance List";

	$tableHead = array(
		"Plan",
		"Wallet Status",
		"Amount",
		"Creaated At",
		"Updated At",
	);


	table_view( $title, $tableHead, $groupBalanceArr, false, route("groupBalanceEdit"), route("groupBalanceDelete"));

?>

	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>