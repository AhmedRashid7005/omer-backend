<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link type="icon" href="">
    <title>@yield('title')</title>

        <!-- START SEO SECTION AND META TAG -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Broker to order from international sites, provide an American and Chinese address, provide a Saudi address, import from Saudi Arabia, America and China, buy broker from America, buy broker from China, facilitate purchase from global sites, order from Amazon, order from eBay, order from Ali Express, order from Ali baba, order from walmart, low shipping cost from China, low shipping cost from China, low international shipping cost, provision of U.S. address, buyer protection, re-shipping from America, re-shipping from Us, China, Special Suite, China, China, China, Special U.S. Mail, Chinese Mail, Low Shipping Fees, Recharging Site, Purchase from America and China, Comparison between shopandship and MyUS, Cheaper Shipping Company, Cheaper Shipping Cost from Us and china, Import Without Tax, Customs Clearance, Purchase from Riyadh, Auto Parts Broker, Auto Parts Purchase, Cheaper Auto Parts, Purchase from Riyadh, Very Low Internal Shipping Cost">
        <meta name="keyword" content="shop , Shopping, buy,sale,trade,Saudi Pavilion
        ,Deliver products,Saudi Company ">
        <meta name="copmany" content="Saudi Pavilion">
        <meta name="url" content="">
        <!-- END SEO SECTION -->


    <!-- START CSS FILE -->
    <link href="{{ URL::asset('themeAssets/css/bootstrap.min.css') }}"  rel="stylesheet">
    <link href="{{ URL::asset('themeAssets/css/style-en.css') }}"  rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="{{ URL::asset('themeAssets/css/css/media.css') }}"  rel="stylesheet">
    <!-- END CSS FILE -->

    <style>
        p{padding-top: 0.5rem ;
            margin-bottom: .2rem ;
        }
    </style>
</head>
<body>


    <a id="button-up"></a>
    <!-- Start Nav bar md -->

    <div class="top-nav position-fixed w-100 d-s-none "  style="top: 0px;">
        <div class="navbar navbar-expand-lg navbar-dark ">
        <div class="container">
            <a class="navbar-brand  text-left " href="{{route("homeEn")}}"><img class="w-75 text-right" src="{{ URL::asset('public/themeAssets')}}/images/logo w b.png" alt=""> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSite" aria-controls="navbarSite" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSite">
                <ul class="navbar-nav ml-auto w-100 justify-content-lg-between">

                    <li class="nav-item active">
                        <a class="nav-link text-decoration-none"  href="{{route("homeEn")}}">Home </a>
                    </li>


                    <li class="nav-item list-unstyled  ">
                        <div class="dropdown">
                            <button class="nav-link mx-auto dropdown-toggle"
                                type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Our service
                            </button>
                            <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route("PersonalShopperEn")}}">Personal Shopper</a>
                            <a class="dropdown-item" href="Import-solutions.html">Import solutions </a>
                            <a class="dropdown-item" href="Make-an-Order-to-purchase-auto-parts.html">Order to auto parts </a>
                            <a class="dropdown-item" href="Buyer&seller-protection-service.html">Buyer & seller protection</a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item list-unstyled  ">
                        <div class="dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Special addresses</a>
                        <ul class="dropdown-menu text-left">
                            <li><a class="dropdown-item" href="Subscription-plans.html">Subscription plans</a></li>
                            <li><a class="dropdown-item" href="Addresses-in-the-USA&china.html">Addresses in the USA & china</a></li>
                            <li><a class="dropdown-item" href="Address-in-the-KSA-International.html">Address in the KSA - Global</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="Global-services.html">Global services  </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="Calculator.html">Calculator </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link text-decoration-none" href="../ar/Home-AR.html"><img class="language" src="{{ URL::asset('public/themeAssets')}}/images/SA3.png"/>  </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="{{route("homeEn")}}"><img class="language" src="{{ URL::asset('public/themeAssets')}}/images/USA2.png"/> </a>
                    </li>


                    <li class="btn-danger rounded-1 px-4 py-2 ">
                        <a class=" text-decoration-none text-light  font-weight-bold" href="Subscription-plans.html">Sign Up </a>
                    </li>


                </ul>

            </div>
        </div>
        </div>

        <div class="other_nav_link">
        <div class="border-top ">
            <div class="container py-2">

                <div class="row w-100 mx-auto font-weight-bolder">

                    <div class=" col-md col-4 px-1 text-center">
                            <a class="nav-link pl-0 pr-0 text-decoration-none  " href="Features.html">Features</a>
                    </div>
                    <div class=" col-md col-4 px-1 text-center">
                            <a class="nav-link pl-0 pr-0 text-decoration-none  " href="Insurance-solution.html">Insurance </a>
                    </div>


                <div class=" col-md col-4  px-1  text-center">
                        <a class="nav-link  pl-0 pr-0 text-decoration-none  " href="Affiliate.html">Affiliate </a>
                </div>

                    <div class=" col-md col-4  px-1 text-center">
                            <a class="nav-link pl-0 pr-0 text-decoration-none  " href="List-of-stores.html">Browse stores</a>
                    </div>
                    <div class=" col-md col-4 px-1  text-center">
                        <a class="nav-link pl-0 pr-0 text-decoration-none  " href="Tracking.html">Tracking</a>
                </div>
                    <div class=" col-md col-4  px-1  text-center">
                            <a class="nav-link  pl-0 pr-0 text-decoration-none  " href="Rate-the-service.html">Ratings</a>
                    </div>



                    <div class="btn-danger rounded-1 px-2 py-1 ">
                        <a class="nav-link py-1 text-decoration-none text-light" href="Login.html">Login</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- border-top -->

        </div>

     </div>
  <!--  End Nav bar md -->


   <!-- Start Nav bar sm -->
    <div class="top-nav w-100  d-md-none "  >
        <div class="navbar navbar-expand-lg navbar-dark ">
        <div class="container">
            <a class="navbar-brand  text-right " href="{{route("homeEn")}}"><img class="w-75 text-right" src="{{ URL::asset('public/themeAssets')}}/images/logo w b.png" alt=""> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSite-Sm" aria-controls="navbarSite-Sm" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse  " id="navbarSite-Sm">
                <ul class="navbar-nav ml-auto w-100 justify-content-lg-between">

                    <li class="nav-item active">
                        <a class="nav-link text-decoration-none" href="{{route("homeEn")}}">Home </a>
                    </li>


                    <li class="nav-item list-unstyled  ">
                        <div class="dropdown">
                            <button class="nav-link mx-auto dropdown-toggle"
                                type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Our service
                            </button>
                            <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route("PersonalShopperEn")}}">Personal Shopper</a>
                                <a class="dropdown-item" href="Import-solutions.html">Import solutions </a>
                                <a class="dropdown-item" href="Make-an-Order-to-purchase-auto-parts.html">Order to auto parts </a>
                                <a class="dropdown-item" href="Buyer&seller-protection-service.html">Buyer & seller protection</a>
                                </div>
                        </div>
                    </li>

                    <li class="nav-item list-unstyled  ">
                        <div class="dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Special addresses</a>
                        <ul class="dropdown-menu text-left">
                            <li><a class="dropdown-item" href="Subscription-plans.html">Subscription plans</a></li>
                            <li><a class="dropdown-item" href="Addresses-in-the-USA&china.html">Addresses in the USA & china</a></li>
                            <li><a class="dropdown-item" href="Address-in-the-KSA-International.html">Address in the KSA - Global</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="Global-services.html">Global services </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="Calculator.html">Calculator </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pl-0 pr-0 text-decoration-none  " href="Features.html">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-0 pr-0 text-decoration-none  " href="Insurance-solution.html">Insurance</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  pl-0 pr-0 text-decoration-none  " href="Affiliate.html">Affiliate </a>
                        </li>


                        <li class=" nav-item">
                            <a class="nav-link pl-0 pr-0 text-decoration-none  " href="List-of-stores.html">Browse stores</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pl-0 pr-0 text-decoration-none  " href="Tracking.html">Tracking</a>
                           </li>

                    <li class="nav-item">
                        <a class="nav-link  pl-0 pr-0 text-decoration-none  " href="Clint ratings.html">Ratings</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="../ar/Home-AR.html"><img class="language" src="{{ URL::asset('public/themeAssets')}}/images/SA3.png"/>  </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="{{route("homeEn")}}"><img class="language" src="{{ URL::asset('public/themeAssets')}}/images/USA2.png"/> </a>
                    </li>
                </ul>

            </div>
        </div>
        </div>

        <div class="other_nav_link">
        <div class="border-top ">
            <div class="container">

                <div class="row   w-100 py-2 mx-3">
                    <div class="col-6">
                      <div class=" btn-danger rounded-1  w-75">
                        <a class="nav-link  text-decoration-none text-light" href="Login.html">  Login </a>
                    </div>
                    </div>

                    <div class="col-6">
                    <div class="btn-danger rounded-1  pt-2 w-75">
                    <a class=" text-decoration-none  text-light  font-weight-bold" href="Subscription-plans.html">Sign Up </a>
                  </div></div>


                </div>
            </div>
        </div>
        <!-- border-top -->

        </div>

     </div>
    <!-- End Nav bar sm  -->

    {{-- add by arafat arafat.dml@gmail.com --}}
    @yield('content')
    {{-- end add by arafat arafat.dml@gmail.com --}}


     <!-- My_model  Footer-->
     <div id="myModal" class="modal fade text-center">
        <div class="modal-dialog">
          <div class="col-lg-10 col-sm-10 col-12 main-section">
            <div class="modal-content">
              <div class="col-lg-12 col-sm-12 col-12 user-img">
                <img src="{{ URL::asset('public/themeAssets')}}/images/man01.png">
              </div>
              <div class="col-lg-12 col-sm-12 col-12 user-name">
                <h1>Get the latest News </h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
              </div>
              <div class="col-lg-12 col-sm-12 col-12 form-input">
                <form>
                  <div class="form-group">
                    <input oninvalid="InvalidMsg(this);"
                    oninput="InvalidMsg(this);"
                    required="required"  type="text" class="form-control" placeholder="Name"  >
                  </div>
                  <div class="form-group">
                    <input oninvalid="InvalidMsg(this);"
                    oninput="InvalidMsg(this);"
                    required="required"type="email" class="form-control" placeholder="email"  >
                  </div>
                  <button type="submit" class="btn btn-primary">Share</button>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    <!--/ My_model -->



    <!-- Start Footer -->
    <div class="footer " style=" margin-top: 80px;">
        <!-- Start container-->
        <div class="bg-blue w-100 h-100">
        <div class="container">

            <div class="row pt-5">
                <!--col-md-3 -->
                <div class="col-md-3 col-12 text-md-left py-2">
                    <div class="pages">
                        <img class="img-fluid" style="width: 250px;" src="{{ URL::asset('public/themeAssets')}}/images/code-Qr.png" alt="">
                    </div>
                </div>
            <!--col-md-3 -->



            <!--col-md-3 -->
            <div class="col-md-3 col-12 text-md-left text-center " dir="ltr">
                <div class="pages text-light ">
                   <p>
                    7918 Najran - qurtobah district, Riyadh 13245 - 4007, Kingdom of Saudi Arabia                 <br>
                     <br>
                    <a href="contact@guarantaccess.com" class="text-primary">contact@guarantaccess.com</a>
                    <br>
                    <br>
                    <a href="support@guarantaccess.com" class="text-primary">support@guarantaccess.com</a>
                   <br>
                   <br>
                     0532417005

                       </p>

                </div>


                </div>
            <!--col-md-3 -->

          <!--col-md-3 -->
          <div class="col-md-3  text-center col-12">

            <div class="pages text-center py-2 ">
            <img src="{{ URL::asset('public/themeAssets')}}/images/ImageCr.png" class="img-fluid w-100 h-100 " style="  height: 250px; !important;   "  >        </div>
        </div>
          <div class="col-md-3 col-12">

            <div class="social-link text-center">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
            </div>
        <div class="text-center my-3">

            <div class="rounded-1 open-modal px-2 py-2 w-auto ">
                <a  href="#myModal" class="btn btn-danger trigger-btn w-auto"  data-toggle="modal">  latest News  </a>
            </div>

        </div>
        </div>
    <!--col-md-3 -->



            </div>

            <div class="row">
                 <div class="mx-auto col-md-5  col-12">
                    <div class="paymentWrap">
                        <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                            <label class=" paymentMethod ">
                                <div class="method visa"></div>
                                <input type="radio" name="options" checked>
                            </label>
                            <label class=" paymentMethod">
                                <div class="method master-card"></div>
                                <input type="radio" name="options">
                            </label>
                            <label class=" paymentMethod">
                                <div class="method amex"></div>
                                <input type="radio" name="options">
                            </label>
                             <label class=" paymentMethod">
                                 <div class="method vishwa"></div>
                                <input type="radio" name="options">
                            </label>
                            <label class=" paymentMethod">
                                <div class="method ez-cash"></div>
                                <input type="radio" name="options">
                            </label>
                            <label class=" paymentMethod">
                                <div class="method ez-cashh"></div>
                                <input type="radio" name="options">
                            </label>

                        </div>
                    </div>
                 </div>
            </div>


        </div>
        <!-- End container-->
        <div class="border-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="text-light mt-1">All rights are reserved for the Guaranteed Access To Trade Corporation   </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- End Footer -->



            <!-- START JS FILE -->

            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
            <script src="{{ URL::asset('public/themeAssets/js/jquery-3.2.1.slim.min.js') }}"></script>
            <script src="{{ URL::asset('public/themeAssets/js/popper.min.js') }}"></script>
            <script src="{{ URL::asset('public/themeAssets/js/bootstrap.min.js') }}"></script>
            <script src="{{ URL::asset('public/themeAssets/js/wow.min.js') }}"></script>
            <script src="{{ URL::asset('public/themeAssets/js/jquery-3.4.1.min.js') }}"></script>
            <script src="{{ URL::asset('public/themeAssets/js/main.js') }}"></script>
            <script>
                new WOW().init();
            </script>
            <!-- End JS FILE -->
    </body>
    </html>