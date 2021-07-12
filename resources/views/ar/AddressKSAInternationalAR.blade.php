@extends('template.ar_template')
@section('title', 'جناح-سعودي')
@section('content')


        <div class="other_nav_link bg-blue" style=" position: relative;  top: 127px;">
                <!-- container -->

                    <div class="container">
                        <div class="row  py-3">

                            <div class="col-md-6  col-12 text-left" >
                                 <img class="figure-img img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/SAD.png">
                            </div>
                            <div class="col-md-6 my-auto col-12 text-right "dir="rtl" >
                                <div class="mt-4">
                                  <p class="text-light"> انضم إلى موقعنا واستمتع بالتسوق من مختلف المتاجر الإلكترونية السعودية، لتصل طلباتك إلى باب منزلك بأي موقع في العالم. يمكنك التسوق عبر مواقع أمازون السعودية, وحراج وجرير وغيرها من المتاجر السعودية، وشحن مشترياتك إلى مستودعنا في السعودية لنقوم بإعادة توجيهها إليك.</p>
                                  <div class=" text-center mt-3">
                                    <a href="{{route('subscriptionPlansAr')}}" class="btn btn-danger">احصل على العنوان الآن</a>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>

               <!-- End container-->
         </div>



    <!--SAUDi -->
        <section class="USA-Ch">
               <div id="section-advantages">

                 <div class="container">

                <div class="row mt-5">

                    <div class="col-md-5 col-12 text-md-left hidden-xs-down">
                            <a href="#"><img class="figure-img img-fluid w-75 "  src="{{ URL::asset('public/themeAssets')}}/images/address-sud.png" alt=""></a>
                       </div>


                    <div class="col-md-7 col-12 my-auto text-right ">
                        <div class="mt-5"  >
                            <h4>ما هو الجناح السعودي؟</h4>
                            <p>هو عبارة عن عنوان خاص بك في المملكة العربية السعودية، وتحديداً في العاصمة – الرياض، حيث يمكنك استخدامه كعنوان شحن عند شراء منتجات من المتاجر الإلكترونية المحلية والباعة داخل السعودية، وذلك لأن أغلب المتاجر والباعة المحليين لا يشحنون دوليا. لكن عند استخدام الجناح الخاص بك، سيتم إرسال طلبيتك في مستودعنا، لنستلمها  نيابة عنك ونرسلها إلى عنوانك في أي منطقة بالعالم.</p>


                        </div>
                       </div>

                </div>


            </div>
        </div>

        </section>
<!-- END USA-Ch -->







    <!--begin section white-->

    <section class="section-white" id="about">
	    <!--begin container -->

	    <div class="container">



			<!--begin row -->

	      	<div class="row">

				 <!--begin col md 6 -->
				<div class="col-md-6 "  dir="rtl">
					<div class="luna-headings-dark  wow fadeInLeft" data-wow-delay="0.60s"
					style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft; text-align: right;">
						<h2>مميزات الجناح السعودي</h2>
						<h3 class="text-primary">المميزات الخاصة للعملاء من داخل السعودية</h3>

						<div class="luna-aboutbox">

							<div class="luna-aboutbox-text ">

								<p> وصول الطلبات من الصين وأمريكا إلى الجناح السعودي أولا، ثم يتم التوصيل للعميل</p>
							</div>
							<img src="{{ URL::asset('public/themeAssets')}}/images/icon1.png" style="float: none ; margin-right: 0px;" alt="icon">
						</div>
						<div class="luna-aboutbox">

							<div class="luna-aboutbox-text ">

								<p> إمكانية الشراء من المتاجر المحلية أو الباعة الذين لا يشحنون لخارج الرياض.</p>
                            </div>

							<img src="{{ URL::asset('public/themeAssets')}}/images/icon2.png" style="float: none ; margin-right: 0px;" alt="icon">

						</div>

						<div class="luna-aboutbox">

							<div class="luna-aboutbox-text ">

								<p> إمكانية تجميع الطلبات لتقليل تكلفة الشحن، وشحن  جميع الطلبات شحنة واحدة</p>
							</div>
							<img src="{{ URL::asset('public/themeAssets')}}/images/icon4.png"  style="float: none ; margin-right: 0px;"alt="icon">
						</div>


						<div class="luna-aboutbox">

							<div class="luna-aboutbox-text ">

								<p> حماية الطلبية عند حدوث ظرف طارئ أو عند تعذر استلام الطلبية وقت التوصيل.</p>
							</div>
							<img src="{{ URL::asset('public/themeAssets')}}/images/icon3.png"  style="float: none ; margin-right: 0px;"alt="icon">
						</div>


						<div class="luna-aboutbox">

							<div class="luna-aboutbox-text ">

								<p> لاستخدام خدمة توصيل الطلبية للمشتري واستلام المبلغ</p>
							</div>
							<img src="{{ URL::asset('public/themeAssets')}}/images/icon5.png"  style="float: none ; margin-right: 0px;"alt="icon">
                        </div>


						<div class="luna-aboutbox">

							<div class="luna-aboutbox-text ">

								<p>يمكنك استخدام خدمة حماية البائع والمشتري</p>
							</div>
							<img src="{{ URL::asset('public/themeAssets')}}/images/icon6.png"  style="float: none ; margin-right: 0px;"alt="icon">
						</div>


					</div>

				</div>

				<!--end col md 6 -->
	          	<!--begin col md 6 -->

							<div class="col-md-6 text-center luna-imagewrap1  wow fadeInRight hidden-xs-down" data-wow-delay="0.60s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInRight;">
								<img src="{{ URL::asset('public/themeAssets')}}/images/luna-about2.png" alt="about-image" class="figure-img img-fluid  mt-5 pt-5">
							</div>

				<!--end col md 6 -->
		    </div>

	      	<!--end row -->
	    </div>

	    <!--end container -->
  	</section>

  	<!-- END section white -->







 <!-- logo-all -->
        <section class="logo-all my-4">
        <div>
            <img class="w-100" src="{{ URL::asset('public/themeAssets')}}/images/hp-brand-SUD.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-danger  my-4" >

                    <div class="btn-danger rounded-1 px-2 py-1  w-auto">
                        <a class="nav-link py-1 text-decoration-none text-light" href="قائمة المتاجر.html">  مشاهدة جميع المواقع </a>
                    </div>

              </div>

            </div>
        </div>

        </section>
<!--END logo-all -->







<!-- section-1 -->
    <section class="section-1">
        <div id="section-advantages">

          <div class="container">
         <div class="text-center my-4">
             <h3>جميع العملاء </h3>
         </div>


         <div class="row">


             <div class="col-md-4 col-12  ">
                 <div class="bg-white  p-4 text-center rounded mx-auto" style="width: 18rem; height: 12rem;">
                      <a href="#"> <img class="figure-img img-fluid w-25" src="{{ URL::asset('public/themeAssets')}}/images/list.svg" alt=""> </a>
                    <div dir="rtl">
                      <p class="text-primary">  إمكانية تجميع الطلبات لتقليل تكلفة الشحن، بحيث تُشحن جميع الطلبات شحنة واحدة</p>
                 </div>
                </div>
             </div>



             <div class="col-md-4 col-12 ">
                 <div class="bg-white  p-4 rounded text-center mx-auto " style="width: 18rem; height: 12rem;">
                      <a href="#"> <img class="figure-img img-fluid w-25" src="{{ URL::asset('public/themeAssets')}}/images/low-prices(2).svg" alt=""> </a>
                    <div dir="rtl">
                      <p class="text-primary"> تكلفة شحن رخيصة من السعودية إلى أنحاء العالم،  بسبب اتفاقياتنا مع شركات الشحن</p>
                 </div>
                </div>
             </div>


             <div class="col-md-4 col-12  ">
                 <div class="bg-white p-4 rounded text-center mx-auto" style="width: 18rem;height: 12rem">
                      <a href="#"> <img class="figure-img img-fluid w-25" src="{{ URL::asset('public/themeAssets')}}/images/store-solid.svg" alt=""> </a>
                    <div dir="rtl">
                      <p class="text-primary"> إمكانية الشراء من المتاجر او التجار في السعودية، والتي لا تشحن دوليا</p>
                 </div>
                </div>
             </div>





         </div>


     </div>

 </div>

    </section>
<!-- section-1 -->









<!-- multi_step_form01 -->



<section class="multi_step_form " >
    <div class="container my-md-4 py-md-4" >

     <div class="col-12 text-center text-danger " >
          <h4 class="text-dark">دليل استخدام الجناح السعودي</h4>
     </div>

        <form id="msform">
        <!-- progressbar -->
        <ul id="progressbar" dir="rtl">
            <li>نشحن الطلبية عبر شركات الشحن لعنوانك وتسليمها إليك</li>
            <li>اختر خدمات خاصة للطلبية أو شحنها إلى عنوانك في أي منطقة بالعالم</li>
            <li>بمجرد استلام الشحنة نسجلها في الجناح لتتمكن من الاطلاع على تفاصيلها</li>
            <li>استخدم جناحك عند التسوق من المتاجر والباعة  لتوصيل الطلبية </li>
            <li class="active">سجل للحصول على جناحك الخاص في السعودية الآن</li>

        </ul>
        <!-- progressbar -->
        </form>


        <div class="col-12 text-center   my-md-3" >

        <div class="btn-danger h-auto w-auto rounded-1 px-2 py-1 ">
        <a class="nav-link py-1 text-decoration-none text-light " href="{{route('subscriptionPlansAr')}}">احصل علي الجناح  الأن </a>
        </div>
       </div>


    </div>

</section>

<!--  multi_step_form01 -->

@endsection