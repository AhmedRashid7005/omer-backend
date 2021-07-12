@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Admin  Create')
@section('content')

@push("style")
<style type="text/css">
	.content-body:not(.card-margin) > .row + .row {
	    padding-top: 0px;
	}
</style>
@endpush


<div class="row">
	<div class="col">
		<section class="card">
			<header class="card-header">
				<div class="card-actions">
					<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
					<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
				</div>

			{{-- 	<a href="{{route("subscribePackageList")}}"><button class="btn btn-success">Subscriber Package List</button></a>
				<hr> --}}

				<h2 class="card-title"><strong>Create Admin By Admin</strong></h2>
			</header>
			<div class="card-body">

				<form action="{{route('adminStore')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                        <?php
                        
                        global $status_array;

                        form_input("first_name");
                        form_input("last_name");
                        form_select("admin_role", $adminRoleList);
                        form_input("email");
                        form_input_password("password");
                        form_input_password("confirm_password");
                        form_input("phone");
                        form_input("address");
                        form_input_file("img", false);
                        form_select("status", $status_array, 1);
                        form_submit();
                        ?>
                </form>

			</div>
		</section>
	</div>
</div>
	

@endsection

@push("script")
	
<script type="text/javascript">
	$(document).ready(function(){

		// arafat password Validation strat
		$(document).on("blur", "#password", function(){
		    // Password should 8 character, 1 upper, 1 lower 1 number
		    if(this.value.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/)){
		      $(".passwordError").remove();
		      $("#submit").prop("disabled", false);
		    }else{
		        $(".error").remove();
		        $("#password").after("<div class='error passwordError'>Passwor Must be 8 character long with upper case, lower case and digit</div>");
		      $("#submit").prop("disabled", true);
		    }
		});
		// arafat password validation end

		$(document).on('keyup', "#confirm_password", function () {
			// alert(1);
		  if ($('#password').val() != $('#confirm_password').val()) {
		  	$(".error").remove();
		     $("#confirm_password").after("<div class='error passwordError'>Password Do not Match .</div>");
		     $("#submit").prop("disabled", true);
		  } else {
		  	$(".error").remove();
		  	$("#submit").prop("disabled", false);
		  }
		});

		// arafat checking user duplicate email on register
		$("#email").keyup(function() {
		   var email = ($("#email").val()).trim();
		   $.ajax({
		       url: "{{route('isAdminMailAlreadyExist')}}",
		       method: "POST",
		       data: { "_token" : "{{ csrf_token() }}", email:email },
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

@endpush