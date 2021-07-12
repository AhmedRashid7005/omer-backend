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

	$title = "withdrawas List";
	$tableHead = array(
		"Suit",
		"Name",
		"BankName",
		"accountName",
		"iban",
		"amount",
		"photo",
		"relationship",
		"status",
		"Creaated At",
		"Updated At",
	);
    $other_actions=[
        "accpet" => "accept-withdraw",
        "refused" => "refused-withdraw",

    ];


	table_view( $title, $tableHead, $clientBalanceArr, false, false,false, $other_actions=$other_actions, 'Actions', 'datatable-tabletools_ignore',true);

?>
	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>