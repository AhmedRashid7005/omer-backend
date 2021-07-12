@extends('template.ar_template')
@section('title', 'Social Billing Shipping')
@section('content')

@push("css")
<link rel="stylesheet" href="{{ URL::asset('public/themeAssets/build/css/intlTelInput.css') }}">
    <style>
        input.invalid {
        background-color: #ffdddd;
        }
        .error{
            background-color: #ffdddd;
        }
        .footer{
            margin-top: 250px!important;
        }
    </style>
@endpush


<div class="col-md-12" style="margin-top: 150px;">
    <div class="alert alert-info text-center" role="alert">
        {{ "Please Enter the Billing Address and Shipping Address In order to Complete you Profile Page" }}
    </div>

    @include("template.flash")
    <form action="{{route('oAuthBillingShippingProcess')}}" method="post">
        @csrf
    <div class="col-md-6" style="margin-left: 20%;">

            <!-- arafat Billing Shipping start -->

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
                     <button  class="input-group-text  "dir="rtl" type="button">رمز اتصال الدوله</button>
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
            <div class="col-md-6" style="margin-left: 20%;">
                <!-- for arafat checkbox -->
                <div class="col-md-12 col-12" style="margin-top: 50px;">
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

               <div class=" col-md-12 col-12 font-weight-bold text-secndry text-right my-3">
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
                          <button  class="input-group-text  "dir="rtl" type="button">رمز اتصال الدوله</button>
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
                   <div id="termConditionError" style='color:red; display:none'>You have to Agree On our Term And Condition</div>
                </div>
                <!-- end for arafat checkbox -->
               </div>
            </div>

            <!-- arafat billing shipping end here -->

            <div class="form-group">
                <input type="submit" name="Save" value="Save" class="form-control btn btn-primary save_billing_shipping" style="margin-left:20%; margin-top: 20px;">
            </div>
            <!-- form end by arafat -->
        </form>
    </div>

</div>

@endsection

@push("script")
<script src="{{ URL::asset('public/themeAssets/js/intlTelInput.js') }}"></script>
<script>
    $(document).ready(function(){

        // arafat show the term and condition error here

        $(document).on("click", ".save_billing_shipping", function(){

           if($('#agree_on_term_condition').is(":checked")){
               $("#termConditionError").hide();
           }else{
               $("#termConditionError").show();
           }
           return true;
        });

        // end arafat showing term and condition error here


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
              } else{
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

        // end added by arafat
        var input = document.querySelector("#ship_phone");
        window.intlTelInput(input, {
          utilsScript: "{{ URL::asset('public/themeAssets/js/utils.js') }}",
        });

        // end added by arafat
        var input = document.querySelector("#bill_phone");
        window.intlTelInput(input, {
          utilsScript: "{{ URL::asset('public/themeAssets/js/utils.js') }}",
        });
    });
</script>

@endpush