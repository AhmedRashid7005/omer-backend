@extends('template.ar_template')
@section('title', 'المتسوق الشخصي')
@section('content')



    <!--section-1 -->
        <section class="other_nav_link" style="position: relative; top: 160px;">
            <div id="section-advantages">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row flex-column-reverse flex-lg-row py-3 my-md-3">

                            <div class="col-md-5  col-12 text-left mb-3 " >
                                 <img class="figure-img img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/sites1.png">
                            </div>

                            <div class="col-md-7 my-auto col-12 text-right "dir="rtl" >
                                <h4>المتسوق الشخصي </h4>
                              <p>
                                نتسوق من أجلك<br>
                            إذا كنت تواجه مشكلة في التسوق عبر الإنترنت، فيمكننا التسوق نيابة عنك، نحن قادرون على شراء العديد من المنتجات التي من الصعب الحصول عليها من مختلف تجار التجزئة أو الجملة على الإنترنت كما يمكنك طلب أي سلعة وبأي حجم وأي لون وبالكمية التي تتمناها من أي بائع تريده
                              </p>
                              <div class="btn-danger rounded-1 px-4 py-2 w-100  ">
                                <a class="text-decoration-none text-light  font-weight-bold" href="{{route('formPersonalShopperAr')}}">الدخول للخدمة </a>
                            </div>

                            </div>
                    </div>
                </div>
                <!-- container -->
            </div>
        </section>
    <!--section-1 -->




        <!--section-2 -->
            <section class="section-2" style="margin-top: 120px;">
                <!-- container -->
                    <div class="container">
                        <div class="row py-3 my-md-3">
                            <div class="col-md-6  col-12 my-auto text-right">
                                <p class="text-primary">لا تتكلم الإنكليزية ؟ ليس لديك طرق دفع عالمية؟ المتاجر التي تعجبك لا تقبل بالدفع عن طريق بطاقات إئتمان من بنوك خارجية أو لا تقدم خدمة الإرسال إلى العنوان المطلوب أو عن طريق شركة معينة أو البائع يطلب اتفاقيات خاصة؟ لا تريد أن تضيع الكثير من وقتك في عملية التسوق؟
                                    خدمة «المتسوق الشخصي» من الوصول المضمون سوف تحل لك هذه المشكلات: فقط عليك أن تقوم بطلب ذلك عن طريق حسابك الخاص في موقعنا بشكل سهل ومريح، وبناءً على ذلك نحن نقوم بالتسوق عنك وشراء أغراضك التي تريدها عن طريق الإنترنت ونرسلها إلى جناحك الخاص في مستودعنا بالرياض</p>
                            </div>
                            <div class="col-md-6 col-12 ">
                                <div class="p-5"><img class="img-fluid w-75 mx-auto d-block" src="{{ URL::asset('public/themeAssets')}}/images/chineseonly-1.png" alt=""></div>
                            </div>
                            <div class="col-12 text-primary col-12 text-center " >
                                <h5 class="my-3 text-blue">مرحبا" إلى خدمتنا! هل هذه هي المرة الأولى التي تطلب فيها المساعدة في الشراء؟ </h5>
                                <h4>إذاً أنت في المكان الصحيح! فقد تم تصميم هذه <br>.. الخدمة خصيصاً من أجلك</h4>
                            </div>

                        <!-- col-md-7 -->
                            <div class="col-md-7 my-auto col-12 text-right text-primary "dir="rtl" >
                                <div class="mt-4">
                                    <p></i>كل ما عليك فعله هو إضافة رابط المنتج وبعض التفاصيل في النموذج المخصص (يمكنك إضافة روابط بعدد لا محدود)، أو يمكنك إضافة المنتجات التي تريدها إلى سلة المشتريات في الموقع الذي تريد الشراء منه، ثم تمنحنا بيانات الدخول للموقع لنقوم بشراء السلة مباشرة، ثم نزودك بكافة التفاصيل مع تكلفة الشحن ومدة التسليم.</p><br>
                                    <p></i> تنويه: هذه الخدمة متاحة فقط عند وجود رابط خاص بالمنتج الذي تريد شراؤه. إذا لم يكن لديك رابط، يمكنك التوجه لصفحة <a href="{{route('importSolutionsAr')}}" class="text-blue" >حلول الإستيراد</a>.</p>
                                </div>
                            </div>
                        <!-- /col-md-7 -->

                        <!-- col-md-5 -->
                            <div class="col-md-5  col-12 text-left pt-2" >
                                <img class="figure-img img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/come.png">
                            </div>
                        <!-- /col-md-5 -->
                        </div>
                    </div>

                <!-- End container-->
            </section>
         <!--section-2 -->





        <!--section-3 -->
            <section class="section-3">
                <!-- container -->
                    <div class="container">

                        <div class="row py-3 my-md-3">

                            <h1 class="col-12 text-blue text-center"> أي عميل أنت؟</h1>
                        <!-- col-md-5 -->
                             <div class="col-md-5 col-12 text-left" >
                                <img class="figure-img img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/143-1@2x.jpg">
                            </div>
                        <!-- col-md-5 -->

                        <!-- col-md-7 -->
                            <div class="col-md-7 my-auto col-12  "dir="rtl" >
                                <div class="d-flex text-right">
                                    <div class="mt-md-5 ">
                                        <img class="w-75 " src="{{ URL::asset('public/themeAssets')}}/images/custm (2).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h2 class="text-primary mt-md-5">العملاء المحليين (داخل المملكة فقط)</h2>
                                        <p class="text-primary font-weight-bold"> إذا كنت من داخل المملكة العربية السعودية فيمكنك شراء المنتجات من أي موقع إلكتروني موثوق، محلي أو عالمي.</p>
                                    </div>
                                </div>

                                <div class="d-flex text-right">
                                    <div class="text-primary mt-md-5 ">
                                        <img class="w-75" src="{{ URL::asset('public/themeAssets')}}/images/custm (1).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h2 class="text-primary mt-md-5">جميع العملاء (داخل وخارج المملكة)</h2>
                                        <p class="text-primary font-weight-bold"> إذا كنت من خارج المملكة العربية السعودية، فيمكنك شراء المنتجات من المواقع الالكترونية المحلية داخل السعودية فقط.</p>
                                    </div>
                                </div>
                            </div>
                        <!-- /col-md-7 -->

                        </div>
                    </div>

                <!-- End container-->
            </section>
        <!--End section-3 -->


        <!--section-4 -->
            <section class="section-4">
                <!-- Start container-->
                <div class="container">

                    <div class="row py-3 my-3">
                        <!-- col-12 -->
                            <div class="col-12 text-center">
                                <h1 class="text-primary">رسوم الخدمة</h1>
                                <p class="text-primary font-weight-bold">.عمولة ثابتة: قدرها 49 ريال سعودي، إذا كانت قيمة المشتريات 500 ريال أو أقل</p>
                                <p class="text-primary font-weight-bold">.عمولة نسبية: قدرها 7% من إجمالي قيمة المشتريات، إذا كانت قيمة المشتريات أكثر من  500 ريال</p>
                            </div>
                        <!-- /col-12 -->

                        <h3 class="col-12 text-blue text-center mt-md-4">كيف أستخدم خدمة شراء المنتجات من المواقع العالمية؟</h3>

                        <!-- col-md-6 -->
                            <div class="col-md-6 col-12 text-right text-primary my-auto "dir="rtl" >
                                <!-- div-->
                                <div class="d-flex text-right">
                                    <div class="mt-2 ml-md-4" style="width: 50px;">
                                        <img class="figure-img img-fluid  " src="{{ URL::asset('public/themeAssets')}}/images/iconbos (0).png" alt="">
                                    </div>

                                    <div>
                                        <h6 class="mt-2">1-  رابط المنتج: </h6>
                                        <p class="text-primary font-weight-bold"> توجه إلى الموقع الذي تريد شراء المنتج منه، وقم بنسخ رابط المنتج.</p>
                                    </div>
                                </div>
                                <!--/ div-->

                                <!-- div-->
                                <div class="d-flex text-right">
                                    <div class="mt-2 ml-md-4  " style="width: 50px;">
                                        <img class="figure-img img-fluid " src="{{ URL::asset('public/themeAssets')}}/images/iconbos (2).png" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mt-2">2- قم بملء النموذج: </h6>
                                        <p class="text-primary font-weight-bold"> الصق الرابط مع بعض التفاصيل في النموذج، ثم أرسل الطلب.</p>
                                    </div>
                                </div>
                                <!--/ div-->

                                <!-- div-->
                                <div class="d-flex text-right">
                                    <div class="mt-2 ml-md-4 "style="width: 50px;">
                                        <img class="figure-img img-fluid " src="{{ URL::asset('public/themeAssets')}}/images/iconbos (3).png" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mt-2">3- مراجعة الطلب: </h6>
                                        <p class="text-primary font-weight-bold">سيتم مراجعة الطلب، وتزويدك بفاتورة تشمل الرسوم ومدة التوصيل.</p>
                                    </div>
                                </div>
                                <!--/ div-->

                                <!-- div-->
                                <div class="d-flex text-right">
                                    <div class="mt-2 ml-4"style="width: 50px;">
                                        <img class="figure-img img-fluid " src="{{ URL::asset('public/themeAssets')}}/images/iconbos(4).png" alt="">
                                    </div>
                                    <div >
                                        <h6 class="mt-2">4- دفع المبلغ: </h6>
                                        <p class="text-primary font-weight-bold">سجل الدخول لحسابك، وادفع مبلغ الطلبية دفعة كاملة أو دفعة مقدمة.</p>
                                    </div>
                                </div>
                                <!--/ div-->

                                <!-- div-->
                                <div class="d-flex text-right">
                                    <div class="mt-2 ml-4"style="width: 50px;">
                                        <img class=" figure-img img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/iconbos (5).png" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mt-2">5- شراء الطلبية: </h6>
                                        <p class="text-primary font-weight-bold">نقوم بشراء المنتجات المحددة، ونزودك بالفاتورة الإلكترونية للشراء.</p>
                                    </div>
                                </div>
                                <!--/ div-->

                                <!-- div-->
                                <div class="d-flex text-right">
                                    <div class="mt-2 ml-4"style="width: 50px;">
                                        <img class=" figure-img img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/iconbos (6).png" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mt-2">6- اشحن الطلبية: </h6>
                                        <p class="text-primary font-weight-bold">اطلب شحن الطلبية إلى باب منزلك عبر لوحة التحكم الخاص بك.</p>
                                    </div>
                                </div>


                                <div class="btn-danger rounded-1 px-4 py-2 w-100 mt-4 ">
                                    <a class="text-decoration-none text-light  font-weight-bold" href="#">طلب شراء الآن</a>
                                </div>
                            </div>
                        <!-- /col-md-6 -->

                        <!-- col-md-6 -->
                            <div class="col-md-6  col-12 text-left my-5 hidden-sm-down" >
                                <img class="figure-img img-fluid  mx-auto d-block" src="{{ URL::asset('public/themeAssets')}}/images/luna-about4 copy.png">

                            </div>
                        <!-- /col-md-6 -->



                    </div>
                    <!--/ ROW-->

                </div>
                <!-- End container-->
            </section>
        <!--End section-4 -->




@endsection