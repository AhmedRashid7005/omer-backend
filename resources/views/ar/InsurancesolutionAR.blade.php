@extends('template.ar_template')
@section('title', 'حلول التأمين')
@section('content')



        <div class="other_nav_link " style=" position: relative; top: 127px;">
                <!-- container -->

                    <div class="container">
                        <div class="row  py-3 my-3">

                            <div class="col-md-6  col-12 text-left" >
                                 <img class="figure-img img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/Order Insurance-01.png">
                            </div>
                            <div class="col-md-6 my-auto col-12 text-right "dir="rtl" >
                                <div class="mt-4">
                                    <h2 class="mt-5">الحالات التي يمكنك فيها طلب تأمين:</h2>
                                    <p class="my-md-3"><i class="fas fa-check-circle text-primary"></i> التأمين على طلبات الشراء من السعودية وأمريكا والصين.</p>
                                    <p class="my-md-3"><i class="fas fa-check-circle text-primary"></i> عند شحن الطلبات من أمريكا والصين إلى السعودية.</p>
                                    <p class="my-md-3"><i class="fas fa-check-circle text-primary"></i> عند توصيل الشحنة محليًاً أو شحنها دوليًاً من السعودية.</p>
                                </div>
                            </div>
                        </div>
                    </div>

               <!-- End container-->
         </div>



    <!--section-1 -->
        <section class="other_nav_link " style=" position: relative; top: 100px;" >
               <div id="section-advantages">
                <!-- container -->
                 <div class="container">
                <div class="text-center my-4">
                    <h3>ما مدى أهمية تأمين الطلبية؟</h3>
                </div>

                    <!-- row -->
                <div class="row">

                    <!-- col-md-4 -->
                    <div class="col-md-4 col-12 text-center">
                        <div class="order text-primary rounded p-2" style="height: 21.8rem;">
                            <a href="#"><img class="figure-img img-fluid w-25"  src="{{ URL::asset('public/themeAssets')}}/images/order2.svg" alt=""></a>
                        <div dir="rtl"> <h4>3- عند توصيل المنتجات محليًاً: </h4>
                        <p>- عند توصيل المنتجات داخليا من الرياض إلى جميع أنحاء المملكة العربية السعودية، فالتأمين مهم بنسبة 80%، وتبلغ تكلفته 2% من قيمة المشتريات.</p>
                    </div>
                    </div>
                    </div>
                    <!-- col-md-4 -->


                    <!-- col-md-4 -->

                    <div class="col-md-4 col-12 text-center ">
                        <div class="order text-primary shadow-lg  p-2 rounded h-auto">
                             <a href="#">
                            <img class="figure-img img-fluid w-25" src="{{ URL::asset('public/themeAssets')}}/images/box-01.svg" alt="">
                        </a>
                        <div dir="rtl">
                        <h4 class="text-primary">2- عند شحن المنتجات دوليًاً:</h4>
                        <p class="text-primary"> عند شحن الطلبية من المملكة العربية السعودية إلى جميع أنحاء العالم، فسيتوجب عليك عمل تأمين إجباري، وتبلغ تكلفته 5% من قيمة الشحنة.</p>
                        <p class="text-primary">عند شحن الطلبية من أمريكا والصين إلى المملكة العربية السعودية، فيمكنك عمل تأمين حسب رغبتك، وذلك بتكلفة قدرها 3% من قيمة المشتريات.</p>
                        <div class="btn-danger rounded-1 px-2 py-1  w-100 my-2">
                            <a class="nav-link py-1 text-decoration-none text-light" href="{{route('subscriptionPlansAr')}}">انضم معنا </a>
                        </div>

                    </div>
                </div>

                    </div>
                    <!-- col-md-4 -->


                    <!-- col-md-4 -->
                    <div class="col-md-4 col-12 text-center">
                       <div class="order text-primary rounded  p-2" style="height: 22.2rem;">
                            <a href="#"><img class="figure-img img-fluid w-25"  src="{{ URL::asset('public/themeAssets')}}/images/order-tracking.svg" alt=""></a>
                        <div dir="rtl"> <h4>1- عند طلب شراء منتجات: </h4>
                            <p>عند طلب شراء منتجات من المحلات التجارية والأسواق في السعودية وأمريكا والصين, فإن التأمين على الطلبية يعتبر مهمًا بنسبة 70%، وتبلغ تكلفته 3% من قيمة المشتريات.</p>
                            <p>عند طلب شراء منتجات من متاجر إلكترونية عالمية (الوساطة), فإن التأمين على الطلبية يعتبر مهمًا بنسبة 25%، وتبلغ تكلفته 2% من قيمة المشتريات.</p>
                        </div>
                    </div>
                    </div>
                    <!-- col-md-4 -->


                </div>
                  <!-- row -->

                <div class="col-12 text-center my-5" >
                        <h4>كيفية احتساب النسبة المئوية من المشتريات</h4>
                        <p>إذا كانت قيمة المشتريات 2000 ريال، والضريبة 100 ريال، والشحن 250 ريال، فسيكون إجمالي المبلغ 2350 ريال. وبما أن تكلفة التأمين تحتسب من قيمة المشتريات فقط (ولنفترض 5% من قيمة المشتريات) فسيتعين عليك دفع 100 ريال فقط.</p>
                </div>

            </div>
           <!-- container -->
        </div>

        </section>
    <!--section-1 -->



        <!--section-2 -->
            <section class="other_nav_link " style=" position: relative; top: 80px;">
                <!-- container -->
                        <div class="container">
                            <div class="row py-3 my-3">
                            <!-- col-md-6 -->
                                <div class="col-md-6  col-12 text-left" >
                                    <img class="figure-img img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/Order insurance 02-01.png">
                                </div>
                            <!-- col-md-6 -->
                                <div class="col-md-6 my-auto col-12 text-right "dir="rtl" >
                                    <div class="mt-4">
                                        <h2 class="mt-5">متى يجب أن تقوم بتأمين طلبيتك؟</h2>
                                        <p><i class="fas fa-check-circle text-primary"></i> إذا كان هناك صعوبة في التحقق من مصداقية البائع أو الموقع.</p>
                                        <p><i class="fas fa-check-circle text-primary"></i> إذا كانت الطلبية باهظة الثمن, أو كبيرة الحجم أو معرضة للكسر.</p>
                                        <p><i class="fas fa-check-circle text-primary"></i> إذا كانت الطلبية بالجملة أو على شكل شحنات متعددة ومتفرقة.</p>
                                        <p><i class="fas fa-check-circle text-primary"></i> إذا كان هناك مخاوف من شركة الشحن أو التوصيل أو حتى من وصول الطلبية.</p>
                                    </div>
                                </div>
                                  <!-- col-md-6 -->
                            </div>
                        </div>

                <!-- End container-->
            </section>
         <!--section-2 -->


        <!--section-3 -->
            <section class="other_nav_link " style=" position: relative; top: 50px;">
                <!-- container -->
                        <div class="container">

                            <div class="row py-3 my-3">
                            <h2 class="col-12 text-center"> التعويضات التي ستحصل عليها عند تأمين الطلبية</h2>
                            <div class="col-md-5 col-12 my-auto pt-5" >
                                    <img class="figure-img img-fluid " src="{{ URL::asset('public/themeAssets')}}/images/Remuneration .svg">
                                </div>

                                <!-- col-md-7 -->
                               <div class="col-md-7 my-auto col-12  "dir="rtl" >
                               <div class="d-flex text-right">
                               <div class="mt-3 pl-2">
                               <img class="w-100 " src="{{ URL::asset('public/themeAssets')}}/images/Full-01-01.png" alt="">
                                </div>
                                    <div class="full-text">
                                        <h2 class="mt-5">التعويض الكامل:</h2>
                                        <p> في حال وجود تأمين على الطلبية, فإن الموقع مسؤول عنها حتى يتم تسليمها للعميل.</p>
                                        <p>يتم دفع تعويض بكامل المبلغ عند فقدان أو ضياع الطلبية سواء أثناء الشحن من قبل البائع أو في دولة البائع أو في المخزن أو أثناء التوصيل المحلي.</p>
                                        <p>يتم دفع تعويض بكامل المبلغ عند تأخر توصيل الطلبية لأكثر من 30 يوماً، وذلك بدءاً من تاريخ إتمام العميل للطلب. يستثنى من ذلك طلبات الكميات والطلبات المتأخرة بسبب العميل أو بسبب أمور خارجة عن السيطرة.</p>
                                    </div>
                                </div>

                               <div class="d-flex text-right">
                               <div class="mt-3 pl-2">
                               <img class="w-100 " src="{{ URL::asset('public/themeAssets')}}/images/Full-02-02.png" alt="">
                                  </div>
                                    <div class="full-text">
                                        <h2 class="mt-5">التعويض الجزئي</h2>
                                        <p>عند عدم وجود تأمين, يتم التواصل مع البائع أو الناقل أو غيرهما ورفع دعوى عند الحاجة لذلك، والمحاولة بالأنظمة المتاحة لاسترداد المبلغ فقط.</p>
                                    </div>
                                  </div>
                                </div>
                                  <!-- col-md-7 -->

                            </div>




                         <div class="col-12 text-center my-5" >
                                <h4 class=""> كيف تدفع قيمة التأمين؟</h4>
                                <p>يتم دفع التأمين مقدمًاً لأي طلب شراء أو شحن الطلبية وسوف يظهر لك إشعار عند إتمام الدفع</p>
                                <p>التأمين خاضع لشروط واتفاقية الموقع، لذا يرجى قراءتها بعناية</p>
                                <div class="btn-danger rounded-1 px-2 py-1  col-md-4 col-12 my-2">
                                    <a class="nav-link py-1 text-decoration-none text-light" href="{{route('subscriptionPlansAr')}}"> اشترك معنا</a>
                                </div>
                            </div>

                        </div>

                <!-- End container-->
            </section>
         <!--section-3 -->


@endsection
