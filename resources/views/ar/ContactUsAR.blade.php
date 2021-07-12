@extends('template.ar_template')
@section('title', 'اتصل_بنا')
@section('content')

@push("css")

<link rel="stylesheet" href="{{ URL::asset('public/themeAssets/build/css/intlTelInput.css') }}">
<link rel="stylesheet" href="{{ URL::asset('public/themeAssets/build/css/demo.css') }}">

<style>
    .footer{
        margin-top: 160px !important;
    }
</style>

@endpush

    <!--section class="contact-us"-->
         <section class="other_nav_link" style="position: relative; top: 150px;" >
            <!-- Start container-->
            <div class="container ">

                @include("template.flash")

                
                <form method="post" action="{{route("contactUsStore")}}" id="myform" >
                    @csrf
                <div class="row ">

                    <!--select-->
                    <div class="col-md-12  col-12 text-center">
                        <h1 class="text-primary text-center my-3" dir="rtl">اتصل بنا</h1>
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">القسم المستلم *</label>
                            </div>
                            <select class="custom-select" name="receiving_department" class="form-control"   oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);"
                            required="required"  >
                            <option value="">أختار ...</option>
                            <option value="المدفوعات">المدفوعات</option>
                            <option value="الوسيط">الوسيط</option>
                            <option value="الاستيراد">الاستيراد</option>
                            <option value="قطع غيار">قطع غيار</option>
                            <option value="الشحنات">الشحنات</option>
                            <option value="الأجنحة">الأجنحة</option>
                            <option value="التسجيل">التسجيل</option>
                            <option value="الرصيد">الرصيد</option>
                            <option value="أخرى">أخرى</option>
                            </select>
                        </div>
                    </div>
                  <!--select-->




                    <!-- div name-->
                    <div class=" col-md-12 col-12   text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1" >الأسم *</span>
                            </div>
                            <input type="text" id="textview" class="form-control" name="name"   oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);"
                            required="required" placeholder="الآسم" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                <!--div name-->


                <!--div email-->
                    <div class=" col-md-12 col-12   text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">الإيميل *</span>
                            </div>
                            <input type="email" id="textview1" class="form-control"  oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);" name="email"
                            required="required" placeholder="الايميل" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                <!--div email-->

              <!--phone num-->
              <div class=" col-md-6 col-12 text-center">


                <div class="input-group mb-3 inputGroupSelect01" >
                    <form>
                        <input   class="input-group" id="phone" name="phone" type="tel">
                        <button  class="input-group-text  "dir="rtl" type="submit">رمز اتصال الدوله</button>
                      </form>
                </div>


        </div>
    <!--phone num-->


                <!--Suite number-->
                    <div class=" col-md-6 col-12 text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">رقم الجناح</span>
                            </div>
                            <input  id="textview2" class="form-control" name="suit"
                            type="number"  placeholder="رقم الجناح" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                <!--Suite number-->





                 <!--massage-->
                    <div class="col-md-12   col-12 text-center mb-3">
                        <div class="input-group input-group-lg" dir="rtl">
                            <div class="input-group-prepend">
                            <span class="input-group-text">موضوع الرسالة</span>
                            </div>
                            <textarea oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);" name="subject"
                            required="required" id="textview-area1" name="message"  class="form-control" placeholder="موضوع الرسالة" aria-label="With textarea" ></textarea>
                        </div>
                    </div>
               <!--massage-->



               <!-- Message description -->
                    <div class="col-md-12  col-12 text-center mb-3">
                        <div class="input-group input-group-lg" dir="rtl">
                            <div class="input-group-prepend">
                            <span class="input-group-text">وصف الرسالة *</span>
                            </div>
                            <textarea oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);" name="message_description"
                            required="required" id="textview-area"  class="form-control"  required=""
                              placeholder="وصف الرسالة" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                <!-- Message description -->






                <div class="col-md-6 col-6 text-center my-5">
                  <!-- <button type="button"  ></button> -->
                  <button class="btn btn-primary" Onclick="return ConfirmDelete();" type="reset" name="actiondelete" value="1"><i class="fa fa-1x fa-trash-alt px-3"></i></button>
                </div>

                <div class=" col-md-6 col-6 text-center my-5">
                    <input class="btn btn-primary px-4" type="submit" value="ارسال" />
                </div>

                </div>



                </form>
                 <!--/ Row-->

                 <div class="row">
                     <div class="col-md-8 col-12 text-center mx-md-auto">
                        <div class="bg-basket p-2 my-3"  role="alert">

                        <p>
                       7918 نجران - حي قرطبة، الرياض 13245 – 4007، المملكة العربية السعودية
                        <br>
                       <a href="contact@guarantaccess.com" class="text-secondary">contact@guarantaccess.com</a>  <br>
                        <a href="support@guarantaccess.com">support@guarantaccess.com</a>  <br>
                        0532417005

                          </p>
                        </div>
                     </div>
                 </div>
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

@push('script')
<script src="{{ URL::asset('public/themeAssets/js/intlTelInput.js') }}"></script>

<script>

  var input = document.querySelector("#phone");
  window.intlTelInput(input, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    // hiddenInput: "full_number",
    // initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // placeholderNumberType: "MOBILE",
    // preferredCountries: ['cn', 'jp'],
    // separateDialCode: true,
    utilsScript: "{{ URL::asset('public/themeAssets/js/utils.js') }}",
  });
</script>


@endpush