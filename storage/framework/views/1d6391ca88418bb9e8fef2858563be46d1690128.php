<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Client Balance Add'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("style"); ?>
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
</style>
<?php $__env->stopPush(); ?>


<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

			

				<h2 class="card-title"><strong>Client Balance Add Admin</strong></h2>
			</header>
			<div class="card-body">

				<!-- client search and select one client -->

				<div class="container">
					<span class="col-md-12">
						<strong>Type Suite Number, Clinet Name, Mobile Number Email</strong>
					</span>
					<input type="text" name="search" value="" placeholder="Enter Client Suite, Name, Mobile, Email" class="col-md-8 form-control clientSearch searchForm" id="clientSearch">
				</div>

				<div class="container searchResult" style="display: none;">
					<h3 class="search_heading">Search Results</h3>
					<div class="col-md-12 appendHereClient"></div>
				</div>

				<!-- end client search and select one client -->

			</div>
		</section>
	</div>
</div>

<div class="row client_balance_row" style="display: none;">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

				<h2 class="card-title"><strong>Client Balance Add Admin</strong></h2>
			</header>
			<div class="card-body">

				<form method="post" action="<?php echo e(route('clientBalanceStore')); ?>" id="client_balance_form">
					<?php echo csrf_field(); ?>

					<?php
						global $wallet_status;

						form_select("wallet_status", $wallet_status);
						form_input_number("amount");
						form_input_number("confirm_amount");
						form_submit();

					?>


				</form>

			</div>
		</section>
	</div>
</div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startPush("script"); ?>

<script type="text/javascript">
	
	$(document).ready(function(){

		$(document).on("keyup", ".clientSearch", function(){
			// console.log($(this).val());
			var searchKey = $(this).val();

			$.ajax({
			    url: "<?php echo e(route('findClient')); ?>",
			    method: "POST",
			    data: { "_token" : "<?php echo e(csrf_token()); ?>", searchKey:searchKey },
			    success: function(res){
			       // This email is already in use
			       if(res != 0){
			       	 $(".searchResult").show();
			         $(".appendHereClient").html(res);
			         $(".client_balance_row").hide();
			       }else{
			       	  $(".appendHereClient").html("");
			         $(".client_balance_row").hide();
			       }
			    }
			});
		});


		// select Client form search Result..

		$(document).on("click", ".selectedOne", function(){
			var userId = $(this).data("userid");
			// show *
			// Details Add
			$("#orderFormRow").show();

			$.ajax({
				context: this,
			    url: "<?php echo e(route('selectClient')); ?>",
			    method: "POST",
			    data: { "_token" : "<?php echo e(csrf_token()); ?>", userId:userId },
			    success: function(res){
			       // This email is already in use
			       if(res != 0){
			       	 $(".searchResult").show();
			       	 $(".search_heading").html("Your Selected Client");
			         $(this).siblings("tr:not('.header-row')").remove();
					 //$(".appendHereClient").html(res);
					 $("#packageDetailsForm_1 > input[name='userid']").val($(this).data("userid"));
			         $(".client_balance_row").show();
			       }else{
			       	  $(".appendHereClient").html("");
			       	  $(".client_balance_row").hide();
			       }
			    }
			});

		});

		// checking the amount confirm on form submit

		$("#client_balance_form").on("submit", function(e){
			// e.preventDefault();

			var amount = ( $("#amount").val() ).trim();
			var confirm_amount = ( $("#confirm_amount").val() ).trim();

			if(amount != confirm_amount){
				e.preventDefault();
				alert("Confirm Amount Does not Match");
			}

		});

	});

</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>