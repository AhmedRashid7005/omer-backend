@extends('template.ar_template')
@section('title', 'نموذج حماية البائع والمشتري')
@section('content')




    <!--Start section transfer -->
         <section class="other_nav_link" style="position: relative; top: 160px;">
            <!-- Start container-->
            <div class="container " id="first-hider">


                <div class="wrapper">
                    <div class="arrow-steps clearfix">
                        <div class="step current "> <span> الموافقة على الشروط  </span> </div>
                        <div class="step "> <span>معلومات البائع</span> </div>
                        <div class="step "> <span> تفاصيل الطلبية</span> </div>
                        <div class="step "> <span>قيمة الطلبية</span> </div>
                        <div class="step "> <span>تحديد المشتري</span> </div>
                    </div>
                            <!-- <div class="nav clearfix">
                            <a href="#" class="prev">Previous</a>
                            <a href="#" class="next pull-right">Next</a>
                            </div> -->
                </div>

                <div class="row " >

                    <div  class="col-md-12 col-12 text-center"> <h3 class="text-primary my-2">نموذج حماية البائع والمشتري</h3></div>
                <div class="col-md-12 col-12">
                    <div class=" bg-basket rounded text-right  my-md-4 p-2">
                        <ol class=" col-12 d-block pr-5 text-blue list-unstyled font-weight-bold">ملاحظات هامة
                            <li class="my-2">‌أ.  يجب وجود رقم جناح المشتري لاستخدام هذا النظام	</li>
                            <li class="my-2">‌ب. يوجد مبلغ رمزي لإتمام الطلب، وذلك حسب باقتك  </li>
                            <li class="my-2">‌ج.  لا يمكن إلغاء الخدمة بعد طلبها إلا بموافقة المشتري </li>
                            <li class="my-2">‌د.   لمعرفة تفاصيل النظام <a href="#" class="text-primary"> خدمة حماية البائع والمشتري</a>  </li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-12 col-12 my-3">
                    <div class=" bg-basket rounded   text-center my-md-4 p-2 " >
                        <p class="text-md-right my-2 font-weight-bold " dir="rtl"> أتعهد بأني صاحب هذه الطلبية أفوض الموقع بالبيع واستلام المبلغ نيابة عني
                           وأتعهد بصحة البيانات المدخلة لهذه الطلبية من قبل الموقع، كما أتعهد بصحة البيانات التي سأقوم بإدخالها لاستخدام هذه الخدمة وبيع الطلبية للمشتري  </p>
                         <ol class=" text-right t col-12 d-block pr-md-5 font-weight-bold text-blue list-unstyled"dir="rtl">الشروط
                            <li class="my-2">‌أ.  يحق للموقع أخذ أي إجراء تجاه صاحب الحساب أو الطلبية عند ثبوت محاولة التلاعب أو التحايل على الموقع أو المشتري، أو عدم تطابق موصفات الطلبية عن المذكور هنا. 	</li>
                            <li class="my-2">‌ب.  لا يحق للبائع طلب مبلغ المبيعات إلا بوصول الطلبية للمشتري وموافقته على مواصفات الطلبية  </li>
                            <li class="my-2">ج . لا يحق للبائع التواصل بأي وسيلة كانت بخصوص الطلبية مع المشتري أو الضغط عليه للموافقة، وذلك بعد طلب هذه الخدمة</li>
                            <li class="my-2"> ‌د.   لا يحق للبائع طلب إرجاع الطلبية حتى يقوم المشتري بإلغاء الشراء أو عندما لا يستجيب في غضون 7 أيام من طلب الموافقة
                            </li>
                        </ol>



                            <label  class="form-check-label font-weight-bold mr-2 mx-auto" for="exampleCheck1" dir="rtl"> أتعهد وأوافق على الشروط،<br> ونقل الطلبية تحت تصرف الموقع.  </label>
                            <div class="text-center mx-auto my-2">
                                <a class="btn btn-primary my-1 px-5 first-hider"  data-toggle="collapse"
                                href="#entertoservice" role="button" aria-expanded="true"
                                aria-controls="collapseExample">  الدخول للخدمة</a>
                            </div>
                    </div>
                </div>



            </div>


            </div>
        </div>
        <!--End container -->
    </section>
    <!--End section class="transfer" -->



    <!--/ section-2 -->
        <section class="section-2 "  style="margin-top: 160px;">
            <div class="collapse" id="entertoservice">
            <!-- container -->
                <div class="container" id="showHide">
                    <!-- Row -->
                    <div class="row" >

                        <!-- col-4 -->
                        <div class=" col-md-4 col-12 text-center"></div>
                      <div class=" col-lg-12 col-12 text-center">
                        <div class="input-group my-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text w-auto" id="basic-addon1">الاسم كاملا كما في الهوية* </span>
                            </div>
                            <input  placeholder="ادخل اسم صحيح"oninvalid="InvalidMsg(this);"
                            required="required"  oninput="InvalidMsg(this);"  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class=" col-lg-12 text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text w-auto" id="basic-addon1">رقم الهوية *</span>
                            </div>
                            <input  placeholder="رقم الهويه "oninvalid="InvalidMsg(this);"  maxlength="10"
                            required="required"  oninput="InvalidMsg(this);" type="number" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-12 text-center mx-auto">

                        <div>
                            <a class="entertoservice btn btn-primary my-3 px-5 next pull-right "
                            data-toggle="collapse" href="#details"  role="button" aria-expanded="false" aria-controls="collapseExample" onclick="myFunction()">
                                        التالى</a>
                        </div>
                    </div>


                    </div>
                    <!--/ Row -->
                </div>
                <!--/ Container -->
            </div>
            <!--/ collapse -->
        </section>
        <!--/ section-2 -->




        <!--/ section-3 -->
        <section class="section-3 " >
            <div class="collapse" id="details">
            <!-- container -->
            <div class="container ">

                <div class="row ">

                  <!--select-->

                        <div class="col-md-4 col-12  text-center "></div>
                        <div class=" col-md-4 col-12 text-center  ">
                            <h1 class="text-primary text-center my-5" dir="rtl">طريقة استيلام المبلغ </h1>
                            <div class=" input-group mb-3 " dir="rtl">
                                    <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">طريقة الإستيلام*</label>
                                    </div>
                                <select required class="custom-select" id="test" onchange="showDiv(this)" name="ship_level">
                                    <option value="0">--أختار--</option>
                                    <option value="bank">تحويل بنكى</option>
                                    <option value="paybal">باى بال</option>
                                    <option value="ban">بنك الراجحي </option>
                                    <option value="ban">توصيل المبلغ، الرياض فقط</option>
                                    <option value="another">طرق أخرى</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 col-12  text-center "></div>


                        <div id="bank_acc" class="col-md-12 col-12  text-center" style=" display:none;">


                            <div class="row">


                                 <div class="col-md-6 col-12 text-center mb-3" id="demo"  dir="rtl">
                                    <div class="form-group form-check-inline pl-5">
                                        <input  type="checkbox" name="c1" onclick="showMe('div1')">
                                        <label class="form-check-label font-weight-bold mr-3" for="exampleCheck1"> حسابي الشخصي  </label>
                                    </div>

                                </div>


                                <div class="col-md-6 col-12 text-center mb-3" id="demo"  dir="rtl">

                                    <div class="form-group form-check-inline pl-5">
                                        <input type="checkbox"  name="c1" onclick="showMe('div2')" >
                                        <label class="form-check-label font-weight-bold mr-3" for="exampleCheck1"> حساب شخص آخر  </label>
                                    </div>

                                </div>

                            </div>


                        </div>






           <!-- another_way -->

                        <div id="another_way" class="data col-lg-12 col-sm-12 col-12" style=" display:none;">
                         <form id="myform">
                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">اسم الطريقة *</span>
                                    </div>
                                    <input type="text" oninvalid="InvalidMsg(this);"
                                    required="required"  oninput="InvalidMsg(this);"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>


                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">اسم المستلم*</span>
                                    </div>
                                    <input type="text"oninvalid="InvalidMsg(this);"
                                    required="required"  oninput="InvalidMsg(this);"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">الايميل *</span>
                                    </div>
                                    <input type="email"oninvalid="InvalidMsg(this);"
                                    required="required"  oninput="InvalidMsg(this);"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>


                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">التفاصيل  *</span>
                                    </div>
                                    <input type="text"oninvalid="InvalidMsg(this);" placeholder="أدخل الرقم ان وجد"
                                    required="required"  oninput="InvalidMsg(this);"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>


                               <div class="d-flex d-inline justify-content-between w-100 mb-4">

                                <input type="submit" class="btn btn-secondary  my-3  mx-2" value="حفظ  ">

                                <input type="submit" class="btn btn-secondary  my-3  mx-2" value=" هذه المعاملة  ">

                                 </div>

                            </form>

                        </div>
         <!-- another_way -->




                    <!-- paybal -->

                        <form id="myform" class="w-100">
                        <div id="paybal_acc" class="data col-md-12 col-12 col-12" style=" display:none;">

                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text " id="basic-addon1">حساب باي بال   *</span>
                                    </div>
                                    <input oninvalid="InvalidMsg(this);"
                                    required="required"  oninput="InvalidMsg(this);"  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>


                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">إعادة الحساب *</span>
                                    </div>
                                    <input oninvalid="InvalidMsg(this);" onpaste="return false;" id="onpaste"
                                    required="required"  oninput="InvalidMsg(this);"  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">الاسم المرتبط بالحساب</span>
                                    </div>
                                    <input placeholder="اختياري" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>




                                <div class="d-flex d-inline justify-content-between w-100 mb-4">

                                    <input type="submit" class="btn btn-secondary  my-3  mx-2" value="حفظ  ">

                                    <input type="submit" class="btn btn-secondary  my-3  mx-2" value=" هذه المعاملة  ">

                                </div>



                        </div>

                         </form>

                            <!-- paybal -->



                        <div class=" col-md-12 col-12 text-center" >

                            <div class="row">

                                <!-- col-12 -->
                                <div class="col-md-12 col-12 text-center my-3" id="div1" style="display:none">
                                    <form id="myform" class="">


                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">اسم البنك* </span>
                                            </div>
                                            <input oninvalid="InvalidMsg(this);"
                                            required="required"  oninput="InvalidMsg(this);" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>


                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">الآيبان</span>
                                            </div>
                                            <input oninvalid="InvalidMsg(this);" placeholder="أدخل الأرقام الذي يبدأ ب SA  ، الراجحي يكفي 15 رقم"
                                            required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>


                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">إعادة</span>
                                            </div>
                                            <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder="أدخل الأرقام الذي يبدأ ب SA  ، الراجحي يكفي 15 رقم"
                                            required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>

                                        <div class="d-flex d-inline justify-content-between w-100 mb-4">

                                            <input type="submit" class="btn btn-secondary  my-3  mx-2" value="حفظ  ">

                                            <input type="submit" class="btn btn-secondary  my-3  mx-2" value=" هذه المعاملة  ">

                                        </div>
                                     </form>

                                </div>
                                    <!--</div>-->

                                <div class="col-md-12 col-12  text-center my-3" id="div2" style="display:none">
                                    <form id="myform">

                                    <div class="input-group mb-3" dir="rtl">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">اسم صاحب الحساب*  </span>
                                        </div>
                                        <input oninvalid="InvalidMsg(this);" placeholder="يجب التطابق مع الحساب "
                                        required="required"  oninput="InvalidMsg(this);" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>


                                    <div class="input-group mb-3" dir="rtl">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">اسم البنك* </span>
                                        </div>
                                        <input oninvalid="InvalidMsg(this);"
                                        required="required"  oninput="InvalidMsg(this);" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>


                                    <div class="input-group mb-3" dir="rtl">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">الآيبان</span>
                                        </div>
                                        <input oninvalid="InvalidMsg(this);" placeholder="أدخل الأرقام الذي يبدأ ب SA  ، الراجحي يكفي 15 رقم"
                                        required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>


                                    <div class="input-group mb-3" dir="rtl">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">إعادة</span>
                                        </div>
                                        <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder="أدخل الأرقام الذي يبدأ ب SA  ، الراجحي يكفي 15 رقم"
                                        required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>



                                    <div class="input-group mb-3" dir="rtl">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">علاقة الحساب بك</span>
                                        </div>
                                        <input oninvalid="InvalidMsg(this);"
                                        required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>


                                    <div class="d-flex d-inline justify-content-between w-100 mb-4">

                                        <input type="submit" class="btn btn-secondary  my-3  mx-2" value="حفظ  ">

                                        <input type="submit" class="btn btn-secondary  my-3  mx-2" value=" هذه المعاملة  ">

                                    </div>

                                 </form>
                                </div>


                            </div>
                            <!--/ ROW-->


                        </div>

                </div>

            </div>
            <!--End container -->


             <!--/ row -->
                <div class="row">
                    <div class="col-md-3 col-12 text-center mx-auto">

                            <div>
                                <a class="details btn btn-primary my-3 px-5 next pull-right" data-toggle="collapse" href="#pakage"  role="button" aria-expanded="false" aria-controls="collapseExample">
                                            التالى</a>
                            </div>


                    </div>
                </div>
               <!--/ row -->
            </div>
            <!--/ collapse -->


        </section>
        <!--/ section-3 -->



    <!--/ section-4 -->
    <section class="section-4 " >
        <div class="collapse" id="pakage">
            <!-- container -->
            <div class="container ">

                <div class="row ">

                    <div class="col-md-12 col-12 text-center text-primary">
                       <h3>تفاصيل الطلبية</h3>
                    </div>


                     <!-- col-12-->
                <div class="col-md-12 col-12 text-right font-weight-bolder mt-2" dir="rtl">
                    <form>
                        <label><h5>هل التفاصيل المدخلة في الموقع بخصوص هذه الطلبية صحيحة وكافية*؟</h5></label>
                            <label class="radio-inline px-5">
                            <input type="radio"  name='test' value="1">  نعم </label>

                            <label class="radio-inline pl-5">
                            <input  type="radio" id='watch-me' name='test' value="2" >  لا </label>
                    </form>

                    <div class="col-md-12 col-12  text-center my-3" id="show-me1" style="display:none">
                        <div class="input-group input-group-lg" dir="rtl">
                           <div class="input-group-prepend">
                             <span class="input-group-text">رسالة*</span>
                           </div>
                           <textarea class="form-control" id="textview-area" placeholder="اكتب التفاصيل الاضافية، أو الغير موضحة من قبل الموقع مع ذكر مشاكلها ان وجد" aria-label="With textarea"></textarea>
                        </div>

                    </div>

                </div>
                <!--/ col-12-->

                 <!-- col-12-->
                <div class="col-md-12 col-12 text-right font-weight-bolder mt-5" dir="rtl">
                    <form>
                        <label><h5>هل المنتجات في الطلبية جديدة*؟</h5></label>

                            <label class="radio-inline px-5">
                            <input type="radio"  name='test' value="a">  نعم </label>

                            <label class="radio-inline pl-5">
                            <input  type="radio" id='watch-me' name='test' value="b" >  لا </label>

                    </form>

                </div>

                    <div class="col-md-12 col-12  text-center my-3" id="show-me2" style="display:none">
                        <div class="input-group input-group-lg" dir="rtl">
                           <div class="input-group-prepend">
                             <span class="input-group-text">رسالة*</span>
                           </div>
                           <textarea class="form-control" id="textview-area" placeholder="اكتب اسم المنتج / المنتجات المستخدمة" aria-label="With textarea"></textarea>
                        </div>

                    </div>
                </div>
                <!--/ col-12-->

                </div>

                <div class="row">
                    <div class="col-md-3 col-12 text-center mx-auto">

                        <div>
                            <a class="pakage btn btn-primary my-3 px-5 next pull-right" data-toggle="collapse" href="#priceneeded"  role="button" aria-expanded="false" aria-controls="collapseExample">
                                        التالى</a>
                        </div>


                    </div>
                </div>


        </div>



    </section>




<!--/ section-5 -->
        <section class="section-5 "  style="margin-top: 160px;">
            <div class="collapse" id="priceneeded">
            <!-- container -->
                <div class="container">
                    <!-- Row -->
                    <div class="row" >

                        <!-- col-4 -->
                        <div class=" col-md-12 col-12 text-center">
                            <h3 class="text-primary">قيمة الطلبية</h3>
                        </div>

                      <div class=" col-lg-12 col-12 text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text w-auto" id="basic-addon1">المبلغ المطلوب من البائع * </span>
                            </div>
                            <input  oninvalid="InvalidMsg(this);"
                            required="required"  oninput="InvalidMsg(this);"  type="number" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class=" col-lg-12 text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text w-auto" id="basic-addon1">إعادة المبلغ المطلوب *</span>
                            </div>
                            <input oninvalid="InvalidMsg(this);"
                            required="required"  oninput="InvalidMsg(this);" type="number" onpaste="return false;" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="col-12 text-center mx-auto">

                        <div>
                            <a class="priceneeded btn btn-primary my-3 px-5 next pull-right "
                            data-toggle="collapse" href="#last-Stp"  role="button" aria-expanded="false" aria-controls="collapseExample" onclick="myFunction()">
                                        التالى</a>
                        </div>
                    </div>


                    </div>
                    <!--/ Row -->
                </div>
                <!--/ Container -->
            </div>
            <!--/ collapse -->
        </section>
        <!--/ section-5 -->



 <!--/ section-6 -->

<section class="section-6">
     <!-- collapse -->
    <div class="collapse" id="last-Stp" >
          <!-- container -->
        <div class="container">
            <!-- row -->
            <form id="idform" class="w-100">
            <div class="row">
                   <!-- col-md-6  -->
                   <div class=" col-md-6 col-12 text-center mx-auto">
                       <div class="input-group my-3" dir="rtl">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">تكلفة التوصيل</label>
                                    </div>
                                    <select required class="custom-select" id="test" name="form_select" onchange="showDiv('hidden_div3', this)" >
                                      <option selected>أختار ...</option>
                                      <option value="1"> فيديكس 14 ريال </option>
                                      <option value="2">ارامكس 18 ريال</option>
                                      <option value="3">زاجل 12 ريال </option>
                                    </select>
                    </div>
                </div>
                        <!-- col-md-6  -->


                        <!-- col-md-6  -->
                   <div class=" col-md-6 col-12 text-center mx-auto">
                       <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">سيدفع تكلفة التوصيل</label>
                                    </div>
                                    <select required class="custom-select" id="test" name="form_select" onchange="showDiv('hidden_div3', this)" >
                                      <option selected>أختار ...</option>
                                      <option value="1">أنا (الدفع الآن) </option>
                                      <option value="2">المشتري</option>

                                    </select>
                    </div>
                </div>
                <!-- col-md-6  -->


                        <!-- col-md-12  -->
                   <div class=" col-md-12 col-12 text-center mx-auto">
                    <div class="input-group mb-3" dir="rtl">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">أدخل رقم جناح المشترى * </span>
                        </div>
                        <input  placeholder="يجب اختيار مشترى"oninvalid="InvalidMsg(this);"
                        required="required"  oninput="InvalidMsg(this);"  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <!-- col-md-12  -->


                 <!-- col-md-12  -->
                    <div class=" col-md-12 col-12 text-center mx-auto">

                        <h3>الرجاء التأكد من تفاصيل المشتري</h3>

                    </div>
                    <!-- col-md-12  -->


                    <div class="col-md-3 col-12  text-center mx-auto">
                    <input type="submit"class="btn btn-primary my-3 px-5 next pull-right"  value=" ادفع الأن ">

                    </div>


            </div> <!-- row -->
              </form>
        </div>
        <!-- container -->
    </div>
    <!-- collapse -->
</section>
 <!--/ section-4 -->



@push("script")


<script>

    function showMe (box)
    {
        var chboxs = document.getElementsByName("c1");

        var vis = "none";
        for(var i=0;i<chboxs.length;i++)
        {
            if(chboxs[i].checked)
            {
             vis = "block";
                break;
            }
        }
        document.getElementById(box).style.display = vis;
    }

</script>
 <!-- Checkbox show & hide div -->



         <script>
            function showDiv(divId, element)
                {
                    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
                }
         </script>


         <script>

                 $('.entertoservice').click(function(){
                $('#entertoservice' ).toggle();
        });



                 $('.details').click(function(){
                $('#details' ).toggle();
        });



                 $('.pakage').click(function(){
                $('#pakage' ).toggle();
        });

                $('.priceneeded').click(function(){
                $('#priceneeded' ).toggle();
        });


         </script>


  <script type="text/javascript">


        function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
    }

  </script>


 <!-- Radio Button show & hide div -->
<script>

    $("input[name='test']").click(function () {
    $('#show-me1').css('display', ($(this).val() === '2') ? 'block':'none');
    });

</script>

<script>

    $("input[name='test']").click(function () {
    $('#show-me2').css('display', ($(this).val() === 'b') ? 'block':'none');
    });

</script>
 <!-- Radio Button show & hide div -->


<script>

    function showDiv(select) {
        document.getElementById('paybal_acc').style.display = "none";
        document.getElementById('another_way').style.display = "none";
        document.getElementById('bank_acc').style.display = "none";
        if (select.value == 'paybal') {

            document.getElementById('paybal_acc').style.display = "block";
           document.getElementById('another_way').style.display = "none";
        document.getElementById('bank_acc').style.display = "none";

        } else if (select.value == 'another') {

            document.getElementById('another_way').style.display = "block";
            document.getElementById('bank_acc').style.display = "none";
            document.getElementById('paybal_acc').style.display = "none";

        } else if (select.value == 'bank') {

            document.getElementById('bank_acc').style.display = "block";
            document.getElementById('paybal_acc').style.display = "none";
        document.getElementById('another_way').style.display = "none";

        }
      }

</script>



 <script type="text/javascript">

        // $('.first-step').click(function(){
        // $('#first-hider' ).show();
        // });

        $('.then-step').click(function(){
        $('#then-hider' ).show();
        });

        $('.majorpoints').click(function(){
        $('.section-2' ).find('.hider').show();
        });

        $('.first-hider').click(function(){
        $('#first-hider' ).hide();
        });

        $('.then-hider').click(function(){
        $('#then-hider' ).hide();
        });

        $('.majorpoints2').click(function(){
        $('.section-3' ).find('.hider').toggle();
        });

        function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
    }

    $("#imgInp").change(function() {
    readURL(this);
    });


</script>

@endpush
