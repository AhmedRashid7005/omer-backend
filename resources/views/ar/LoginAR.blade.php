<?php
    function get_cookie($cookie_name){
        if(isset($_COOKIE[$cookie_name])) {
            echo $_COOKIE[$cookie_name];
        }
    }
?>
@extends('template.ar_template')
@section('title', 'تسجبل دخول')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
@endpush


    <!--section class="contact-us"-->
         <section class="other_nav_link" style="position: relative; top: 160px;">
            <!-- Start container-->
            <div class="container ">
            @include("template.flash")

                <form id="myform" action="{{route('customerLogin')}}" method="post">
                    @csrf
                <div class="row ">

                    <!--select-->
                    <div class="col-md-12 text-center">
                        <h3 class="text-primary text-center my-3" dir="rtl">تسجيل الدخول </h3>
                    </div>
                  <!--select-->



                    <!-- div name-->
                    <div class=" col-md-12  text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text w-auto" id="email_span" for="email" > اسم المستخدم او الايميل </span>
                            </div>
                            <input type="text" id="email" class="form-control" name="email" required="required" placeholder="الآسم" value="{{get_cookie('email')}}">
                        </div>
                    </div>
                <!--div name-->


                <!--div email-->
                    <div class=" col-md-12  text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">كلمة المرور </span>
                            </div>
                            <input type="password" id="textview1" class="form-control" onpaste="return false;"  oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);" name="password"
                             required="required" aria-label="Username" aria-describedby="basic-addon1" placeholder="كلمه السر" value="{{get_cookie('password')}}">
                        </div>
                     <div class="row">
                           <div class="col-6 text-center">
                            <a href="{{route('subscriptionPlansAr')}}">تسجيل جديد </a>
                         </div>
                         <div class="col-6 text-center">
                            <a href="{{route('forgotPasswordAr')}}">نسيت كلمة السر </a>
                         </div>
                     </div>
                    </div >
                <!--div email-->

                <div class=" col-md-12  text-center">
                    <div class="input-group mb-3" dir="rtl">
                        <div class="input-group-prepend">
                            <span class="input-group-text w-auto" id="remember_me" >تذكرنى</span>
                        </div>
                        <input type="checkbox" name="remember_me" checked="checked" value="1" style="height: 50px; width: 100px;">
                    </div>
                </div>
                <div class=" col-md-6 col-6 text-lg-left text-center my-5">
                    <input class="btn btn-primary px-5" type="submit" value=" دخول" />
                </div>

                </div>



                </form>
                 <!--/ Row-->
            </div>
            <!-- End container-->
        </section>


        <div style="margin-top:140px; margin-bottom: 100px;">
            <div class="or-seperator"><i>or</i></div>
            <div class="social_login">

               <div class="col-md-12">
                   <a href="{{route('social.login','facebook')}}" class="btn btn-face btn-block"><button class=" btn-lg text-info"><i class="fab fa-facebook"></i> Sign in with <b>Facebook</b></button></a>

               </div>
               <div class="col-md-12">
                   <a href="{{route('social.login','google')}}" class="btn btn-google btn-block"><button class="text-warning btn-lg"><i class="fab fa-google-plus-g"></i> Sign in with <b>Google</b></button></a>
               </div>

               <div class="col-md-12">
                    <a href="{{route('social.login','twitter')}}" class="btn btn-twitter btn-block"><button class="text-primary btn-lg"><i class="fab fa-twitter"></i> Sign in with <b>Twitter</b></button></a>
               </div>
            </div>
        </div>

@endsection

    @push("script")
    <script type="text/javascript">
    $(document).ready(function(){

        $(document).on("click", "#email", function(){
            $("#email").attr("autocomplete", "on");
        });

    });
/*
      function cleanall(){
        document.getElementById("selectObject").value = "";
        document.getElementById("textview").value = "";
        document.getElementById("textview1").value = "";
        document.getElementById("textview2").value = "";
        document.getElementById("textview3").value = "";
        document.getElementById("textview-area").value = "";
        document.getElementById("textview-area1").value = "";

      }

    function InvalidMsg(textbox) {

    if (textbox.value === '') {
        textbox.setCustomValidity
        ('this input is required').style.backgroundColor = "red";
    }else {
        textbox.setCustomValidity('');
    }

    return true;
    }


    function InvalidMsg(textbox) {

    if (textbox.value === '') {
        textbox.setCustomValidity
        ('this input is required').style.backgroundColor = "red";
    }else {
        textbox.setCustomValidity('');
    }

    return true;
    }*/

    </script>
    @endpush