@extends('template.ar_template')
@section('title', 'نموذج المتسوق الشخصي')
@section('content')






    <!--Start product -->
    <section class="other_nav_link" style="position: relative; top: 160px;"section>
        <!-- Start container-->
        <div class="container">

            <div class="row " id="first-styp">
                <div class=" col-md-12 col-12  text-center my-3">
                    <h3 class="">نموذج المتسوق الشخصي</h3>
                </div>
                <!--</div>-->


                <!--</div>-->
                <div class="col-md-12 col-12 text-right" dir="rtl">
                    <div class="row bg-basket rounded font-weight-bold text-right py-3 my-3">
                        <ol class=" col-12 d-block pr-5 text-blue list-unstyled">ملاحظات هامة :
                            <li class="my-2">‌أ. يجب توفر رابط للمنتجات من المتاجر الالكترونية المطلوبة لطلب الخدمة	</li>
                            <li class="my-2">‌ب.	 عند عدم وجود رابط للمنتجات المطلوبة،  <a href="#"class="text-primary"> نموذج الاستيراد</a> </li>
                            <li class="my-2">‌ج.  يوجد مبلغ مقدم رمزي لإتمام الطلب. </li>
                            <li class="my-2">‌د.    للعملاء من داخل السعودية يمكن الطلب من أي متجر محلي او عالمي. </li>
                            <li class="my-2">‌‌هـ. للعملاء من خارج السعودية الطلب من المتاجر داخل السعودية فقط.</li>
                            <li class="my-2"> و.   لاستيراد او طلب شراء قطع غيار السيارات، <a href="# " class="text-primary">نموذج قطع غيار السيارات</a> </li>
                            <li class="my-2"> ز. لمعرفة المميزات ورسوم الخدمة يرجى مراجعة،  <a href="#" class="text-primary"> خدمة المتسوق الشخصي</a></li>
                        </ol>

                        <div class="col-md-3 col-12  text-center mx-auto">

                        <a class="btn btn-primary my-1 px-5 first-styp" href="#first-one"  data-toggle="collapse"
                        data-target="#first-one" aria-controls="first-one">  الدخول للخدمة</a>

                    </div>
                    </div>

                </div>
                <!--</div>-->


            </div>
        </div>
        <!--End container-->
    </section>



    <section class="section-2 " style=" margin-top: 180px;">

        <div class="" >
        <!-- container -->
            <div class="container" >


                <div class="row collapse" id="first-one">


                    <div class="col-md-6 col-12 text-center mb-3" id="demo"  >
                       <div class="form-group form-check-inline ">
                           <label class="form-check-label font-weight-bold ml-3" for="exampleCheck1"> مشاركة معلومات الموقع الذي تريد الشراء منه </label>
                           <input  type="checkbox" name="c1" onclick="showMe('div1')">
                       </div>

                   </div>


                   <div class="col-md-6 col-12 text-center mb-3" id="demo"   >

                       <div class="form-group form-check-inline ">
                           <label class="form-check-label font-weight-bold ml-3" for="exampleCheck1">تعبئة النموذج بإدخال تفاصيل كل منتج  </label>
                           <input type="checkbox"  name="c1" onclick="showMe('div2')" >
                       </div>

                   </div>

                   <!-- <div class="col-md-3 col-12  text-center mx-auto">

                    <a class="btn btn-primary my-1 px-5 first-styp" href="#showHide"  data-toggle="collapse"
                    data-target="#showHide" aria-controls="showHide">  التالي </a>

                </div> -->

               </div>



               <div class="row"  dir="rtl">

                <!-- id="div1"-->
                <div class="col-md-12 col-12 text-center my-3" id="div1" style="display:none" dir="rtl">
                    <div class=" d-inline text-center w-100 mb-4">
                        <h5>ملاحظة: تأكد من إضافة المنتجات في سلة المتجر، الذي تريد الشراء منه، قبل تعبئة النموذج. <br/>
                            أدخل المعلومات الخاصة للدخول في المتجر الذي تريد الشراء منه</h5>
                        <p class="text-danger" dir="rtl"> تنبيه: أدخل معلومات متجر واحد فقط، في النموذج.</p>
                    </div>

                    <form id="myform" class="">


                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"> اسم الموقع </span>
                            </div>
                            <input oninvalid="InvalidMsg(this);"
                            required="required"  oninput="InvalidMsg(this);" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>


                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">الربط *</span>
                            </div>
                            <input oninvalid="InvalidMsg(this);" placeholder="الربط"
                            required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">اسم المستخدم</span>
                            </div>
                            <input  placeholder=""
                             type="text"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"> اعادة</span>
                            </div>
                            <input  placeholder=""
                             type="text"  class="form-control" onpaste="return false;" aria-label="Username" aria-describedby="basic-addon1">
                        </div>


                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">الأيميل</span>
                            </div>
                            <input oninvalid="InvalidMsg(this);"   placeholder=" "
                            required="required"  oninput="InvalidMsg(this);" type="email" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">اعادة</span>
                            </div>
                            <input oninvalid="InvalidMsg(this);"   onpaste="return false;" placeholder=" "
                            required="required"  oninput="InvalidMsg(this);" type="email" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>


                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text pr-5 " id="basic-addon1"> كلمة المرور  </span>
                            </div>
                            <input data-toggle-password-field class="form__input form-control" id="password" onpaste="return false;" type="password" placeholder="كلمة المرور "
                                name="password" required minlength="8" aria-describedby="passwordHint" autocomplete="current-password"
                                data-error="The password should range from 8 to 20 and contain upper and lower case letters"
                                data-empty="Please fill out this field">
                                <button type="button" hidden aria-pressed="false" class="form__toggle-password input-group-text w-auto" data-toggle-password>
                                <span>Show </span>
                            </button>                            </div>

                        <div class="input-group mb-3"  >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">اعادة</span>
                            </div>
                            <input oninvalid="InvalidMsg(this);"   onpaste="return false;" placeholder=" "
                            required="required"  oninput="InvalidMsg(this);" type="password" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="d-md-flex d-inline justify-content-between w-100 my-5">

                            <div class="col-md-4 col-12 text-center  ">
                                <button class="btn btn-secondary rounded-1 mb-3" Onclick="return ConfirmDelete();" type="reset" name="actiondelete" value="1"><i class="fa fa-1x fa-trash-alt px-3"></i></button>
                            </div>

                            <div class="col-md-4 col-12 text-center">
                                <div class="  ">

                                    <button class="btn-danger rounded-1 text-center font-weight-bold m" type="submit" >ارسال</button>
                                </div>
                            </div>

                        </div>
                     </form>

                </div>
                  <!--id="div1-->





                  <!--id="div2-->
                <div class="col-md-12 col-12  text-center my-3" id="div2" style="display:none" dir="rtl">

     <form id="myform">
        <div class="row">

            <div class="col-md-12 col-12 text-center font-weight-bolder my-2">

                <h6> أدخل تفاصيل صحيحة للمنتج للحصول على الرد في أسرع وقت ممكن </h6>
                <h6 class="text-danger"> تنبيه : ادخل تفاصيل منتج و احد فقط فى النموذج</h6>

            </div>
            <div class="col-md-12 col-12  my-2  text-center">
                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">الرابط</span>
                    </div>
                    <input  oninvalid="InvalidMsg(this);"
                        oninput="InvalidMsg(this);"
                        required="required" id="textview" type="text" class="form-control" placeholder="الصق الرابط هنا" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <!--</div>-->
            <div class=" col-md-12 col-12  my-2  text-center">
                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">الأسم</span>
                    </div>
                    <input  id="textview1" type="text" class="form-control" placeholder="اختيارى" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <!--</div>-->
            <div class="col-md-12 col-12  my-2  text-center mb-3">
                <div class="input-group input-group-lg" dir="rtl">
                    <div class="input-group-prepend">
                      <span class="input-group-text">الوصف</span>
                    </div>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>
            </div>
            <!--</div>-->
            <div class="col-md-4 col-12 text-center">
                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">الوزن</span>
                    </div>
                    <input   id="textview2"type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <!--</div>-->
            <div class=" col-md-4 col-12 text-center">
                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">اللون*</span>
                    </div>
                    <input  oninvalid="InvalidMsg(this);"
                    oninput="InvalidMsg(this);"
                    required="required" id="textview3" type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <!--</div>-->
            <div class=" col-md-4 col-12 text-center">
                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">المقاس*</span>
                    </div>
                    <input  oninvalid="InvalidMsg(this);"
                    oninput="InvalidMsg(this);"
                    required="required"  id="textview4" type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <!--</div>-->
            <div class="col-md-4 col-12 text-center">
                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">الشحن إلى*</label>
                    </div>
                    <select  oninvalid="InvalidMsg(this);"
                    oninput="InvalidMsg(this);"
                    required="required" class="custom-select" id="inputGroupSelect01" dir="rtl" >
                      <option selected>أختار ...</option>
                      <option value="1">الامارات</option>
                      <option value="2">الكويت</option>
                      <option value="2">مصر</option>
                    </select>
                </div>
            </div>
            <!--</div>-->
            <div class=" col-md-4 col-12 text-center">
                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">عرض إضافى*</label>
                    </div>
                    <select oninvalid="InvalidMsg(this);"
                    oninput="InvalidMsg(this);"
                    required="required" class="custom-select" id="inputGroupSelect01" dir="rtl" >
                      <option selected>أختار ...</option>
                      <option value="1">أريد هذا الرابط بالظبط</option>
                      <option value="2">أريد هذا المنتج بأقل سعر</option>
                    </select>
                </div>
            </div>
            <!--</div>-->
            <div class=" col-md-4 col-12 text-center">
                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">المبلغ</span>
                    </div>
                    <input   id="textview5" type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>






        </div>

        <div class="row  ">


            <div class="col-md-4 col-6 text-center">
                <div class=" btn-secondary rounded-1 text-center px-2 py-2 my-2">
                    <a class=" text-decoration-none text-light  font-weight-bold" href="#"> ارسال  </a>
                </div>
            </div>

          <div class="col-md-4 col-6 text-right">
                <div class="btn-secondary rounded-1 text-center px-2 py-2 my-2">
                    <a class=" text-decoration-none text-light  font-weight-bold" href="#"> إضافة منتج  </a>
                </div>
            </div>


            <div class="col-md-4 col-12 text-center text-center my-2">
                <button class="btn btn-danger rounded-1" Onclick="return ConfirmDelete();" type="reset" name="actiondelete" value="1"><i class="fa fa-1x fa-trash-alt px-3"></i></button>
                </div>




            </div>





                 </form>
                </div>
                <!--id="div2-->


            </div>



            <div class="collapse"id="showHide" dir="rtl">

                <div class="row">

                    <div class="col-md-12 col-12 text-center font-weight-bolder my-2">

                        <h6 dir="rtl"> تأكد من إضافة المنتجات في سلة المتجر، الذي تريد الشراء منه، قبل تعبئة النموذج.
                            أدخل المعلومات الخاصة للدخول في المتجر الذي تريد الشراء منه.
                             </h6>
                        <h6 class="text-danger "style="color: red;"> تنبيه: أدخل معلومات متجر واحد فقط، في النموذج</h6>

                    </div>
                    <div class="col-md-12 col-12  my-2  text-center">
                        <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">الرابط*</span>
                            </div>
                            <input  oninvalid="InvalidMsg(this);"
                                oninput="InvalidMsg(this);"
                                required="required" id="textview" type="text" class="form-control" placeholder="الرابط" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <!--</div>-->
                    <div class=" col-md-12 col-12  my-2  text-center">
                        <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">الأسم</span>
                            </div>
                            <input  id="textview1" type="text" class="form-control" placeholder="الأسم" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <!--</div>-->
                    <div class="col-md-12 col-12  my-2  text-center mb-3">
                        <div class="input-group input-group-lg" >
                            <div class="input-group-prepend">
                              <span class="input-group-text">الوصف</span>
                            </div>
                            <textarea class="form-control" placeholder="الوصف" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                    <!--</div>-->
                    <div class="col-md-4 col-12 text-center">
                        <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">الحجم *</span>
                            </div>
                            <input   id="textview2" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <!--</div>-->
                    <div class=" col-md-4 col-12 text-center">
                        <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">اللون*</span>
                            </div>
                            <input  oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);"
                            required="required" id="textview3" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <!--</div>-->
                    <div class=" col-md-4 col-12 text-center">
                        <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Weight </span>
                            </div>
                            <input  oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);"
                            required="required"  id="textview4" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <!--</div>-->
                    <div class="col-md-4 col-12 text-center">
                        <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">الشحن الي*</label>
                            </div>
                            <select  oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);"
                            required="required" class="custom-select" id="inputGroupSelect01"  >
                              <option selected>اختيار..</option>
                              <option value="1">...</option>
                              <option value="2">...</option>
                              <option value="2">...</option>
                            </select>
                        </div>
                    </div>
                    <!--</div>-->
                    <div class="col-md-6 col-12 input-group mb-3 "  >
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"> عروض اضافية*</label>
                        </div>
                        <select  oninvalid="InvalidMsg(this);"
                        oninput="InvalidMsg(this);"
                        required="required" class="custom-select" id="inputGroupSelect01"   >
                            <option selected>اختيار..</option>
                            <option value="1">أريد هذا الرابط بالضبط </option>
                            <option value="2">أريد نفس المواصفات بأقل سعر </option>
                        </select>
                        </div>
                    <!--</div>-->
                    <div class=" col-md-4 col-12 text-center">
                        <div class="input-group mb-3" >
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">السعر </span>
                            </div>
                            <input   id="textview5" type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                </div>

                <div class="row   flex-row-reverse my-5">


                    <div class="col-md-4 col-12 text-center">
                        <div class=" btn-danger rounded-1 text-center px-2 py-2 ">
                            <a class=" text-decoration-none text-light  font-weight-bold" href="#"> ارسال  </a>
                        </div>
                    </div>

                  <div class="col-md-4 col-12 text-center">
                        <div class="btn-secondary rounded-1 text-center px-2 py-2 ">
                            <a class=" text-decoration-none text-light  font-weight-bold" href="#"> اضافة منج   </a>
                        </div>
                    </div>


                    <div class="col-md-4 col-12 text-center  ">
                        <button class="btn btn-danger rounded-1" Onclick="return ConfirmDelete();" type="reset" name="actiondelete" value="1"><i class="fa fa-1x fa-trash-alt px-3"></i></button>
                    </div>




                </div>
            </div>



        </div>
    </div>
</section>

@endsection


@push('script')
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
<script type="text/javascript">

        $('.then-step').click(function(){
        $('#then-hider' ).show();
        });
        // $('.showHide').click(function(){
        // $('#showHide' ).toggle();
        // });
        $('.first-styp').click(function(){
        $('#first-styp' ).hide();
        });


        // $('.first-hider').click(function(){
        // $('#first-hider' ).hide();
        // });

function clean(){
  document.getElementById("textview").value = "";
  document.getElementById("textview1").value = "";
  document.getElementById("textview2").value = "";
  document.getElementById("textview3").value = "";
  document.getElementById("textview4").value = "";
  document.getElementById("textview5").value = "";

}
</script>

<script type="text/javascript">
    $(document).ready(function() {

        var checked = 0;

        $('input[type="checkbox"]').click(function() {
            var $b = $('input[type=checkbox]');
            checked = $b.filter(':checked').length;
            //alert('There are [' + checked + '] checked checkboxes');

            /***  SEE NOTES AT TOP: USE PROP() INSTEAD OF ATTR()  ***/
            if (checked > 2) {
                $("input:checkbox:not(:checked)").attr('disabled','disabled');
            }else{
                $('input[type=checkbox]').removeAttr('disabled');
            }
        });

    }); //END $(document).ready()

</script>
@endpush