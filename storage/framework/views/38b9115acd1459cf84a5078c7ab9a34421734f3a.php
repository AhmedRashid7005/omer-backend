<?php $__env->startSection('title', 'الباقات'); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush("css"); ?>
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

    <!--Start section  -->

    <section  class="other_nav_link mt-5  " style="position: relative; top: 160px; " >
    <div id="section-packages" class="packages">
        <!-- Start container-->
        <div class="container">

            <div class="row">
                <!-- col-md-4 -->
                <div class="col-md-4 col-12 " data-animation="fadeInLeft">
                    <div class="item ez-animate ">
                    <div class="label bgsolidscheme">التجار</div>
                    <div class="title"  dir="rtl">
                        <p>104 $ / 190 يوم</p>
                        <p>لفترة محدودة</p>
                        <p>150 دولار قبل الخصم  </p>
                    </div>
                    <ul>
                        <li class="fa-2x">+جميع مميزات الباقة المميزة</li>
                        <li>شحن مستندات رسمية</li>
                        <li>تسجيل الطلبية لحظة الاستلام</li>
                        <li>خصم 5% على التوصيل الداخلي</li>
                        <li>خصم 15% على الشحن العالمي</li>
                        <li>صورتين للطلبية عند تسجيلها</li>
                        <li>دعم فني 7/24 + مدير حساب خاص</li>
                        <li>تخزين مجاني حتى 30 يوم</li>
                    </ul>
                  <a href="<?php echo e(route('signUpAr')); ?>?plan=3" class="btn btn-primary  ">اشتراك</a>

                </div>  <!-- /.Item -->
                </div>
               <!-- col-md-4 -->



               <!-- col-md-4 -->
                <div class=" col-md-4 col-12 " data-animation="fadeInUp">
                    <div class="item ez-animate active selected">
                    <div class="label bgsolidscheme">المميزة</div>
                    <div class="title" dir="rtl">
                        <p>49 $ / 190 يوم</p>
                        <p> لفترة محدودة </p>
                        <p>99 دولار قبل الخصم</p>
                    </div>
                    <ul>
                        <li>عنوان شحن خاص بك في السعودية</li>

                        <li>وأمريكا والصين</li>
                        <li>الشحن المجاني </li>
                        <li>تسجيل الطلبية خلال 24 ساعة</li>
                        <li>احتساب الوزن الحقيقي للشحنة</li>
                        <li>تجميع الشحنات</li>
                        <li>دعم فني طوال ساعات العمل</li>
                        <li>تخزين مجاني حتى 14 يوم</li>
                    </ul>
                    <a href="<?php echo e(route('signUpAr')); ?>?plan=2" class="btn btn-primary ">اشتراك</a>
                </div>

                <!-- /.Item -->
            </div>
                 <!-- col-md-4 -->


                 <!-- col-md-4 -->
                <div class=" col-md-4 col-12 " data-animation="fadeInRight">
                    <div class="item ez-animate ">
                    <div class="label bgsolidscheme">الأساسية</div>
                    <div class="title">
                        <p>مجانية لفترة محدودة</p>
                        <p>الكمية محدودة</p>
                        <p>&nbsp;</p>
                    </div>
                    <ul>
                        <li>عنوان شحن خاص بك في السعودية</li>
                        <li>وأمريكا والصين</li>
                        <li>تسجيل الطلبية خلال 48 ساعة</li>
                        <li>احتساب الوزن الحجمي للشحنة</li>
                        <li>رف مشترك + مساحة محدودة</li>
                        <li>دعم فني عبر الشات في الموقع</li>
                    </ul>
                    <a href="<?php echo e(route('signUpAr')); ?>?plan=1" class="btn btn-primary ">اشتراك</a>
                </div>

                <!-- /.Item -->
            </div>
             <!-- col-md-4 -->
             <div class="col-md-4 col-12 w-100 btn-danger my-md-5 mx-auto    rounded-1 px-4 py-2 ">
                <a class="w-100 text-decoration-none text-light  font-weight-bold" data-toggle="collapse"
                 aria-controls="table-wrapper"  href="#table-wrapper">للمقارنة بين الخطط </a>

            </div>
            </div>

               <!--End row-->
        </div>
        <!--End Container-->
    </div>
    <!--Start section  -->


</section>

    <!--Start section  -->

    <section  class="collapse " id="table-wrapper" style="position: relative; top: 180px; ">


        <div class="table-wrapper" dir="rtl">
            <table class="fl-table">
                <thead>
                <tr >
                    <th class="bg-blue  text-light">الخدمات  </th>
                    <th class=" text-light">الأساسية</th>
                    <th class=" text-light">المميزه</th>
                    <th class=" text-light">التجار</th>

                </tr>
                </thead>

                <tbody>

                <tr>
                    <td>عنوان جناح خاص في 3 دول</td>

                    <td  class=" border"><i class="fas fa-3x fa-check-square text-blue "></i></td>
                    <td  class=" border"><i class="fas fa-3x fa-check-square text-blue "></i></td>
                    <td  class=" border"><i class="fas fa-3x fa-check-square text-blue "></i></td>
                </tr>
                <tr>
                    <td>تسجيل الطلبية</td>
                    <td >خلال 48 ساعة</td>


                    <td>خلال24 ساعة</td>
                    <td>عند الإستيلام</td>


                </tr>
                <tr>
                    <td>تسويق الموقع</td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td>30 ريال على كل عميل </td>
                    <td>50 ريال على كل عميل </td>



                </tr>
                <tr>
                    <td>تكلفة الشحن</td>
                   <td>حسب الحجم </td>
                   <td>حسب الوزن </td>
                   <td>حسب الوزن </td>

                </tr>
                <tr>
                    <td>مساحة الجناح</td>
                    <td>رف مشترك  30 سم* 30 سم </td>
                    <td>رف مشترك  50 سم* 50 سم</td>
                    <td>مساحة غير محدودة</td>

                </tr>

                <tr>
                    <td> شحن مجاني </td>
                     <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                     <td>200 جم وأقل</td>
                     <td>300 جم وأقل</td>
                </tr>

                <tr>
                 <td>  تخزين مجاني</td>
                 <td>7 أيام</td>
                 <td>14 أيام</td>
                 <td>30 أيام</td>
                </tr>

                <tr>
                    <td>صورة للشحنة عند التسجيل</td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td> صورتين فقط</td>
                </tr>

                <tr>
                    <td>صور إضافية عالية الجودة</td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td>5 صور ب 15 ريال </td>
                    <td>10 صور ب 15 ريال </td>


                </tr>

                <tr>

                    <td>مقطع فيديو لمحتوى الشحنة</td>

                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>

                    <td>5 دقائق ب 30 ريال</td>
                    <td>3 دقائق ب 25 ريال </td>

                </tr>

                <tr>
                    <td>فحص الشحنة</td>
                    <td>25 ريال </td>
                    <td>20 ريال </td>
                    <td>15 ريال </td>
                </tr>

                <tr>
                    <td>تشغيل الشحنة</td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td>45 ريال </td>
                    <td>30 ريال </td>
                </tr>

                <tr>
                    <td>إعادة تغليف</td>
                    <td>25 ريال </td>
                    <td>20 ريال </td>
                    <td>15 ريال </td>

                </tr>
                <tr>
                    <td>عنون الإستيلام</td>
                    <td>لا يمكن تغييره </td>
                    <td>عنوان اضافي </td>
                    <td>عناويين غير محدودة </td>


                </tr>
                <tr>
                    <td>تجميع الطلبات</td>
                    <td>20 ريال </td>
                    <td>15 ريال </td>
                    <td>10 ريال </td>

                </tr>
                <tr>

                    <td>خصومات تكلفة الشحن</td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td>5% الشحن الداخلي</td>
                    <td>5% شحن داخلي 10% شحن خارجي  </td>

                </tr>
                <tr>
                    <td>دعم فني</td>
                    <td> أوقات العمل الرسمي </td>
                    <td> أيام العمل الرسمي </td>
                    <td> جميع الأوقات + مدير حساب خاص </td>

                </tr>


                <tr>

                    <td>التغليف الذكي</td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>

                    <td> 25 ريال  </td>
                    <td> مجانا </td>


                </tr>

                <tr>

                    <td>تجهيز وشحن طوارئ (نفس اليوم) </td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td>40 ريال </td>
                    <td> 30 ريال</td>



                </tr>


                <tr>
                    <td>إرجاع  للبائع</td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>

                    <td> 20 ريال</td>
                </tr>

                <tr>
                    <td>ارسال مستندات</td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td>متوفر</td>
                </tr>

                <tr>
                    <td>خدمة حماية البائع والمشتري</td>

                    <td>40 ريال </td>
                    <td>25 ريال </td>
                    <td>20 ريال</td>
                </tr>

                <tr>
                    <td>توصيل مع استلام المبلغ</td>

                    <td>20 ريال  </td>
                    <td>15 ريال </td>
                    <td>مجانا</td>
                </tr>

                <tr>
                    <td>تأمين </td>
                    <td class=" border"><i class="fas fa-3x fa-check-square text-blue "></i></td>
                    <td class=" border"><i class="fas fa-3x fa-check-square text-blue "></i></td>
                    <td>خصم 5% على التأمين </td>
                </tr>

                <tr>
                    <td class="rounded-bottom"> نظام  النقاط</td>
                    <td class="rounded-bottom"><i class="fas  fa-2x fa-window-close text-secondary"></i></td>
                    <td class="rounded-bottom"> علي كل 15 ريال نفطة</td>
                    <td class="rounded-bottom"> علي كل 10 ريال نفطة</td>
                </tr>


                <tbody>
            </table>
        </div>


    </section>
    <!--End section  -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.ar_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>