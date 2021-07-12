@extends('template.ar_template')
@section('title', 'Calculator')
@section('content')

@push("css")
    <style>
        .footer{
            margin-top: 160px !important;
        }
    </style>
@endpush


<!--/ section-1 -->
<section class="section-1 other_nav_link" style="position: relative; top: 160px;">
    <!-- container -->
    <div class="container ">
        
        <div class="row ">
                                
          <!--select-->
          
            
                <div class="col-md-3 col-12  text-center "></div>

                <div class=" col-md-6 col-12 text-center  ">
                    <h1 class="text-primary text-center my-4" dir="rtl">   الحاسبة  </h1>
                    <div class=" input-group mb-3 " dir="rtl">
                            <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">اختر نوع الحاسبة</label>
                            </div>
                        <select class="custom-select" id="test1" onchange="showDiv(this)" name="ship_level">
                            <option value="0">--أختار--</option>
                            <option value="shipcost">تكلفة الشحن</option>
                            <option value="insurance"> مبلغ التأمين </option>
                            <option value="commission"> عمولة الطلبات </option>
                            <option value="rate"> سعر الصرف  </option>
                            <option value="tax&vat"> الضريبة و القيمة المضافة </option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3 col-12  text-center "></div>
                
                
                <div id="ship_cost" class="col-md-12 col-12  text-center" style=" display:none;">
                      
                    <div class="row">

                        <div class=" input-group mb-3 " dir="rtl">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> تكلفة الشحن</label>
                            </div>
                                <select class="custom-select" id="test2" onchange="showDiv2(this)" name="ship_level">
                                <option value="0">--أختار--</option>
                                <option value="usatoksa">تكلفة الشحن من أمريكا للسعودية</option>
                                <option value="chinatoksa"> تكلفة الشحن من الصين للسعودية </option>
                                <option value="worldtoksa"> تكلفة الشحن من العالم للسعودية </option>
                                <option value="ksatoworld"> تكلفة الشحن من السعودية للعالم  </option>
                                <option value="localcost"> تكلفة التوصيل الداخلي  (السعودية)  </option>
                            </select>
                        </div>
                          
                    </div>    
                    
                </div>
                

                <div id="insurance_amount" class="data col-lg-12 col-sm-12 col-12" style=" display:none;">
                     
                        <div class=" input-group mb-3 " dir="rtl">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01"> مبلغ التأمين</label>
                            </div>
                                <select class="custom-select" id="test3" onchange="showDiv2(this)" name="ship_level">
                                <option value="0">--أختار--</option>
                                <option value="shipinsurance">مبلغ التأمين على الشحنة</option>
                                <option value="orderinsurance"> مبلغ التأمين على الطلبية </option>
                            </select>
                        </div>
                  
                </div>   

               
                <div id="order_commission" class="data col-md-12 col-12 col-12" style=" display:none;">

                    
                    <div class=" input-group mb-3 " dir="rtl">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01"> عمولة الطلبات</label>
                        </div>
                            <select class="custom-select" id="test4" onchange="showDiv4(this)" name="ship_level">
                            <option value="0">--أختار--</option>
                            <option value="ordcomm1">المتسوق الشخصي</option>
                            <option value="ordcomm2"> حلول الاستيراد </option>
                            <option value="ordcomm3"> قطع غيار السيارات </option>
                        </select>
                    </div>
                    
                    
                </div> 
                
               
                <div id="exchange_rate" class="data col-md-12 col-12 col-12" style=" display:none;">

                    <div class=" input-group mb-3 " dir="rtl">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">   التحويل من *</label>
                        </div>
                            <select class="custom-select"  onchange="showDiv4(this)" name="ship_level">
                            <option value="0">--أختار--</option>
                            <option value="ordcomm2">SAR   الريال السعودي</option>
                            <option value="ordcomm1">$ الدولار الأمريكي </option>
                            <option value="ordcomm2">€   اليورو،</option>
                            <option value="ordcomm3">£  الدولار الاسترليني  </option>
                            <option value="ordcomm1">¥  اليون الصيني </option>
                            <option value="ordcomm3">৳   التاكا البنجالي  </option>
                        </select>
                    </div>
                    
                    
                    <div class=" input-group mb-3 " dir="rtl">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">   التحويل الى *</label>
                        </div>
                            <select class="custom-select"  onchange="showDiv4(this)" name="ship_level">
                                <option value="0">--أختار--</option>
                                <option value="ordcomm2">SAR   الريال السعودي</option>
                                <option value="ordcomm1">$ الدولار الأمريكي </option>
                                <option value="ordcomm2">€   اليورو،</option>
                                <option value="ordcomm3">£  الدولار الاسترليني  </option>
                                <option value="ordcomm1">¥  اليون الصيني </option>
                                <option value="ordcomm3">৳   التاكا البنجالي  </option>
                        </select>
                    </div>
                    
                    
                    <div class="input-group mb-3" dir="rtl">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">أدخل مبلغ *</span>
                        </div>
                        <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                        required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>


                    <div class="text-center" dir="rtl">

                        <h5> تنبيه: سعر الصرف غير دقيق، البنوك تضيف حتى 2.5% عند الشراء من الإنترنت، راجع البنك لمعرفة ذلك بدقة. </h5>

                        <h6><a href=" https://www.xe.com/ar/currencyconverter/" target="-blank">لتحويل العملات الأخرى </a></h6>

                    </div>
        
                    
                </div> 
                 
                
                <div id="tax_vate" class="data col-md-12 col-12 col-12" style=" display:none;">
                
                    
                    <div class="input-group mb-3" dir="rtl">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">أدخل مبلغ *</span>
                        </div>
                        <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                        required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>


                    <div class="text-center" dir="rtl">

                        

                        <h6><a href=" https://www.customs.gov.sa/ar/general/e-stores-customers/" target="-blank">للمزيد مراجعة الجمارك السعودية</a></h6>

                        <h6><a href=" https://www.customs.gov.sa/ar/faq/" target="-blank">الأسئلة الخاصة بالجمارك السعودية </a></h6>

                    </div>         
                    
                </div> 
       
                    
        </div>

        <div class="row ">

            

            <div class=" col-12 text-right " id="usa_ksa" style=" display:none;">

                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">أدخل الحجم بالكيلو *</span>
                    </div>
                    <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                    required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                    
                <div class="input-group mb-3" dir="rtl">
                    
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert1"> إدخال</button>
                    
                    <div id="insert1" class="collapse">

                        <div class="input-group mr-md-5" dir="rtl" >
                            <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    
                </div>
                        
            </div>
        

        
            <div class="col-md-12 col-12" id="china_ksa" style=" display:none;">

                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">أدخل الحجم بالكيلو *</span>
                    </div>
                    <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                    required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3" dir="rtl">
                    
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert2"> إدخال</button>
                    
                    <div id="insert2" class="collapse">

                        <div class="input-group mr-md-5" dir="rtl" >
                            <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    
                </div>

            </div>
          
        
            <div class="col-md-12 col-12" id="world_ksa" style=" display:none;">

                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">أدخل الحجم بالكيلو *</span>
                    </div>
                    <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                    required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3" dir="rtl">
                    
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert3"> إدخال</button>
                    
                    <div id="insert3" class="collapse">

                        <div class="input-group mr-md-5" dir="rtl" >
                            <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    
                </div>

            </div>
        


            <div class=" col-12 text-right " id="ksa_world" style=" display:none;">

                <div class=" input-group mb-3 " dir="rtl">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01"> الشحن إلى </label>
                    </div>
                        <select class="custom-select">
                        <option value="0">--أختار--</option>
                        <option value="AX">جزر أولان  (Åland‬‏)</option>
                        <option value="AL">ألبانيا  (Shqipëria‬‏)</option>
                        <option value="DZ">الجزائر</option>
                        <option value="AS">ساموا الأمريكية  (American Samoa‬‏)</option>
                        <option value="AD">أندورا  (Andorra‬‏)</option>
                        <option value="AO">أنغولا  (Angola‬‏)</option>
                        <option value="AI">أنغويلا  (Anguilla‬‏)</option>
                        <option value="AQ">أنتاركتيكا  (Antarctica‬‏)</option>
                        <option value="AG">أنتيغوا وبربودا  (Antigua and Barbuda‬‏)</option>
                        <option value="AR">الأرجنتين  (Argentina‬‏)</option>
                        <option value="AM">أرمينيا  (Հայաստան‬‏)</option>
                        <option value="AW">آروبا  (Aruba‬‏)</option>
                        <option value="AU">أستراليا  (Australia‬‏)</option>
                        <option value="AT">النمسا  (Österreich‬‏)</option>
                        <option value="AZ">أذربيجان  (Azərbaycan‬‏)</option>
                        <option value="BS">الباهاما  (Bahamas‬‏)</option>
                        <option value="BH">البحرين</option>
                        <option value="BD">بنجلاديش  (বাংলাদেশ‬‏)</option>
                        <option value="BB">بربادوس  (Barbados‬‏)</option>
                        <option value="BY">روسيا البيضاء  (Беларусь‬‏)</option>
                        <option value="BE">بلجيكا  (België‬‏)</option>
                        <option value="BZ">بليز  (Belize‬‏)</option>
                        <option value="BJ">بنين  (Bénin‬‏)</option>
                        <option value="BM">برمودا  (Bermuda‬‏)</option>
                        <option value="BT">بوتان  (འབྲུག‬‏)</option>
                        <option value="BO">بوليفيا  (Bolivia‬‏)</option>
                        <option value="BQ">هولندا الكاريبية  (Caribbean Netherlands‬‏)</option>
                        <option value="BA">البوسنة والهرسك  (Босна и Херцеговина‬‏)</option>
                        <option value="BW">بتسوانا  (Botswana‬‏)</option>
                        <option value="BV">جزيرة بوفيه  (Bouvet Island‬‏)</option>
                        <option value="BR">البرازيل  (Brasil‬‏)</option>
                        <option value="IO">الإقليم البريطاني في المحيط الهندي  (British Indian Ocean Territory‬‏)</option>
                        <option value="BN">بروناي  (Brunei‬‏)</option>
                        <option value="BG">بلغاريا  (България‬‏)</option>
                        <option value="BF">بوركينا فاسو  (Burkina Faso‬‏)</option>
                        <option value="BI">بوروندي  (Uburundi‬‏)</option>
                        <option value="KH">كمبوديا  (កម្ពុជា‬‏)</option>
                        <option value="CM">الكاميرون  (Cameroun‬‏)</option>
                        <option value="CA">كندا  (Canada‬‏)</option>
                        <option value="CV">الرأس الأخضر  (Kabu Verdi‬‏)</option>
                        <option value="KY">جزر الكايمن  (Cayman Islands‬‏)</option>
                        <option value="CF">جمهورية أفريقيا الوسطى  (République centrafricaine‬‏)</option>
                        <option value="TD">تشاد  (Tchad‬‏)</option>
                        <option value="CL">شيلي  (Chile‬‏)</option>
                        <option value="CN">الصين  (中国‬‏)</option>
                        <option value="CX">جزيرة الكريسماس  (Christmas Island‬‏)</option>
                        <option value="CC">جزر كوكوس  (Cocos [Keeling] Islands‬‏)</option>
                        <option value="CO">كولومبيا  (Colombia‬‏)</option>
                        <option value="KM">جزر القمر (جزر القمر)</option>
                        <option value="CG">الكونغو - برازافيل  (Congo-Brazzaville‬‏)</option>
                        <option value="CD">الكونغو - كينشاسا  (Jamhuri ya Kidemokrasia ya Kongo‬‏)</option>
                        <option value="CK">جزر كوك  (Cook Islands‬‏)</option>
                        <option value="CR">كوستاريكا  (Costa Rica‬‏)</option>
                        <option value="CI">ساحل العاج  (Côte d’Ivoire‬‏)</option>
                        <option value="HR">كرواتيا  (Hrvatska‬‏)</option>
                        <option value="CU">كوبا  (Cuba‬‏)</option>
                        <option value="CW">كوراساو  (Curaçao‬‏)</option>
                        <option value="CY">قبرص  (Κύπρος‬‏)</option>
                        <option value="CZ">جمهورية التشيك  (Česká republika‬‏)</option>
                        <option value="DK">الدانمرك  (Danmark‬‏)</option>
                        <option value="DJ">جيبوتي  (Djibouti‬‏)</option>
                        <option value="DM">دومينيكا  (Dominica‬‏)</option>
                        <option value="DO">جمهورية الدومينيك  (República Dominicana‬‏)</option>
                        <option value="EC">الإكوادور  (Ecuador‬‏)</option>
                        <option value="EG">مصر (مصر)</option>
                        <option value="SV">السلفادور  (El Salvador‬‏)</option>
                        <option value="GQ">غينيا الإستوائية  (Guinea Ecuatorial‬‏)</option>
                        <option value="ER">أريتريا  (Eritrea‬‏)</option>
                        <option value="EE">أستونيا  (Eesti‬‏)</option>
                        <option value="ET">إثيوبيا  (Ethiopia‬‏)</option>
                        <option value="FK">جزر فوكلاند  (Falkland Islands [Islas Malvinas]‬‏)</option>
                        <option value="FO">جزر فارو  (Føroyar‬‏)</option>
                        <option value="FJ">فيجي  (Fiji‬‏)</option>
                        <option value="FI">فنلندا  (Suomi‬‏)</option>
                        <option value="FR">فرنسا  (France‬‏)</option>
                        <option value="GF">غويانا الفرنسية  (Guyane française‬‏)</option>
                        <option value="PF">بولينيزيا الفرنسية  (Polynésie française‬‏)</option>
                        <option value="TF">المقاطعات الجنوبية الفرنسية  (Terres australes françaises‬‏)</option>
                        <option value="GA">الجابون  (Gabon‬‏)</option>
                        <option value="GM">غامبيا  (Gambia‬‏)</option>
                        <option value="GE">جورجيا  (საქართველო‬‏)</option>
                        <option value="DE">ألمانيا  (Deutschland‬‏)</option>
                        <option value="GH">غانا  (Gaana‬‏)</option>
                        <option value="GI">جبل طارق  (Gibraltar‬‏)</option>
                        <option value="GR">اليونان  (Ελλάδα‬‏)</option>
                        <option value="GL">غرينلاند  (Kalaallit Nunaat‬‏)</option>
                        <option value="GD">غرينادا  (Grenada‬‏)</option>
                        <option value="GP">جوادلوب  (Guadeloupe‬‏)</option>
                        <option value="GU">غوام  (Guam‬‏)</option>
                        <option value="GT">غواتيمالا  (Guatemala‬‏)</option>
                        <option value="GG">غيرنزي  (Guernsey‬‏)</option>
                        <option value="GN">غينيا  (Guinée‬‏)</option>
                        <option value="GW">غينيا بيساو  (Guiné Bissau‬‏)</option>
                        <option value="GY">غيانا  (Guyana‬‏)</option>
                        <option value="HT">هايتي  (Haiti‬‏)</option>
                        <option value="HM">جزيرة هيرد وجزر ماكدونالد  (Heard Island and McDonald Islands‬‏)</option>
                        <option value="VA">الفاتيكان  (Città del Vaticano‬‏)</option>
                        <option value="HN">هندوراس  (Honduras‬‏)</option>
                        <option value="HK">هونغ كونغ  (香港‬‏)</option>
                        <option value="HU">هنغاريا  (Magyarország‬‏)</option>
                        <option value="IS">أيسلندا  (Ísland‬‏)</option>
                        <option value="IN">الهند  (भारत‬‏)</option>
                        <option value="ID">أندونيسيا  (Indonesia‬‏)</option>
                        <option value="IR">ایران</option>
                        <option value="IQ">العراق</option>
                        <option value="IE">أيرلندا  (Ireland‬‏)</option>
                        <option value="IM">جزيرة مان  (Isle of Man‬‏)</option>
                        <option value="IL">إسرائيل (ישראל)</option>
                        <option value="IT">إيطاليا  (Italia‬‏)</option>
                        <option value="JM">جامايكا  (Jamaica‬‏)</option>
                        <option value="JP">اليابان  (日本‬‏)</option>
                        <option value="JE">جيرسي  (Jersey‬‏)</option>
                        <option value="JO">الأردن (الأردن)</option>
                        <option value="KZ">كازاخستان  (Казахстан‬‏)</option>
                        <option value="KE">كينيا  (Kenya‬‏)</option>
                        <option value="KI">كيريباتي  (Kiribati‬‏)</option>
                        <option value="KP">كوريا الشمالية  (조선 민주주의 인민 공화국‬‏)</option>
                        <option value="KR">كوريا الجنوبية  (대한민국‬‏)</option>
                        <option value="KW">الكويت</option>
                        <option value="KG">قرغيزستان  (Kyrgyzstan‬‏)</option>
                        <option value="LA">لاوس  (ສ.ປ.ປ ລາວ‬‏)</option>
                        <option value="LV">لاتفيا  (Latvija‬‏)</option>
                        <option value="LB">لبنان</option>
                        <option value="LS">ليسوتو  (Lesotho‬‏)</option>
                        <option value="LR">ليبيريا  (Liberia‬‏)</option>
                        <option value="LY">ليبيا</option>
                        <option value="LI">ليختنشتاين  (Liechtenstein‬‏)</option>
                        <option value="LT">ليتوانيا  (Lietuva‬‏)</option>
                        <option value="LU">لوكسمبورغ  (Luxembourg‬‏)</option>
                        <option value="MO">مكاو  (澳門‬‏)</option>
                        <option value="MK">مقدونيا  (Македонија‬‏)</option>
                        <option value="MG">مدغشقر  (Madagasikara‬‏)</option>
                        <option value="MW">ملاوي  (Malawi‬‏)</option>
                        <option value="MY">ماليزيا  (Malaysia‬‏)</option>
                        <option value="MV">جزر المالديف  (Maldives‬‏)</option>
                        <option value="ML">مالي  (Mali‬‏)</option>
                        <option value="MT">مالطا  (Malta‬‏)</option>
                        <option value="MH">جزر المارشال  (Marshall Islands‬‏)</option>
                        <option value="MQ">مارتينيك  (Martinique‬‏)</option>
                        <option value="MR">موريتانيا</option>
                        <option value="MU">موريشيوس  (Moris‬‏)</option>
                        <option value="YT">مايوت  (Mayotte‬‏)</option>
                        <option value="MX">المكسيك  (México‬‏)</option>
                        <option value="FM">ميكرونيزيا  (Micronesia‬‏)</option>
                        <option value="MD">مولدافيا  (Republica Moldova‬‏)</option>
                        <option value="MC">موناكو  (Monaco‬‏)</option>
                        <option value="MN">منغوليا  (Монгол‬‏)</option>
                        <option value="ME">الجبل الأسود  (Crna Gora‬‏)</option>
                        <option value="MS">مونتسرات  (Montserrat‬‏)</option>
                        <option value="MA">المغرب</option>
                        <option value="MZ">موزمبيق  (Moçambique‬‏)</option>
                        <option value="MM">ميانمار -بورما  (မြန်မာ‬‏)</option>
                        <option value="NA">ناميبيا  (Namibia‬‏)</option>
                        <option value="NR">ناورو  (Nauru‬‏)</option>
                        <option value="NP">نيبال  (नेपाल‬‏)</option>
                        <option value="NL">هولندا  (Nederland‬‏)</option>
                        <option value="NC">كاليدونيا الجديدة  (Nouvelle-Calédonie‬‏)</option>
                        <option value="NZ">نيوزيلاندا  (New Zealand‬‏)</option>
                        <option value="NI">نيكاراغوا  (Nicaragua‬‏)</option>
                        <option value="NE">النيجر  (Nijar‬‏)</option>
                        <option value="NG">نيجيريا  (Nigeria‬‏)</option>
                        <option value="NU">نيوي  (Niue‬‏)</option>
                        <option value="NF">جزيرة نورفوك  (Norfolk Island‬‏)</option>
                        <option value="MP">جزر ماريانا الشمالية  (Northern Mariana Islands‬‏)</option>
                        <option value="NO">النرويج  (Norge‬‏)</option>
                        <option value="OM">عُمان</option>
                        <option value="PK">باكستان</option>
                        <option value="PW">بالاو  (Palau‬‏)</option>
                        <option value="PS">فلسطين</option>
                        <option value="PA">بنما  (Panamá‬‏)</option>
                        <option value="PG">بابوا غينيا الجديدة  (Papua New Guinea‬‏)</option>
                        <option value="PY">باراغواي  (Paraguay‬‏)</option>
                        <option value="PE">بيرو  (Perú‬‏)</option>
                        <option value="PH">الفيلبين  (Philippines‬‏)</option>
                        <option value="PN">جزر بيتكيرن  (Pitcairn Islands‬‏)</option>
                        <option value="PL">بولندا  (Polska‬‏)</option>
                        <option value="PT">البرتغال  (Portugal‬‏)</option>
                        <option value="PR">بورتوريكو  (Puerto Rico‬‏)</option>
                        <option value="QA">قطر</option>
                        <option value="RE">روينيون  (Réunion‬‏)</option>
                        <option value="RO">رومانيا  (România‬‏)</option>
                        <option value="RU">روسيا  (Россия‬‏)</option>
                        <option value="RW">رواندا  (Rwanda‬‏)</option>
                        <option value="BL">سان بارتليمي  (Saint-Barthélémy‬‏)</option>
                        <option value="SH">سانت هيلنا  (Saint Helena‬‏)</option>
                        <option value="KN">سانت كيتس ونيفيس  (Saint Kitts and Nevis‬‏)</option>
                        <option value="LC">سانت لوسيا  (Saint Lucia‬‏)</option>
                        <option value="MF">سانت مارتن  (Saint-Martin [partie française]‬‏)</option>
                        <option value="PM">سانت بيير وميكولون  (Saint-Pierre-et-Miquelon‬‏)</option>
                        <option value="VC">سانت فنسنت وغرنادين  (Saint Vincent and the Grenadines‬‏)</option>
                        <option value="WS">ساموا  (Samoa‬‏)</option>
                        <option value="SM">سان مارينو  (San Marino‬‏)</option>
                        <option value="ST">ساو تومي وبرينسيبي  (São Tomé e Príncipe‬‏)</option>
                        <option value="SA">المملكة العربية السعودية</option>
                        <option value="SN">السنغال  (Sénégal‬‏)</option>
                        <option value="RS">صربيا  (Србија‬‏)</option>
                        <option value="SC">سيشل  (Seychelles‬‏)</option>
                        <option value="SL">سيراليون  (Sierra Leone‬‏)</option>
                        <option value="SG">سنغافورة  (Singapore‬‏)</option>
                        <option value="SX">سينت مارتن  (Sint Maarten‬‏)</option>
                        <option value="SK">سلوفاكيا  (Slovensko‬‏)</option>
                        <option value="SI">سلوفينيا  (Slovenija‬‏)</option>
                        <option value="SB">جزر سليمان  (Solomon Islands‬‏)</option>
                        <option value="SO">الصومال  (Soomaaliya‬‏)</option>
                        <option value="ZA">جنوب أفريقيا  (South Africa‬‏)</option>
                        <option value="GS">جورجيا الجنوبية وجزر ساندويتش الجنوبية  (South Georgia and the South Sandwich Islands‬‏)</option>
                        <option value="SS">جنوب السودان (جنوب السودان)</option>
                        <option value="ES">إسبانيا  (España‬‏)</option>
                        <option value="LK">سريلانكا  (ශ්‍රී ලංකාව‬‏)</option>
                        <option value="SD">السودان</option>
                        <option value="SR">سورينام  (Suriname‬‏)</option>
                        <option value="SJ">سفالبارد وجان مايان  (Svalbard og Jan Mayen‬‏)</option>
                        <option value="SZ">سوازيلاند  (Swaziland‬‏)</option>
                        <option value="SE">السويد  (Sverige‬‏)</option>
                        <option value="CH">سويسرا  (Schweiz‬‏)</option>
                        <option value="SY">سوريا (سوريا)</option>
                        <option value="TW">تايوان  (台灣‬‏)</option>
                        <option value="TJ">طاجكستان  (Tajikistan‬‏)</option>
                        <option value="TZ">تانزانيا  (Tanzania‬‏)</option>
                        <option value="TH">تايلند  (ไทย‬‏)</option>
                        <option value="TL">تيمور الشرقية  (Timor-Leste‬‏)</option>
                        <option value="TG">توجو  (Togo‬‏)</option>
                        <option value="TK">توكيلو  (Tokelau‬‏)</option>
                        <option value="TO">تونغا  (Tonga‬‏)</option>
                        <option value="TT">ترينيداد وتوباغو  (Trinidad and Tobago‬‏)</option>
                        <option value="TN">تونس</option>
                        <option value="TR">تركيا  (Türkiye‬‏)</option>
                        <option value="TM">تركمانستان  (Turkmenistan‬‏)</option>
                        <option value="TC">جزر الترك وجايكوس  (Turks and Caicos Islands‬‏)</option>
                        <option value="TV">توفالو  (Tuvalu‬‏)</option>
                        <option value="UG">أوغندا  (Uganda‬‏)</option>
                        <option value="UA">أوكرانيا  (Україна‬‏)</option>
                        <option value="AE">الإمارات العربية المتحدة</option>
                        <option value="GB">المملكة المتحدة  (United Kingdom‬‏)</option>
                        <option value="US">الولايات المتحدة  (United States‬‏)</option>
                        <option value="UM">جزر الولايات المتحدة البعيدة الصغيرة  (U.S. Outlying Islands‬‏)</option>
                        <option value="UY">أورغواي  (Uruguay‬‏)</option>
                        <option value="UZ">أوزبكستان  (Ўзбекистон‬‏)</option>
                        <option value="VU">فانواتو  (Vanuatu‬‏)</option>
                        <option value="VE">فنزويلا  (Venezuela‬‏)</option>
                        <option value="VN">فيتنام  (Việt Nam‬‏)</option>
                        <option value="VG">جزر فرجين البريطانية  (British Virgin Islands‬‏)</option>
                        <option value="VI">جزر فرجين الأمريكية  (U.S. Virgin Islands‬‏)</option>
                        <option value="WF">جزر والس وفوتونا  (Wallis and Futuna‬‏)</option>
                        <option value="EH">الصحراء الغربية</option>
                        <option value="YE">اليمن (اليمن)</option>
                        <option value="ZM">زامبيا  (Zambia‬‏)</option>
                        <option value="ZW">زيمبابوي  (Zimbabwe‬‏)</option>
                    </select>
                </div>

                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">أدخل الحجم بالكيلو *</span>
                    </div>
                    <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                    required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                    
                <div class="input-group mb-3" dir="rtl">
                    
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert4"> إدخال</button>
                    
                    <div id="insert4" class="collapse">

                        <div class="input-group mr-md-5" dir="rtl" >
                            <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    
                </div>
                        
            </div>


            <div class=" col-12 text-right " id="local_cost" style=" display:none;">

                <div class=" input-group mb-3 " dir="rtl">
                    <div class="input-group-prepend">
                        <p class="input-group-text" for="inputGroupSelect01"> الشحن إلى </p>
                    </div>
               
                       <div class="sty-Selec w-100">
                          <select class="custom-select" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                        <option value="0">--أختار--</option>
                        <option>الرياض</option>
                        <option>مكة</option>
                        <option>المدينة</option>
                        <option>القصيم</option>
                        <option>الشرقية</option>
                        <option>عسير</option>
                        <option>تبوك</option>
                        <option>حائل</option>
                        <option>الحدود الشمالية </option>
                        <option>جازان</option>
                        <option>الباحة</option>
                        <option>الجوف</option>
                        </select> 
                       </div> 
                       
                </div>

                <div class="input-group mb-3 " dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">أدخل الحجم بالكيلو *</span>
                    </div>
                    <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                    required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                    
                <div class="input-group mb-3 " dir="rtl">
                    
                    <button type="button" class="btn btn-primary " data-toggle="collapse" data-target="#insert5"> إدخال</button>
                    
                    <div id="insert5" class="collapse ">

                        <div class="input-group mr-md-5" dir="rtl" >
                            <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    
                </div>
                        
            </div>


         

        


    </div>
        <!--End ROW -->
               
    </div>
    <!--End container -->

</section>
<!--/ section-1 -->
        
        



<!--/ section-2 -->

<section class="section" style="position: relative; top: 160px;">

        <!-- container -->
    <div class="container">
        <!-- row -->
     

        <div class="row ">


            <div class=" col-12 text-right " id="ship_insurance" style=" display:none;">

                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">أدخل  مبلغ الشحنة *</span>
                    </div>
                    <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                    required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                    
                <div class="input-group mb-3" dir="rtl">
                    
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert6"> إدخال</button>
                    
                    <div id="insert6" class="collapse">

                        <div class="input-group mr-md-5" dir="rtl" >
                            <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    
                </div>
                        
            </div>
        

        
            <div class="col-md-12 col-12" id="order_insurance" style=" display:none;">

                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">أدخل  مبلغ الطلبية *</span>
                    </div>
                    <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                    required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3" dir="rtl">
                    
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert7"> إدخال</button>
                    
                    <div id="insert7" class="collapse">

                        <div class="input-group mr-md-5" dir="rtl" >
                            <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    
                </div>

            </div>
            

        
           
        
            <div class="col-md-12 col-12" id="ord_comm1" style=" display:none;">

                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">أدخل  مبلغ الطلبية *</span>
                    </div>
                    <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                    required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3" dir="rtl">
                    
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert8"> إدخال</button>
                    
                    <div id="insert8" class="collapse">

                        <div class="input-group mr-md-5" dir="rtl" >
                            <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    
                </div>

            </div>




            <div class="col-md-12 col-12" id="ord_comm2" style=" display:none;">

                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">أدخل  مبلغ الطلبية *</span>
                    </div>
                    <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                    required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3" dir="rtl">
                    
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert9"> إدخال</button>
                    
                    <div id="insert9" class="collapse">

                        <div class="input-group mr-md-5" dir="rtl" >
                            <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    
                </div>

            </div>





            <div class="col-md-12 col-12" id="ord_comm3" style=" display:none;">

                <div class="input-group mb-3" dir="rtl">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">أدخل  مبلغ الطلبية *</span>
                    </div>
                    <input oninvalid="InvalidMsg(this);" onpaste="return false;"  placeholder=" أدخل عدد صحيح" 
                    required="required"  oninput="InvalidMsg(this);" type="text" required class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-3" dir="rtl">
                    
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#insert10"> إدخال</button>
                    
                    <div id="insert10" class="collapse">

                        <div class="input-group mr-md-5" dir="rtl" >
                            <input  type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                    </div>
                    
                </div>

            </div>

            

        


    </div>
        <!-- row -->

    </div> 
    <!-- container -->
    
</section>
<!--/ section-2 -->



<!--/ section-3 -->
<section class="section" style="position: relative; top: 160px;">

        <!-- container -->
    <div class="container">
        <!-- row -->



    
        <!-- row -->



    </div> 
    <!-- container -->
    
</section>
<!--/ section-3 -->

@endsection

@push("script")

          <script type="text/javascript">


            function readURL(input) {
            
            if (input.files && input.files[0]) {
              var reader = new FileReader();
            
              reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
              }
            
              reader.readAsDataURL(input.files[0]);
            }
            }
            
            
        </script>

           <!--  -->
        <!--select shipcost ,insurance,commission, rate, tax&vat  -->
        <!--select  ship_cost,insurance_amount, order commission, exchange_rate,tax_vate  -->
        <script>
            
            function showDiv2(select) {
                document.getElementById('usa_ksa').style.display = "none";
                document.getElementById('china_ksa').style.display = "none";
                document.getElementById('world_ksa').style.display = "none";
                document.getElementById('ksa_world').style.display = "none";
                document.getElementById('local_cost').style.display = "none";
                document.getElementById('ship_insurance').style.display = "none";
                document.getElementById('order_insurance').style.display = "none";
                
                if (select.value == 'usatoksa') {
                
                    document.getElementById('usa_ksa').style.display = "block";
                    
                     
                    }  else if (select.value == 'chinatoksa') {
                  
                    document.getElementById('china_ksa').style.display = "block";
                    
                   
                    } else if (select.value == 'worldtoksa') {
                 
                    document.getElementById('world_ksa').style.display = "block";
                    
                 
                 } else if (select.value == 'ksatoworld') {
                 
                    document.getElementById('ksa_world').style.display = "block";
                   
                 
                 }  else if (select.value == 'localcost') {
                    
                    document.getElementById('local_cost').style.display = "block";
                    
                
                } else if (select.value == 'shipinsurance') {
                
                    document.getElementById('ship_insurance').style.display = "block";
                    

                 
                } else if (select.value == 'orderinsurance') {
                  
                    document.getElementById('order_insurance').style.display = "block";
                    
                 
                  } 
            }


            


            function showDiv4(select) {
                document.getElementById('ord_comm1').style.display = "none";
                document.getElementById('ord_comm2').style.display = "none";
                document.getElementById('ord_comm3').style.display = "none";
                
                if (select.value == 'ordcomm1') {
                
                    document.getElementById('ord_comm1').style.display = "block";
                     
                    }  else if (select.value == 'ordcomm2') {
                
                document.getElementById('ord_comm2').style.display = "block";
                 
                } else if (select.value == 'ordcomm3') {
                
                document.getElementById('ord_comm3').style.display = "block";
                 
                } 
            }

            
        </script>

        <script>
                
            function showDiv(select) {
                document.getElementById('ship_cost').style.display = "none";
                document.getElementById('insurance_amount').style.display = "none";
                document.getElementById('order_commission').style.display = "none";
                document.getElementById('exchange_rate').style.display = "none";
                document.getElementById('tax_vate').style.display = "none";
                document.getElementById('usa_ksa').style.display = "none";
                document.getElementById('china_ksa').style.display = "none";
                document.getElementById('world_ksa').style.display = "none";
                document.getElementById('ksa_world').style.display = "none";
                document.getElementById('local_cost').style.display = "none";
                document.getElementById('ship_insurance').style.display = "none";
                document.getElementById('order_insurance').style.display = "none";
                document.getElementById('ord_comm1').style.display = "none";
                document.getElementById('ord_comm2').style.display = "none";
                document.getElementById('ord_comm3').style.display = "none";
                
                if (select.value == 'shipcost') {
                
                    document.getElementById('ship_cost').style.display = "block";
                    
                    
                    }  else if (select.value == 'insurance') {
                
                    document.getElementById('insurance_amount').style.display = "block";
                
                    } else if (select.value == 'commission') {
                
                    document.getElementById('order_commission').style.display = "block";
                    
                    } else if (select.value == 'rate') {
                
                    document.getElementById('exchange_rate').style.display = "block";
                    
                    } else if (select.value == 'tax&vat') {
                    
                    document.getElementById('tax_vate').style.display = "block";
                
                    }
            }
        
        </script>
        
    
        <!-- End JS FILE -->
</body>
</html>  
    

@endpush