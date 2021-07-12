<?php
use Illuminate\Support\Carbon;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Mobile Metas -->
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,800,900|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/bootstrap/css/bootstrap.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/animate/animate.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/font-awesome/css/all.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/magnific-popup/magnific-popup.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')); ?>" />

    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/boxicons/css/boxicons.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')); ?>" />


    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/select2/css/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/datatables/media/css/dataTables.bootstrap4.css')); ?>" />

    <!--(remove-empty-lines-end)-->

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/css/theme.css')); ?>" />

    <!--(remove-empty-lines-end)-->

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/css/skins/default.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/vendor/summernote/summernote-bs4.css')); ?>" />

    <link href="<?php echo e(URL::asset('public/affiliateByArafatAssets/css/daterangepicker.css')); ?>"  rel="stylesheet">


    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/adminAssets/css/custom.css')); ?>">
    <!-- Head Libs -->
    <script src="<?php echo e(URL::asset('public/adminAssets/vendor/modernizr/modernizr.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(URL::asset('public/themeAssets/build/css/intlTelInput.css')); ?>">

    
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    


    <style>
        .error{
            color: red;
        }

        div.dataTables_wrapper div.dataTables_filter {
            text-align: left;
        }

        tfoot {display: table-header-group;}
    </style>

    <?php echo $__env->yieldPushContent("style"); ?>
</head>
<body>
    <section class="body">
        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="<?php echo e(route('dashboard')); ?>" class="logo">
                    <img src="<?php echo e(URL::asset('public/adminAssets/img/logo.png')); ?>" width="75" height="35" alt="Porto Admin" />
                </a>
                <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">
                

                <span class="separator"></span>
                <span class="text-danger"><strong>Today Date: <?php echo e(date("d-m-Y")); ?></strong></span>
                

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="<?php echo e(APP_URL.'/'.auth()->guard('admin')->user()->img); ?>" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                            <span class="name"><?php echo e(auth()->guard('admin')->user()->first_name." ".auth()->guard('admin')->user()->last_name); ?></span>
                            <span class="role">
                               
                            </span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled mb-2">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo e(route('adminProfile')); ?>"><i class="fas fa-user"></i> My Profile</a>
                            </li>
                        <!--     <li>
                                <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fas fa-lock"></i> Lock Screen</a>
                            </li> -->
                            <li>
                                <a role="menuitem" tabindex="-1" href="<?php echo e(route('adminLogout')); ?>"><i class="fas fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <!-- inner-wrapper arafat | arfat.dml@gmail.com web_lover in fiverr  -->
        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">
                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Navigation
                    </div>
                    <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation" style="margin-bottom: 150px;">

                            <ul class="nav nav-main">
                                <li>
                                    <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                                        <i class="fas fa-home" aria-hidden="true"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>

                                <li>
                                    <a class="nav-link" href="<?php echo e(route('adminProfile')); ?>">
                                        <i class="fas fa-id-card" aria-hidden="true"></i>
                                        <span>My Profile</span>
                                    </a>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-users-cog" aria-hidden="true"></i>
                                            <span>Admin Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('adminCreate')); ?>">
                                                   Create Admin
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('adminList')); ?>">
                                                   List Admin
                                                </a>
                                            </li>
                                        </ul>
                                </li>


                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-cube" aria-hidden="true"></i>
                                            <span>SubsCribe Package Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('subscribePackageList')); ?>">
                                                    Subscriber Package List
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('subscribePackageCreate')); ?>">
                                                    Create Subscriber Package
                                                </a>
                                            </li>
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-list-alt" aria-hidden="true"></i>
                                            <span>Client Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('adminClientList')); ?>">
                                                    Client List
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('adminClientListByAdmin')); ?>">
                                                    Client List By admin
                                                </a>
                                            </li>


                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('adminClientAdd')); ?>">
                                                    Create Client
                                                </a>
                                            </li>
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-users" aria-hidden="true"></i>
                                            <span>Affiliate Module</span>
                                        </a>
                                        <ul class="nav nav-children">

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('listAffiliateGroup')); ?>">
                                                    Affiliate Group List
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('createAffiliateByGroup')); ?>">
                                                    Create Affiliate Group
                                                </a>
                                            </li>


                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('listAffiliatePerson')); ?>">
                                                    Affiliate Person List
                                                </a>
                                            </li>

                                              <li>
                                                <a class="nav-link" href="<?php echo e(route('createAffiliateByPerson')); ?>">
                                                   Create Affiliate Person
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" target="__blank" href="<?php echo e(route('affiliatePersonPage')); ?>">
                                                    Affiliate Person Page
                                                </a>
                                            </li>

                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-address-book" aria-hidden="true"></i>
                                            <span>Suit Address Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('suitAddressList')); ?>">
                                                    Suit Address List
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('suitAddressCreate')); ?>">
                                                    Suit Address Add
                                                </a>
                                            </li>
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-tags" aria-hidden="true"></i>
                                            <span>Coupon Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('couponList')); ?>">
                                                   Coupon List
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('couponAdd')); ?>">
                                                   Coupon Add
                                                </a>
                                            </li>
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-envelope" aria-hidden="true"></i>
                                            <span>Email Template Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('emailTemplateList')); ?>">
                                                   Email Template List
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('emailTemplateAdd')); ?>">
                                                   Email Template Add
                                                </a>
                                            </li>
                                        </ul>
                                </li>

                                <li>
                                    <a class="nav-link" href="<?php echo e(route('contactUsList')); ?>">
                                        <i class="fas fa-comment-alt" aria-hidden="true"></i>
                                        <span>Contact Us Module</span>
                                    </a>
                                </li>

                                <li>
                                    <a class="nav-link" href="<?php echo e(route('websiteDevelopmentList')); ?>">
                                        <i class="fas fa-user-cog" aria-hidden="true"></i>
                                        <span>Website Development Module</span>
                                    </a>
                                </li>


                                <li class="nav-parent">
                                       <a class="nav-link" href="#">
                                           <i class="fas fa-mail-bulk" aria-hidden="true"></i>
                                           <span>Send Message Module</span>
                                       </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('sendMessage')); ?>">
                                                   Send Message
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('getAllSendEmail')); ?>">
                                                   Lise Send Emails
                                                </a>
                                            </li>
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                       <a class="nav-link" href="#">
                                            <i class="fas fa-bell" aria-hidden="true"></i>
                                            <span>Send Notification Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('sendNotification')); ?>">
                                                   Send Notifications
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('getAllSendNotification')); ?>">
                                                   Lise Send Notifications
                                                </a>
                                            </li>
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-atom" aria-hidden="true"></i>
                                            <span>Brand Type Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('brandTypeList')); ?>">
                                                   Brand Type List
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('brandTypeAdd')); ?>">
                                                   Brand Type Add
                                                </a>
                                            </li>
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-atlas" aria-hidden="true"></i>
                                            <span>Brand Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('brandList')); ?>">
                                                   Brand List
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('brandAdd')); ?>">
                                                   Brand Add
                                                </a>
                                            </li>
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-laptop" aria-hidden="true"></i>
                                            <span>Blog Type Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('blogTypeList')); ?>">
                                                   Blog Type List
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('blogTypeAdd')); ?>">
                                                   Blog Type Add
                                                </a>
                                            </li>
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-laptop-code" aria-hidden="true"></i>
                                            <span>Blog Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('blogList')); ?>">
                                                   Blog List
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('blogAdd')); ?>">
                                                   Blog Add
                                                </a>
                                            </li>
                                        </ul>
                                </li>


                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-box" aria-hidden="true"></i>
                                            <span>Package Status Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('packageStatusList')); ?>">
                                                   Package Status List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('packageStatusAdd')); ?>">
                                                   Package Status Add
                                                </a>
                                            </li>
                                            
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-box-open" aria-hidden="true"></i>
                                            <span>Package Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('packageList')); ?>">
                                                   Package List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('packageAdd')); ?>">
                                                   Package  Add
                                                </a>
                                            </li>
                                            
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fab fa-bitbucket" aria-hidden="true"></i>
                                            <span>Order Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('orderList')); ?>">
                                                   Order List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('orderAdd')); ?>">
                                                   Order  Add
                                                </a>
                                            </li>
                                            
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-border-all" aria-hidden="true"></i>
                                            <span>Service Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('imageServiceList')); ?>">
                                                   Image Service List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('videoServiceList')); ?>">
                                                   Video Service  List
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('otherServiceList')); ?>">
                                                   Other Service  List
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('imageVideoServiceAdd')); ?>">
                                                   Image/Video Service  Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('otherServiceAdd')); ?>">
                                                   Other Service  Add
                                                </a>
                                            </li>
                                            
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-receipt" aria-hidden="true"></i>
                                            <span>Invoice Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('invoiceList')); ?>">
                                                   Invoice List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('invoiceAdd')); ?>">
                                                   Invoice  Add
                                                </a>
                                            </li>
                                            
                                        </ul>
                                </li>


                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-wallet" aria-hidden="true"></i>
                                            <span>Wallet Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('clientBalanceList')); ?>">
                                                   Client Balance list
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('clientBalanceAdd')); ?>">
                                                   Client Balance Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('groupBalanceList')); ?>">
                                                   Group Balance list
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('groupBalanceAdd')); ?>">
                                                   Group Balance Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('rechargeCardList')); ?>">
                                                   Rechage Card list
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('rechargeCardAdd')); ?>">
                                                   Rechage Card Add
                                                </a>
                                            </li>
                                            
                                        </ul>
                                </li>

                                <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-ship" aria-hidden="true"></i>
                                            <span>Calculator Module</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('InternationalShippingList','international')); ?>">
                                                   International Shipping List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('InternationalShippingAdd','international')); ?>">
                                                   International Shipping Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('InternationalShippingList','local_delivery')); ?>">
                                                   Local delivery List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('InternationalShippingAdd', 'local_delivery')); ?>">
                                                   Local delivery Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('InternationalShippingList','local_receipt')); ?>">
                                                   Local Receipt List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('InternationalShippingAdd','local_receipt')); ?>">
                                                   Local Receipt Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['commission_fess','broker'])); ?>">
                                                   Broker Commission List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['commission_fess','broker', 'Commion Fee for Broker'])); ?>">
                                                   Broker Commission Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['commission_fess','import'])); ?>">
                                                   Import Commission List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['commission_fess','import', 'Commion Fee for import'])); ?>">
                                                   Import Commission Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['commission_fess','auto_parts'])); ?>">
                                                   Auto Parts Commission List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['commission_fess','auto_parts', 'Commion Fee for auto parts'])); ?>">
                                                   Auto Parts Commission Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['commission_fess','protections'])); ?>">
                                                   Protection Commission List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['commission_fess','protections', 'Commion Fee for Protection'])); ?>">
                                                   Protection Commission Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['insurance','global_shipping'])); ?>">
                                                   Global Shipping Insurance List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['insurance','global_shipping', 'Global Shipping Insurance'])); ?>">
                                                   Global Shipping Insurance Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['insurance','local_delivery'])); ?>">
                                                   Local Delivery Insurance List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['insurance','local_delivery', 'Local Delivery Insurance'])); ?>">
                                                   Local Delivery Insurance Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['insurance','receipt'])); ?>">
                                                   Receipt Insurance List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['insurance','receipt', 'Receipt Insurance'])); ?>">
                                                   Receipt Insurance Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['insurance','import'])); ?>">
                                                   Import Insurance List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['insurance','import', 'Import Insurance'])); ?>">
                                                   Import Insurance Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['bill_correction','bill_correction'])); ?>">
                                                   Bill Correction List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['bill_correction','bill_correction', 'Bill Correction'])); ?>">
                                                   Bill Correction Add
                                                </a>
                                            </li>

                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['cash_back','cash_back_pay_via'])); ?>">
                                                   Cash Back List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['cash_back','cash_back_pay_via', 'Cash Back'])); ?>">
                                                   Cash Back Add
                                                </a>
                                            </li>

                                             <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['pay_later','pay_later'])); ?>">
                                                   Pay Later List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['pay_later','pay_later', 'Pay Later'])); ?>">
                                                   Pay Later Add
                                                </a>
                                            </li>

                                             <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['installment','installment'])); ?>">
                                                   Installment List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['installment','installment', 'Installment'])); ?>">
                                                   Installment Add
                                                </a>
                                            </li>

                                             <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorList',['points','points'])); ?>">
                                                   Points List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('calculatorAdd',['points','points', 'Points'])); ?>">
                                                   Points Add
                                                </a>
                                            </li>

                                             <li>
                                                <a class="nav-link" href="<?php echo e(route('AdvancePaymentList')); ?>">
                                                   Advance Payment List
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="nav-link" href="<?php echo e(route('AdvancePaymentAdd')); ?>">
                                                   Advance Payment
                                                </a>
                                            </li>


                                            
                                        </ul>
                                </li>

                            </ul>
                        </nav>

                    </div>


                    <script>
                        // Maintain Scroll Position
                        if (typeof localStorage !== 'undefined') {
                            if (localStorage.getItem('sidebar-left-position') !== null) {
                                var initialPosition = localStorage.getItem('sidebar-left-position'),
                                    sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                                sidebarLeft.scrollTop = initialPosition;
                            }
                        }
                    </script>


                </div>

            </aside>
            <!-- end: sidebar -->

            <!-- main page by arafat  -->
            <section role="main" class="content-body">
                <!-- breadcrumb arafat arafat.dml@gmail.com-->
                <header class="page-header">
                    <h2>Dashboard</h2>

                    <div class="right-wrapper text-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="index.html">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li><span>Dashboard</span></li>
                            <li><span></span></li>
                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
                    </div>
                </header>
                <!-- end breadcrumb arafat arafat.dml@gmail.com-->

                <?php echo $__env->make("admin.elements.admin_flash", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->yieldContent("content"); ?>
            </section>
            <!-- end main page by arafat -->
        </div>
        <!-- end inner-wrapper arafat | arfat.dml@gmail.com web_lover in fiverr  -->

        <!-- arafat sidebar wrapper  -->
        <aside id="sidebar-right" class="sidebar-right">
            <div class="nano">
                <div class="nano-content">
                    <a href="#" class="mobile-close d-md-none">
                        Collapse <i class="fas fa-chevron-right"></i>
                    </a>

                    <div class="sidebar-right-wrapper">

                        <div class="sidebar-widget widget-calendar">
                            <h6>Upcoming Tasks</h6>
                            <div data-plugin-datepicker data-plugin-skin="dark"></div>

                            <ul>
                                <li>
                                    <time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
                                    <span>Company Meeting</span>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-widget widget-friends">
                            <h6>Friends</h6>
                            <ul>
                                <li class="status-online">
                                    <figure class="profile-picture">
                                        <img src="<?php echo e(URL::asset('public/adminAssets/img/!sample-user.jpg')); ?>" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-online">
                                    <figure class="profile-picture">
                                        <img src="<?php echo e(URL::asset('public/adminAssets/img/!sample-user.jpg')); ?>" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-offline">
                                    <figure class="profile-picture">
                                        <img src="<?php echo e(URL::asset('public/adminAssets/img/!sample-user.jpg')); ?>" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-offline">
                                    <figure class="profile-picture">
                                        <img src="<?php echo e(URL::asset('public/adminAssets/img/!sample-user.jpg')); ?>" alt="Joseph Doe" class="rounded-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </aside>
        <!-- end arafat sidebar wrapper -->
    </section>
<!-- start footer arafat | arafat.dml@gmail.com web_lover in fiverr -->
<!-- Vendor -->

<script src="<?php echo e(URL::asset('public/adminAssets/vendor/jquery/jquery.js')); ?>"></script>

<script src="<?php echo e(URL::asset('public/affiliateByArafatAssets/js/moment.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('public/adminAssets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/popper/umd/popper.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/bootstrap/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/common/common.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/nanoscroller/nanoscroller.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/magnific-popup/jquery.magnific-popup.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/jquery-placeholder/jquery.placeholder.js')); ?>"></script>

<!-- Specific Page Vendor -->
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/select2/js/select2.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/datatables/media/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js')); ?>"></script>


<!--(remove-empty-lines-end)-->

<!-- Theme Base, Components and Settings -->
<script src="<?php echo e(URL::asset('public/adminAssets/vendor/summernote/summernote-bs4.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/js/theme.js')); ?>"></script>

<!-- Theme Custom -->
<script src="<?php echo e(URL::asset('public/adminAssets/js/custom.js')); ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo e(URL::asset('public/adminAssets/js/theme.init.js')); ?>"></script>

<!-- Examples -->



<script src="<?php echo e(URL::asset('public/affiliateByArafatAssets/js/daterangepicker.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('public/affiliateByArafatAssets/js/clipboard.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('public/themeAssets/js/intlTelInput.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/js/theme.js')); ?>"></script>
<script src="<?php echo e(URL::asset('public/adminAssets/js/theme.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('public/affiliateByArafatAssets/js/custom.js')); ?>"></script>


<!-- end footer arafat | arafat.dml@gmail.com web_lover in fiverr -->

<!-- Dynamically keep the track of active nav bar -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $('.datatable-arafat').DataTable({
     responsive: {
       details: {
         // type: 'column',
         display: $.fn.dataTable.Responsive.display.modal( {
                         header: function ( row ) {
                             var data = row.data();
                             return 'Details for '+data[0]+' '+data[1];
                         }
                     } ),
         renderer: function ( api, rowIdx, columns ) {
             var data = $.map( columns, function ( col, i ) {
                 return '<tr>'+
                         '<td>'+col.title+':'+'</td> '+
                         '<td>'+col.data+'</td>'+
                     '</tr>';
             } ).join('');

             return $('<table width="100%"/>').append( data );
         }
       }
     },
     // columnDefs: [{
     //   className: 'control',
     //   orderable: false,
     //   targets: 0
     // }],
     // order: [1, 'asc'],

    });


</script>

<script>
    $(document).ready(function(){
        /***************************************************
        || This Will add the nav-active Class
        || On the Parent of Module Name li class
        || And the a parent li class
        || This All is Based on the Current url
        || It Match the website current url with menu href url
        || In the Menu, if match it will add the class
        || .nav-link is the href url class
        || it is adding the 1st and 3rd parent
        || all parent are in --> li tag
        || @author  arafat | arafat.dml@gmail.com
        || web_lover in fiverr
        || ***************************************************
        */
        $('.nav-link').filter(function(){
          return window.location.href.includes($(this).attr('href'));
        }).parents().addClass('nav-active').parents().addClass("nav-active nav-expanded");


        // for summer note
        $('.summernote').summernote();

        function clear_summernote(){
            $('.summernote').summernote('code', '<p><br></p>');
        }

    });
</script>


<?php echo $__env->yieldPushContent("script"); ?>
</body>
</html>