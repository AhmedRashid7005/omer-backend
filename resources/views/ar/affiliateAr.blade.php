@extends('template.ar_template')
@section('title', 'Affiliate')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
@endpush




 <!--/ section-1 -->
    <section class="section-1 other_nav_link mt-3" style="position: relative; top: 180px;">
        <!-- container -->
        <div class="container ">
            <!-- ROW -->
            <div class="row ">

                <div class=" col-md-6 col-12 ">
                    <img class="afliat img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/opy.png">
                </div>

                <div class="col-md-6 col-12 text-right my-md-5" dir="rtl">
                    <h5>
                        بإمكان المشاهير أو من لديهم جمهور كبير، والعملاء المشتركين في الخطة المميزة وخطة والتجار تسويق الموقع، وذلك بإنشاء رابط وكود خاص عبر لوحة تحكم العميل، ونشره في المواقع الالكترونية ووسائل التواصل الاجتماعية لكسب أموال عن كل مشترك يسجل في الموقع عبر الرابط او الكود الخاص بالمسوق
                    </h5>
                </div>

                <div class="col-md-12 col-12 text-right my-md-2" dir="rtl">
                    <h3 class="text-center my-3">آلية احتساب الأرباح </h3>
                <div class="row my-md-3">
                    <div class="col-md-2 ">  </div>
                    <div class="col-md-4 col-12 d-flex  justify-content-between"> 
                        <img class=" img-fluid w-25 h-50 mx-2" src="{{ URL::asset('public/themeAssets')}}/images/p22.png">
                        <p class="text-primary">
                        يحصل العميل المشترك في الخطة المميزة، 20 ريال عن كل مشترك، يشترك في الخطة المميزة، و 35 ريال عن كل مشترك، يشترك في خطة التجار.
                    </p>
                    <br/>
                    </div>
                 
                    <div class="col-md-4 col-12 d-flex justify-content-between">
                        <img class=" img-fluid w-25 h-50 mx-2" src="{{ URL::asset('public/themeAssets')}}/images/p28.png">
                        <p class="text-primary">
                            يحصل العميل المشترك في خطة التجار، 35 ريال عن كل مشترك، يشترك في الخطة المميزة
                                و 50 ريال عن كل مشترك، يشترك في خطة التجار.
                        </p>
                    </div>

                    <div class="col-md-2  ">  </div>
                </div>
                

                </div>


                <div class=" col-md-12 col-12 mx-auto text-center ">
                    <h5>الخصومات التي يحصل عليها الزائر عند الاشتراك باستخدام الرابط او الكود </h5>

                </div>

                <div class=" col-md-6 col-12 my-md-2">
                    <img class="afliat img-fluid" src="{{ URL::asset('public/themeAssets')}}/images/unn.png">
                </div>

                <div class="col-md-6 col-12 text-right my-md-5" dir="rtl">
                    <p class="text-primary"> 
                    <i  class="mx-2 fas fa-2x fa-percent text-primary"></i>
                    خصم 30 ريال عند الاشتراك في الخطة المميزة 
                    </p>
                    <br/>
                    <p class="text-primary">
                    <i class="mx-1 fa-2x fas fa-tags text-primary"></i>
                    خصم 50 ريال عند الاشتراك في خطة التجار
                    </p>

                </div>


               

                <div class="col-md-4 col-12 text-center my-md-5 mb-2">
                    <div class=" open-modal  ">
                        <a  href="#myModal1" class="btn btn-danger trigger-btn"  data-toggle="modal"> لدي جمهور كبير  </a>
                    </div>
                </div>


                <div class="col-md-4 col-12 text-center my-md-2 mb-2">
                    <div class="   ">
                        <a  href="{{route("subscriptionPlansAr")}}" class="btn btn-danger trigger-btn" >  اربح معنا الآن  </a>
                    </div>
                </div>


                <div class="col-md-4 col-12 text-center my-md-5 mb-2">
                    <div class=" open-modal  ">
                        <a  href="#myModal2" class="btn btn-danger trigger-btn"  data-toggle="modal">  أرباحي  </a>
                    </div>
                </div>

                

            </div>
            <!--/ ROW -->
        </div>
        <!--/ container -->
    </section>
    <!--/ section -->




<!-- My_model  -->
    <div id="myModal1" class="modal fade text-center">
        <div class="modal-dialog">
            <div class="col-lg-10 col-sm-10 col-12 main-section">
                <div class="modal-content">
                   

                    <div class="col-lg-12 col-sm-12 col-12 user-name">
                        <button type="button" class="close mb-3" data-dismiss="modal">×</button>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-12 form-input">

                        <form>
                            <div class="form-group">
                                <input oninvalid="InvalidMsg(this);" 
                                oninput="InvalidMsg(this);"
                                required="required"  type="text" class="form-control" placeholder="الاسم الثلاثي*" dir="rtl">
                            </div>

                            <div class="form-group">
                                <input oninvalid="InvalidMsg(this);" 
                                oninput="InvalidMsg(this);"
                                required="required" type="email" class="form-control" placeholder="ايميل" dir="rtl">
                            </div>

                            <div class="form-group mx-auto" >
                             
                                 
                                <div class="input-group mb-3 inputGroupSelect01 mx-auto  text-center" >
                                    <form class="mx-auto ">
                                        <input   class="input-group"id="phone" name="phone" type="tel">
                                        <!-- <button  class="input-group-text py-2 w-auto" type="submit">رمز اتصال الدوله</button> -->
                                      </form>                 
                                </div>             
                               
                            </div>

                            <h5>أضف رابط موقعك او الحسابات الذي ستسوق فيه</h5>

                            <div class="input-group mb-1" dir="rtl">
                                                
                                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert1"> إضافة</button>
                            </div>
                            
                            <div class="collapse" id="insert1">

                                <div class="form-group "   >
                                    <input oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
                                        required="required"  type="text" class="form-control mb-3" placeholder="  "  >

                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert2"> إضافة</button>

                                </div>

                                <div id="insert2" class="collapse">
                                    <div class="form-group mb-3"   >
                                        <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert3"> إضافة</button>

                                </div>
                                      <div class="collapse" id="insert3">

                                <div class="form-group "   >
                                    <input oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
                                        required="required"  type="text" class="form-control mb-3" placeholder="  "  >

                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert4"> إضافة</button>

                                </div>

                                <div id="insert4" class="collapse">
                                    <div class="form-group mb-3"   >
                                        <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert5"> إضافة</button>


                                </div>

                                
                                      <div class="collapse" id="insert5">

                                <div class="form-group "   >
                                    <input oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);"
                                        required="required"  type="text" class="form-control mb-3" placeholder="  "  >

                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert6"> إضافة</button>

                                </div>

                                <div id="insert6" class="collapse">
                                    <div class="form-group mb-3"   >
                                        <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                </div>
                                    
                            </div>     
                            </div>   
                            </div>
                            
                       

                     
                            
                            <button type="submit" class="btn btn-primary">إرسال</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<!--/ My_model -->




<!-- My_model-2  -->
    <div id="myModal2" class="modal fade text-center">
        <div class="modal-dialog">
            <div class="col-lg-10 col-sm-10 col-12 main-section">
                <div class="modal-content">
                  
                    <div class="col-lg-12 col-sm-12 col-12 user-name">
                        <button type="button" class="close mb-3" data-dismiss="modal">×</button>
                    </div>

                    <div class="col-lg-12 col-sm-12 col-12 form-input">
                        <form>

                            <div class="form-group">
                                <input oninvalid="InvalidMsg(this);" 
                                oninput="InvalidMsg(this);"
                                required="required"  type="text" class="form-control" placeholder=" أدخل اسمك او ايميلك او الرقم الخاص بالأفليت " dir="rtl">
                            </div>

                            <div class="col-md-12" > 
                                <div class="input-group my-3" dir="rtl">
                                            
                                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert0"> إدخال </button>

                                </div>
                            </div> 
                            
                            <div  class="row collapse" id="insert0">

                                <div class="col-md-3 col-12 my-3">
                                    <div class="bg-basket mx-auto text-center p-2"  style="height: 150px;">
                                        <p>اجمالي المشتركين</p>
                                        <br>
                                       
                                        <h4>25 مشترك</h4>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12 my-3">
                                    <div class="bg-basket  mx-auto text-center p-2" style="height: 150px;">
                                        <p>المشتركون في الخطة المميزة</p>

                                        <h4>10 مشترك</h4>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12 my-3">
                                    <div class="bg-basket mx-auto text-center p-2" style="height: 150px;">
                                        <p>المشتركون في خطة التجار</p>
                                        <h4>15 مشترك</h4>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12  my-3">
                                    <div class="bg-basket  mx-auto text-center p-2" style="height: 150px;">
                                        <p>مجموع الأرباح </p>
                                         <br>
                                        <h4 class="mt-1">145 ريال</h4>
                                    </div>
                                </div>

                                
                                <div class="col-md-6 col-12 mb-2">
                                    <button type="button" class="btn btn-primary"> غير مشترك </button>
                                </div>


                                <div class="col-md-6 col-12 mb-2">
                                    <button type="button" class="btn btn-secondary"> مشترك في الموقع </button>
                                </div>
                                    
                            </div>
                    
                            <!-- <button type="submit" class="btn btn-primary">إرسال</button> -->
                        </form>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
<!--/ My_model -->


@endsection