@extends('template.ar_template')
@section('title', 'اثبات تحويل المبلغ')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
@endpush

    <!--Start section transfer -->
    <section class="other_nav_link" style="position: relative; top: 130px;">
            <!-- Start container-->

        <div class="container ">

            <div class="row ">


              <!--select-->

                    <div class="col-md-4 col-12  text-center "></div>
                    <div class=" col-md-4 col-12 text-center  ">
                        <h1 class="text-primary text-center my-5" dir="rtl">اثبات تحويل المبلغ</h1>
                        <div class=" input-group mb-3 " dir="rtl">
                                <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> طريقة التحويل  *</label>
                                </div>
                            <select class="custom-select" id="test" onchange="showDiv(this)" name="ship_level">
                                <option value="0">--أختار--</option>
                                <option value="bank">تحويل بنكى</option>
                                <option value="paybal">باى بال</option>
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
                                    <label class="form-check-label font-weight-bold mr-3" for="exampleCheck1">  صورة إيصال التحويل </label>
                                </div>

                            </div>


                            <div class="col-md-6 col-12 text-center mb-3" id="demo"  dir="rtl">

                                <div class="form-group form-check-inline pl-5">
                                    <input type="checkbox"  name="c1" onclick="showMe('div2')" >
                                    <label class="form-check-label font-weight-bold mr-3" for="exampleCheck1"> ادخال تفاصيل التحويل </label>
                                </div>

                            </div>

                        </div>


                    </div>



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
                                    <span class="input-group-text" id="basic-addon1">الاسم *</span>
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
                                    <span class="input-group-text" id="basic-addon1">المبلغ المحول *</span>
                                </div>
                                <input type="number"oninvalid="InvalidMsg(this);"
                                required="required"  oninput="InvalidMsg(this);"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">اعادة المبلغ *</span>
                                </div>
                                <input type="number"oninvalid="InvalidMsg(this);" onpaste="return false;"
                                required="required"  oninput="InvalidMsg(this);"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>


                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">العملة *</span>
                                </div>
                                <input type="text"oninvalid="InvalidMsg(this);"
                                required="required"  oninput="InvalidMsg(this);"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>


                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">تفاصيل التحويل *</span>
                                </div>
                                <input type="text"oninvalid="InvalidMsg(this);"
                                required="required"  oninput="InvalidMsg(this);"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>


                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">تاريخ التحويل *</span>
                                </div>
                                <input type="text"oninvalid="InvalidMsg(this);"
                                required="required"  oninput="InvalidMsg(this);"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>


                            <div class="text-right border wrapper d-flex" id="form1" runat="server" dir="rtl">

                                <div class="file-upload">
                                    <input class="inputfile " id="image-file" type="file" multiple/>
                                    <i class="fa fa-3x fa-image"></i>

                                  </div>
                                  <div  class="content-img w-50  "></div>

                            </div>

                        <div class="w-100 d-flex justify-content-around mx-auto text-center">
                        <input  type="submit" class="btn btn-primary" value="ارسل" >
                        <button class="btn btn-primary px-4"type="reset" Onclick="return ConfirmDelete();" > <i class="fa fa-1x fa-trash-alt"></i></button>
                        </div>

                        </form>

                    </div>


                    <form id="myform" class="w-100">
                    <div id="paybal_acc" class="data col-md-12 col-12 col-12" style=" display:none;">

                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend w-auto">
                                    <span class="input-group-text w-auto" id="basic-addon1">حساب باي بال المرسل منه *</span>
                                </div>
                                <input oninvalid="InvalidMsg(this);"
                                required="required"  oninput="InvalidMsg(this);"  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>


                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">إعادة الحساب *</span>
                                </div>
                                <input oninvalid="InvalidMsg(this);"  onpaste="return false;"
                                required="required"  oninput="InvalidMsg(this);"  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">المبلغ المحول *</span>
                                </div>
                                <input oninvalid="InvalidMsg(this);"
                                required="required"  oninput="InvalidMsg(this);" type="number" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">إعادة المبلغ *</span>
                                </div>
                                <input oninvalid="InvalidMsg(this);"  onpaste="return false;"
                                required="required"  oninput="InvalidMsg(this);" type="number" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">العملة *</span>
                                </div>
                                <input oninvalid="InvalidMsg(this);"
                                required="required"  oninput="InvalidMsg(this);" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>


                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                    <span class="input-group-text w-auto" id="basic-addon1">الاسم المرتبط بالحساب</span>
                                </div>
                                <input  type="text"  class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>


                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">تاريخ التحويل *</span>
                                </div>
                                <input oninvalid="InvalidMsg(this);"
                                required="required"  oninput="InvalidMsg(this);" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>


                            <div class="text-right border wrapper d-flex" id="form1" runat="server" dir="rtl">
                                <div class="file-upload">
                                    <input class="inputfile " id="image-file3" type="file" multiple/>
                                    <i class="fa fa-3x fa-image"></i>

                                  </div>
                                  <div  class="content-img content-img3 w-50  "></div>
                                </div>




                        <div class="w-100 d-flex justify-content-around mx-auto text-center">
                            <input  type="submit" class="btn btn-primary" value="ارسل" >
                            <button class="btn btn-primary px-4"type="reset" Onclick="return ConfirmDelete();" > <i class="fa fa-1x fa-trash-alt"></i></button>


                         </div>

                    </div>

                </form>

                    <div class=" col-md-12 col-12 text-center" >

                        <div class="row">

                            <!-- col-12 -->
                            <div class="col-md-6 col-12 text-center my-3" id="div1" style="display:none">
                                <div class="text-right border wrapper d-flex" id="form1" runat="server" dir="rtl">
                                    <div class="file-upload">
                                        <input required class="inputfile " id="image-file2" type="file" multiple/>
                                        <i class="fa fa-3x fa-image"></i>

                                      </div>
                                      <div  class="content-img content-img2 w-50  "></div>
                                    </div>

                                <div class=" my-3 px-3">
                                    <button type="button" class="btn btn-primary px-5">إرسال</button>
                                </div>

                            </div>
                                <!--</div>-->



                            <div class="col-md-12 col-12  text-center my-3" id="div2" style="display:none">
                                <form aid="myform">

                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">الاسم الثلاثي </span>
                                    </div>
                                    <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>


                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">اسم البنك *</span>
                                    </div>
                                    <input oninvalid="InvalidMsg(this);"
                                    required="required"  oninput="InvalidMsg(this);" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>


                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">رقم الحساب *</span>
                                    </div>
                                    <input oninvalid="InvalidMsg(this);"
                                    required="required"  oninput="InvalidMsg(this);" type="number" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>


                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">المبلغ المودع *</span>
                                    </div>
                                    <input oninvalid="InvalidMsg(this);"
                                    required="required"  oninput="InvalidMsg(this);" type="number" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>


                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">إعادة المبلغ *</span>
                                    </div>
                                    <input oninvalid="InvalidMsg(this);"  onpaste="return false;"
                                    required="required"  oninput="InvalidMsg(this);" type="number" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>


                                <div class="text-right border wrapper d-flex" id="form1" runat="server" dir="rtl">
                                    <div class="file-upload">
                                        <input class="inputfile " id="image-file1" type="file" multiple/>
                                        <i class="fa fa-3x fa-image"></i>

                                      </div>
                                      <div  class="content-img content-img1 w-50  "></div>
                                    </div>



                                    <div class="w-100 d-flex justify-content-around mx-auto text-center">
                                        <input  type="submit" class="btn btn-primary" value="ارسل" >
                                        <button class="btn btn-primary px-4"type="reset" Onclick="return ConfirmDelete();" > <i class="fa fa-1x fa-trash-alt"></i></button>


                                     </div>

                             </form>
                            </div>



                        </div>
                        <!--/ ROW-->


                    </div>

            </div>

        </div>
        <!--End container -->
    </section>
    <!--End section class="transfer" -->


@endsection

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

        $('.majorpoints').click(function(){
        $('.section-2' ).find('.hider').toggle();
        });
        $('.majorpoints2').click(function(){
        $('.section-3' ).find('.hider').toggle();
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

    $("#imgInp").change(function() {
    readURL(this);
    });


</script>

@endpush