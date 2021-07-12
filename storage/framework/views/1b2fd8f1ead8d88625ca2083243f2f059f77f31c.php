<?php $__env->startSection('title', 'نموذج_الإستيراد'); ?>
<?php $__env->startSection('content'); ?>

    <!--section-1 -->
        <section class="other_nav_link" style="position: relative; top: 160px;">

                <!-- container -->
                <div class="container" id="first-styp">
                    <!-- row -->
                    <div class="row  py-3 ">

                        <!-- col-12 -->
                        <div class="col-md-12 col-12 text-center">
                            <h1 class=" text-primary"> نموذج الإستيراد</h1>
                        </div>
                        <!--/ col-12 -->

                        <!-- col-12 -->

                        <div class="col-md-12 col-12 text-right" dir="rtl">
                            <div class="row bg-basket rounded font-weight-bolder py-3 my-3">
                                <ol class=" col-12 d-block pr-5 text-blue list-unstyled">ملاحظات هامة :
                                    <li class="my-2">‌أ.	 الخدمة خاصة لطلب شراء منتجات غير متوفرة في المتاجر الإلكترونية <br> وللكميات التجارية ولمعرفة العروض المتوفرة، وللاستيراد
                                    <li class="my-2">‌ب. عند وجود رابط للمنتجات من المتاجر، <a href="<?php echo e(route('formPersonalShopperAr')); ?>" class="text-primary">نموذج المتسوق الشخصي </a> لتوفير العمولة.  </li>
                                    <li class="my-2">‌ج.	 يوجد مبلغ مقدم رمزي لإتمام الطلب </li>
                                    <li class="my-2">‌‌د.	للعملاء من السعودية الطلب من السعودية وأمريكا والصين</li>
                                    <li class="my-2">ه .للعملاء من خارج السعودية الطلب من السعودية فقط   </li>
                                    <li class="my-2">و . لاستيراد او طلب شراء قطع غيار السيارات <a href="<?php echo e(route('FormOrderAutoPartsAr')); ?>" class="text-primary">نموذج-قطع-غيار-السيارات</a>     </li>
                                    <li class="my-2"> ز . لمعرفة المميزات والرسوم يرجى مراجعة <a href="<?php echo e(route('importSolutionsAr')); ?>" class="text-primary">حلول الإستيراد</a>    </li>
                                </ol>

                                <div class="col-md-3 col-12  text-center mx-auto">

                                    <a class="btn btn-primary my-1 px-5   first-styp"  data-toggle="collapse"
                                    href="#import" role="button" aria-expanded="true"
                                    aria-controls="collapseExample">  الدخول للخدمة</a>

                                </div>

                            </div>


                        </div>
                        <!--/ col-12 -->

                    </div>
                <!--/ row -->

                </div>
                <!-- container -->

        </section>
    <!--/ section-1 -->


    <!--/ section-2 -->
        <section class="section-2 " style=" margin-top: 160px;">
            <div class="collapse" id="import">
            <!-- container -->
                <div class="container" id="showHide">
                    <!--/ Row -->
                    <div class="row flex-column-reverse flex-lg-row my-3">

                        <!-- col-5-->
                            <div class="col-md-5 col-12 text-center">
                                <div class="input-group my-4" dir="rtl">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01">الشحن إلى*</label>
                                    </div>
                                    <select required class="custom-select" id="inputGroupSelect01" dir="rtl" >

                                <option value="AW">آروبا</option>
                                <option value="AZ">أذربيجان</option>
                                <option value="AM">أرمينيا</option>
                                <option value="ES">أسبانيا</option>
                                <option value="AU">أستراليا</option>
                                <option value="AF">أفغانستان</option>
                                <option value="AL">ألبانيا</option>
                                <option value="DE">ألمانيا</option>
                                <option value="AG">أنتيجوا وبربودا</option>
                                <option value="AO">أنجولا</option>
                                <option value="AI">أنجويلا</option>
                                <option value="AD">أندورا</option>
                                <option value="UY">أورجواي</option>
                                <option value="UZ">أوزبكستان</option>
                                <option value="UG">أوغندا</option>
                                <option value="UA">أوكرانيا</option>
                                <option value="IE">أيرلندا</option>
                                <option value="IS">أيسلندا</option>
                                <option value="ET">اثيوبيا</option>
                                <option value="ER">اريتريا</option>
                                <option value="EE">استونيا</option>
                                <option value="IL">اسرائيل</option>
                                <option value="AR">الأرجنتين</option>
                                <option value="JO">الأردن</option>
                                <option value="EC">الاكوادور</option>
                                <option value="AE">الامارات العربية المتحدة</option>
                                <option value="BS">الباهاما</option>
                                <option value="BH">البحرين</option>
                                <option value="BR">البرازيل</option>
                                <option value="PT">البرتغال</option>
                                <option value="BA">البوسنة والهرسك</option>
                                <option value="GA">الجابون</option>
                                <option value="ME">الجبل الأسود</option>
                                <option value="DZ">الجزائر</option>
                                <option value="DK">الدانمرك</option>
                                <option value="CV">الرأس الأخضر</option>
                                <option value="SV">السلفادور</option>
                                <option value="SN">السنغال</option>
                                <option value="SD">السودان</option>
                                <option value="SE">السويد</option>
                                <option value="EH">الصحراء الغربية</option>
                                <option value="SO">الصومال</option>
                                <option value="CN">الصين</option>
                                <option value="IQ">العراق</option>
                                <option value="VA">الفاتيكان</option>
                                <option value="PH">الفيلبين</option>
                                <option value="AQ">القطب الجنوبي</option>
                                <option value="CM">الكاميرون</option>
                                <option value="CG">الكونغو - برازافيل</option>
                                <option value="KW">الكويت</option>
                                <option value="HU">المجر</option>
                                <option value="IO">المحيط الهندي البريطاني</option>
                                <option value="MA">المغرب</option>
                                <option value="TF">المقاطعات الجنوبية الفرنسية</option>
                                <option value="MX">المكسيك</option>
                                <option value="SA">المملكة العربية السعودية</option>
                                <option value="GB">المملكة المتحدة</option>
                                <option value="NO">النرويج</option>
                                <option value="AT">النمسا</option>
                                <option value="NE">النيجر</option>
                                <option value="IN">الهند</option>
                                <option value="US">الولايات المتحدة الأمريكية</option>
                                <option value="JP">اليابان</option>
                                <option value="YE">اليمن</option>
                                <option value="GR">اليونان</option>
                                <option value="ID">اندونيسيا</option>
                                <option value="IR">ايران</option>
                                <option value="IT">ايطاليا</option>
                                <option value="PG">بابوا غينيا الجديدة</option>
                                <option value="PY">باراجواي</option>
                                <option value="PK">باكستان</option>
                                <option value="PW">بالاو</option>
                                <option value="BW">بتسوانا</option>
                                <option value="PN">بتكايرن</option>
                                <option value="BB">بربادوس</option>
                                <option value="BM">برمودا</option>
                                <option value="BN">بروناي</option>
                                <option value="BE">بلجيكا</option>
                                <option value="BG">بلغاريا</option>
                                <option value="BZ">بليز</option>
                                <option value="BD">بنجلاديش</option>
                                <option value="PA">بنما</option>
                                <option value="BJ">بنين</option>
                                <option value="BT">بوتان</option>
                                <option value="PR">بورتوريكو</option>
                                <option value="BF">بوركينا فاسو</option>
                                <option value="BI">بوروندي</option>
                                <option value="PL">بولندا</option>
                                <option value="BO">بوليفيا</option>
                                <option value="PF">بولينيزيا الفرنسية</option>
                                <option value="PE">بيرو</option>
                                <option value="TZ">تانزانيا</option>
                                <option value="TH">تايلند</option>
                                <option value="TW">تايوان</option>
                                <option value="TM">تركمانستان</option>
                                <option value="TR">تركيا</option>
                                <option value="TT">ترينيداد وتوباغو</option>
                                <option value="TD">تشاد</option>
                                <option value="TG">توجو</option>
                                <option value="TV">توفالو</option>
                                <option value="TK">توكيلو</option>
                                <option value="TO">تونجا</option>
                                <option value="TN">تونس</option>
                                <option value="TL">تيمور الشرقية</option>
                                <option value="JM">جامايكا</option>
                                <option value="GI">جبل طارق</option>
                                <option value="GD">جرينادا</option>
                                <option value="GL">جرينلاند</option>
                                <option value="AX">جزر أولان</option>
                                <option value="AN">جزر الأنتيل الهولندية</option>
                                <option value="TC">جزر الترك وجايكوس</option>
                                <option value="KM">جزر القمر</option>
                                <option value="KY">جزر الكايمن</option>
                                <option value="MH">جزر المارشال</option>
                                <option value="MV">جزر الملديف</option>
                                <option value="UM">جزر الولايات المتحدة البعيدة الصغيرة</option>
                                <option value="SB">جزر سليمان</option>
                                <option value="FO">جزر فارو</option>
                                <option value="VI">جزر فرجين الأمريكية</option>
                                <option value="VG">جزر فرجين البريطانية</option>
                                <option value="FK">جزر فوكلاند</option>
                                <option value="CK">جزر كوك</option>
                                <option value="CC">جزر كوكوس</option>
                                <option value="MP">جزر ماريانا الشمالية</option>
                                <option value="WF">جزر والس وفوتونا</option>
                                <option value="CX">جزيرة الكريسماس</option>
                                <option value="BV">جزيرة بوفيه</option>
                                <option value="IM">جزيرة مان</option>
                                <option value="NF">جزيرة نورفوك</option>
                                <option value="HM">جزيرة هيرد وماكدونالد</option>
                                <option value="CF">جمهورية افريقيا الوسطى</option>
                                <option value="CZ">جمهورية التشيك</option>
                                <option value="DO">جمهورية الدومينيك</option>
                                <option value="CD">جمهورية الكونغو الديمقراطية</option>
                                <option value="ZA">جمهورية جنوب افريقيا</option>
                                <option value="GT">جواتيمالا</option>
                                <option value="GP">جوادلوب</option>
                                <option value="GU">جوام</option>
                                <option value="GE">جورجيا</option>
                                <option value="GS">جورجيا الجنوبية وجزر ساندويتش الجنوبية</option>
                                <option value="DJ">جيبوتي</option>
                                <option value="JE">جيرسي</option>
                                <option value="DM">دومينيكا</option>
                                <option value="RW">رواندا</option>
                                <option value="RU">روسيا</option>
                                <option value="BY">روسيا البيضاء</option>
                                <option value="RO">رومانيا</option>
                                <option value="RE">روينيون</option>
                                <option value="ZM">زامبيا</option>
                                <option value="ZW">زيمبابوي</option>
                                <option value="CI">ساحل العاج</option>
                                <option value="WS">ساموا</option>
                                <option value="AS">ساموا الأمريكية</option>
                                <option value="SM">سان مارينو</option>
                                <option value="PM">سانت بيير وميكولون</option>
                                <option value="VC">سانت فنسنت وغرنادين</option>
                                <option value="KN">سانت كيتس ونيفيس</option>
                                <option value="LC">سانت لوسيا</option>
                                <option value="MF">سانت مارتين</option>
                                <option value="SH">سانت هيلنا</option>
                                <option value="ST">ساو تومي وبرينسيبي</option>
                                <option value="LK">سريلانكا</option>
                                <option value="SJ">سفالبارد وجان مايان</option>
                                <option value="SK">سلوفاكيا</option>
                                <option value="SI">سلوفينيا</option>
                                <option value="SG">سنغافورة</option>
                                <option value="SZ">سوازيلاند</option>
                                <option value="SY">سوريا</option>
                                <option value="SR">سورينام</option>
                                <option value="CH">سويسرا</option>
                                <option value="SL">سيراليون</option>
                                <option value="SC">سيشل</option>
                                <option value="CL">شيلي</option>
                                <option value="RS">صربيا</option>
                                <option value="CS">صربيا والجبل الأسود</option>
                                <option value="TJ">طاجكستان</option>
                                <option value="OM">عمان</option>
                                <option value="GM">غامبيا</option>
                                <option value="GH">غانا</option>
                                <option value="GF">غويانا</option>
                                <option value="GY">غيانا</option>
                                <option value="GN">غينيا</option>
                                <option value="GQ">غينيا الاستوائية</option>
                                <option value="GW">غينيا بيساو</option>
                                <option value="VU">فانواتو</option>
                                <option value="FR">فرنسا</option>
                                <option value="PS">فلسطين</option>
                                <option value="VE">فنزويلا</option>
                                <option value="FI">فنلندا</option>
                                <option value="VN">فيتنام</option>
                                <option value="FJ">فيجي</option>
                                <option value="CY">قبرص</option>
                                <option value="KG">قرغيزستان</option>
                                <option value="QA">قطر</option>
                                <option value="KZ">كازاخستان</option>
                                <option value="NC">كاليدونيا الجديدة</option>
                                <option value="HR">كرواتيا</option>
                                <option value="KH">كمبوديا</option>
                                <option value="CA">كندا</option>
                                <option value="CU">كوبا</option>
                                <option value="KR">كوريا الجنوبية</option>
                                <option value="KP">كوريا الشمالية</option>
                                <option value="CR">كوستاريكا</option>
                                <option value="CO">كولومبيا</option>
                                <option value="KI">كيريباتي</option>
                                <option value="KE">كينيا</option>
                                <option value="LV">لاتفيا</option>
                                <option value="LA">لاوس</option>
                                <option value="LB">لبنان</option>
                                <option value="LU">لوكسمبورج</option>
                                <option value="LY">ليبيا</option>
                                <option value="LR">ليبيريا</option>
                                <option value="LT">ليتوانيا</option>
                                <option value="LI">ليختنشتاين</option>
                                <option value="LS">ليسوتو</option>
                                <option value="MQ">مارتينيك</option>
                                <option value="MO">ماكاو الصينية</option>
                                <option value="MT">مالطا</option>
                                <option value="ML">مالي</option>
                                <option value="MY">ماليزيا</option>
                                <option value="YT">مايوت</option>
                                <option value="MG">مدغشقر</option>
                                <option value="EG">مصر</option>
                                <option value="MK">مقدونيا</option>
                                <option value="MW">ملاوي</option>
                                <option value="ZZ">منطقة غير معرفة</option>
                                <option value="MN">منغوليا</option>
                                <option value="MR">موريتانيا</option>
                                <option value="MU">موريشيوس</option>
                                <option value="MZ">موزمبيق</option>
                                <option value="MD">مولدافيا</option>
                                <option value="MC">موناكو</option>
                                <option value="MS">مونتسرات</option>
                                <option value="MM">ميانمار</option>
                                <option value="FM">ميكرونيزيا</option>
                                <option value="NA">ناميبيا</option>
                                <option value="NR">نورو</option>
                                <option value="NP">نيبال</option>
                                <option value="NG">نيجيريا</option>
                                <option value="NI">نيكاراجوا</option>
                                <option value="NZ">نيوزيلاندا</option>
                                <option value="NU">نيوي</option>
                                <option value="HT">هايتي</option>
                                <option value="HN">هندوراس</option>
                                <option value="NL">هولندا</option>
                                <option value="HK">هونج كونج الصينية</option>
                                    </select>
                                </div>
                            </div>
                        <!--/ col-5-->

                    <div class="col-2"></div>

                    <!-- col-5-->
                        <div class=" col-md-5 col-12 text-center">
                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">الشراء من*</label>
                                </div>
                                <select required class="custom-select" id="inputGroupSelect01" dir="rtl" >
                                  <option selected>أختار ...</option>
                                  <option value="1">السعودية</option>
                                  <option value="2">أمريكا</option>
                                  <option value="2">الصين</option>
                                </select>
                            </div>
                        </div>
                    <!--/ col-5-->




                    </div><!--/ Row -->


                    <div class="row">
                        <div class="col-md-3 col-12  text-center mx-auto">

                            <a class="import btn btn-primary my-3 px-5 next pull-right "
                            data-toggle="collapse" href="#hider"  role="button" aria-expanded="false" aria-controls="collapseExample" onclick="myFunction()">
                            التالى</a>

                        </div>
                    </div>
              </div>   <!-- container -->
              </div>

        </section>
    <!--/ section-1 -->


    <!--/ section-2 -->
        <section class="section-3  my-2">
            <div class="collapse" id="hider" >
            <div class="container">
                    <div class="row  ">

                        <div class="col-12 text-center text-primary my-md-2 font-weight-bolder" dir="rtl">
                            <h5>أدخل اسم وتفاصيل صحيحة للمنتج للحصول على التكلفة الصحيحة، وسرعة في الرد.</h5>
                            <h6>تنبيه: الأفضل إدخال تفاصيل منتج واحد فقط في النموذج.</h6>
                        </div>



                          <div class=" col-lg-12 col-12 text-center">
                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">الأسم *</span>
                                    </div>
                                    <input type="text" class="form-control" oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);"
                            required="required" placeholder="أجبارى" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!--col-12 -->
                            <div class="col-lg-12 col-12 text-center mb-3">
                                <div class="input-group input-group-lg" dir="rtl">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">الوصف *</span>
                                    </div>
                                    <textarea class="form-control" oninvalid="InvalidMsg(this);"
                            oninput="InvalidMsg(this);"
                            required="required" placeholder="أجبارى" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                            <!--col-12 -->
                             <div class="col-lg-12  col-12 text-center">
                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">الرابط</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="اختياري (رابط المنتج او صورة او مقطع فيديو) " aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!--col-12 -->


                            <div class="col-md-4 col-12 text-right font-weight-bolder my-2 mx-auto" dir="rtl">

                                <form>
                                    <div class="input-group mb-3" dir="rtl">
                                        <div class="input-group-prepend">
                                          <label class="input-group-text" for="inputGroupSelect01">جودة المنتج*</label>
                                        </div>
                                        <select required class="custom-select" id="inputGroupSelect01" dir="rtl" >
                                          <option selected>أختار ...</option>
                                          <option value="1">  أفضل سعر</option>
                                          <option value="2">أفضل جودة</option>
                                          <option value="2">كلاهما</option>
                                        </select>
                                    </div>

                                </form>
                            </div>

                    <!--col-12 -->

                </div>
                    <!--row-->

                <div class="row">

                     <!-- col-4-->
                            <div class=" col-md-4 col-sm-12 col-12 text-center">
                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">الحجم*</span>
                                    </div>
                                    <input  oninvalid="InvalidMsg(this);"
                                    oninput="InvalidMsg(this);"
                                    required="required"type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!--/ col-4-->


                            <!-- col-4-->
                            <div class=" col-md-4 col-12 text-center">
                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">اللون*</span>
                                    </div>
                                    <input oninvalid="InvalidMsg(this);"
                                    oninput="InvalidMsg(this);"
                                    required="required"type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!--/ col-4-->


                            <!-- col-4-->
                            <div class=" col-md-4 col-12 text-center">
                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">المقاس*</span>
                                    </div>
                                    <input oninvalid="InvalidMsg(this);"
                                    oninput="InvalidMsg(this);"
                                    required="required"type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!--/ col-4-->


                            <!-- col-4-->
                            <div class="col-md-4 col-12 text-center">
                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">الميزانية*</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!--/ col-4-->


                            <!-- col-4-->
                            <div class=" col-md-4 col-12 text-center">
                                <div class="input-group mb-3" dir="rtl">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">الكمية*</span>
                                    </div>
                                    <input oninvalid="InvalidMsg(this);"
                                    oninput="InvalidMsg(this);"
                                    required="required"type="password" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!--/ col-4-->


                            <!-- col-4-->
                            <div class=" col-md-4 col-12 text-center">
                                   <div class="input-group mb-3" dir="rtl">
                                       <div class="input-group-prepend">
                                         <label class="input-group-text" for="inputGroupSelect01">عدد العروض*</label>
                                       </div>
                                       <select required class="custom-select" id="inputGroupSelect01" dir="rtl" >
                                         <option selected>أختار ...</option>
                                         <option value="1">عرض واحد - مجاني</option>
                                         <option value="2">عرضين - 40 ريال</option>
                                         <option value="2">ثلاثة عروض - 50 ريال</option>
                                       </select>
                                   </div>
                               </div>
                            <!--/ col-4-->


                <!-- col-12 -->
                <div class="col-lg-12 col-12 text-center my-3">
                    <form class="text-right border wrapper d-flex" id="form1" runat="server" dir="rtl">

                        <div class="file-upload">
                            <input required class="inputfile " id="image-file" type="file" multiple/>
                            <i class="fa fa-3x fa-image"></i>

                          </div>
                          <div  class="content-img w-50  "></div>

                      </form>
                </div>
                <!--</div>-->

                    <div class="col-md-4  col-12 text-center my-md-5 mx-auto ">
                        <div class="btn-blue  rounded-1 text-center px-4 py-2 ">
                            <a class=" text-decoration-none text-light p-2  font-weight-bold" data-toggle="modal" href="#myModal_2">عنوان البائع</a>
                        </div>
                    </div>




                </div>


                    <div class="row flex-row-reverse">
                           <div class="col-md-4 col-6 text-center">
                        <div class=" btn-secondary rounded-1 text-center px-4 py-2 my-2">
                            <a class=" text-decoration-none text-light  font-weight-bold" href="#"> ارسال  </a>
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

           <!-- My_model-2 -->
        <div id="myModal_2" class="modal fade text-center">
            <div class="modal-dialog">
                <div class="col-lg-10 col-sm-10 col-12 main-section">
                    <div class="modal-content">

                        <div class="col-lg-12 col-sm-12 col-12 user-name">
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>

                        <div class="col-lg-12 col-sm-12 col-12 form-input">
                            <form>

                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="الأسم" dir="rtl">
                                </div>

                                <div class="form-group">
                                    <input type="name" "class="form-control" placeholder="عنوان 1" dir="rtl">
                                </div>

                                <div class="form-group">
                                    <input type="name"  class="form-control" placeholder="عنوان 2" dir="rtl">
                                </div>

                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="المنطقة" dir="rtl">
                                </div>

                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="المدينة" dir="rtl">
                                </div>

                                <div class="form-group">
                                    <input type="name" class="form-control" placeholder="رقم الجوال" dir="rtl">
                                </div>

                                <input type="submit"class="btn btn-primary" value="حفظ">

                              <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!--/ My_model-2 -->


            </div>
            <!-- container -->
            </div>

        </section>


<?php $__env->stopSection(); ?>

<?php $__env->startPush("script"); ?>
    <script type="text/javascript">
            $('.first-styp').click(function(){
        $('#first-styp' ).hide();
        });
                $('.import').click(function(){
                $('#import' ).toggle();
        });

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