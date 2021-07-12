@extends('template.ar_template')
@section('title', 'نسيت كلمة السر')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
@endpush

    <!--section class="contact-us"-->
         <section class="other_nav_link" style="position: relative; top: 160px;">
            <!-- Start container-->
            <div class="container ">
                @include("template.flash")
                <form id="myform" action="{{route('forgetPassProcess')}}" method="post">
                    @csrf
                <div class="row ">

                    <!--select-->
                    <div class="col-md-12 text-center">
                        <h1 class="text-primary text-center my-3" dir="rtl">نسيت كلمة السر</h1>
                    </div>
                  <!--select-->




                    <!-- div name-->
                   {{--  <div class=" col-md-12  col-12 text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" >الأسم *</span>
                            </div>
                            <input type="text"  oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);"  required="required" id="textview" class="form-control"  placeholder="الآسم" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div> --}}
                <!--div name-->


                <!--div email-->
                    <div class=" col-md-12 col-12  text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">الإيميل *</span>
                            </div>
                            <input type="email" id="textview1" class="form-control"  oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);"  required="required"name="email"
                            type="email" placeholder="الايميل" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                <!--div email-->




                <!--Suite number-->
                    {{-- <div class=" col-md-12 col-12 text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">رقم الجناح</span>
                            </div>
                            <input type="text" id="textview2" class="form-control" placeholder="رقم الجناح" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div> --}}
                <!--Suite number-->






                <div class="col-md-6 col-12 text-lg-left text-center my-5">
                  <!-- <button type="button"  ></button> -->
                    <button class="btn btn-primary" Onclick="return ConfirmDelete();" type="reset" name="actiondelete" value="1"><i class="fa fa-1x fa-trash-alt px-3"></i></button>
                </div>


                 <div class=" col-md-6 col-12 text-lg-right text-center my-5">
                    <input class="btn btn-primary" type="submit" value="ارسال" />
                </div>


                </div>




                </form>
                 <!--/ Row-->

            </div>

            <!-- End container-->
        </section>

    <!-- End section contact-us -->



<!-- My_model-2 -->
    <div id="myModal_2" class="modal fade text-center">
                  <div class="modal-dialog">
                    <div class="col-lg-10 col-sm-10 col-12 main-section">
                      <div class="modal-content">

                        <div class="col-lg-12 col-sm-12 col-12 my-5">
                          <img src="images/done.png">
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12 form-input mb-3">
                          <form>
                            <button type="button" class="close" data-dismiss="modal">تم</button>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
    <!--/ My_model -->

@endsection

@push("script")

<script type="text/javascript">
  function cleanall(){
    document.getElementById("selectObject").value = "";
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

@endpush
