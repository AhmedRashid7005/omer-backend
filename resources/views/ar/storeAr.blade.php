@extends('template.ar_template')
@section('title', 'Store')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
@endpush


    <section  class="other_nav_link  my-5" style="position: relative; top: 130px;"> 
      
            <div class="container">
           <div class="container-shop">
            
             <div class="input-group mb-3 navbar-left w-100 ">
                <div class="input-group-prepend rounded">
                  <span class="input-group-text  rounded"  id="basic-addon1"><i class=" ml-2 fa fa-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
              </div>
           </div> 
           </div> <!--end container -->
      
         

   </section>
   
   

    <!--section-2 -->
        <section class="section-2 mb-4" style="margin-top: 160px;">
            <!-- container -->
            <div class="container">
                <div class="row">
                       
                    <!-- col-5-->
                        <div class="col-md-6 col-12 text-center">
                            <div class="input-group mb-3" dir="rtl">
                                <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">الانواع</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" dir="rtl" >
                                  <option selected> إكسسوارات نسائية</option>
                                  <option value="1">ملابس رجالية</option>
                                  <option value="2">اكسسوارات اجهزة</option>
                
                                </select>
                            </div>
                        </div>
                    <!--/ col-5-->
                
                      
                <!-- col-5-->
                    <div class=" col-md-6 col-12 text-center">
                        <div class="input-group mb-3" dir="rtl">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">الدولة</label>
                            </div>
                            <select class="custom-select"  type="text" id="selectObject" class="form-control"  >
                           
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


                <!--/ col-md-3-->

                <!-- <div class="col-md-3 col-12 text-center mx-auto d-flex">  
                   <div class="mx-auto "> 
                        <form >
    
                    <fieldset class="starability-basic">
                   
                      <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked aria-label="No rating." />
                
                      <input type="radio" id="rate1" name="rating" value="1" />
                      <label for="rate1">1 star.</label>
                
                      <input type="radio" id="rate2" name="rating" value="2" />
                      <label for="rate2">2 stars.</label>
                
                      <input type="radio" id="rate3" name="rating" value="3" />
                      <label for="rate3">3 stars.</label>
                
                      <input type="radio" id="rate4" name="rating" value="4" />
                      <label for="rate4">4 stars.</label>
                
                      <input type="radio" id="rate5" name="rating" value="5" />
                      <label for="rate5">5 stars.</label>
                
                      <span class="starability-focus-ring"></span>
                    </fieldset>
                  </form></div>
                  </div> -->
                    <!--/ col-md-3-->


                    <!--/ col-md-3-->
                    <div class="col-md-12 text-center py-3 border-bottom d-flex">
                        <div class="mr-auto  w-75">
                            <label for="selectAll">المواقع المميزة العالمية</label>
                            <input id="selectAll"  type="radio"  name="selectAll" value="Bike">
                        </div>

                        <div class="ml-auto  w-75">
                            <label for="selectAll">المواقع المميزة السعودية </label>
                            <input id="selectAll"  type="radio"  name="selectAll" value="Bike">
                        </div>
                    
                    </div>
                       <!--/ col-md-3-->

                 </div><!--/ Row -->
          
            </div>
            <!--/ container -->
        </section>
    <!--section-2 -->            
                
        
    






    <section class="section-3">
        <div class="container">
            <div class="row">

                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       
                <!-- col-md-3  -->
                <div class="col-md-3 col-12 mb-3">
                    <div class="logo-site w-100">
                        <div class="content">
                            <div class="content-overlay"></div>
                            <img class="content-image" src="{{ URL::asset('public/themeAssets')}}/images/Shop-from (1).png">
                            <div class="content-details fadeIn-bottom  mt-5 pt-4">
                                <div class="d-flex justify-content-between">
                           <a href="Blog-AR.html" class="btn bg-light text-dark mx-2">الذهاب للموقع </a>  
                            <a href="Blog-AR.html" class="btn bg-light text-dark">معلومات عن الموقع </a>  
                            </div>
                          <p class=" text-light">  دولة المتجر  السعودية </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-md-3  -->
       

 
            


                <!-- End col-md-3  -->
                 <div class="col-12 my-5 text-center">
                     <div> 
                         <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a href="#" class="active">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                      </div>
                      </div> 
                    </div>

                    

                 
            </div>
        </div>
    </section>
                
                
                
    
    
 <!-- My_model  Footer-->
 <div id="myModal" class="modal fade text-center">
    <div class="modal-dialog">
      <div class="col-lg-10 col-sm-10 col-12 main-section">
        <div class="modal-content">
          <div class="col-lg-12 col-sm-12 col-12 user-img">
            <img src="{{ URL::asset('public/themeAssets')}}/images/man01.png">
          </div>
          <div class="col-lg-12 col-sm-12 col-12 user-name">
            <h1>احصل على آخر الأخبار  </h1>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          <div class="col-lg-12 col-sm-12 col-12 form-input">
            <form>
              <div class="form-group">
                <input oninvalid="InvalidMsg(this);" 
                oninput="InvalidMsg(this);"
                required="required"  type="text" class="form-control" placeholder="الأسم" dir="rtl">
              </div>
              <div class="form-group">
                <input oninvalid="InvalidMsg(this);" 
                oninput="InvalidMsg(this);"
                required="required"type="email" class="form-control" placeholder="ايميل" dir="rtl">
              </div>
              <button type="submit" class="btn btn-primary">أشتراك</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
<!--/ My_model -->

@endsection