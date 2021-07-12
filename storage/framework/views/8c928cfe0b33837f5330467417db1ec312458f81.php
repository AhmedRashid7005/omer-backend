<?php echo $__env->make("admin.helpers.htmlHelpers", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('title', 'Admin Profile'); ?>
<?php $__env->startSection('content'); ?>
    	<div class="row">
    	    <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">

    	        <section class="card">
    	            <div class="card-body">
    	                <div class="thumb-info mb-3">
    	                	<?php if(!$adminImg): ?>
    	                    
    	                    <img src="<?php echo e(URL::asset('public/adminAssets/img/!logged-user.jpg')); ?>" class="rounded img-fluid" alt="admin img">

    	                    <?php else: ?>
    	                    <img src="<?php echo e(APP_URL."/".$adminImg); ?>" class="rounded img-fluid" alt="admin img">
    	                    <?php endif; ?>
    	                    <div class="thumb-info-title">
    	                        <span class="thumb-info-inner" style="text-transform: capitalize;">
    	                        	<?php echo e($adminData->first_name." ".$adminData->last_name); ?>

    	                        </span>
    	                        <span class="thumb-info-type">
    	                          ( <?php echo e($adminData->adminRole->name); ?> )
    	                        </span>
    	                    </div>
    	                </div>

    	                <div class="widget-toggle-expand mb-3">
    	                    <div class="widget-header">
    	                        <h5 class="mb-2">Profile Completion</h5>
    	                        <div class="widget-toggle">+</div>
    	                    </div>
    	                    <div class="widget-content-collapsed">
    	                        <div class="progress progress-xs light">
    	                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
    	                                100%
    	                            </div>
    	                        </div>
    	                    </div>
    	                    <div class="widget-content-expanded">
    	                        <ul class="simple-todo-list mt-3">
    	                            <li class="completed">Update Profile Picture</li>
    	                            <li class="completed">Change Personal Information</li>

    	                        </ul>
    	                    </div>
    	                </div>

    	                <hr class="dotted short">

    	                <h5 class="mb-2 mt-3"> <strong>Address</strong> </h5>
    	                <p class="text-2">
    	                	
    	                	<?php echo e($adminData->address); ?>


    	                </p>
    	                <div class="clearfix">
    	                    <!-- <a class="text-uppercase text-muted float-right" href="#">(View All)</a> -->
    	                </div>

    	                <hr class="dotted short">

    	                <div class="social-icons-list">
    	                    <!-- <a rel="tooltip" data-placement="bottom" target="_blank" href="http://www.facebook.com" data-original-title="Facebook"><i class="fab fa-facebook-f"></i><span>Facebook</span></a>
    	                    <a rel="tooltip" data-placement="bottom" href="http://www.twitter.com" data-original-title="Twitter"><i class="fab fa-twitter"></i><span>Twitter</span></a>
    	                    <a rel="tooltip" data-placement="bottom" href="http://www.linkedin.com" data-original-title="Linkedin"><i class="fab fa-linkedin-in"></i><span>Linkedin</span></a> -->
    	                </div>

    	            </div>
    	        </section>


    	    </div>
    	    <div class="col-lg-8 col-xl-9">

    	        <div class="tabs">
    	            <ul class="nav nav-tabs tabs-primary">
    	                <li class="nav-item active">
    	                    <a class="nav-link" href="#overview" data-toggle="tab">Overview</a>
    	                </li>
    	                <li class="nav-item">
    	                    <a class="nav-link" href="#edit" data-toggle="tab">Edit</a>
    	                </li>
    	            </ul>
    	            <div class="tab-content">
    	                <div id="overview" class="tab-pane active">

    	                    <div class="p-3">
    	                       
    	                    	<?php
    	                    		$title = "Admin Profile Information";

    	                    		$adminTableView = array(
    	                    			"first_name" => $adminData->first_name,
    	                    			"last_name" => $adminData->last_name,
    	                    			"email" => $adminData->email,
    	                    			"phone" => $adminData->phone,
    	                    			"address" => $adminData->address,
    	                    			"created_at" => $adminData->created_at,
    	                    		);


    	                    		details_table_view($title, $adminTableView);

    	                    	?>

    	                    </div>

    	                </div>
    	                <div id="edit" class="tab-pane">

    	                    <form class="p-3" action="<?php echo e(route('adminProfileUpdate')); ?>" method="post" enctype='multipart/form-data' id="userDataUpdate">
    	                    	<?php echo csrf_field(); ?>

    	                        <h4 class="mb-3">Personal Information</h4>

    	                        <?php
    	form_input("first_name", $adminData->first_name);
    	form_input("last_name", $adminData->last_name);
    	form_input("email", $adminData->email);
    	form_input("phone", $adminData->phone);


    	form_input_file("img", false);

    	form_input_password("password", false, false);
    	form_input_password("confirm_password", false, false);

    	form_textarea("address", $adminData->address);

    	?>
    	<span class="btn btn-primary" id="save">Save</span>
    	                    </form>

    	                </div>
    	            </div>
    	        </div>
    	    </div>


    	</div>
    	<!-- end: page -->


<?php $__env->stopSection(); ?>

<?php $__env->startPush("script"); ?>
	
<script type="text/javascript">
	$(document).ready(function(){

		$(document).on("click", "#save", function(e){
			e.preventDefault();
			
			var password = $("#password").val();
			var confirm_password = $("#confirm_password").val();

			if(confirm_password != password){
				alert("Password Do not matched !");
			}else{
				$("#userDataUpdate").submit();
			}

		});


        // arafat checking user duplicate email on register
        $("#email").keyup(function() {
           var email = ($("#email").val()).trim();
           $.ajax({
               url: "<?php echo e(route('isAdminMailAlreadyExist')); ?>",
               method: "POST",
               data: { "_token" : "<?php echo e(csrf_token()); ?>", email:email },
               success: function(res){
                  // This email is already in use
                  if(res == 1){

                    $(".error").remove();
                    $("#email").after("<div class='error emailError'><strong>"+email+"</strong> Email Already Exist</div>");
                   $("#email").val('');
                   //remove the email
                  }else{
                   $(".emailError").remove();
                  }
               }
           });
        });
        // end arafat checking user duplicate email on register
        
	});
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>