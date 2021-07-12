<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Suit Address List'); ?>
<?php $__env->startSection('content'); ?>

	<?php

		$title = "All Email Template List";

		$tableHead = array(
			"Coupon Code",
			"Description",
			"Amount Type",
			"Amount",
			"Expiry Date",
			"Minimum Spend",
			"Maximum Spend",
			"Use Limit Per Coupon",
			"Use Limit Per User",
			"Creaated At",
			"Updated At",
		);


		table_view( $title, $tableHead, $couponList, false, route("couponEdit"), route("couponDelete"));

	?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>