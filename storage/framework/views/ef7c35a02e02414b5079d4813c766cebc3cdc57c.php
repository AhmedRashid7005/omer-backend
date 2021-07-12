<?php $__env->startSection('title', 'التطوير'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("css"); ?>
<link rel="stylesheet" href="<?php echo e(URL::asset('public/themeAssets/build/css/intlTelInput.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('public/themeAssets/build/css/demo.css')); ?>">
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

    <!--Start Suggestions -->
    <div  class="other_nav_link" style="  position: relative; top: 150px;">

        <div class="container">
            <?php echo $__env->make("template.flash", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


            <form id="myform" action="<?php echo e(route("websiteDevelopmentStore")); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
            <div class="row ">

                <!-- col-12 -->
                <div class=" col-md-12 text-primary text-center my-3">
                    <h1>التطوير</h1>
                </div>
                <!--/ col-12 -->

                <!-- col-12 -->
                <div class=" col-md-12 bg-basket rounded text-center my-4 p-3">
                    <h5 class="font-weight-bold">هذا النموذج خاص بما يتعلق بتطوير الموقع<a href="#" class="text-primary">للنزاعات</a><br> للتواصل <a href="#" class="text-primary">اتصل بنا</a></h5>
                </div>
                <!--/ col-12 -->


               <!-- col-12 -->

               <div class="col-md-12 text-center">
                    <div class="input-group mb-3" dir="rtl">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">الموضوع</label>
                        </div>
                        <select id="textview" class="custom-select" id="inputGroupSelect01"  oninvalid="InvalidMsg(this);"
                        oninput="InvalidMsg(this);" name="topic"
                        required="required"  dir="rtl" >
                          <option value="">أختار ...</option>
                          <option value="اقتراح">اقتراح</option>
                          <option value="ملاحظة">ملاحظة</option>
                          <option value="ملاحظة">تطوير</option>
                          <option value="اخرى">اخرى</option>
                        </select>
                    </div>
                </div>

                <!--/ col-12-->

                <!-- col-12-->

                <div class="col-lg-12 text-center">
                    <div class="input-group mb-3" dir="rtl">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">الأسم</span>
                        </div>
                        <input type="text" id="textview" class="form-control" id="name" oninvalid="InvalidMsg(this);"
                        oninput="InvalidMsg(this);" name="name"
                        required="required"  class="form-control" placeholder="الأسم" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>

                <!--/ col-12-->


                <!-- col-12-->
                <div class=" col-md-6 col-12 text-center">
                        <div class="input-group mb-3 inputGroupSelect01" >
                            <form>
                                <input  class="input-group"id="phone" name="phone" type="tel">
                                <button  class="input-group-text  "dir="rtl" type="submit">رمز اتصال الدوله</button>
                              </form>
                        </div>
                </div>

                <!--/ col-12-->
                <!-- col-12-->

                <div class=" col-md-6 col-12 text-center">
                    <div class="input-group mb-3" dir="rtl">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">الإيميل*</span>
                        </div>
                        <input  id="textview" class="form-control" id="email" oninvalid="InvalidMsg(this);"
                        oninput="InvalidMsg(this);" name="email"
                        required="required"  aria-required="true" type="email" id="textview2" class="form-control" placeholder="الإيميل" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>

                <!--/ col-12-->

                <!-- col-12-->
                <div class="col-lg-12 text-center">
                    <div class="input-group input-group-lg" dir="rtl">
                        <div class="input-group-prepend">
                          <span class="input-group-text">الوصف*</span>
                        </div>
                        <textarea type="text" id="textview" class="form-control" id="description" oninvalid="InvalidMsg(this);"
                        oninput="InvalidMsg(this);" name="description"
                        required="required"  class="form-control" aria-required="true" id="textview-area" aria-label="With textarea"></textarea>
                    </div>
                </div>

                <!--/ col-12-->

                <!-- col-12-->
                <div class="col-md-12 col-12 text-right font-weight-bolder mt-5" dir="rtl">
                                    <label><h5>هل تستطيع هذا العمل شخصيا؟</h5></label>
                                    <label class="radio-inline px-5">
                                      <input type="radio" name="do_this_personally" id="do_this_personally" value="yes" checked="">  نعم </label>
                                    <label class="radio-inline pl-5">
                                      <input  type="radio" name="do_this_personally" value="no" id="do_this_personally">  لا</label>
                            </div>

                <!--/ col-12-->


                <!-- col-12 -->
                <div class="col-lg-12 text-center my-3">
                    <div class="text-right border wrapper d-flex" id="form1" runat="server" dir="rtl">
                        <div class="file-upload">
                            <input class="inputfile " id="image-file2" name="img" type="file"/>
                            <i class="fa fa-3x fa-image"></i>

                          </div>
                          <div  class="content-img content-img2 w-50  "></div>
                      </div>
                </div>
                <!--</div>-->

                <!-- col-12-->
                <div class="w-100 d-flex justify-content-around mx-auto text-center">
                    <input  type="submit" class="btn btn-primary px-4" value="ارسل" >
                    <button class="btn btn-primary"type="reset" Onclick="return ConfirmDelete();" > <i class="fa px-4 fa-1x fa-trash-alt"></i></button>
                    </div>
                <!--/ col-12-->

            </div>
             <!--/ ROW-->
              </form>
        </div>
       <!--/ container-->
    </div>
    <!--End Suggestions -->




<!-- My_model-2 -->
          <div id="myModal_3" class="modal fade text-center">
                  <div class="modal-dialog">
                    <div class="col-lg-10 col-sm-10 col-12 main-section">
                      <div class="modal-content">

                        <div class="col-lg-12 col-sm-12 col-12 my-5">
                          <img src="<?php echo e(URL::asset('public/themeAssets')); ?>/images/done.png">
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush("script"); ?>

<script src="<?php echo e(URL::asset('public/themeAssets/js/intlTelInput.js')); ?>"></script>

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
    utilsScript: "<?php echo e(URL::asset('public/themeAssets/js/utils.js')); ?>",
  });
</script>
        <script type="text/javascript">

          function cleanall(){
            document.getElementById("textview").value = "أختار ...";
            document.getElementById("textview1").value = "";
            document.getElementById("textview2").value = "";
            document.getElementById("textview3").value = "";
            document.getElementById("textview-area").value = "";

          }
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('template.ar_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>