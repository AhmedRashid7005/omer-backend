@extends('template.ar_template')
@section('title', 'نظام الشحن')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
@endpush

    <!--packages -->
    <section class="other_nav_link" style="position: relative; top: 160px;">
        <!-- Start container-->
        <div class="container">


            <!-- title -->
            <div class="text-center my-2">
                <h2>الشحن من داخل السعودية وخارج السعودية</h2><br>
            </div>
            <!-- title -->


            <!--row 1-->
            <div class="row flex-column-reverse flex-lg-row my-md-3 my-md-3">
                <div class="col-md-6 col-12 text-right pr-md-0" dir="rtl">
                    <div class="bg-info h-100">
                        <h3 class="label bg-primary">الوصول المضمون</h3>
                        <p class="py-2 px-4 font-weight-bold">مؤسسة الوصول المضمون لا يتعامل أو يقدّم خدمات أو منتجات لأي من الدول التي عليها عقوبات من مكتب مراقبة الأصول الأجنبية (OFAC) وذلك وفقاً للقوانين المعمول بها في المملكة العربية السعودية.</p>
                        <p class="py-2 px-4 font-weight-bold">مؤسسة الوصول المضمون لا يقدم خدمات لوجستية مطلقا، وجميع خدمات التوصيل والشحن عبر شركات لوجستية موثقة.</p>
                        <p class="py-2 px-4 font-weight-bold">إن تنفيذ المعاملة أكثر من مرّة واحدة قد يؤدي إلى ظهورها أكثر من مرة في كشف الحساب البنكي لصاحب البطاقة.</p>
                 </div>
                </div>
                <div class="col-md-6 col-12 pl-md-0 text-right ">
                        <img class="figure-img img-fluid  w-100 m-0" src="{{ URL::asset('public/themeAssets')}}/images/opop.jpg">
                </div>
            </div>
            <!--row 1-->


            <!--row 2-->
            <div class="row  py-3 my-3">
                <div class="col-md-6  col-12 pr-md-0">
                        <img class="figure-img img-fluid w-100 m-0" src="{{ URL::asset('public/themeAssets')}}/images/shipping03.jpg">
                </div>
                <div class="col-md-6  col-12 text-right pl-md-0" dir="rtl">
                    <div class="bg-info h-100">
                        <h3 class="label ">الشحن من السعودية إلى انحاء العالم</h3>
                        <p class="font-weight-bold p-3">
                                يتم الشحن عبر شركة أرامكس أو فيدكس أو دي اتش ال, وذلك حسب ما تقتضيه مصلحة الموقع وموقع العميل ونوعية المنتج. علمًاً بأن العميل له الحرية في اختيار الشركة المتوفرة في الموقع مع تقيد الموقع والعميل بأنظمة الشركة.</p>
                 </div>
                </div>
            </div>
            <!--row 2-->



             <!--row 3-->
            <div class="row  flex-column-reverse flex-lg-row py-3 my-3">
                <div class="col-md-6 col-12 text-right pr-md-0" dir="rtl">
                    <div class="bg-info h-100">
                        <h3 class="label bg-primary">الشحن من أنحاء العالم للسعودية</h3>
                        <p class="font-weight-bold p-3">يتم الشحن عبر أفضل الشركات المتاحة وأسرعها وذلك خلال 9-12 يوم عمل, وغالبا ما تصل التكلفة إلى 40 ريال للكيلوجرام. ولحساب تكلفة الشحن بدقة, يرجى استخدم الحاسبة الخاصة بالموقع</p>
                 </div>
                </div>
                <div class="col-md-6 col-12 pl-md-0 text-right ">
                        <img class="figure-img img-fluid  w-100 m-0" src="{{ URL::asset('public/themeAssets')}}/images/shipping02.jpg">
                </div>
            </div>
            <!--row 3-->


            <!--row 4-->
            <div class="row py-3 my-3">
                <div class="col-md-6 col-12 pr-md-0">
                        <img class="figure-img img-fluid w-100 m-0" src="{{ URL::asset('public/themeAssets')}}/images/النصائح-للتسوق.jpg">
                </div>

                <div class="col-md-6  col-12 text-right pl-md-0" dir="rtl">
                    <div class="bg-info h-100">
                        <h3 class="label">التوصيل محلياً داخل السعودية</h3>
                        <p class="font-weight-bold p-3">
                           تتم التوصيلات داخل الرياض عبر تطبيق مرسول لسهولة استخدامه. أما بالنسبة للشحن لجميع أنحاء المملكة, فإنه يتم عبر تطبيق زاجل, أو البريد السعودي أو شركات الشحن السريعة، علماً بأن للعميل الحرية في اختيار شركة الشحن وسرعة التوصيل.</p>
                    </div>
                </div>

            </div>
            <!--row 4-->


             <!--row 5-->
            <div class="row flex-column-reverse flex-lg-row  py-3 my-3">
                <div class="col-md-6 col-12 text-right pr-md-0" dir="rtl">

                    <div class="bg-info h-100">
                        <h3 class="label bg-primary">الشحن من الصين وأمريكا إلى السعودية</h3>
                        <p class="font-weight-bold p-3">نحن في موقع الوصول المضمون نراعي ظروف العملاء ولدينا تسعيرة خاصة مناسبة للجميع بغض النظر عن وزن الشحنة، على عكس مواقع الشحن العالمية باهظة التكاليف. (التسعيرة خاصة بالطلبيات الواردة من الصين والولايات المتحدة الأمريكية فقط).</p>

                   </div>

                </div>
                <div class="col-md-6 col-12 pl-md-0 text-right ">
                        <img class="figure-img img-fluid  w-100 m-0" src="{{ URL::asset('public/themeAssets')}}/images/shipping01.jpg">
                </div>
            </div>
            <!--row 5-->
        </div>

        <!-- End container-->
    </section>
    <!-- End section-1"-->

    <div id="section-2" style="position: relative; top: 160px;">
        <!-- Start container-->
        <div class="container my-4">
            <div class="row">

                <!-- col-12 -->
                <div class="col-12 text-right" dir="rtl">

                    <ul class="text-primary font-weight-bold list-unstyled p-3">
                        <li><i style='font-size:24px' class='fa'>&#xf137;</i> إذا كان وزن الشحنة أقل من 250 جرام، فسيتم شحنها مجاناً وذلك حسب الباقة </li>
                        <li><i style="font-size:24px" class="fa">&#xf137;</i> إذا كان وزن الشحنة من 250 جرام وحتى 10 كجم، فإن تكلفة الشحن ستكون 35 ريال للكيلو الواحد. </li>
                        <li><i style="font-size:24px" class="fa">&#xf137;</i> إذا كان وزن الشحنة من 10 كجم وحتى 30 كجم، فإن تكلفة الشحن ستكون 30 ريال للكيلو الواحد. </li>
                        <li><i style="font-size:24px" class="fa">&#xf137;</i> إذا كان وزن الشحنة من 30 كجم وحتى 50 كجم، فإن تكلفة الشحن ستكون 25 ريال للكيلو الواحد. </li>
                        <li><i style='font-size:24px' class='fa'>&#xf137;</i> ولحساب بقية الأوزان، انتقل إلى صفحة الحاسبة. </li>
                    </ul>

                </div>


                <!-- /col-12 -->

                <!-- col-md-5 -->
                    <div class="col-md-5  col-12 text-left pt-md-5" >
                        <img class="figure-img img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/sites.png">
                    </div>
                <!-- /col-md-5 -->

                <!-- col-md-7 -->
                    <div class="col-md-7 my-auto col-12 text-right font-weight-bolder  pt-5"dir="rtl" >
                        <h3>مدة وصول الشحنة</h3>
                        <div class="mt-4 text-primary">
                            <p>بعد أن تقوم بطلب شحن طلبيتك، فإنها تصل إلى المستودع الخاص بالموقع في الرياض خلال   3 - 5 أيام، وبمجرد وصولها، يتم إرسالها من المستودع إلى عنوانك داخل الرياض خلال 24 - 48 ساعة. أما إذا كنت تعيش خارج مدينة الرياض فسوف يستغرق ذلك حوالي 2 - 3 أيام وذلك على حسب المنطقة.</p><br>
                            <p>جميع تكاليف الشحن والتوصيل هنا قابلة للمراجعة والتعديل... يرجى مراجعة هذه الصفحة أو الحاسبة دائماً.</p>
                        </div>
                    </div>
                <!-- /col-md-7 -->

            </div>
            <!-- / ROW -->
        </div>
        <!-- End container -->
    </div>
<!-- End section class="suites"-->

@endsection