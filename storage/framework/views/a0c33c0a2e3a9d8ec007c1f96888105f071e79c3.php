<?php $__env->startSection('title', 'نسيت كلمة السر'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("css"); ?>
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

    <!--section class="contact-us"-->
         <section class="other_nav_link" style="position: relative; top: 160px;">
            <!-- Start container-->
            <div class="container ">
                <?php echo $__env->make("template.flash", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <form id="myform" action="<?php echo e(route('forgetPassProcess')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                <div class="row ">

                    <!--select-->
                    <div class="col-md-12 text-center">
                        <h1 class="text-primary text-center my-3" dir="rtl">نسيت كلمة السر</h1>
                    </div>
                  <!--select-->




                    <!-- div name-->
                   
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush("script"); ?>

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

<?php $__env->stopPush(); ?>

<?php echo $__env->make('template.ar_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>