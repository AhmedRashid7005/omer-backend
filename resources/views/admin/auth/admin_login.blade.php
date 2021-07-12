@include("admin.helpers.htmlHelpers")
<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,800,900|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ URL::asset('adminAssets/vendor/bootstrap/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('adminAssets/vendor/animate/animate.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('adminAssets/vendor/font-awesome/css/all.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('adminAssets/vendor/magnific-popup/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('adminAssets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />

        <!--(remove-empty-lines-end)-->

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ URL::asset('adminAssets/css/theme.css') }}" />


        <!--(remove-empty-lines-end)-->



        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ URL::asset('adminAssets/css/skins/default.css') }}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ URL::asset('adminAssets/css/custom.css') }}">

        <!-- Head Libs -->
        <script src="{{ URL::asset('adminAssets/vendor/modernizr/modernizr.js') }}"></script>

    </head>
    <body>
        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                <a href="/" class="logo float-left">
                    <img src="{{ URL::asset('adminAssets/img/logo.png') }}" height="54" alt="Porto Admin" />
                </a>

                <div class="panel card-sign">
                    <div class="card-title-sign mt-3 text-right">
                        <h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Sign In</h2>
                    </div>
                    <div class="card-body">
                        @include("admin.elements.admin_flash")
                        <form action="{{route('adminLoginCheck')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Username</label>
                                <div class="input-group">
                                    <input name="email" type="email" class="form-control form-control-lg" id="email" required=""  value="{{get_cookie('admin_email')}}"/>
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="clearfix">
                                    <label class="float-left">Password</label>
                                 <!--    <a href="pages-recover-password.html" class="float-right">Lost Password?</a> -->
                                </div>
                                <div class="input-group">
                                    <input name="password" type="password" class="form-control form-control-lg" required value="{{get_cookie('admin_password')}}"/>
                                    <span class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="RememberMe" name="remember_me" type="checkbox" value="checked" {{get_cookie('remember_me')}} />
                                        <label for="RememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-primary mt-2">Sign In</button>
                                </div>
                            </div>

                            <!-- <span class="mt-3 mb-3 line-thru text-center text-uppercase">
                                <span>or</span>
                            </span>

                            <div class="mb-1 text-center">
                                <a class="btn btn-facebook mb-3 ml-1 mr-1" href="#">Connect with <i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-twitter mb-3 ml-1 mr-1" href="#">Connect with <i class="fab fa-twitter"></i></a>
                            </div>

                            <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a></p> -->

                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-3 mb-3">&copy; Copyright {{date("Y")}}. All Rights Reserved.</p>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
        <script src="{{ URL::asset('public/adminAssets/vendor/jquery/jquery.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/vendor/popper/umd/popper.min.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/vendor/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/vendor/common/common.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/vendor/nanoscroller/nanoscroller.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
        <script src="{{ URL::asset('public/adminAssets/vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>

        <!-- Specific Page Vendor -->


        <!--(remove-empty-lines-end)-->

        <!-- Theme Base, Components and Settings -->
        <script src="{{ URL::asset('public/adminAssets/js/theme.js') }}"></script>

        <!-- Theme Custom -->
        <script src="{{ URL::asset('public/adminAssets/js/custom.js') }}"></script>

        <!-- Theme Initialization Files -->
        <script src="{{ URL::asset('public/adminAssets/js/theme.init.js') }}"></script>

        <script>
            $(document).ready(function(){
                   $(document).on("click", "#email", function(){
                       $("#email").attr("autocomplete", "on");
                   });

               });
        </script>
    </body>
</html>