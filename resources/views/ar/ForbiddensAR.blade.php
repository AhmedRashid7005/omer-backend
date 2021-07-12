@extends('template.ar_template')
@section('title', 'الممنوعات')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
@endpush

    <!--Start  forbidden -->
    <div  class="forbidden other_nav_link" style="position: relative; top: 150px;">
        <!-- Start container-->
        <div class="container">

            <div class="row ">
                <div class=" col-md-12 text-center my-3">
                    <h3 class="text-primary nav-link  din_bold h3"  href="#">المنتجات الممنوعة</h3>
                </div>

                <!--</div>-->
                <div class="col-12 text-center">
                    <h5 class="text-primary"> يمنع منعاً باتاً طلب أياً من المنتجات التالية من المتاجر الإلكترونية المحلية<br>: والعالمية والباعة والتجار، أو شحنها إلى أي جناح داخل المملكة وخارجها</h5>
                </div>


                <!-- col-12 -->
                <div class=" col-12 text-right" dir="rtl">

                    <div class="row bg-basket rounded py-3 my-3">
                        <div class="col-md-6 col-12 text-right" dir="rtl">
                            <ul class=" text-primary pr-5 py-3">
                                <li> 1- جميع المنتجات الممنوعة بموجب الشريعة الإسلامية.</li>
                                <li>2- جميع المواد الممنوعة وغير المشروعة وفقا للوائح والقوانين السعودية.</li>
                                <li>3-المنتجات الجنسية بكافة أشكالها وأنواعها بلا استثناء.</li>
                                <li>4-جميع المنتجات المتعلقة بالأموال النقدية والذهب والماس.</li>
                                <li>5-الأغذية غير المعلبة، أو الأطعمة المعرضة للتلف والتعفن.</li>
                                <li>6-الأسلحة بكافة أنواعها وملحقاتها (يشمل ذلك مجسمات الألعاب).</li>
                                <li>7-الكحول, والمخدرات, والتبغ, والشيشة وجميع الحبوب المهلوسة.</li>
                                <li>8-المنتجات السامة والخطيرة والتي تؤدي إلى أضرار جسدية.</li>
                                <li>9-المنتجات مجهولة المصدر والتي لا تحتوي على وصف واضح.</li>
                                <li>10-المنتجات غير المرخصة من الجهات الحكومية ومنتجات الباعة المجهولين..</li>
                                <li>11-غير ذلك من الممنوعات المدونة في موقع الجمارك السعودي.</li>
                            </ul>
                        </div>

                        <!--image -->
                        <div class="col-md-6 col-12 text-left"">
                             <img src="{{ URL::asset('public/themeAssets')}}/images/PM.png">
                        </div>
                        <!-- image -->

                    </div>
                </div>
                <!-- col-12 -->


                <div class="col-md-12 bg-basket rounded text-center py-5 mb-5">
                    <h3 class="text-primary" >:تنبيه هام</h3><br>
                        <p class="text-primary">
                            إن طلب شراء أو توصيل منتجات ممنوعة شرعياً أو قانونياً أو دولياً لأي جناح - سواء بتوضيح أو تمويه أو تكسير أو بالاتفاق مع البائع - يعرضك للمساءلة القانونية ويؤدي إلى إتلاف الطلبية بالكامل. (لمراجعة موقع الجمارك السعودية <a class="" href="#">اضغط هنا</a>)
                        </p>
                </div>
                <!--</div>-->
            </div>
        </div>
        <!--End container -->
    </div>
    <!--End section class="forbidden" -->

@endsection