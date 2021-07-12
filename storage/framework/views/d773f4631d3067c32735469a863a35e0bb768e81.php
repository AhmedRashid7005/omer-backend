<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Package  List'); ?>
<?php $__env->startSection('content'); ?>

	<form action="<?php echo e(route('printPackages')); ?>" method="post">
		<?php echo csrf_field(); ?>
		<input type="hidden" name="package_type" value="ready">
		<?php
			$title = "Package  List";

			$tableHead = array(
				"<input type='checkbox' name='select_all' id='select_all' style='margin-left: -7px;'>",
				"Package No",
				"Printed",
				"Package Status",
				"Client",
				"Package To",
				"Shipment Value",
				"From",
				"To",
				"Tracking No",
				"Weight",
				"Note",
				"Other Fess",
				"Images",
				"Products Qty",
				"Total Invoice",
				"Creaated At",
				"Updated At",
			);

			$other_actions = array(
					"Add" => "add-product",
					// "Print A" => "package-print/a",
					// "Print B" => "package-print/b"
			);

			table_view( $title, $tableHead, $packageList, route("packageDetails"), route("packageEdit"), route("packageDelete"), $other_actions);

		?>
		<input type="submit" class="btn btn-info" value="Print All (A)" name="a"/>
		<input type="submit" class="btn btn-info" value="Print All (B)" name="b"/>
	</form>
<?php $__env->stopSection(); ?>


<?php $__env->startPush("script"); ?>

	<script type="text/javascript">

		$(document).ready(function(){

			$(document).on("change", "#select_all", function(){

				if($(this).prop("checked")){
					$(".all_id").prop("checked", true);
				}else{
					$(".all_id").prop("checked", false);
				}

			});

			// for clip board
			$(document).on("click", ".ar_copy", function(e){

				var clipboard = new ClipboardJS(this);
				var that = this;
				clipboard.on('success', function(e) {
					// console.log(e);
					$(that).html("Copied");
				});

				clipboard.on('error', function(e) {
					// console.log(e);
				});
			});
			// end for clip board

		});

	</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>