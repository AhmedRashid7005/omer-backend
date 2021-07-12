@include("admin.helpers.htmlHelpers")
@extends('admin.admin_template')
@section('title', 'Admin Client Add')
@section('content')

@push("style")
<link rel="stylesheet" href="{{ URL::asset('public/themeAssets/build/css/intlTelInput.css') }}">
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

				<h2 class="card-title"><strong>Add Client By Admin</strong></h2>
			</header>
			<div class="card-body">
				<form action="{{route('adminClientStore')}}" method="post">
                    @csrf
                        <?php
                        global $country_array;
                        // dd($country_array);

                        form_select("subscriber_package_name", $subscriberPackageNameList);
                        form_input("first_name");
                        form_input("last_name");
                        form_input("email");
                        form_input_password("password");
                        form_input_password("confirm_password");

                        form_input("shipping_address_1");
                        form_input("shipping_address_2");


                        form_select("shipping_state", $country_array);



                        form_input("shipping_region");
                        form_input("shipping_city");
                        form_input("shipping_phone");
                        form_input("shipping_postal_code");
                        form_input("shipping_another_number");


                    simple_checkbox("bill_same_as_shipping", "yes", false, false, "bill_same_as_shipping", "The Billing Address Is The Same As The Shipping Address" );


                        form_input("billing_address_1");
                        form_input("billing_address_2");


                        form_select("billing_state", $country_array);

                        form_input("billing_region");
                        form_input("billing_city");
                        form_input("billing_phone");
                        form_input("billing_postal_code");
                        form_input("billing_another_number");

                        form_submit();
                        ?>            
                </form>
			</div>
		</section>
	</div>
</div>
	

@endsection

@push("script")
<script src="{{ URL::asset('public/themeAssets/js/intlTelInput.js') }}"></script>

<script>
    $(document).ready(function(){

    	// add by arafat for billing shipping
    	$(document).on("change", "#bill_same_as_shipping", function(){
    	    var ship_country = $('#shipping_country').val();
    	    var ship_add_1 = $('#shipping_address_1').val();
    	    var ship_add_2 = $('#shipping_address_1').val();

            var ship_state = $('#shipping_state').val();
    	    var ship_region = $('#shipping_region').val();


    	    var ship_city = $('#shipping_city').val();
    	    var ship_phone = $('#shipping_phone').val();
    	    var ship_postal_code = $('#shipping_postal_code').val();
    	    var ship_another_number = $('#shipping_another_number').val();

    	  if($('#bill_same_as_shipping').is(":checked")){
    	      $('#billing_country').val(ship_country);
    	      $('#billing_address_1').val(ship_add_1);
    	      $('#billing_address_2').val(ship_add_2);


              $('#billing_state').val(ship_state);
    	      $('#billing_region').val(ship_region);


    	      $('#billing_city').val(ship_city);
    	      $('#billing_phone').val(ship_phone);
    	      $('#billing_postal_code').val(ship_postal_code);
    	      $('#billing_another_number').val(ship_another_number);
    	      $('#billing_another_number').val(ship_another_number);
    	    } else{
    	        $('#billing_country').val('');
    	        $('#billing_address_1').val('');
                $('#billing_address_2').val('');

    	        $('#billing_state').val('');
    	        $('#billing_region').val('');

    	        $('#billing_city').val('');
    	        $('#billing_phone').val('');
    	        $('#billing_postal_code').val('');
    	        $('#billing_another_number').val('');
    	        $('#billing_another_number').val('');
    	    }
    	});
    	// end add by arafat for billing shipping

    	// end added by arafat
    	var input = document.querySelector("#shipping_phone");
    	window.intlTelInput(input, {
    	  utilsScript: "{{ URL::asset('public/themeAssets/js/utils.js') }}",
    	});

    	// end added by arafat
    	var input = document.querySelector("#billing_phone");
    	window.intlTelInput(input, {
    	  utilsScript: "{{ URL::asset('public/themeAssets/js/utils.js') }}",
    	});


        // end arafat showing term and condition error here

        $(document).on("blur", "#email", function (){
           function validateEmail(email) {
               const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
               return re.test(String(email).toLowerCase());
           }
           var email = ($("#email").val()).trim();
           if(!validateEmail(email)){
            $(".error").remove();
            $("#email").after("<div class='error emailError'>Please Enter a valid Email Address</div>");
           }else{
               $(".emailError").remove();
           }
        });
        // end email validation by arafat

        // subscribe validation start here
        $(document).on("blur", "#confirm_password", function(){
           var pass = $("#password").val();
           var conPass = $("#confirm_password").val();
           if(pass != conPass){
            $(".error").remove();
            $("#confirm_password").after("<div class='error confirm_passwordError'>Password Does not Match</div>");
            $("#confirm_password").val('');
               
           }else{
               $(".confirm_passwordError").remove();
           }
        });
        // subscribe validatioin end here

        // arafat password Validation strat
        $(document).on("blur", "#password", function(){
            // Password should 8 character, 1 upper, 1 lower 1 number
            if(this.value.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/)){
              $(".passwordError").remove();
            }else{
                $(".error").remove();
                $("#password").after("<div class='error passwordError'>Passwor Must be 8 character long with upper case, lower case and digit</div>");
            }
        });
        // arafat password validation end

        // arafat checking user duplicate email on register
        $("#email").keyup(function() {
           var email = ($("#email").val()).trim();
           $.ajax({
               url: "{{route('isRegistrationMailAlreadyExist')}}",
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