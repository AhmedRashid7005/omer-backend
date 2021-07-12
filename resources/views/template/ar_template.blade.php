<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link type="icon" href="">
    <title>@yield('title')</title>

    <!-- START SEO SECTION AND META TAG -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="وسيط للطلب من المواقع العالمية، توفير عنوان امريكي وصيني، توفير عنوان سعودي، استيراد من السعودية وامريكا والصين، وسيط شراء من امريكا،
         وسيط شراء من الصين، ، تسهيل الشراء من المواقع العالمية، الطلب من امازون، الطلب من ايباي، طلب شراء من علي اكسبريس ، طلب شراء من علي بابا، تكلفة شحن منخفض
         من امريكا، تكلفة شحن منخفض من الصين، شحن دولي منخفض، توفير عنوان أمريكي، حماية البائع والمشتري، إعادة توجيه الشحنة
         من امريكا، إعادة الشحن، من الصين، جناح خاص امريكي وصين، بريد امريكي ، بريد صيني،
         رسوم شحن منخفض، موقع اعادة شحن، شراء من امريكا والصين، مقارنة بين شواب اند
         شيب و ماي يو اس، ارخص شركة شحن، ارخص تكلفة شحن من أمريكا والصين، استيراد بدون ضريبة، التخليص الجمركي، شراء من الرياض ، وسيط شراء
         قطع غيار السيارات، شراء قطع غيار السيارات، ارخص قطع غيار السيارات،
         شراء من الرياض، تكلفة شحن داخلي منخفض جدا،">
        <meta name="keyword" content="shop , Shopping, buy,sale,trade,Saudi Pavilion
        ,Deliver products,Saudi Company
        التسوق , الشراء ,التجارة,توصيل المنتجات">
        <meta name="copmany" content="Saudi Pavilion">
        <meta name="url" content="">
    <!-- END SEO SECTION -->

    <!-- START CSS FILE -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('themeAssets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('themeAssets/css/style-ar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('themeAssets/css/media.css') }}">
    <!-- END CSS FILE -->
    <!-- add by arafat -->
    @stack("css")
    <!-- end add by arafat arafat.dml@gmail.com -->
</head>
<body>

    <span id="onpaste"></span>

    <a id="button-up"></a>
    <!-- Start Nav bar md -->

    <div class="top-nav position-fixed w-100 d-s-none " dir="rtl" style="top: 0px;">
        <div class="navbar navbar-expand-lg navbar-dark ">
        <div class="container">
            <a class="navbar-brand  text-right " href="{{route('homeAr')}}"><img class="w-75 text-right" src="{{ URL::asset('themeAssets')}}/images/logo-ar.png" alt=""> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSite" aria-controls="navbarSite" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse  " id="navbarSite">
                <ul class="navbar-nav ml-auto w-100 justify-content-lg-between">

                    <li class="nav-item active">
                        <a class="nav-link text-decoration-none" href="{{route('homeAr')}}">الرئيسية </a>
                    </li>


                    <li class="nav-item list-unstyled  ">
                        <div class="dropdown">
                            <button class="nav-link mx-auto dropdown-toggle"
                                type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                خدماتنا
                            </button>
                            <div class="dropdown-menu text-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('personalShopperAr')}}">المتسوق الشخصي </a>
                            <a class="dropdown-item" href="{{route('importSolutionsAr')}}">حلول الاستيراد </a>
                            <a class="dropdown-item" href="{{route('makeAnOrderToPurchaseAutoPartsAr')}}">طلب قطع غيار السيارات </a>
                            <a class="dropdown-item" href="{{route('buyerSellerProtectionServiceAr')}}">خدمة حماية البائع والمشتري </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item list-unstyled  ">
                        <div class="dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">العناويين الخاصة</a>
                        <ul class="dropdown-menu text-right">
                            <li><a class="dropdown-item" href="{{route('subscriptionPlansAr')}}">خطط الاشتراك</a></li>
                            <li><a class="dropdown-item" href="{{route('addressesUsaChinaAr')}}">العنوان الأمريكي والصيني</a></li>
                            <li><a class="dropdown-item" href="{{route('addressKsaInternationalAr')}}">العنوان السعودي - عالمي</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="{{route('globalServicesAr')}}">خدمات عالمية  </a>
                    </li>

                    <li class="nav-item">
                        <!-- previous link was Calculator-AR.html -->
                        <a class="nav-link text-decoration-none  " href="{{route("calculatorAr")}}">الحاسبة </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="{{route('homeAr')}}"><img class="language" src="{{ URL::asset('themeAssets')}}/images/SA3.png"/>  </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="Home.html"><img class="language" src="{{ URL::asset('themeAssets')}}/images/USA2.png"/> </a>
                    </li>
 --}}

                    <li class="btn-danger rounded-1 px-4 py-2 ">
                        <a class=" text-decoration-none text-light  font-weight-bold" href="{{route('subscriptionPlansAr')}}">التسجيل </a>
                    </li>


                </ul>

            </div>
        </div>
        </div>

        <div class="other_nav_link">
        <div class="border-top ">
            <div class="container py-2">

                <div class="row w-100 mx-auto font-weight-bolder">

                 <!--  <div class=" col-md col-4  px-1  text-center">
                        <a class="nav-link  pl-0 pr-0 text-decoration-none  " href="Blog-AR.html">مدونة</a>
                </div> -->
                    <div class=" col-md col-4 px-1 text-center">
                            <a class="nav-link pl-0 pr-0 text-decoration-none  " href="{{route('featuresAr')}}">المميزات</a>
                    </div>
                    <div class=" col-md col-4 px-1 text-center">
                            <a class="nav-link pl-0 pr-0 text-decoration-none  " href="{{route('insuranceSolutionAr')}}">حلول التأمين</a>
                    </div>

                    <div class=" col-md col-4 px-1  text-center">
                        <a class="nav-link pl-0 pr-0 text-decoration-none  " href="{{route("affiliateAr")}}">افليت </a>
                </div>

                    <div class=" col-md col-4  px-1 text-center">
                        <!-- link was List-stores-AR.html -->
                            <a class="nav-link pl-0 pr-0 text-decoration-none  " href="{{route('storeAr')}}">تصفح المتاجر </a>
                    </div>
                         <div class=" col-md col-4 px-1  text-center">
                            <!-- link was Tracking-AR.html -->
                        <a class="nav-link pl-0 pr-0 text-decoration-none  " href="javascript:void()">تتبع الطلبات</a>
                        </div>
                    <div class=" col-md col-4  px-1  text-center">
                        <!--  link was -> Rate-service-AR.html -->
                        <a class="nav-link pl-0 pr-0 text-decoration-none  "  href="javascript:void()">التقييمات  </a>
                </div>

                    <div class="btn-danger rounded-1 px-2 py-1 ">
                        <a class="nav-link py-1 text-decoration-none text-light" href="{{route('loginAr')}}">دخول</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- border-top -->

        </div>

     </div>
   <!--  End Nav bar md -->


   <!-- Start Nav bar sm -->
    <div class="top-nav w-100  d-md-none " dir="rtl" >
        <div class="navbar navbar-expand-lg navbar-dark ">
        <div class="container">
            <a class="navbar-brand  text-right " href="{{route('homeAr')}}"><img class="w-75 text-right" src="{{ URL::asset('themeAssets')}}/images/logo-ar.png" alt=""> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSite-Sm" aria-controls="navbarSite-Sm" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse  " id="navbarSite-Sm">
                <ul class="navbar-nav ml-auto w-100 justify-content-lg-between">

                    <li class="nav-item active">
                        <a class="nav-link text-decoration-none" href="{{route('homeAr')}}">الرئيسية </a>
                    </li>


                    <li class="nav-item list-unstyled  ">
                        <div class="dropdown">
                            <button class="nav-link mx-auto dropdown-toggle"
                                type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                خدماتنا
                            </button>
                            <div class="dropdown-menu text-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('personalShopperAr')}}">المتسوق الشخصي </a>
                            <a class="dropdown-item" href="{{route('importSolutionsAr')}}">حلول الاستيراد </a>
                            <a class="dropdown-item" href="{{route('makeAnOrderToPurchaseAutoPartsAr')}}">طلب قطع غيار السيارات </a>
                            <a class="dropdown-item" href="{{route('buyerSellerProtectionServiceAr')}}">خدمة حماية البائع والمشتري </a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item list-unstyled  ">
                        <div class="dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">العناويين الخاصة</a>
                        <ul class="dropdown-menu text-right">
                            <li><a class="dropdown-item" href="{{route('subscriptionPlansAr')}}">خطط الاشتراك</a></li>
                            <li><a class="dropdown-item" href="{{route('addressesUsaChinaAr')}}">العنوان الأمريكي والصيني</a></li>
                            <li><a class="dropdown-item" href="{{route('addressKsaInternationalAr')}}">العنوان السعودي - عالمي</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="{{route('globalServicesAr')}}">خدمات عالمية  </a>
                    </li>

                    <li class="nav-item">
                        <!-- previous link was -> Calculator-AR.html -->
                        <a class="nav-link text-decoration-none  " href="{{route("calculatorAr")}}}">الحاسبة </a>
                    </li>





                    <li class="nav-item">
                        <a class="nav-link pl-0 pr-0 text-decoration-none  " href="{{route('featuresAr')}}">المميزات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-0 pr-0 text-decoration-none  " href="{{route('insuranceSolutionAr')}}">حلول التأمين</a>
                    </li>


                        <li class="nav-item">
                            <a class="nav-link pl-0 pr-0 text-decoration-none  " href="javascript:void()">افليت </a>
                           </li>


                        <li class=" nav-item">
                            <!-- link was List-stores-AR.html -->
                        <a class="nav-link pl-0 pr-0 text-decoration-none  " href="{{route('storeAr')}}">تصفح المتاجر  </a>
                    </li>

                        <li class=" nav-item">
                        <!-- link was Tracking-AR.html -->
                        <a class="nav-link pl-0 pr-0 text-decoration-none  "  href="javascript:void()">تتبع الطلبات  </a>
                       </li>

                       <!--  link was -> Rate-service-AR.html -->
                        <li class=" nav-item">
                        <a class="nav-link pl-0 pr-0 text-decoration-none  "  href="javascript:void()">التقييمات  </a>
                        </li>


                    <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="{{route('homeAr')}}"><img class="language" src="{{ URL::asset('themeAssets')}}/images/SA3.png"/>  </a>
                    </li>

                  {{--   <li class="nav-item">
                        <a class="nav-link text-decoration-none  " href="Home.html"><img class="language"  src="{{ URL::asset('themeAssets')}}/images/USA2.png"/> </a>
                    </li> --}}
                </ul>

            </div>
        </div>
        </div>

        <div class="other_nav_link">
        <div class="border-top ">
            <div class="container">

                <div class="row   w-100 py-2">
                    <div class="col-6">
                      <div class=" btn-danger rounded-1  w-75">
                        <a class="nav-link  text-decoration-none text-light" href="{{route('loginAr')}}">  دخول </a>
                    </div>
                    </div>

                    <div class="col-6">
                    <div class="btn-danger rounded-1  pt-2 w-75">
                    <a class=" text-decoration-none  text-light  font-weight-bold" href="{{route('subscriptionPlansAr')}}">التسجيل </a>
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
                <img src="{{ URL::asset('themeAssets')}}/images/man01.png">
              </div>
              <div class="col-lg-12 col-sm-12 col-12 user-name">
                <h1>احصل على آخر الأخبار  </h1>
                <button type="button" class="close" data-dismiss="modal">×</button>
              </div>
              <div class="col-lg-12 col-sm-12 col-12 form-input">
                <form>
                  <div class="form-group">
                    <input oninvalid="InvalidMsg(this);"
                    oninput="InvalidMsg(this);"
                    required="required"  type="text" class="form-control" placeholder="الأسم" dir="rtl">
                  </div>
                  <div class="form-group">
                    <input oninvalid="InvalidMsg(this);"
                    oninput="InvalidMsg(this);"
                    required="required"type="email" class="form-control" placeholder="ايميل" dir="rtl">
                  </div>
                  <button type="submit" class="btn btn-primary">أشتراك</button>
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

            @if( Route::is('homeAr') )
            <!--col-md-3 -->
                <div class="col-md-3 col-12">

                    <div class="social-link text-center">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    </div>
                    <div class="text-center my-3">

                    <div class="rounded-1 open-modal px-2 py-2 w-auto ">
                        <a  href="#myModal" class="btn btn-danger trigger-btn"  data-toggle="modal">  اشتراك آخر الاخبار  </a>
                    </div>
                    </div>
                </div>
            <!--col-md-3 -->

        <div class="col-md-3 text-center col-12">
            <!-- for home page only -->
            <div class="pages pb-3">

                <img src="{{ URL::asset('themeAssets')}}/images/ImageCr.png" class="img-fluid w-100 h-100 " style="  height: 250px; !important;   "  >
        </div>
        <!-- end for home page only -->
        </div>
            <!--col-md-3 -->
            <div class="col-md-3 col-12 text-md-right text-center ">
                <div class="pages text-light  ">
                   <p>
                    7918 نجران - حي قرطبة، الرياض 13245 – 4007، المملكة العربية السعودية
                     <br>
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
                <div class="col-md-3 col-12 text-right">
                    <div class="pages text-md-right text-center py-2">
                        <img class="img-fluid" style="width: 250px;" src="{{ URL::asset('themeAssets')}}/images/code-Qr.png" alt="">
                    </div>
                </div>
            <!--col-md-3 -->

            @else

              <!--col-md-3 -->
                  <div class="col-md-3 col-12">

                      <div class="social-link text-center">
                          <a href="#"><i class="fab fa-twitter"></i></a>
                          <a href="#"><i class="fab fa-facebook"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fab fa-google-plus-g"></i></a>
                      </div>
                      <div class="text-center my-3">

                      <div class="rounded-1 open-modal px-2 py-2 w-auto ">
                          <a  href="#myModal" class="btn btn-danger trigger-btn"  data-toggle="modal">  اشتراك آخر الاخبار  </a>
                      </div>

                      </div>
                  </div>
              <!--col-md-3 -->


              <!--col-md-3 -->
              <div class="col-md-3 col-12 text-right">
                  <!-- for other pages  -->
                  <div class="pages">
                      <ul>
                          <!-- previous link was Tracking-AR.html -->
                          <li><a href="{{route('disputeAr')}}">النزاعات</a></li>
                          <li><a href="{{route('forbiddensAr')}}">الممنوعات</a></li>
                          <li><a href="{{route('websiteDevelopmentAr')}}">تطوير الموقع</a></li>
                          <li><a href="{{route('proofOfMoneyTransferAr')}}">اثبات تحول المبلغ</a></li>
                      </ul>
                  </div>
                  <!-- end for other pages -->
              </div>
            <!--col-md-3 -->

              <!--col-md-3 -->
                  <div class="col-md-3 col-12 text-right">
                      <div class="pages">
                          <ul>

                             <li><a href="{{route('contactUsAr')}}">اتصل بنا</a></li>
                             <li><a href="javascript:void()">الأسئلة الشائعة</a></li>
                             <li><a href="{{route('termsConditionsAr')}}">الشروط والأحكام</a></li>
                             <li><a href="{{route('privacyPolicyAr')}}">سياسة الخصوصية</a></li>

                          </ul>
                      </div>
                  </div>
              <!--col-md-3 -->

              <!--col-md-3 -->
                  <div class="col-md-3 col-12 text-right">
                      <div class="pages">
                          <ul>

                              <li><a href="javascript:void()">الحقوق</a></li>
                              <li><a href="{{route('aboutUsAr')}}">من نحن</a></li>
                              <li><a href="javascript:void()">وسائل الدفع</a></li>
                              <li><a href="{{route('chargingSystemAr')}}">الشحن والتوصيل</a></li>

                          </ul>
                      </div>
                  </div>
              <!--col-md-3 -->

            @endif
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
                        <p class="text-light mt-1">جميع الحقوق محفوظ لمؤسسة الوصول المضمون للتجارة    </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- End Footer -->





            <!-- START JS FILE -->

            <script src='https://kit.fontawesome.com/a076d05399.js'></script>
            <script src="{{ URL::asset('themeAssets/js/jquery-3.2.1.slim.min.js') }}" ></script>
            <script src="{{ URL::asset('themeAssets/js/popper.min.js') }}"></script>
            <script src="{{ URL::asset('themeAssets/js/bootstrap.min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('themeAssets/js/wow.min.js') }}"></script>
            <script>
                new WOW().init();
            </script>

            <!-- End JS FILE -->
           
            <script type="text/javascript" src="{{ URL::asset('themeAssets/js/jquery-3.4.1.min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('themeAssets/js/main.js') }}"></script>

            <script src="{{ URL::asset('affiliateByArafatAssets/js/clipboard.min.js') }}"></script>
            
            <!-- custom page script  arafat-->
            @stack('script')
            <!-- end custom page script by arafat -->
    </body>
    </html>