@extends('template.ar_template')
@section('title', 'طلب_قطع_غيار_سيارات')
@section('content')


        <div class="other_nav_link bg-blue" style=" position: relative;  top: 127px;">
                <!-- container -->

                    <div class="container">
                        <div class="row  flex-column-reverse flex-lg-row py-3">

                            <div class="col-md-6  col-12 text-center" >
                                 <img class="figure-img img-fluid w-75" src="{{ URL::asset('public/themeAssets')}}/images/vector-parts.png">
                            </div>
                            <div class="col-md-6 my-auto col-12 text-right "dir="rtl" >
                                <div class="mt-4">
                                    <h4 class="text-primary my-4">خدمة طلب شراء قطع غيار السيارات</h4>
                                    <p class="text-light">خدمة خاصة للعملاء من داخل السعودية، لتسهيل شراء قطع غيار السيارات بأفضل الأسعار المتوفرة سواء من المورد المحلي أو من أمريكا والصين. وتشمل هذه الخدمة جميع أنواع القطع المتعلقة بالسيارة من الأجزاء الداخلية وقطع الغيار والمحركات الخارجية وغيرها، مع ضمان تشغيل للقطع الجديدة، وضمان للمحركات المستخدمة أو المستوردة.</p>
                                    <h4 class="text-primary my-4">هل الخدمة تشمل طلب محركات السيارة من مكينة وجير؟</h4>
                                    <p class="text-light">نعم، الخدمة تشمل ذلك وهذه من أهم خدماتنا.</p>
                                </div>
                                <div class="btn-danger rounded-1 px-4 py-2 w-100 my-3 ">
                                    <a class="text-decoration-none text-light  font-weight-bold" href="{{route('FormOrderAutoPartsAr')}}">الدخول للخدمة </a>
                                </div>
                            </div>
                        </div>
                    </div>

               <!-- End container-->
         </div>



        <!--section-1 -->
            <section class="section-2" style="margin-top: 160px;">
                <!-- container -->
                    <div class="container">

                        <div class="row py-3 my-3">

                            <h1 class="col-12 text-blue text-center">طريقة التوصيل</h1>
                        <!-- col-md-5 -->
                             <div class="col-md-5 col-12 text-left mt-3" >
                                <img class="figure-img img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/Group 244.png">
                            </div>
                        <!-- col-md-5 -->

                        <!-- col-md-7 -->
                            <div class="col-md-7 my-auto col-12  "dir="rtl" >


                                <div class="d-flex text-right">
                                    <div class="mt-5 ">
                                        <img class="ml-2" src="{{ URL::asset('public/themeAssets')}}/images/XMLID_1_.png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h2 class="text-primary mt-5">طلب شراء من الرياض</h2>
                                        <p class="text-secondary font-weight-bold"> إذا كنت من داخل المملكة العربية السعودية فيمكنك شراء المنتجات من أي موقع إلكتروني موثوق، محلي أو عالمي.</p>
                                    </div>
                                </div>
                                <div class="d-flex text-right">
                                    <div class="mt-5 ">
                                        <img class="ml-2" src="{{ URL::asset('public/themeAssets')}}/images/Group 229.png" alt="">
                                    </div>
                                    <div class="full-text">
                                        <h2 class="text-primary mt-5">طلب شراء من الخارج</h2>
                                        <p class="text-secondary font-weight-bold">التوصيل للسعودية حسب وزن القطعة، لكن الأوزان الثقيلة مثل المحركات يتم شحنها بحرا أو جوا حسب طلب العميل، أما الأوزان الخفيفة يتم شحنها جوًا عبر شركات الشحن المعروفة.</p>
                                    </div>
                                </div>






                            </div>
                        <!-- /col-md-7 -->

                        </div>
                    </div>

                <!-- End container-->
            </section>
        <!--End section-1 -->




        <!--section-2 -->
            <section class="section-2">
                <!-- Start container-->
                <div class="container">

                    <div class="row text-primary ">
                        <!-- col-12 -->
                            <div class="col-12 text-center my-md-5">
                                <h1>الضمانات</h1>
                            </div>
                        <!-- /col-12 -->

                        <!-- col-4 -->
                            <div class=" col-md-4 col-12 text-md-right text-center my-2">
                                 <div class="zoom">
                                <img class="figure-img img-fluid text-right" dir="rtl" src="{{ URL::asset('public/themeAssets')}}/images/icon-sev2 (3).png"><br>
                                <h3>ضمان التشغيل </h3>
                                <p>نعم يوجد ضمان للتشغيل سواء كان الطلب من الرياض أو الخارج وذلك للقطع الجديدة، أما القطع المستعملة فيوجد مبلغ إضافي للتأكد من التشغيل (المكينة والجير فقط)</p>
                                </div>
                            </div>
                        <!--/ col-4 -->

                        <!-- col-4 -->
                            <div class=" col-md-4 col-12 text-md-right text-center my-2">
                                <div class="zoom">
                                <img class="figure-img img-fluid text-right" dir="rtl" src="{{ URL::asset('public/themeAssets')}}/images/icon-sev2 (9).png"><br>
                                <h3>ضمان التركيب</h3>
                                <p>.لا يوجد ضمان للتركيب، لكن يمكن إرجاع الطلبية إذا كانت من الرياض، وذلك بشروط الإرجاع المعروفة لدى المحلات التجارية</p>
                                <p>أما إذا كانت الطلبية من الخارج فلا يمكن الإرجاع، ولذا يجب على العميل إدخال تفاصيل صحيحة للقطعة، والتأكد من تفاصيل العرض قبل الدفع</p>
                            </div>
                            </div>

                        <!--/ col-4 -->

                        <!-- col-4 -->
                            <div class=" col-md-4 col-12 text-md-right text-center my-2">
                                <div class="zoom">
                                <img class="figure-img img-fluid text-right" dir="rtl" src="{{ URL::asset('public/themeAssets')}}/images/icon-sev2 (10).png"><br>
                                <h3>ضمان التوصيل</h3>
                                <p>التوصيل مضمون أو التعويض بكامل البلغ وذلك عند وجود تأمين للمزيد من المعلومات يرجى الضغط على <a href="#">نظام التأمين</a></p>
                            </div>
                            </div>

                        <!--/ col-4 -->



                        <!-- /button -->

                          </div>
                           </div>
                        <!-- /button -->
                </div>

                <!--/ container -->
            </section>

        <!--/section-2 -->



<!-- table -->

    <section >
        <div class="container">
            <div class="col-12 text-center text-primary my-md-5" >
                <h4 class="text-blue"> رسوم الخدمة </h4>
           </div>

            <div class="table2-wrapper" dir="rtl">
                <table class="f2-table">
                    <thead class="item ez-animate">
                    <tr class="text-right">
                        <th>الرسوم</th>
                        <th>الطلب  <br> من الرياض</th>
                        <th>الطلب من <br>أمريكا والصين </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>رسوم ثابتة</td>
                        <td>التحميل والتنزيل + التغليف</td>
                        <td>وقود السيارة + تكلفة التوصيل الداخلي + التحميل والتنزيل + التغليف</td>
                    </tr>
                    <tr>
                        <td>عمولة ثابتة</td>
                        <td>إذا كانت قيمة المشتريات 500 ريال أو أقل، فستكون هناك <br>عمولة ثابتة وقدرها 49 ريال سعودي</td>
                        <td>إذا كانت قيمة المشتريات 500 ريال أو أقل، فستكون هناك <br>عمولة ثابتة وقدرها 69 ريال سعودي</i></td>
                    </tr>
                    <tr>
                        <td>عمولة نسبية</td>
                        <td>إذا كانت قيمة المشتريات أكثر من 500 ريال، فسيتم خصم عم<br>ولة وقدرها 8 % من إجمالي قيمة المشتريات</td>
                        <td>إذا كانت قيمة المشتريات أكثر من 500 ريال، فسيتم خصم عمو<br>لة وقدرها 16% من إجمالي قيمة المشتريات</td>
                    </tr>

                    <tbody>
                </table>
            </div>

         </div>


    </section>






        <!-- multi_step_form02 -->

                <section class="multi_step_form " >
                    <div class="container my-md-5 py-2">

                        <div class="col-12 text-center text-primary my-4 " >
                             <h4 class=" my-md-3 py-2">دليل الاستخدام</h4>
                        </div>

                        <form id="msform" >
                        <!-- progressbar -->
                        <ul class=" flex-column-reverse " id="progressbar" dir="rtl">
                            <li>يتم الشراء وشحن الطلبية لعنوانك</li>
                            <li>قم بالدخول إلى حسابك والتأكد من التفاصيل وادفع المبلغ</li>
                            <li>يتم مراجعة طلبك وإرسال فاتورة بتفاصيل الطلب</li>
                            <li>قم بملء النموذج الخاص بطلب شراء قطع غيار السيارات</li>
                            <li class="active">قم بالتسجيل في الموقع لتحصل على جميع الخدمات</li>

                        </ul>
                        <!-- progressbar -->
                        </form>


                        <!-- /button -->
                             <div class="row ">
                                <div class="btn-danger rounded-1 col-md-3 col-12 px-4 py-2">
                                    <a class="text-decoration-none text-light  font-weight-bold" href="{{route('FormOrderAutoPartsAr')}}">طلب  قطع غير </a>
                                </div>
                            </div>
                        <!-- /button -->

                    </div>

                </section>

        <!--  multi_step_form01 -->


@endsection