@extends('template.ar_template')
@section('title', 'نموذج-قطع-غيار-السيارات')
@section('content')






    <!--Start section-1  -->
    <section class="other_nav_link" style="position: relative; top: 160px;">
        <!-- Start container-->
        <div class="container">


            <div class="row " id="first-styp" >


                <div class=" col-md-12  font-weight-bolder text-primary text-center my-3">
                    <h3>نموذج طلب  قطع غيار السيارات</h3>

                </div>



                <!--</div>-->
                <div class="col-md-12 bg-basket rounded text-center mb-5" >
                    <div class="col-lg-12 text-right  p-2 ">
                        <ol class=" col-12 d-block pr-md-5 text-blue list-unstyled font-weight-bolder" dir="rtl">ملاحظات :
                            <li  class="my-2">‌أ.	 الخدمة خاصة لعملاء من داخل السعودية</li>
                            <li class="my-2">‌ب. يجب إدخال معلومات رخصة سير، أو صورة لها  </li>
                            <li class="my-2">‌ج. إمكانية طلب شراء من الرياض وأمريكا والصين فقط.</li>
                            <li class="my-2">د. يوجد مبلغ مقدم رمزي لإتمام الطلب</li>
                            <li class="my-2">ه. يمكن طلب او استيراد حتى مكينة، جيربكس، وأي قطعة للسيارة </li>
                            <li class="my-2">و . عند وجود رابط من المتاجر الإلكترونية للقطعة، <a  class="text-primary"href="Personal-Shopper-AR.html">المتسوق الشخص</a> لتوفير العمولة  </li>
                            <li class="my-2">ح .لاستيراد منتجات أخرى، <a href="Import-solutions-AR.html" class="text-primary">حلول الإستيراد</a>    </li>
                            <li class="my-2">ط .لمعرفة المميزات والرسوم يرجى مراجعة <a  class="text-primary"href="خدمة_Make-an-Order-to-purchase-auto-parts-AR.html">طلب قطع غيار السيارات</a>    </li>
                        </ol>

                    </div>

                    <div class="col-md-3 col-12  text-center mx-auto">
                        <a class="btn btn-primary my-1 px-5   first-styp"  data-toggle="collapse"
                                    href="#first-hider" role="button" aria-expanded="true"
                                    aria-controls="collapseExample">  الدخول للخدمة</a>

                    </div>

                </div>


            </div>
            <!-- container -->

        </section>
    <!--/ section-1 -->



    <!--/ section-2 -->
        <section class="section-2 " style=" margin-top: 160px;" >
            <div class="collapse" id="first-hider">
            <!-- container -->
                <div class="container my-4" id="showHide">
                    <!-- Row -->
                    <div class="row">

                        <!-- col-4 -->


                        <div class=" col-md-12 col-12 text-center mb-5">
                            <div  class="col-md-12 col-12  text-center" >


                                <div class="row">

                                        <div class="col-md-6 col-12 text-center mb-3" id="demo"  dir="rtl">
                                           <div class="form-group form-check-inline pl-5">
                                               <input type="checkbox" name="cc1" onclick="showMe('option1')">
                                               <label class="form-check-label font-weight-bold mr-3" for="exampleCheck1">  صورة رخصة السيارة </label>
                                           </div>

                                       </div>


                                       <div class="col-md-6 col-12 text-center mb-3" id="demo"  dir="rtl">

                                           <div class="form-group form-check-inline pl-5">
                                               <input type="checkbox"  name="cc1" onclick="showMe('option2')" >
                                               <label class="form-check-label font-weight-bold mr-3" for="exampleCheck1"> إدخال  معلومات السيارة</label>
                                           </div>

                                       </div>



                                    <div class=" col-md-12 col-12 text-center " >

                                        <div class="row ">

                                            <!-- col-12 -->
                                            <div class="col-md-6 col-12 text-center my-3" id="option1" style="display:none">
                                                <form class="text-right border wrapper d-flex" id="form1" runat="server" dir="rtl">
                                                    <div class="file-upload">
                                                        <input class="inputfile " id="image-file2" type="file" multiple/>
                                                        <i class="fa fa-3x fa-image"></i>

                                                      </div>
                                                      <div  class="content-img content-img2 w-50  "></div>
                                                  </form>

                                                <div class=" my-3 px-3">
                                                    <button type="button" class="btn btn-primary px-5">إرسال</button>
                                                </div>

                                            </div>
                                                <!--</div>-->



                                            <div class="col-md-12 col-12  text-center my-3" id="option2" style="display:none">
                                           <form id="myform">

                                                <div class="input-group mb-3" dir="rtl">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">رقم الهيكل* </span>
                                                    </div>
                                                    <input type="text"  oninvalid="InvalidMsg(this);"
                                                    oninput="InvalidMsg(this);" required="required" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>


                                                <div class="input-group mb-3" dir="rtl">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">إعادة الرقم*</span>
                                                    </div>
                                                    <input type="text" oninvalid="InvalidMsg(this);"
                                                    oninput="InvalidMsg(this);" required="required" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>


                                                <div class="input-group mb-3" dir="rtl">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">ماركة المركبة*</span>
                                                    </div>
                                                    <input type="text" oninvalid="InvalidMsg(this);"
                                                    oninput="InvalidMsg(this);" required="required" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>


                                                <div class="input-group mb-3" dir="rtl">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">طراز المركبة*</span>
                                                    </div>
                                                    <input type="text" oninvalid="InvalidMsg(this);"
                                                    oninput="InvalidMsg(this);" required="required" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>


                                                <div class="input-group mb-3" dir="rtl">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">سنة الصنع*</span>
                                                    </div>
                                                    <input type="text"  oninvalid="InvalidMsg(this);"
                                                    oninput="InvalidMsg(this);" required="required" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                                <div class="input-group mb-3" dir="rtl">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">حجم المكينة</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                </div>


                                            <input type="submit"class="btn btn-primary" value="ارسل">


                                            </form>
                                            </div>



                                        </div>

                                        <div class="col-md-12 col-12 text-center mx-auto">
                                             <a class="first-hider btn btn-primary my-3 px-5 next  "
                                                data-toggle="collapse" href="#showNx"  role="button" aria-expanded="false" aria-controls="collapseExample" onclick="myFunction()">
                                                التالى</a>
                                        </div>

                                    </div>
                                </div>
                                    <!--/ ROW-->

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




        <section>
            <div class="container collapse" id="showNx">
                <div class="row my-4">
                    <div class=" col-md-3 col-12 text-center mx-auto">
                        <div class="input-group mb-3" dir="rtl">
                            <select class="custom-select" id="test" onchange="showDiv(this)" name="ship_level">
                                <option value="0">طلب شراء من الرياض</option>
                                <option value="bank">طلب شراء من الرياض</option>
                                <option value="paybal">طلب شراء من الخارج</option>
                                <option value="another">الأرخص </option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-12 col-12 text-center mx-auto">
                        <a class="first-hider btn btn-primary my-3 px-5 next show-tow "
                           data-toggle="collapse" href="#showNx"  role="button" aria-expanded="false" aria-controls="collapseExample" >
                           التالى</a>
                   </div>
                </div>
            </div>
        </section>


       <!--/ section-2 -->
        <section class="section-3  my-2">

            <div  id="show-tow" style="display: none;">

            <div class="container">

                    <div class="row">

                   <!--/ col-4 -->

                        <div class="col-md-12 col-12" >
                            <form >
                            <div class="row " >

                                    <div class="col-12 text-center mx-auto"><h6>أدخل اسم وتفاصيل صحيحة للقطعة، للحصول على التكلفة الصحيحة، وسرعة الرد.
                                       <br>
                                      <span class="" style="color: red;">  تنبيه: الأفضل إدخال تفاصيل قطعة واحدة فقط في النموذج.</span>
                                        </h6>
                                        <p id="para">  </p>
                                    </div>
                                    <!-- col-12 -->
                                    <div class=" col-lg-12 col-12 text-center">
                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">اسم القطعة*</span>
                                            </div>
                                            <input type="text"id="example" class="form-control"  oninvalid="InvalidMsg(this);"
                                            oninput="InvalidMsg(this);" name="text"
                                             required="required" aria-label="Username" aria-describedby="basic-addon1">

                                        </div>



                                    </div>
                                    <!--/ col-12-->

                                    <!-- col-4 -->
                                    <div class="col-md-12 col-12 text-center">

                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">الوصف* </span>
                                            </div>
                                            <textarea oninvalid="InvalidMsg(this);"
                                            oninput="InvalidMsg(this);" name="text"
                                             required="required"  class="form-control" aria-label="With textarea"placeholder="أدخل تفاصيل خاصة لك للقطعة مثلا: الجهة و ماهي الجهات المطلوبة واللون المطلوب والممشى المطلوب وصفات أخرى "></textarea>
                                          </div>

                                    </div>
                                    <!--/ col-4 -->

                                    <!-- col-4 -->
                                    <div class=" col-md-6 col-12 text-center">
                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">رقم القطعة</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" placeholder="يطلب من أي محل قطع غيار السيارات">
                                        </div>
                                    </div>
                                    <!--/ col-4 -->

                                    <!-- col-4 -->
                                    <div class=" col-md-6 col-12 text-center">
                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">الرابط</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" placeholder="رابط لتوضيح القطعة"  aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <!--/ col-4 -->

                                    <!-- col-6 -->
                                    <div class=" col-md-6 col-12 text-center">
                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">القيمة في السوق</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                    <!--/ col-6 -->
                                    <!-- col-6 -->
                                    <div class=" col-md-6 col-12 text-center">
                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">الميزانية</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    <div class=" col-md-12 col-12 text-center mx-auto">
                                        <div class="row">


                                            <div class="col-md-6 col-12  text-right  " id="hidden_div2">
                                                <div class="input-group " dir="rtl" >
                                                    <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                    <!-- <button type="submit" class="btn btn-primary mx-3 px-5" > حفظ </button> -->
                                                </div>
                                            </div>
                                    <!--/ col-3 -->

                                    <!-- col-6 -->
                                            <div class="col-md-6 col-12 text-right">
                                                <div class="input-group " dir="rtl">
                                                    <div class="input-group-prepend">
                                                      <label class="input-group-text" for="inputGroupSelect01">جهة القطعة</label>
                                                    </div>
                                                    <select required class="custom-select" required id="test" name="form_select" onchange="showDiv('hidden_div2', this)" >
                                                      <option selected>أختار ...</option>
                                                      <option value="0">يمين </option>
                                                      <option value="2">يسار </option>
                                                      <option value="2">فوق </option>
                                                      <option value="2">تحت </option>
                                                      <option value="2">طقم </option>
                                                      <option value="3">اخري </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6  col-12 text-center mb-3">
                                                <div class="text-right border wrapper d-flex my-0" id="form1" runat="server" dir="rtl">
                                                    <div class="file-upload">
                                                        <input class="inputfile" id="image-file2" type="file" multiple/>
                                                        <i class="fa fa-3x fa-image"></i>

                                                      </div>
                                                      <div  class="content-img content-img2 w-50  "></div>
                                                    </div>
                                            </div>

                                            <!--/ col-6 -->


                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12 text-left font-weight-bolder " dir="rtl">
                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                              <label class="input-group-text" for="inputGroupSelect01">النوع*</label>
                                            </div>
                                            <select class="custom-select" required id="inputGroupSelect01" dir="rtl" >
                                              <option selected>أختار ...</option>
                                              <option value="1">  جديد</option>
                                              <option value="2">مستعمل (من الخارج فقط)</option>
                                            </select>

                                    </div>
                                    </div>

                                    <div class="col-md-6 col-12 text-left font-weight-bolder " dir="rtl">

                                        <div class="input-group mb-3" dir="rtl">
                                            <div class="input-group-prepend">
                                              <label class="input-group-text" for="inputGroupSelect01">الجوده*</label>
                                            </div>
                                            <select class="custom-select" required id="inputGroupSelect01" dir="rtl" >
                                              <option selected>أختار ...</option>
                                              <option value="1">  وكالة</option>
                                              <option value="2"> درجة أولى</option>
                                            </select>

                                    </div>

                                    </div>



                                <div class="container">

                                        <div class="row flex-row-reverse">
                                            <div class="col-md-4 col-6 text-center">
                                        <div class=" text-center ">
                                            <input class=" btn-secondary rounded-1 text-light  font-weight-bold px-4 py-2 my-2" type="submit"  value="ارسال">
                                        </div>
                                    </div>



                                    <div class="col-md-4 col-6 text-right">
                                        <div class="btn-secondary rounded-1 text-center px-4 py-2 my-2">
                                            <a class=" text-decoration-none text-light  font-weight-bold" href="#"> إضافة منتج  </a>
                                        </div>
                                    </div>


                                    <div class="col-md-4 col-12 text-center text-center my-2">
                                        <button class="btn btn-danger rounded-1" Onclick="return ConfirmDelete();" type="reset" name="actiondelete" value="1"><i class="fa fa-1x fa-trash-alt px-3"></i></button>
                                    </div>
                                    </div>
                                    </div>
                                <!-- row -->

                                <!-- row -->
                                    </form>
                            </div>
                            <!--/ collapse -->
                        </div>

                    </div>
                </div>
            </div>
        </section>

@endsection

@push("script")
           <script>
            function showDiv(divId, element)
                {
                    document.getElementById(divId).style.display = element.value == 3 ? 'block' : 'none';

                }


                function showMe(box) {
                var chboxs = document.getElementsByName("cc1");


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
         $('.first-styp').click(function(){
            $('#first-styp' ).hide();
            });
         $('.first-hider').click(function(){
          $('#first-hider' ).hide();
         });


         $('.show-tow').click(function(){
          $('#show-tow' ).show();
         });





            $(document).ready(function() {


            $("#drp").onchange(function(){
                var ddlTxt = $("#drp").text();
                $(".divInactive").each(function() {

                cmpValue = $(this).find('#spninactive_' + ddlTxt).text();

                if (ddlTxt == cmpValue) {
                    $(".divInactive #spninactive_" + ddlTxt).show();
                }
                });
            })






        // $('.next1').click(function(){
        //     $('#showNext' ).addClass('collapse');
        //     $('#showNx' ).removeClass('collapse');
        //     });

    //     $('.mjorpoints').live('click', function(event) {
    //      $('.hider').toggle('#first-hider');
    // });



        });

                function readURL(input) {

            if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
            }
            }

            function cleanall(){

            document.getElementById("textview").value = "";
            document.getElementById("textview1").value = "";
            document.getElementById("textview2").value = "";
            document.getElementById("textview3").value = "";
            document.getElementById("textview-area").value = "";
            document.getElementById("textview-area1").value = "";

          }

        function InvalidMsg(textbox) {

        if (textbox.value === '') {
            textbox.setCustomValidity
            ('this input is required').style.backgroundColor = "red";
        }else {
            textbox.setCustomValidity('');
        }

        return true;
        }




        </script>
                <script>

                    $(document).ready(function(){


                    $("[data-toggle=tooltip]").tooltip();
                    });
                            window.onclick = function(e)
                        {   var id =  e.target.id;
                           if (id === 'sent')
                           { var txtbox = document.getElementById('example');
                             var txt = txtbox.value;
                             $( "#para" ).append( txt + '<br>');
                             $( txtbox ).val('');
                           }
                        }
                              </script>

@endpush
