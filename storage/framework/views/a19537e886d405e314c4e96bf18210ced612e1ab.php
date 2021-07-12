<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Review List'); ?>
<?php $__env->startSection('content'); ?>

	<form action="<?php echo e(route('printPackages')); ?>" method="post">
		<?php echo csrf_field(); ?>
		<input type="hidden" name="package_type" value="ready">
		<?php
			$title = "Review List";


			$tableHead = array(
				"<input type='checkbox' name='select_all' id='select_all' style='margin-left: -7px;'>",
				"operation_number",
				"user",
				"suit",
				"bill_number",
				"ontime",
				"covered",
				"identical",
				"recommend",
				"title",
				"photos",
				"shareLinks",
				"share",
				"status",
				"Creaated At",
			);

			$other_actions = array(				
					"Transfer" => "transfer-review"

			);
			table_view( $title, $tableHead, $reviewList, route("ReviewDetails"), route("ReviewEdit"), route("DeleteReview"), $other_actions);

		?>
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