<?php
   /**
   + date: 23/11/2020
   + add by arafat | arafat.dml@gmail.com
   **/
   if (session_status() == PHP_SESSION_NONE) {
       session_start();
   }
   if(empty($_GET["plan"])){
      header("location:".route("subscriptionPlansAr"));
      exit();
   }
  
    $planIs = (int) $_GET["plan"];
    
   Session::put("plan_is", $planIs);
   // end by arafat
   ?>
@extends('template.ar_template')
@section('title', 'تسجيل مستخدم جديد')
@section('content')
@push("css")
<link rel="stylesheet" href="{{ URL::asset('public/themeAssets/build/css/intlTelInput.css') }}">
<link rel="stylesheet" href="{{ URL::asset('public/themeAssets/build/css/demo.css') }}">
<style>
   .login-form{
   margin-bottom: 150px;
   }
   /*arafat code for multi step form*/
   /* Style the form */
   #regForm {
   background-color: #ffffff;
   margin: 100px auto;
   padding: 40px;
   width: 70%;
   min-width: 300px;
   }
   /* Style the input fields */
   input {
   padding: 10px;
   width: 100%;
   font-size: 17px;
   font-family: Raleway;
   border: 1px solid #aaaaaa;
   }
   /* Mark input boxes that gets an error on validation: */
   input.invalid {
   background-color: #ffdddd;
   }
   /* Hide all steps by default: */
   .tab {
   display: none;
   }
   /* Make circles that indicate the steps of the form: */
   .step {
   height: 15px;
   width: 15px;
   margin: 0 2px;
   background-color: #bbbbbb;
   border: none;
   border-radius: 50%;
   display: inline-block;
   opacity: 0.5;
   }
   /* Mark the active step: */
   .step.active {
   opacity: 1;
   }
   /* Mark the steps that are finished and valid: */
   .step.finish {
   background-color: #4CAF50;
   }
   /*end arafat code for multi step form*/
</style>
<style>
    /* Paste this css to your style sheet file or under head tag */
    /* This only works with JavaScript,
    if it's not present, don't show loader */
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url({{ URL::asset('public/themeAssets')}}/images/loader.gif) center no-repeat #fff;
    }
</style>
@endpush
{{-- arafat loader  --}}
<div class="se-pre-con" style="display: none;"></div>
{{-- end arafat loader --}}
<section class="other_nav_link" style="position: relative; top: 150px; margin-bottom: 100px;">
   <!--Start section class="new-user" -->
   <div id="section-new-user" class="new-user" >
      <!-- Start container-->
      <div class="container">
         <div class="row">
            <div class=" col-md-12  text-center my-2">
            </div>
            <div class="login-form">
               <div class="text-center social-btn">
                  <a href="#Delivery" id="register_guaranteed_access" data-toggle="collapse"
                     data-target="#Delivery" aria-controls="Delivery" class="btn btn-blue btn-block text-center  mt-3"> الوصول المضمون</b></a>
                  <span class="social_login">
                     <div class="or-seperator"><i>or</i></div>
                     <a href="{{route('social.login','facebook')}}" class="btn btn-face btn-block"><i class="fab fa-facebook"></i> Sign in with <b>Facebook</b></a>
                     <a href="{{route('social.login','google')}}" class="btn btn-google btn-block"><i class="fab fa-google-plus-g"></i> Sign in with <b>Google</b></a>
                     <a href="{{route('social.login','twitter')}}" class="btn btn-twit btn-block"><i class="fab fa-twitter"></i> Sign in with <b>Twitter</b></a>
                  </span>
               </div>
            </div>
         </div>
            <div class="row collapse " id="Delivery" style="margin-top: -250px;">
                 <!-- arafat multi step form start -->
                <form id="regForm"  action="{{route('subscribe')}}" method="post">
                       @csrf
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab" style="display: block;">
                       <h3>تسجيل مستخدم جديد</h3>
                       <div class="col-md-12 text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text pl-4" >الأسم الأول</span>
                             </div>
                             <input id="first_name"  required="required"  type="text" name="first_name" class="form-control"  placeholder="الأسم" >
                          </div>
                       </div>
                       <div class=" col-md-12 text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text pl-4" >الأسم الأخير</span>
                             </div>
                             <input id="last_name"  required="required"  type="text" name="last_name" class="form-control" placeholder="لأسم الأخير" >
                          </div>
                       </div>
                       <div class=" col-md-12 text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text pl-5 " >الإيميل </span>
                             </div>
                             <input id="email" class="form-control"   type="email" name="email"
                                required="required"   class="form-control" placeholder="الإيميل" >
                          </div>
                          <div id="emailError" style="color: red; display:none;" dir="rtl"></div>
                       </div>
                       <div class=" col-md-12 text-center">
                          <div class="input-group mb-3"  dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text pl-5" >الباسورد </span>
                             </div>
                             <input data-toggle-password-field class="form__input form-control" id="password" onpaste="return false;" type="password" name="password" placeholder="الباسورد"
                                name="password" required minlength="8" aria-describedby="passwordHint" autocomplete="current-password">
                             <button type="button" hidden aria-pressed="false" class="form__toggle-password input-group-text w-auto" data-toggle-password>
                             <span>Show </span>
                             </button>
                             <div class="passwordError" style='color:red; display:none;' dir="rtl">يجب أن تكون كلمة المرور ثمانية أحرف واحد العليا حالة واحدة، حالة أقل واحد، ورقم واحد على الأقل</div>

                          </div>
                          </div>
                       <div class=" col-md-12 text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text" >إعادة الباسورد </span>
                             </div>
                             <input id="conPass" class="form-control" type="password" required="required"   placeholder="إعادة الباسورد" >
                          </div>
                          <div id="conPassError" style='color:red; display:none' dir="rtl">تمرير كلمة غير متطابقة</div>
                       </div>
                    </div>
                    <div class="tab">
                       <h1 class="text-primary text-center my-3" dir="rtl"> عنوان شحن</h1>
                       <!--div add-->
                       <div class=" col-md-12 col-12   text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text">عنوان 1 *</span>
                             </div>
                             <input type="text"  id="ship_add_1"  class="form-control" name="ship_add_1" required="required" placeholder="عنوان(اجبارى)" >
                          </div>
                       </div>
                       <!--div add-->
                       <!--Suite addres-->
                       <div class=" col-md-12 col-12 text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text">عنوان 2 </span>
                             </div>
                             <input type="text" id="ship_add_2" class="form-control"  name="ship_add_2" required placeholder=" عنوان2(اختيارى)" >
                          </div>
                       </div>
                       <!--Suite addres-->
                       <!--select-->
                       <div class="col-md-12  col-12 text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">الدولة</label>
                             </div>
                            <select class="custom-select"  required type="text" id="ship_country" name="ship_country" class="form-control"  >
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
                       <!--select-->
                       <!-- addeseenum-->
                       <div class=" col-md-12 col-12 text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text">المنطقة </span>
                             </div>
                             <input required="required" type="text" id="ship_region" name="ship_region"  class="form-control" placeholder=" المنطقة" >
                          </div>
                       </div>
                       <!--addesee num-->
                       <!-- addesee-->
                       <div class=" col-md-12 col-12 text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text">المدينة </span>
                             </div>
                             <input  required="required" type="text" name="ship_city" id="ship_city" class="form-control" placeholder=" المدينة" >
                          </div>
                       </div>
                       <!--addesee -->
                       <div class="col-md-6  col-12 text-center">
                          <div class="input-group mb-3 inputGroupSelect01" >
                             <!--   <form> -->
                             <input  required="required" class="input-group" id="ship_phone" name="ship_phone" type="tel">
                             <button  class="input-group-text  "dir="rtl" type="submit">رمز اتصال الدوله</button>
                          </div>
                       </div>
                       <!--select-->
                       <!--Postcard -->
                       <div class=" col-md-6 col-12 text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text">الرمز البريدي </span>
                             </div>
                             <input required="required" type="text" name="ship_postal_code" id="ship_postal_code"  class="form-control" placeholder="الرمز البريدي" >
                          </div>
                       </div>
                       <!--Postcard -->
                       <!--phone num-->
                       <div class=" col-md-12 col-12 text-center">
                          <div class="input-group mb-3" dir="rtl">
                             <div class="input-group-prepend">
                                <span class="input-group-text"> رقم آخر</span>
                             </div>
                             <input type="text"  name="ship_another_number" id="ship_another_number" class="form-control" placeholder="رقم الجوال(اختيارى)" >
                          </div>
                       </div>
                       <!--phone num-->
                    </div>
                    <div class="tab">
                        <!-- for arafat checkbox -->
                        <div class="col-md-12 col-12">
                           <div class="input-group mb-3">
                                <div style="float: left; width: 5%; margin-right: 10px;">
                                    <input type="checkbox"  id="bill_same_as_shipping"  class="form-control" name="bill_same_as_shipping" value="yes">
                                </div>
                              <div style="float: left; width: 70%;">
                                    عنوان الفاتوره نفس عنوان الشحن
                              </div>
                           </div>
                        </div>
                        <!-- end for arafat checkbox -->

                       <div class=" col-md-3 col-12 font-weight-bold text-secndry text-right my-3">
                          <h3>عنوان الفوترة</h3>
                       </div>
                       <!-- Start container-->
                       <div class="container" >
                          <div class="row ">

                            <!--div add-->
                            <div class=" col-md-12 col-12   text-center">
                               <div class="input-group mb-3" dir="rtl">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text">عنوان 1 *</span>
                                  </div>
                                  <input type="text"  id="bill_add_1"  class="form-control" name="bill_add_1" required="required" placeholder="عنوان(اجبارى)" >
                               </div>
                            </div>
                            <!--div add-->
                            <!--Suite addres-->
                            <div class=" col-md-12 col-12 text-center">
                               <div class="input-group mb-3" dir="rtl">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text">عنوان 2 </span>
                                  </div>
                                  <input type="text" id="bill_add_2" class="form-control"  name="bill_add_2" required placeholder=" عنوان2(اختيارى)" >
                               </div>
                            </div>
                            <!--Suite addres-->
                            <!--select-->
                            <div class="col-md-12  col-12 text-center">
                               <div class="input-group mb-3" dir="rtl">
                                  <div class="input-group-prepend">
                                     <label class="input-group-text" for="inputGroupSelect01">الدولة</label>
                                  </div>
                                 <select class="custom-select"  required type="text" id="bill_country" name="bill_country" class="form-control"  >
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
                            <!--select-->
                            <!-- addeseenum-->
                            <div class=" col-md-12 col-12 text-center">
                               <div class="input-group mb-3" dir="rtl">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text">المنطقة </span>
                                  </div>
                                  <input required="required" type="text" id="bill_region" name="bill_region"  class="form-control" placeholder=" المنطقة" >
                               </div>
                            </div>
                            <!--addesee num-->
                            <!-- addesee-->
                            <div class=" col-md-12 col-12 text-center">
                               <div class="input-group mb-3" dir="rtl">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text">المدينة </span>
                                  </div>
                                  <input  required="required" type="text" name="bill_city" id="bill_city" class="form-control" placeholder=" المدينة" >
                               </div>
                            </div>
                            <!--addesee -->
                            <div class="col-md-6  col-12 text-center">
                               <div class="input-group mb-3 inputGroupSelect01" >
                                  <!--   <form> -->
                                  <input  required="required" class="input-group" id="bill_phone" name="bill_phone" type="tel">
                                  <button  class="input-group-text  "dir="rtl" type="submit">رمز اتصال الدوله</button>
                               </div>
                            </div>
                            <!--select-->
                            <!--Postcard -->
                            <div class=" col-md-6 col-12 text-center">
                               <div class="input-group mb-3" dir="rtl">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text">الرمز البريدي </span>
                                  </div>
                                  <input required="required" type="text" name="bill_postal_code" id="bill_postal_code"  class="form-control" placeholder="الرمز البريدي" >
                               </div>
                            </div>
                            <!--Postcard -->
                            <!--phone num-->
                            <div class=" col-md-12 col-12 text-center">
                               <div class="input-group mb-3" dir="rtl">
                                  <div class="input-group-prepend">
                                     <span class="input-group-text"> رقم آخر</span>
                                  </div>
                                  <input type="text"  name="bill_another_number" id="bill_another_number" class="form-control" placeholder="رقم الجوال(اختيارى)" >
                               </div>
                            </div>
                            <!--phone num-->

                          </div>
                       </div>


                       <div class="col-md-12">
                        <!-- for arafat checkbox -->
                        <div class="col-md-12 col-12">
                           <div class="input-group mb-3">
                                <div style="float: left; width: 5%; margin-right: 10px;">
                                    <input type="checkbox"  id="agree_on_term_condition"  class="form-control" name="agree_on_term_condition" value="" required="required">
                                </div>
                              <div style="float: left; width: 70%;">
                                   موافقة على الشروط والأحكام
                              </div>
                           </div>
                           <div id="termConditionError" style='color:red; display:none' dir="rtl">عليك أن توافق على شرطنا و شرطنا</div>
                        </div>
                        <!-- end for arafat checkbox -->
                       </div>
                    </div>

                    <div style="overflow:auto;">
                       <div style="float:right;">
                          <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                          <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                       </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                       <span class="step"></span>
                       <span class="step"></span>
                       <span class="step"></span>
                    </div>
                </form>
                 <!-- arafat multi step form end -->
            </div>
      </div>
      <!--End container -->
   </div>
   <!--End section class="new-user" -->
</section>
<!--section class="contact-us"-->
<section class="other_nav_link collapse " id="other_nav_link"  style="position: relative ; top: 40px;">
<!-- Start container-->
<div class="container ">
<div class="row ">
<!-- <div class=" col-md-12 col-12  text-center my-3">
   <input class="btn btn-primary px-5" type="submit" value="حفظ" />
   </div>  -->
<div class="col-md-12 col-12 text-center my-md-2 ">
<a class="btn btn-primary px-5 other_link"  data-toggle="collapse" href="#print"  role="button"  aria-controls="collapseExample">  التالى</a>
</div>
</div>
</div>
<!-- End container-->
</section>
<!-- End section contact-us -->
<!--/ section-4 -->
<section class="section-2 " style="margin-top: 50px;" >
<div class="collapse" id="print">
<!-- container -->
<div class="container">
<!-- Row -->
<div class="row">
<!--/ col-12-->
</form>
<div  class=" collapse" id="agree2" >
<div class="container">
<div class="row ">
<!-- col-12 -->
<div class=" col-md-12 col-12 text-primary text-center mt-3">
<h1>الشروط والأحكام</h1>
</div>
<!--/ col-12 -->
<!-- Grid column -->
<div class="ex1 col-md-12  col-12 mb-md-5 my-3 pr-4 text-right w-auto" >
<h3 class="pt-3">مقدمة</h3>
<h5>.نعتز بزيارتكم لموقع الوصول المضمون</h5>
<p>نقدم خدمات موقع الوصول المضمون كمنصة شحن إلكترونية تقوم بدور وسيط الشحن بين العملاء بالمملكة العربية السعودية والمتاجر الالكترونية العالمية، ونقدم هذه الشروط والأحكام لتحكم وتنظم العلاقات النظامية بين موقع الوصول المضمون وكافة مستخدميه والشركاء والعملاء، لذا يرجى قراءة هذه الشروط بالعناية اللازمة قبل استخدام الموقع أو عند طلب الخدمات وذلك لضمان حقوق جميع الأطراف. ويعد استخدامك للموقع موافقة صريحة على هذه الشروط باعتبارها وثيقة قانونية ملزمة لجميع الأطراف</p>
<br/>
<h5>(1) التعريفات</h5>
<ul>
<li>الوصول المضمون" أو "الموقع" أو "نحن" أو "ضمائر المخاطب والملكية" يشير إلى موقع الوصول المضمون ومديريه ومشغليه وكافة الخدمات التابعة لنا المتاحة من خلال الموقع، كما يشير إلى الجهة المالكة للموقع وهي مؤسسة الوصول المضمون للتجارة</li>
<li>المستخدم" أو "أنت" أو "ضمائر المخاطب" يشير إلى الشخص الذي يستخدم موقع الوصول المضمون أو يقوم بزيارته أو طلب الشحن من خلاله، سواء كان منشأة تجارية ممثلة في ممثلها القانوني، أو شخص عادي يجب ألا يقل عمره عن 18 عام</li>
<li>العميل" يشير إلى كل شخص يسجل حساب بموقع الوصول المضمون سواء كان بائعًا أو مشتريًا</li>
<li>الجناح" أو "المستودع" أو "العنوان" يشير إلى المستودع الخاص بموقع الوصول المضمون في المملكة العربية السعودية وأمريكا والصين</li>
<li>الشحنة" أو "الحزمة" أو "الطلبية" أو "المنتج" يشير المنتجات التي يطلب العميل شحنها من خلال موقع الوصول المضمون، فعندما يطلب العميل منتج يصبح طلبيه، وبعد تغليفه يصبح حزمة، وعند شحنه يصبح شحنة</li>
<li>المتجر الإلكتروني" يشير إلى المتجر العالمي الذي يقوم العميل بشراء المنتجات منه</li>
<li>الطلب" يشير إلى طلب الشحن الذي يقدمه العميل عبر موقع الوصول المضمون والذي يتضمن نقل وشحن الطلبية من مكان إلى مكان آخر</li>
<li>الاتفاقية" يشير إلى هذه الشروط والأحكام وسياسة الخصوصية وأي عقد قانوني يتم توقيعه بين الموقع وأي طرف آخر</li>
<li>الأطراف الثالثة" يشير إلى كافة الجهات والأشخاص المتعاقدين مع موقع الوصول المضمون لأغراض تنفيذ الخدمات الخاصة بالموقع، ويشمل ذلك على سبيل المثال لا الحصر مزودي خدمات الدفع الإلكتروني ومزودي خدمات الاستضافة ومزودي خدمات الانترنت وتطبيقات التوصيل وشركات الشحن وغيرها</li>
</ul><br/>
<h5>(2) خدمات الموقع</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>موقع الوصول المضمون هو موقع متخصص في تقديم خدمات الشحن، فيعمل الموقع كوسيط شحن بين العملاء والمتاجر العالمية، فيستفيد من خدماتنا العملاء الذين يرغبون في شراء منتجاتهم من الخارج، ويمكن لنا استلام هذه المنتجات في مستودعاتنا في أمريكا والصين وشحنها إلى المملكة العربية السعودية</li>
<li>يوفر موقع الوصول المضمون ميزة للعملاء بالمملكة العربية السعودية، فعند وصول الشحن إلى مستودعات الموقع في مدينة الرياض يقوم الموقع بتوصيل الطلبية عبر تطبيقات التوصيل داخل الرياض أو عن طريق شركات الشحن لجميع المدن بالمملكة العربية السعودية</li>
<li>.يقدم الموقع وفق الأنظمة المعمول بها في المملكة العربية السعودية، ويطبق الموقع أحكام نظام التجارة الإلكترونية الجديد المعمول به في المملكة ولائحته التنفيذية</li>
</ul><br/>
<h5>(3) تسجيل الحساب</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يستطيع العميل تسجيل حسابه بالموقع الذي يتيح له العديد من المزايا والخدمات المختلفة التي قد تكون غير متوفرة للزائر العادي</li>
<li>لتسجيل الحساب بالموقع يجب على المستخدم تزويدنا بالبيانات الآتية (الاسم، رقم الاتصال، البريد الالكتروني، كلمة المرور، الموافقة على الشروط والأحكام)</li>
<li>يجب على المستخدم تسجيل الحساب بموقع الوصول المضمون برقم جوال وبريد الكتروني تابعين له، حتى يتمكن من استلام أي إشعارات مرسلة له من موقع الوصول المضمون</li>
<li>يحظر على أي مستخدم التسجيل لدينا بأكثر من حساب وسنقوم بحذف جميع الحسابات في حال اكتشافنا ذلك، كما سنقوم بحظر وصول المستخدم للموقع مرة أخرى</li>
<li>يجب على المستخدم الحفاظ على اسم المستخدم وكلمة المرور الخاصة به، وألا يقوم بالإفصاح عنهم للغير، وفي جميع الأحوال يلتزم العميل بكافة التعاملات التي تتم من خلال حسابه بالموقع</li>
<li>ظهر جميع الشحنات الخاصة بالعميل في حسابه بموقع الوصول المضمون، ويعد المحتوى المتاح في حساب العميل عن الشحنات دليل قانوني يعتد به في حال حدوث أي نزاع</li>
<li>تقدم العضوية بالموقع بنظام الترخيص بالاستخدام، وبالتالي يحق لنا سحب هذا الترخيص وإنهاء استخدام العضوية في أي وقت من الأوقات ودون إبداء أي أسباب</li>
</ul><br/>
<h5>(4) سياسة التعاقد المباشر</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>في حال رغبة العميل في شراء أي منتجات معروضة في المتاجر العالمية، فعليه التواصل المباشر مع هذه المتاجر ودفع قيمة المنتجات دون أي تدخل أو وساطة من جانب موقع الوصول المضمون، وبالتالي يكون التعاقد على المنتج مباشر بين العميل والمتجر الالكتروني وتطبق على هذه العلاقة الاتفاقيات أو الشروط الخاصة بهذه المتاجر</li>
<li>عند رغبة العميل في شحن المنتجات يقوم موقع الوصول المضمون باستلامها هذه المنتجات في المستودعات الخاصة به ثم توصيلها إلى عنوان العميل وفق شروط وأحكام هذه الاتفاقية</li>
<li>يخلي العميل مسؤوليتنا القانونية عن عملية التعاقد المباشرة بينه وبين المتجر الالكتروني، ويقر بأن الموقع ليس طرفًا في هذا التعاقد ويقتصر دوره على شحن المنتج فقط</li>
<li>لا يضمن موقع الوصول المضمون أن تكون الشروط والسياسات الخاصة بالمتاجر الالكترونية قانونية أو متوافقة مع الأنظمة المعمول بها سواء في بلد المتجر أو في المملكة العربية السعودية</li>
<li>لا يضمن الموقع دقة أو قانونية البيانات والمعلومات الخاصة بالمنتجات التي يقوم بشرائها من خلال المتاجر، وهي مسؤولية المتجر الإلكتروني</li>
<li>في حال طلب العميل تنفيذ أي شروط تعاقدية كالاسترجاع أو الضمان أو استرداد الأموال فعليه التواصل مع المتجر الإلكتروني مباشرة دون أي تدخل أو وساطة من جانب الموقع</li>
<li>يقر العميل بأن موقع الوصول المضمون لا تربطه أي علاقة مباشرة أو غير مباشرة بالمتجر الإلكتروني الذي قام العميل بالشراء منه ويقتصر دورنا على استلام الطلبية وشحنها للعميل فقط</li>
</ul><br/>
<h5>(5) الرسوم الجمركية</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يجب على العميل دفع الضريبة المقررة في نظام الجمارك، وهي 5% من قيمة الطلبية في حال تجاوزت الطلبية 1000 ريال، سواء عن طريق الدفع مقدمًا أو بعد التكلفة النهائية.</li>
<li>يجب على العميل دفع أي رسوم جمركية مطبقة في الوقت الحالي أو سوف تطبق مستقبلاً.</li>
<li>يعلم العميل ويوافق على أن الرسوم الجمركية قد تتغير من وقت لآخر وفقًا لما تقره الجهات التنفيذية، وبالتالي قد يحدث تغييرات بعد طلب العميل للشحن وقبل وصول الشحنة إلى العميل، ويتحمل العميل كافة الرسوم والمصاريف المطبقة في جميع الأحوال</li>
</ul><br/>
<h5>(6) ضريبة القيمة المضافة</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يجب على العميل دفع ضريبة القيمة المضافة على المنتجات وقدرها 15% من قيمة المنتج أو أي قيمة أخرى يتم تطبيقها بموجب الأنظمة المعمول بها</li>
<li>يقوم موقع الوصول المضمون بتحصيل ضريبة القيمة المضافة ثم يقوم بسدادها للجهات الضريبية المختصة في المملكة</li>
</ul><br/>
<h5>(7) تسجيل الطلبية في حساب العميل</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>عندما تقوم بطلب توصيل شحنة العميل إلى جناحه الخاص في الرياض، فإن الموقع غير مسؤول عنها إلى أن تصل للجناح، وبعدها نقوم بتسجيلها في حساب العميل</li>
<li>إن عدم اعتراض العميل على الطلبية المعروضة في حسابه، يعني أنه موافق عليها ولا يحق له الادعاء بأنها ناقصة أو مكسورة أو مخالفة للوصف في الموقع</li>
<li>يحق للموقع في أي وقت تعديل بيانات الطلبية المسجلة في حساب العميل إذا اكتشفنا وجود أي أخطاء مادية أو فنية في المعلومات التي تم إضافتها</li>
</ul><br/>
<h5>(8) فحص الطلبية</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>لا يحق للموقع فتح الشحنة الخاصة بالعميل أو تجربتها أو تصويرها إلا بطلب منه، ويستثنى من ذلك الفحص السريع للتأكد من خلوها من الممنوعات ولإدخال تفاصيل الشحنة في جناح العميل</li>
<li>عند طلب توصيل أي منتجات ممنوعة إلى جناح العميل الخاص، فإنه مسؤول عن ذلك، ولا يحق له المطالبة بها بأي حال من الأحوال. بل يحق لنا أخذ إجراءات نظامية ضده وإتلاف الشحنة</li>
<li>يحق للموقع حجز طلبية العميل وإتلافها عند توصيل منتجات ممنوعة لجناحه، والتحقق من مدفوعات العميل ومصدر الطلبية والبائع وأخذ إجراء قانوني ضده حسب الحاجة</li>
</ul><br/>
<h5>(9) الشحن المحلي </h5>
<ul style="list-style-type:disc" dir="rtl">
<li>عند وصول الشحنة إلى مستودعات موقع الوصول المضمون بمدينة الرياض، يقوم الموقع بتوصيل الطلبية على العنوان الذي زودنا به العميل داخل مدينة الرياض من خلال تطبيقات التوصيل التي تقدم خدماتها بمدينة الرياض</li>
<li>إذا كان عنوان العميل خارج مدينة الرياض فإن موقع الوصول المضمون يقوم بشحن طلبية العميل من خلال شركات الشحن التي تقوم بشحن المنتجات لكافة مدن المملكة العربية السعودية</li>
<li>يجب على العميل تسديد رسوم رمزية لتوصيل الطلبية داخل الرياض أو للشحن لجميع أنحاء المملكة إذا كان يرغب بشحن الطلبية إلى منطقة أخرى</li>
<li>يحاول موقعنا بشتى الطرق توصيل طلبية العميل إلى باب منزله سواء داخل أو خارج الرياض أو بأي موقع في أنحاء العالم، دون الحاجة للذهاب إلى مكتب الشحن أو المندوب أو ما شابه، لكن قد يتعذر ذلك في بعض المناطق تبعاً لسياسة الناقل</li>
<li>تنتهي مسؤولية الموقع بمجرد إشعار العميل بالتوصيل ومنحه بيانات الموصل، إلا في حال وجود تأمين على الطلبية أو الشحنة فإن الموقع مسؤول عنها حتى تسليمها للعميل</li>
<li>قد يُطلب من العميل بعض الإثباتات الرسمية للتأكد من كونه صاحب الطلبية، مثل طلب إبراز الهوية الشخصية. وفي حال رفض العميل القيام بذلك، يحق للموقع عدم تسليم الشحنة</li>
<li>الموقع غير مسؤول عن تعامل العميل بشكل خاص مع المندوبين، أو اتفاق العميل مع المندوب في تغيير موعد التسليم أو غير ذلك</li>
<li>الموقع غير مسؤول عن تأخر تسليم الشحنة نتيجة للقوة القاهرة، أو أي أخطاء راجعة إلى تطبيقات التوصيل أو شركات الشحن الداخلي</li>
<li>يجب على العميل اتخاذ كافة الإجراءات الاحترازية المتعلقة بالوقاية من فيروس كورونا أو غيره من الأوبئة</li>
<li>الموقع غير مسؤول في حال إدخال العميل بيانات خاطئة متعلقة به كالاسم أو الاسم أو رقم الاتصال أو عنوان الشحن</li>
</ul><br/>
<h5>(10) سياسة الدفع</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>تكون العملات المعتمدة للدفع من خلال موقع الوصول المضمون هي الريال السعودي العملة الرسمية للملكة العربية السعودية وأي عملات أخرى نتيح الدفع بها من خلال الموقع</li>
<li>عادة ما يتم تسديد التكلفة الإجمالية لطلب شراء المنتجات على دفعتين، الدفعة الأولى عربون مقدم لتأكيد جدية العميل في الشراء، ثم تكملة الباقي بالدفعة الثانية</li>
<li>يوفر موقع الوصول المضمون للعملاء خدمات دفع متنوعة، فيمكن للدفع الدفع باستخدام الوسائل الإلكترونية أون لاين ويمكن له اختيار الدفع عند الاستلام. وقد يفرض الموقع رسوم على خدمة الدفع عند الاستلام سيحدد قيمتها بالطلب</li>
<li>في حال اختيار خاصية الدفع عند الاستلام، يجب تسليم المبلغ للمندوب قبل استلام الطلبية</li>
<li>يجب على العميل إدخال بيانات دفع صحيحة ودقيقة وخاصة به، وأن يملك صلاحية استخدام حساب الدفع بشكل إلكتروني وأن يكون مصرح له بتقديم الإعلانات والدفع من خلالنا</li>
<li>لا يقبل الموقع نتيجة أي أخطاء في عملية الدفع الإلكتروني التي تتم عبر وسائل الدفع المعتمدة لدينا، كما لا يتحمل الموقع أي مسؤولية قانونية في حالة استخدام العميل لوسائل دفع غير آمنة أو غير قانونية أو مسروقة أو خاصة بالغير أو قيامه بأي عمليات غسيل أموال من خلال الموقع</li>
<li>عند استخدام العميل بطاقات ائتمان مسروقة أو أي وسائل دفع مشبوهة أو أي محاولة للتحايل على الموقع، يحق لنا اتخاذ إجراءات قانونية وحجز المبلغ والطلبية</li>
<li>يتحمل العميل الرسوم البنكية المتعلقة بتحويل الأموال أو استردادها من خلال الموقع، ويعلم العميل أن هذه الرسوم قد تختلف من بنك لآخر</li>
<li>قد تتوقف إحدى وسائل الدفع من وقت لآخر، وبالتالي يجب على العميل الدفع من خلال الوسائل المتاحة والصالحة للدفع وقت الطلب</li>
<li>يجب على العميل دفع المبلغ النهائي خلال 7 أيام من إصدار فاتورة تكلفة الشحن، وبعد انقضاء المدة يتم احتساب 3 ريال على كل يوم إضافي، ويضاف ذلك على المبلغ النهائي</li>
<li>يوجد رسوم تخزين على الطلبية وذلك حسب نوعية باقة العميل</li>
<li>يحق للموقع حجز طلبية العميل حتى يقوم بدفع جميع المبالغ المطلوبة منه، ولا يحق له المطالبة بالطلبية قبله</li>
<li>بمجرد أن يقوم العميل بتسديد تكلفة شحن الطلبية، تعتبر الشحنة جاهزة للتوصيل سواء تم إشعار العميل بذلك أم لا</li>
<li>يحق للموقع تعديل سياسة الدفع في أي وقت من الأوقات دون أن يتطلب ذلك موافقة أي من مستخدمي الموقع</li>
</ul><br/>
<h5>(11) إشعار الاستلام</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>بمجرد وصول الطلبية للجناح الخاص به في مستودعاتنا يتم إشعار العميل بذلك، وتنتقل مسؤولية الطلبية للعميل</li>
<li>الموقع غير مسؤول حال عدم رد العميل على اتصالات ورسائل الموقع فيما تخص توصيل الشحنة واستلامها، بل يحق للموقع إرجاع الشحنة وحجزها وفرض رسوم تخزين عليها عن كل يوم وذلك عند عدم استلام العميل الشحنة</li>
<li>يجب على العميل إشعار الموقع خلال نصف ساعة من استلام الطلبية، عند اكتشاف أي مشكلة في الشحنة</li>
<li>في حالة عدم قيام العميل بإشعار الموقع خلال الوقت المحدد فهذا يعد دليلاً على عدم وجود أي مشكلات في الطلبية، ولن تقبل أي شكاوى لاحقة على الوقت المحدد</li>
</ul><br/>
<h5>(12) إخلاء المسؤولية عن المنتجات</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يقوم موقع الوصول المضمون بدور الوسيط بين العميل وبين المتاجر الإلكترونية العالمية، ولا يعد الموقع بائع أو تاجر أو منصة بيع مباشر، لذا فإن الموقع غير مسؤول عن مواصفات طلب العميل، سواء كان مستخدمًا أو مقلدًا أو تالفًا أو تجاوز مدة التسليم المتوقعة</li>
<li>لا يتحمل موقع الوصول المضمون أي مسؤولية قانونية في حالة إصابة العميل بأي أضرار ناتجة عن استخدام المنتجات أو تناولها أو استغلالها بأي شكل من الأشكال</li>
<li>لا يتحمل موقع الوصول المضمون أي مسؤولية قانونية في حالة كانت المنتجات التي اشتراها العميل غير قانونية أو تخالف أنظمة أو لوائح الجهات الجمركية، كما لا يتحمل الموقع أي مسؤولية في حالة ضبط هذه المنتجات أو إرجاعها إلى بلدها مرة أخرى</li>
<li>تقدم طلبات الاسترجاع بشكل مباشر إلى المتاجر التي قام العميل بالشراء منها، ولا يتدخل موقع الوصول المضمون في استرجاع المنتجات أو إرجاعها أو استرداد قيمتها أو غير ذلك وتطبق على العميل السياسات الخاصة بالمتجر الذي قام بالشراء منه دون أي ضمانات من جانبنا</li>
<li>إذا كان المنتج مشمول بالضمان فعلى العميل التواصل المباشر مع الشركة المنتجة أو المتجر الذي اشترى منه المنتج، وذلك دون أي تدخل أو وساطة من جانب موقع الوصول المضمون</li>
</ul><br/>
<h5>(13) التأمين</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>عند وجود تأمين على الطلبية فإن الموقع مسؤول عن جميع المعاملات المالية مع المتجر والبائع والناقل ويكون الموقع مسؤول عن توصيلها للعنوان المحدد من جانب العميل</li>
<li>يتم تعويض العميل بكامل المبلغ في حال عدم استلامه للطلبية أو الشحنة المدفوعة خلال شهرين من وقت الطلب</li>
<li>تحدد قيمة التأمين من جانب إدارة الموقع وسوف يقوم الموقع بتوضيح قيمة التأمين إما من خلال طلب الشحن المقدم من العميل من خلال قائمة بقيمة التأمين عبر صفحات الموقع</li>
</ul><br/>
<h5>(14) سياسة الاستخدام</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يجب أن يكون العميل مؤهل نظامًا بالدخول معنا في هذه الاتفاقية، وأن يكون بلغ من العمر 18 عامًا فأكثر وقت استخدام موقعنا إذا كان فرد أو أن يكون لديه سجل تجاري ساري المفعول إذا كان منشاة</li>
<li>تم صياغة هذه الشروط وفق نظام التجارة الإلكترونية السعودي الصادر عام 2019 ميلادية – 1440 هجرية، وبالتالي يلتزم العميل بكافة أحكام هذا النظام</li>
<li>يتم توفير خدمات الشحن من خلال الموقع وفق الأنظمة المعمول بها في المملكة العربية السعودية، وبالتالي فأنت تلتزم بهذه الأنظمة بغض النظر عن الدولة التي تنتمي إليها</li>
<li>يجب إدخال أي معلومات مطلوبة بالموقع بشكل صحيح وتكون مسؤول عنها وعن دقتها وجودتها وحداثتها وقانونيتها، وتلتزم بتحديثها كلما حدث أي تغيير لها</li>
<li>يجب أن يتم استخدام الموقع بشكل قانوني ووفق الأهداف والأغراض المعلن عنها من جانبنا، وأن يتسم هذا الاستخدام بالجدية وأن يبتعد المستخدمين عن استخدام الموقع لأغراض التدليس أو الاحتيال أو التواصل غير المشروع أو التواصل الوهمي أو الإضرار بأي طرف من الأطراف</li>
<li>يجب على المستخدم إخطارنا في حالة اكتشاف أي ممارسات أو أنشطة غير قانونية من خلال الموقع</li>
<li>يجب أن يحافظ المستخدم على سمعة الموقع وألا يسيء للموقع بشكل مباشر أو غير مباشر، وألا يتسبب لنا في أضرار مباشرة أو غير مباشرة، وألا يتسبب لنا في أي مطالبات قانونية</li>
<li>يجب أن تكون التقييمات والتعليقات التي يقدمها العميل من خلال الموقع صادقة وقانونية ولا تتضمن أي تعدي على الموقع أو الشركات أو الجهات الأخرى</li>
<li>يجب أن يكون المحتوى الذي يقدمه المستخدم من خلال الموقع قانوني ولا يتضمن أي اعتداء على الحقوق الخاصة بالآخرين</li>
<li>يحتفظ موقع الوصول المضمون لنفسه بالحق بأن يجري أية تعديلات أو تغييرات على موقعه وعلى السياسات والاتفاقيات المرتبطة بـموقع الوصول المضمون بما في ذلك الشروط والأحكام</li>
<li>يحق للموقع إلغاء حساب العميل في أي وقت، أو إلغاء الموقع، أو تغيير هذه الشروط، أو عدم تسجيل الشحنة، أو مسح جميع البيانات المتوفرة في الموقع دون أدنى مسؤولية على الموقع، وذلك بعد تسليم مستحقات العميل</li>
<li>إن مخالفة العميل للشروط أو محاولته للتحايل على الموقع أو كسب تعويضات بطريقة غير مشروعة يعطى العميل إنذار في المرة الأولى، وحجز المبلغ والطلبية وتعليق الحساب لمدة 60 يوم للمرة الثانية، وعند التكرار يُحظر الحساب بشكل نهائي ويؤخذ بحقه إجراءات نظامية وقضائية</li>
<li>يعتبر العميل موافقا لهذه الشروط عند تسجيله بالموقع او استخدام إحدى خدماته</li>
</ul><br/>
<h5>(15) حدود الاستخدام</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يجب استخدام الموقع في حدود الأغراض المعلنة من خلال هذه الشروط أو تلك الموضحة عبر صفحات الموقع، وأن يتم استخدام خدماتنا بحسن نية وعدم التلاعب على الموقع أو المتعاملين من خلاله بأي صورة من الصور</li>
<li>يجب استخدام الموقع بشكل قانوني ومشروع ويحظر مباشرة أي أعمال من شأنها تعريض الموقع للمساءلة القانونية</li>
<li>يحظر إعادة بيع أي جزء من أجزاء الموقع أو استغلاله بشكل تجاري والتربح من وراء ذلك باستثناء الأنشطة المصرح بها من جانبنا</li>
<li>يحتفظ الموقع بكافة حقوقه النظامية في حالة إخلال أي من مستخدمي الموقع بحقوقنا النظامية والمشروعة أو بحقوقنا المنصوص عليها في هذه الاتفاقية</li>
<li>النصوص والرسومات والصور الفوتوغرافية والشعارات والرسوم التوضيحية والشروحات والبيانات والمواد الأخرى المقدمة منا على أو من خلال خدمات موقع الوصول المضمون بالإضافة إلى اختيارهم وتجميعهم وترتيبهم من المحتمل أن يحتوي على أخطاء أو إغفال أو أخطاء مطبعية أو أن يكون قديماً، ويجوز للموقع أن يغير أو يحذف أو يُحدث أي محتوى في أي وقت بدون إخطار مسبق</li>
<li>يُقدم المحتوى من خلال موقع الوصول المضمون لأغراض المعلومات فقط، ولا يقدم الموقع أي ضمانات بشأن </li>
</ul><br/>
<h5>(16) الأطراف الثالثة</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>قد يساعدنا في تقديم خدماتنا أطراف ثالثة، ويخلي الموقع مسؤوليته القانونية عن أي أخطاء مباشرة أو غير مباشرة، متعمدة أو غير متعمدة، تقع من الأطراف الثالثة التي تقوم بتقديم الخدمات عبر الموقع</li>
<li>قد يطبق على المستخدم شروط وأحكام خاصة بالأطراف الثالثة وهذه لا تخضع لسيطرتنا وبالتالي يجب على المستخدم الإطلاع على هذه السياسات والموافقة عليها قبل الاستفادة من الخدمات التي يقدمها الأطراف الثالثة من خلالنا</li>
</ul><br/>
<h5>(17) حقوق الملكية الفكرية</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>الموقع وجميع عناصره المادية والمعنوية مملوك ملكية خاصة لنا، ولا يجوز تقليده أو نسخه أو إعادة استغلاله بأي شكل من الأشكال. وجميع المحتويات الخاصة بالموقع من (محتوى، قوائم، نصوص، صور، فيديو، رموز، أرقام، حروف، أيقونات، أزرار، موسيقى، بيانات، معلومات) خاضعة للحماية القانونية بموجب القوانين المعمول بها في المملكة العربية السعودية والاتفاقيات الدولية، ويحق لنا اتخاذ الإجراءات القانونية في حالة الاعتداء عليها</li>
<li>"الوصول المضمون" هي علامة تجارية ومستخدمة من جانبنا ولا يجوز التعدي عليها أو تقليدها أو نسخها أو تداولها بشكل غير قانوني أو استخدامها على علامات أو خدمات غير تابعة لنا، وفي حالة الاعتداء على تلك العلامة يحق لنا اتخاذ كافة الإجراءات القانونية التي تحفظ كافة حقوقنا التجارية عليها</li>
</ul><br/>
<h5>(18) إخلاء المسؤولية</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>الموقع قد يتوقف من وقت لآخر وقد يتوقف بشكل دائم سواء لأسباب إرادية أو غير إرادية وبالتالي فأنت تعفينا من أي مسؤولية قانونية في حالة التوقف الدائم أو المؤقت للموقع أو أي من خدماته</li>
<li>قد يحدث بعض التأخير في الوصول للموقع ناتج عن أي عطل فني أو أعمال الصيانة أو سوء شبكة الانترنت، وبالتالي لن يتحمل الموقع أي مسؤولية قانونية ناشئة عن ذلك</li>
<li>الموقع عبارة عن خدمة إلكترونية تعتمد بشكل أساسي على توافر شبكة الانترنت، وأنت تعلم أن شبكة الانترنت ليست بيئة آمنة بشكل تام، فأحيانًا يستهدف القراصنة المواقع الالكترونية وبطاقات الائتمان لذا يجب عليك استخدام برامج حماية لجهازك المستخدم في الوصول للموقع، فموقع الوصول السهل لا يتحمل أي مسؤولية قانونية ناشئة عن اختراق الموقع أو بطاقات الائتمان</li>
<li>يخلي المستخدم مسؤوليتنا عن كافة الأنشطة غير المشروعة غير التابعة لنا التي قد تحدث عبر الموقع، فالموقع لا يستطيع السيطرة على كافة الأفعال التي تتم من خلاله ويجب على المتضرر إبلاغنا لاتخاذ اللازم نحو وقف مصدر الضرر</li>
<li>الموقع لا يقدم أي نوع من أنواع التأمين أو التعويضات لأي من مستخدميه أو الشركاء أو العملاء، وكل شخص يستخدم الموقع وخدماته على مسؤوليته الشخصية، ولن يكون الموقع مسؤول في مواجهة أي من المستخدمين لأي سبب ناتج عن استخدام الموقع أو خدماته أو تطبيق شروطنا وسياساتنا</li>
</ul><br/>
<h5>(19) المسؤولية القانونية</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يكون المستخدم مسؤول مسؤولية شخصية في حالة عدم التزامه بالالتزامات المفروضة عليه بموجب هذه الشروط أو السياسات المطبقة</li>
<li>يكون المستخدم مسؤول مسؤولية شخصية عن كافة الأفعال والأنشطة التي يقوم بها من خلال الموقع، ولن يكون الموقع مسؤول بالتضامن أو بالتبعية عن أي من المستخدمين</li>
<li>يكون المستخدم مسؤول مسؤولية شخصية في حالة إخلاله بالقوانين المعمول بها في المملكة العربية السعودية، ولن يكون الموقع مسؤول بالتضامن أو بالتبعية عن أي من المستخدمين</li>
<li>يتحمل المستخدم المسؤولية القانونية في حالة إخلاله بأي حق من حقوقنا بموجب هذه الشروط والأحكام أو الاعتداء على أي حق من حقوقنا أو ملكيتنا للموقع أو أي من عناصره</li>
<li>لا تخل أحكام المسؤولية الواردة في هذه السياسة بأي أحكام مسؤولية أخرى منصوص عليها في اتفاقيات أو عقود أخرى أو منصوص عليها في الأنظمة المعمول بها</li>
</ul><br/>
<h5>(20) سياسة الشكاوى</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>إن قيام العميل برفع شكوى في الموقع، لا يعني دائماً أنه على حق، بل يجوز للموقع اعتبار تلك الشكوى، أو رفضها</li>
<li>يحق للموقع اتخاذ أي إجراء يراه مناسبًا للفصل في الشكوى المقدمة من العميل، ونسعى جاهدين إلى تقديم أكبر خدمة دعم لعملاء موقع الوصول المضمون</li>
<li>في حال حدوث مشكلة للطبية من تلف أو كسر أو سرقة من قبل البائع أو شركة الشحن، فإننا نحاول حتى 3 محاولات لحل المشكلة، ولا يتم تقديم أي تعويض مننا للعميل مطلقاً إلا حال وجود تأمين على الطلبية أو الشحنة</li>
</ul><br/>
<h5>(21) الاتصالات والإشعارات</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يقوم الموقع بالتواصل معك من وقت لآخر من خلال بيانات الاتصال التي قدمتها لنا، وبموجب هذه الاتفاقية فأنت تفوضنا في التواصل معك إلكترونيًا أو هاتفيًا، وفي حالة عدم رغبتك في تلقي الاتصالات منا يجب عليك إخطارًا وسنتوقف فورًا عن التواصل معك، ولكن هذا يعني أن خدماتنا قد تتوقف بالنسبة لك بشكل دائم</li>
<li>أي إشعارات يريد الموقع إبلاغها للمستخدمين تتم من خلال بيانات الاتصال الخاصة بهم، ويفترض علم المستخدم بالإشعار بمجرد قيام الموقع بإرساله له. وفي حالة رغبة المستخدم في إرسال الإشعارات لنا يجب أن يتم ذلك من خلال وسائل الاتصال الخاصة بنا المتاحة عبر صفحات الموقع</li>
</ul><br/>
<h5>(22) التعديلات والإضافات</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>أنت تعلم وتوافق على أن خدماتنا قد يتم تعديلها أو تحديثها بشكل مستمر، كما أن شروطنا وأحكامنا وسياسة الخصوصية قد يتم تعديلها أو تحديثها أو الإضافة عليها من وقت لآخر، ولن يكون الموقع ملزم بإخطار أي من مستخدميه، لذلك يجب عليك مراجعة هذه الاتفاقية بشكل دوري وقبل أي عملية تقوم بها من خلال الموقع، وسوف نقوم بتحديث تاريخ أخر إصدار أعلى هذه الوثيقة، وبناءً على ذلك أنت تقر بحق موقع الوصول المضمون  في أي وقت وبدون إخطار مسبق وبناء على تقديره وحده دون غيره مراجعة هذه الشروط والأحكام أو فرض شروط وأحكام جديدة متعقلة بخدمات موقع الوصول المضمون أو الحصول عليها وتتحمل أنت مسؤولية مراجعة هذه الشروط والأحكام بشكل دوري لمراجعة أي تعديل على تلك الشروط والأحكام، ويشكل أي استخدام أو حصول لك على منتجات أو خدمات موقع الوصول المضمون موافقتكم على تلك المراجعات أو الإضافات</li>
</ul><br/>
<h5>(23) الإلغاء</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يحق للموقع إلغاء أي من الخدمات المتاحة من خلاله أو تعديل الموقع بشكل كامل أو تغييره أو تغيير نشاطه. كما يحق لنا إلغاء الشروط والأحكام وسياسة الخصوصية أو استبدالهم في أي وقت دون أن يتطلب ذلك الحصول على موافقتك</li>
</ul><br/>
<h5>(24) القانون</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يخضع تفسير وتنفيذ بنود هذه الوثيقة للأنظمة المعمول بها في المملكة العربية السعودية، ولا تقتصر هذه الشروط على البنود الواردة فيها وإنما تمتد لتشمل كافة النصوص القانونية المنظمة للعلاقات المدنية والتجارية المعمول بها في المملكة العربية السعودية طالما كانت قواعد مكملة ولا تتعارض بشكل مباشر أو غير مباشر مع البنود الواردة في هذه الوثيقة</li>
</ul><br/>
<h5>(25) الاختصاص القضائي</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يختص القضاء السعودي بالفصل في أي نزاع ينشأ بشأن تفسير أو تنفيذ أي بند من بنود هذه الوثيقة، وفي حالة استبعاد أي بند بموجب حكم قضائي فإن ذلك لا يخل بصلاحية البنود الأخرى وتظل سارية ومنتجة لآثارها القانونية ما لم يقم الموقع بإلغاء الاتفاقية</li>
</ul><br/>
<h5>(26) اللغة العربية</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>تم صياغة هذه الوثيقة باللغة العربية، وفي حالة ترجمتها لأي لغة أخرى فإن النص العربي هو المعمول به أمام كافة الجهات الرسمية وغير الرسمية إذا تعارضت الترجمة الأجنبية معه</li>
</ul><br/>
<h5>(27) الاتصال بنا</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>يمكنك التواصل معنا عبر البريد الإلكتروني .....................  أو عبر الاتصال بنا على الرقم .................</li>
</ul><br/>
<h5>(28) فسخ الاتفاقية</h5>
<ul style="list-style-type:disc" dir="rtl">
<li>تعد هذه الاتفاقية مفسوخة من تلقاء نفسها في حالة إخلالك بأي شرط أو بند أو فقرة من فقرات هذه الاتفاقية، وفي هذه الحالة يحتفظ موقع الوصول المضمون بكافة حقوقه القانونية تجاهك بما في ذلك مسؤوليتك المدنية والجزائية والتعويضات</li>
</ul>
</div>
<div class="col-md-6 col-12 text-center my-2 ">
<a class="btn btn-primary px-5 other_link"  data-toggle="collapse" href="#"  role="button"  aria-controls="collapseExample">  موافق</a>
</div>
</div>
</div>
</div>
</div>
</div>
<!--/ ROW -->
</div>
<!--/ Container -->
</div>
<!--/ collapse -->
</section>
<!--/ section-3 -->
@endsection
@push('script')
<script src="{{ URL::asset('public/themeAssets/js/intlTelInput.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<script type="text/javascript">
   $('.other_link').click(function(){
      $('#other_nav_link' ).hide();
   });


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

   /*if (textbox.value === '') {
   textbox.setCustomValidity
   ('this input is required').style.backgroundColor = "red";
   }else {
   textbox.setCustomValidity('');
   }

   return true;*/
   }
</script>
<!-- arafat code for multi step form -->
<script>
   var currentTab = 0; // Current tab is set to be the first tab (0)
   showTab(currentTab); // Display the current tab

   function showTab(n) {
     // This function will display the specified tab of the form...
     var x = document.getElementsByClassName("tab");
     x[n].style.display = "block";
     //... and fix the Previous/Next buttons:
     if (n == 0) {
       document.getElementById("prevBtn").style.display = "none";
     } else {
       document.getElementById("prevBtn").style.display = "inline";
     }
     if (n == (x.length - 1)) {
       document.getElementById("nextBtn").innerHTML = "Submit";
     } else {
       document.getElementById("nextBtn").innerHTML = "Next";
     }
     //... and run a function that will display the correct step indicator:
     fixStepIndicator(n)
   }

   function nextPrev(n) {
     // This function will figure out which tab to display
     var x = document.getElementsByClassName("tab");
     // Exit the function if any field in the current tab is invalid:
     if (n == 1 && !validateForm()) return false;
     // Hide the current tab:
     x[currentTab].style.display = "none";
     // Increase or decrease the current tab by 1:
     currentTab = currentTab + n;
     // if you have reached the end of the form...
     if (currentTab >= x.length) {
       // ... the form gets submitted:
       document.getElementById("regForm").submit();
       return false;
     }
     // Otherwise, display the correct tab:
     showTab(currentTab);
   }

   function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");

    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // alert(y[i].className);
        // console.log(y[i].className);
        // and set the current valid status to false
        valid = false;
      }
    }
    // end checking email validation by arafat

     // If the valid status is true, mark the step as finished and valid:
     if (valid) {
       document.getElementsByClassName("step")[currentTab].className += " finish";
     }
     return valid; // return the valid status
   }


   function fixStepIndicator(n) {
     // This function removes the "active" class of all steps...
     var i, x = document.getElementsByClassName("step");
     for (i = 0; i < x.length; i++) {
       x[i].className = x[i].className.replace(" active", "");
     }
     //... and adds the "active" class on the current step:
     x[n].className += " active";
   }
</script>
<!-- end arafat code for multi step form -->

<script>
   // added by arafat | arafat.dml@gmail.com
   $(document).ready(function(){

     // register_guaranteed_access
     $(document).on("click", "#register_guaranteed_access", function(){
         $(".social_login").toggle();
     });

     // arafat checking user duplicate email on register
     $("#email").keyup(function() {
        var email = ($("#email").val()).trim();
        $.ajax({
            url: "{{route('isRegistrationMailAlreadyExist')}}",
            method: "POST",
            data: { "_token" : "{{ csrf_token() }}", email:email },
            success: function(res){
               // This email is already in use
               if(res == 1){
                $("#emailError").html("<strong>"+email+"</strong>هذا البريد الإلكتروني هو بالفعل استخدام استخدام واحد مختلف");
                $("#emailError").show();
                //remove the email
                $("#email").val("");
               }else{
                $("#emailError").hide();
               }
            }
        });
     });
     // end arafat checking user duplicate email on register

    // arafat password Validation strat
    $(document).on("blur", "#password", function(){
        // Password should 8 character, 1 upper, 1 lower 1 number
        if(this.value.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/)){
          $(".passwordError").hide();
        }else{
          $(".passwordError").show();

        }
    });
    // arafat password validation end

     // subscribe validation start here
     $(document).on("blur", "#conPass", function(){
        var pass = $("#password").val();
        var conPass = $("#conPass").val();
        if(pass != conPass){
            $("#conPass").val("");
            $("#conPassError").show();
        }else{
            $("#conPassError").hide();
        }
     });
     // subscribe validatioin end here

     // term and condition check validation
     $(document).on("change", "#agree_on_term_condition", function(){
        if($('#agree_on_term_condition').is(":checked")){
            $(this).val('agree');
            $("#termConditionError").hide();
        }else{
            $(this).val('');
            $("#termConditionError").show();
        }
     });
     // end term and condition validation


     // arafat show the term and condition error here

     $(document).on("click", "#nextBtn", function(){
        var btnValue = $(this).html();
        if(btnValue.trim() == "Submit"){
            if($('#agree_on_term_condition').is(":checked")){
                $("#termConditionError").hide();
                // show the loader
                $(".se-pre-con").show();
            }else{
                $("#termConditionError").show();
            }
        }

     });

     // end arafat showing term and condition error here

     $(document).on("blur", "#email", function (){
        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
        var email = ($("#email").val()).trim();
        if(!validateEmail(email)){
            $(this).addClass("invalid");
            $("#nextBtn").attr("disabled", true);
            $("#emailError").html("عنوان بريد إلكتروني غير صالح");
            $("#emailError").show();
        }else{
            $("#nextBtn").attr("disabled", false);
            $("#emailError").hide();
        }
     });
     // end email validation by arafat

     // add by arafat for billing shipping
     $(document).on("change", "#bill_same_as_shipping", function(){
         var ship_country = $('#ship_country').val();
         var ship_add_1 = $('#ship_add_1').val();
         var ship_add_2 = $('#ship_add_2').val();
         var ship_region = $('#ship_region').val();
         var ship_city = $('#ship_city').val();
         var ship_phone = $('#ship_phone').val();
         var ship_postal_code = $('#ship_postal_code').val();
         var ship_another_number = $('#ship_another_number').val();

         if($('#bill_same_as_shipping').is(":checked")){
           $('#bill_country').val(ship_country);
           $('#bill_add_1').val(ship_add_1);
           $('#bill_add_2').val(ship_add_2);
           $('#bill_region').val(ship_region);
           $('#bill_city').val(ship_city);
           $('#bill_phone').val(ship_phone);
           $('#bill_postal_code').val(ship_postal_code);
           $('#bill_another_number').val(ship_another_number);
           $('#bill_another_number').val(ship_another_number);
         }else{
             $('#bill_country').val('');
             $('#bill_add_1').val('');
             $('#bill_add_2').val('');
             $('#bill_region').val('');
             $('#bill_city').val('');
             $('#bill_phone').val('');
             $('#bill_postal_code').val('');
             $('#bill_another_number').val('');
             $('#bill_another_number').val('');
         }
     });
     // end add by arafat for billing shipping

   });
   // end added by arafat
   var input = document.querySelector("#ship_phone");
   window.intlTelInput(input, {
     utilsScript: "{{ URL::asset('public/themeAssets/js/utils.js') }}",
   });


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
             // alert(vis);
             document.getElementById(box).style.display = vis;
         }

</script>
@endpush