@extends('template.ar_template')
@section('title', 'مميزات')
@section('content')



    <!--section-1 -->
        <section class="other_nav_link" style="position: relative;  top: 163px;" >
                <!-- container -->
                <div class="container">
                    <div class="text-primary col-12 text-center my-3">
                        <h3 class="text-primary">مميزات وخدمات الموقع للعملاء من داخل السعودية</h3>
                    </div>

                    <!-- row -->
                    <div class="row  py-md-3 my-md-3">




                        <!-- col-md-5 -->
                            <div class="col-md-6 col-12 text-left my-md-5" >
                                <div class="">
                                       <img class="figure-img img-fluid " src="{{ URL::asset('public/themeAssets')}}/images/hero sp.jpg">
                                </div>

                            </div>
                        <!-- /col-md-5 -->


                        <!-- col-md-7 -->
                            <div class="col-md-6 col-12 text-md-right text-center  text-primary pt-md-4 "dir="rtl" >
                                <!-- div-->
                                <div class="express">
                                <div class="d-flex text-right pt-4">
                                    <div class="m-2">
                                        <img class="w-100 " src="{{ URL::asset('public/themeAssets')}}/images/img-icon-f (5).png" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mt-2">شحن الطلبية مجاناً </h6>
                                        <p class="text-secondary "> شحن الطلبات مجانا من أمريكا والصين إلى عنوانك، إذا كان وزن الشحنة 300 غرام أو أقل وذلك حسب خطة اشتراكك</p>
                                    </div>
                                </div>
                                <!--/ div-->

                                <!-- div-->
                                <div class="d-flex text-right">
                                    <div class="m-2">
                                        <img class="w-100" src="{{ URL::asset('public/themeAssets')}}/images/img-icon-f (4).png" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mt-3">استلام المبلغ</h6>
                                        <p class="text-secondary ">عند طلب شراء منتجات يمكنك دفع مبلغ المشتريات نقداً ليأتي مندوب معتمد ويستلم منك المبلغ وذلك داخل مدينة الرياض فقط</p>
                                    </div>
                                </div>
                                <!--/ div-->

                                <!-- div-->
                                <div class="d-flex text-right">
                                    <div class="m-2">
                                        <img class="w-100 " src="{{ URL::asset('public/themeAssets')}}/images/img-icon-f (3).png" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mt-2">الدفع عند الاستلام</h6>
                                        <p class="text-secondary "> يمكنك دفع قيمة الطلبية وتكاليف الشحن من امريكا والصين عند توصيل الشحنة لعنوانك، الميزة لجميع مناطق المملكة </p>
                                    </div>
                                </div>
                                </div>
                                <!--/ div-->

                            </div>
                        <!-- /col-md-7 -->

                        <!-- /button -->
                         <div class="col-md-4 col-12 mx-auto btn-danger rounded-1 my-4 px-4 py-2 ">
                            <a class="text-decoration-none text-light  font-weight-bold" href="{{route('subscriptionPlansAr')}}">مميزات أخرى</a>
                        </div>
                        <!-- /button -->

                    </div>
                </div>
                <!-- container -->
        </section>
    <!--section-1 -->



        <!--section-2 -->
            <section class="section-2"  style="margin-top: 160px;">
                <!-- container -->
                    <div class="container">

                    <!-- ROW 1 -->
                        <div class="row  my-md-3" dir="rtl">

                            <div class="text-primary col-12 text-center mb-md-4" >
                                <h2>مميزات وخدمات لجميع عملاء العالم(داخل وخارج السعودية)</h2>
                            </div>




                        <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary "  >
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (12).svg" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">الدفع بالتقسيط</h5>
                                        <p class="text-secondary ">عند طلب شراء منتجات يمكنك دفع عربون لإثبات جديتك، ثم دفع المتبقي من المبلغ لاحقاً مع تكلفة الشحن</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /col-md-6 -->


                            <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (11).svg" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">تعويض قيمة الشحنة</h5>
                                        <p class="text-secondary "> يتم التعويض بكامل قيمة الطلبية او الشحنة عند حصول خلل في مسار تتبع الشحنة او تأخير الشحنة عن وقت التوصيل المحدد او وصول الشحنة ناقصة </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /col-md-6 -->

                        <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (2).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">الدعم الفني</h5>
                                        <p class="text-secondary ">مدير خاص لباقتك للتواصل المستمر، وفريق دعم متخصص جاهز للرد على جميع أنواع الاستفسارات والشكاوى وحلها في أسرع وقت ممكن.</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /col-md-6 -->



                        <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (10).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">احتساب الوزن الحقيقي</h5>
                                        <p class="text-secondary "> احتساب الوزن الحقيقي لجميع الشحنات الواردة والصادرة من السعودية، يستثنى من ذلك بعض شركات الشحن وذلك عند وجود فرق كبير بين الوزن والحجم </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /col-md-6 -->



                        <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (1).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">	شحن دولي منخفض</h5>
                                        <p class="text-secondary "> أرخص تكلفة شحن من العالم للسعودية ومن السعودية للعالم، قد تصل تكلفة الكيلو الواحد إلى 20 ريال فقط، مع توصيل سريع إلى عنوانك خلال 3 - 5 أيام عمل.</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /col-md-6 -->



                        <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (8).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary "> شركات شحن متنوعة</h5>
                                        <p class="text-secondary ">اتفاقيات مع شركات شحن متعددة دولية ومحلية لخدمة عملائنا وتلبية احتياجاتهم عند طلب شحن الطلبية، ولتوفير تكلفة شحن مع أسرع توصيل.</p>
                                    </div>
                                </div>
                                </div>

                            </div>
                        <!-- /col-md-6 -->


                        <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (4).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">الشحن البحري</h5>
                                        <p class="text-secondary "> اتفاقيات مع شركات الشحن البحرية للحصول على أسعار مخفّضة للكميات والأوزان الكبيرة، وذلك على حسب دولة المستلم والكمية والنوعية. </p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <!-- /col-md-6 -->




                        <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (3).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">التخليص الجمركي</h5>
                                        <p class="text-secondary ">نحن نقوم بتجهيز جميع المستندات المتعلقة بالشحنة والعميل مع الفواتير النهائية، ونرفقها مع الشحنة لضمان عدم حدوث أي مشاكل أو تأخير للشحنة. </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /col-md-6 -->



                            <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (7).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">الطلبات بالجملة</h5>
                                        <p class="text-secondary ">تجهيزات متكاملة وفريق متخصص بدرجة عالية من الكفاءة لفرز وتعبئة وتغليف الشحنات الكبيرة في صناديق وحاويات مخصصة لذلك مع ضبط المستندات اللازمة. </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /col-md-6 -->


                            <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (5).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">لا توجد رسوم مخفية	</h5>
                                        <p class="text-secondary ">جميع التكاليف والرسوم المطلوبة منك ستجدها مكتوبة أمامك في صفحات الموقع والباقات بشكل واضح ومفصّل، كذلك عند دفع قيمة الفاتورة النهائية </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /col-md-6 -->


                            <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (6).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">الحاسبة</h5>
                                        <p class="text-secondary ">حاسبة متكاملة دقيقة لجميع الخدمات بضغطة زر واحدة يمكنك معرفة تكاليف الشحن العالمي والمحلي ومبلغ التأمين والعمولات والخدمات وسعر الصرف  </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /col-md-6 -->

                            <!-- col-md-6 -->
                            <div class=" col-md-6  col-12 p-3" >
                                <div class="service p-3">
                                <div class="d-flex text-right">
                                    <div class="text-primary  ">
                                        <img class="" src="{{ URL::asset('public/themeAssets')}}/images/icon-bunn (9).png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h5 class="text-primary ">تتّبع الطلبات</h5>
                                        <p class="text-secondary "> بمجرد طلب شراء منتجات أو شحن الطلبية، يمكنك الاطلاع على التحديثات المتعلقة بها، بما في ذلك تاريخ التحديث وموقع ووقت المتوقع لوصول الشحنة.   </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <!-- /col-md-6 -->
                        </div>
                     <!--/ ROW 5 -->

                     <!-- ROW 6 -->
                         <div class="row justify-content-center my-5">
                             <div class="btn-danger rounded-1 px-2 py-1 col-md-3 col-12">
                                 <a class="nav-link py-1 text-decoration-none text-light" href="{{route('subscriptionPlansAr')}}">حساب موحد لجميع الخدمات</a>
                             </div>
                         </div>
                     <!--/ ROW 6 -->

                    </div>
                <!-- End container-->
            </section>
         <!-- / section-2 -->

@endsection