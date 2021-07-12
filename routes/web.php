<?php


Route::get("mail-job", "mailController@mailJob");
Route::get("job-run", function(){
    Artisan::call("queue:work");
});



/*=======================================================
=            TapPayment Routes By Arafat ...            =
=======================================================*/

Route::get("tappayment-process-payment", "UserController@tapPaymentProcessPayment")->name("tappayment-process-payment");
Route::get("tappayment-execute-payment", "UserController@tapPaymentExecutePayment")->name("tappayment-execute-payment");
Route::post("tappayment-post-url", "UserController@tapPaymentPostUrl")->name("tappayment-post-url");

/*=====  End of TapPayment Routes By Arafat ...  ======*/


// Paypal Payment Process and execute
Route::get("paypal-process-payment", "UserController@paypalProcessPayment")->name("paypal-process-payment");
Route::get("paypal-execute-payment", "UserController@paypalExecutePayment")->name("paypal-execute-payment");
// end Paypal payment



Auth::routes();

Route::get('/', function () {
     return view("ar.HomeAR");
})->name("homeAr");

// clear artisan command ...
Route::get('/clear', function () {

    Artisan::call('route:clear');

    Artisan::call('storage:link');

    Artisan::call('view:clear');
    Artisan::call('config:clear');

    Artisan::call('config:cache');
});
Route::get("/arafat-test-mail", "mailController@arafatTestMail")->name("arafatTestMail");



// affiliate Person Page
Route::get("/affiliate-person-page", "AffiliatePersonController@affiliatePersonPage")->name("affiliatePersonPage");
Route::any("/affiliate-person-page-search", "AffiliatePersonController@affiliatePersonPageSearch")->name("affiliatePersonPageSearch");


Route::get('/home', 'HomeController@index')->name('home');

/*=========================================================
=  English Website Routes by Arafat | arafat.dml@gmail.com =
+  date: 16/11/2020
=========================================================*/

Route::group(['prefix' => 'en'], function (){

    Route::get("/", function(){
        return redirect()->route('homeEn');
    });
    Route::get("/Home", function(){
        return view("en.Home");
    })->name("homeEn");
    Route::get("/Personal-Shopper", function(){
        return view("en.PersonalShopper");
    })->name("PersonalShopperEn");
});

/*===== End of English Website Routes by Arafat | arafat.dml@gmail.com  ======*/

/*==============================================++
++  Arabic Route By Arafat                      ++
++  By arafat | arafat.dml@gmail.com            ++
++  Date: 20/11/2020                            ++
+===============================================++*/

// Route::group(["prefix" => 'ar'], function(){ // client do not want it
/*    Route::get("/", function(){
       return redirect()->route("homeAr");
    });*/

    Route::get("/Home", function(){
        return view("ar.HomeAR");
    })->name("homePageAr");

    Route::get("/Personal-Shopper", function(){
        return view("ar.PersonalShopperAR");
    })->name("personalShopperAr");

    Route::get("/Form-Personal-Shopper", function(){
        return view("ar.FormPersonalShopperAR");
    })->name("formPersonalShopperAr");

    Route::get("/Import-solutions", function(){
        return view("ar.ImportsolutionsAR");
    })->name("importSolutionsAr");

    Route::get("/Make-an-Order-to-purchase-auto-parts", function(){
        return view("ar.MakeanOrdertopurchaseautopartsAR");
    })->name("makeAnOrderToPurchaseAutoPartsAr");

    Route::get("/Form-order-auto-parts", function(){
        return view("ar.FormorderautopartsAR");
    })->name("FormOrderAutoPartsAr");

    Route::get("/Buyer&seller-protection-service", function(){
        return view("ar.Buyer&sellerprotectionserviceAR");
    })->name("buyerSellerProtectionServiceAr");

    Route::get("/Form-Buyer&seller-protection-service", function(){
        return view("ar.FormBuyersellerprotectionserviceAR");
    })->name("FormBuyerSellerProtectionServiceAr");

    // Here is the Issue...
    Route::get("/Subscription-plans", "UserController@subscriptionPlansAr")->name("subscriptionPlansAr");

    Route::get("/Sign-Up", function(){
        return view("ar.SignUpAR");
    })->name("signUpAr");

    Route::get("/Addresses-USA&china", function(){
        return view("ar.AddressesUSAChinaAR");
    })->name("addressesUsaChinaAr");

    Route::get("/Address-KSA-International", function(){
        return view("ar.AddressKSAInternationalAR");
    })->name("addressKsaInternationalAr");

    Route::get("/Login", "UserController@loginAr")->name("loginAr");

    Route::get("/Forgot-password", function(){
        return view("ar.ForgotPasswordAR");
    })->name("forgotPasswordAr");

    Route::get("/Insurance-solution", function(){
        return view("ar.InsurancesolutionAR");
    })->name("insuranceSolutionAr");

    Route::get("/Features", function(){
        return view("ar.FeaturesAR");
    })->name("featuresAr");

    Route::get("/Form-Import", function(){
        return view("ar.FormImportAR");
    })->name("formImportAr");

    Route::get("/Global-services", function(){
        return view("ar.GlobalservicesAR");
    })->name("globalServicesAr");

    Route::get("/Forbiddens", function(){
        return view("ar.ForbiddensAR");
    })->name("forbiddensAr");

    Route::get("/Website-Development", function(){
        return view("ar.WebsiteDevelopmentAR");
    })->name("websiteDevelopmentAr");

    Route::get("/Proof-of-money-transfer", function(){
        return view("ar.ProofofmoneytransferAR");
    })->name("proofOfMoneyTransferAr");

    Route::get("/Contact-Us", function(){
        return view("ar.ContactUsAR");
    })->name("contactUsAr");

    Route::get("/Terms-Conditions", function(){
        return view("ar.TermsConditionsAR");
    })->name("termsConditionsAr");

    Route::get("/Privacy-Policy", function(){
        return view("ar.PrivacyPolicyAR");
    })->name("privacyPolicyAr");

    Route::get("/About-us", function(){
        return view("ar.AboutusAR");
    })->name("aboutUsAr");

    Route::get("/Charging-system", function(){
        return view("ar.ChargingsystemAR");
    })->name("chargingSystemAr");


    # Missing Pages Are Start Here

    Route::get("/affiliate", function(){
        return view("ar.affiliateAr");
    })->name("affiliateAr");

    # End Missing pages


// }); // client do not want prefix

/*=====  End of Arabic Route By Arafat  ======*/

/*================================================
=            User Subscription Routes            =
================================================*/

Route::post("/register-user-mail-duplicate-checking", "UserController@isRegistrationMailAlreadyExist")->name("isRegistrationMailAlreadyExist");

Route::post("/email-verify-using-code", "UserController@EmailVerifyUsingCode")->name("EmailVerifyUsingCode");

Route::get("/email-verify-using-link/{email?}/{hash?}", "UserController@EmailVerifyUsingLink")->name("EmailVerifyUsingLink");

Route::post("/subscribe", "UserController@subscribe")->name("subscribe");

Route::get("/email-verification-page", "UserController@emailVerificationPage")->name("emailVerificationPage");

Route::get("/subscription-payment-page", "UserController@subscriptionPaymentPage")->name("subscriptionPaymentPage");

Route::post("/subscription-payment-redirect", "UserController@subscriptionPaymentRedirect")->name("subscriptionPaymentRedirect");

/*=====  End of User Subscription Routes  ======*/

# ar Login Routes
Route::post("/customer-login", "UserController@customerLogin")->name("customerLogin");

# Forgot Password Routes
Route::post("/forget-password-process", "UserController@forgetPassProcess")->name("forgetPassProcess");

Route::get("/forget-password-verify-page", "UserController@forgetPassVerifyPage")->name("forgetPassVerifyPage");

Route::post("/forget-password-verify-page-process", "UserController@forgetPassVerifyPageProcess")->name("forgetPassVerifyPageProcess");

# Protect This Route Check and Redirect
Route::get("/forget-password-reset", "UserController@forgetPassResetPage")->name("forgetPassResetPage");
# Protect This Route and Redirect .... Because Anyone Can send Post request and
# Reset The Password... BugBounty idea
Route::post("/forget-password-reset-process", "UserController@forgetPassResetProcess")->name("forgetPassResetProcess");

# using link
Route::get("/forget-password-reset-link/{email?}/{hash?}", "UserController@forgetPassResetLink")->name("forgetPassResetLink");

# end Forgot Password Routes


/*==============================================
=            Arafat Socialite Route            =
==============================================*/

// sociallite Login ...
//Auth::routes(); // NOTE: If you want to verify you can add ['verify' => true]
Route::get('/login/{provider}', 'UserController@redirectToProvider')
    ->name('social.login');
Route::get('/login/{provider}/callback', 'UserController@handleProviderCallback')
    ->name('social.callback');

/*=====  End of arafat mail: arafat.dml@gmail.com web_lover at fiverr   ======*/

Route::get("socialite-billing-shipping", "UserController@oAuthBillingShipping")->name("oAuthBillingShipping");
Route::post("socialite-billing-shipping-process", "UserController@oAuthBillingShippingProcess")->name("oAuthBillingShippingProcess");

/*=====  End of Arafat Socialite Route  ======*/

# strat from Beganing if client wish to start from beganing
Route::get("start-from-beganing", "UserController@startFromBeganing")->name("startFromBeganing");

# Test mail
Route::get("mail-test", "UserController@mailTest")->name("mailTest");


# Contact Us data Save

Route::post("contact-us-store", "ContactUsController@contactUsStore")->name("contactUsStore");

# Webiste Development Routes

Route::post("webiste-development-store", "WebsiteDevelopmentController@websiteDevelopmentStore")->name("websiteDevelopmentStore");


Route::get("calculator", function(){
    return view("ar.calculatorAr");
})->name("calculatorAr");

Route::get("store", function(){
    return view("ar.storeAr");
})->name("storeAr");

Route::get("dispute", function(){
    return view("ar.disputeAr");
})->name("disputeAr");

/*==============================================
=            Admin Dashboard Routes            =
==============================================*/
Route::get("/admin-login", "Admin\AuthController@adminLogin")->name("adminLogin");
Route::post("/admin-login-check", "Admin\AuthController@adminLoginCheck")->name("adminLoginCheck");
Route::get("/admin-logout", "Admin\AuthController@adminLogout")->name("adminLogout");



Route::group(['middleware' => ['web', 'adminAuth']], function(){

    Route::get("dashboard", "Admin\DashboardController@index")->name("dashboard");

    Route::get("admin-profile", "Admin\AdminProfileController@adminProfile")->name("adminProfile");
    Route::post("admin-profile-update", "Admin\AdminProfileController@adminProfileUpdate")->name("adminProfileUpdate");

    Route::get("client-list", "Admin\AdminClientController@adminClientList")->name("adminClientList");
    Route::get("client-list-by-admin", "Admin\AdminClientController@adminClientListByAdmin")->name("adminClientListByAdmin");
    Route::get("admin-client-details/{id?}", "Admin\AdminClientController@adminClientDetails")->name("adminClientDetails");
    Route::get("admin-client-edit/{id?}", "Admin\AdminClientController@adminClientEdit")->name("adminClientEdit");
    Route::post("admin-client-update", "Admin\AdminClientController@adminClientUpdate")->name("adminClientUpdate");
    Route::get("admin-client-active-deactive/{id?}", "Admin\AdminClientController@adminClientActiveDeactive")->name("adminClientActiveDeactive");
    Route::get("admin-client-delete/{id?}", "Admin\AdminClientController@adminClientDelete")->name("adminClientDelete");

    # Add Client

    Route::get("client-add", "Admin\AdminClientController@adminClientAdd")->name("adminClientAdd");
    Route::post("admin-client-store", "Admin\AdminClientController@adminClientStore")->name("adminClientStore");

    # End add  client

    # SubsCribe Package Module
    Route::get("plans-list", "Admin\SubscriberPackageNameController@subscribePackageList")->name("subscribePackageList");
    Route::get("plans-add", "Admin\SubscriberPackageNameController@subscribePackageCreate")->name("subscribePackageCreate");
    Route::post("admin-subscribe-package-store", "Admin\SubscriberPackageNameController@subscribePackageStore")->name("subscribePackageStore");
    Route::get("admin-subscribe-package-edit/{id?}", "Admin\SubscriberPackageNameController@subscribePackageEdit")->name("subscribePackageEdit");
    Route::post("admin-subscribe-package-update", "Admin\SubscriberPackageNameController@subscribePackageUpdate")->name("subscribePackageUpdate");
    Route::get("admin-subscribe-package-delete/{id?}", "Admin\SubscriberPackageNameController@subscribePackageDelete")->name("subscribePackageDelete");
    # End SubsCribe Package Module


    # Suit Module
    Route::get("suit-create", "Admin\SuitAddressController@suitAddressCreate")->name("suitAddressCreate");
    Route::get("suit-list", "Admin\SuitAddressController@suitAddressList")->name("suitAddressList");
    Route::post("suit-address-store", "Admin\SuitAddressController@suitAddressStore")->name("suitAddressStore");
    Route::get("suit-address-edit/{id?}", "Admin\SuitAddressController@suitAddressEdit")->name("suitAddressEdit");
    Route::post("suit-address-update", "Admin\SuitAddressController@suitAddressUpdate")->name("suitAddressUpdate");
    Route::get("suit-address-delete/{id?}", "Admin\SuitAddressController@suitAddressDelete")->name("suitAddressDelete");
    # End Suit Module


    # Admin module start

    Route::get("admin-create", "Admin\AdminProfileController@adminCreate")->name("adminCreate");
    Route::post("admin-store", "Admin\AdminProfileController@adminStore")->name("adminStore");
    Route::get("admin-edit/{id?}", "Admin\AdminProfileController@adminEdit")->name("adminEdit");
    Route::post("admin-update", "Admin\AdminProfileController@adminUpdate")->name("adminUpdate");
    Route::get("admin-delete/{id?}", "Admin\AdminProfileController@adminDelete")->name("adminDelete");
    Route::get("admin-list", "Admin\AdminProfileController@adminList")->name("adminList");
    Route::post("/admin-email-duplicate-check", "Admin\AdminProfileController@isAdminMailAlreadyExist")->name("isAdminMailAlreadyExist");

    # End Admin module

    /*========================================
    =            Affiliate Module            =
    ========================================*/
    
    // Main Routes..
    Route::get("/affiliate-type", "AffiliateTypeController@index")->name("affiliateType");

    // Affiliate Group
    Route::get("/list-affiliate-group", "AffiliateGroupController@index")->name("listAffiliateGroup");
    Route::get("/create-affiliate-by-group", "AffiliateGroupController@create")->name("createAffiliateByGroup");
    Route::post("/store-affiliate-by-group", "AffiliateGroupController@store")->name("storeAffiliateByGroup");
    Route::get("/affiliate-group-edit/{id}", "AffiliateGroupController@edit")->name("AffiliateGroupEdit");
    Route::post("/update-affiliate-by-group", "AffiliateGroupController@update")->name("updateAffiliateByGroup");
    Route::get("/affiliate-group-destroy/{id}", "AffiliateGroupController@destroy")->name("AffiliateGroupDestroy");


    // Affiliate Person
    Route::get("/list-affiliate-person", "AffiliatePersonController@index")->name("listAffiliatePerson");
    Route::get("/create-affiliate-by-person", "AffiliatePersonController@create")->name("createAffiliateByPerson");
    Route::post("/store-affiliate-by-person", "AffiliatePersonController@store")->name("storeAffiliateByPerson");
    Route::get("/affiliate-person-edit/{id}", "AffiliatePersonController@edit")->name("affiliatePersonEdit");
    Route::post("/update-affiliate-by-person", "AffiliatePersonController@update")->name("updateAffiliateByPerson");
    Route::get("/affiliate-person-destroy/{id}", "AffiliatePersonController@destroy")->name("affiliatePersonDestroy");
    Route::get("/affiliate-person-send-mail/{id}", "AffiliatePersonController@sendMail")->name("sendMail");
    
    /*=====  End of Affiliate Module  ======*/


    /*==================================
    =            Contact us            =
    ==================================*/
    
Route::get("contact-us-received-list", "ContactUsController@contactUsList")->name("contactUsList");
Route::get("contact-us-delete/{id?}", "ContactUsController@contactUsDelete")->name("contactUsDelete");

Route::get("contact-us-reply/{id?}", "ContactUsController@contactUsReply")->name("contactUsReply");
Route::post("contact-us-post", "ContactUsController@contactUsReplyPost")->name("contactUsReplyPost");
Route::get("contact-us-reply-delete/{id?}", "ContactUsController@contactUsReplyDelete")->name("contactUsReplyDelete");
Route::get("contact-us-details/{id?}", "ContactUsController@contactUsDetails")->name("contactUsDetails");
    
    /*=====  End of Contact us  ======*/
    

    /*==================================
    =            Reviews              =
    ==================================*/
    Route::get("ReviewList", "Admin\ReviewController@ListReviews")->name("ReviewList");
    Route::get("Review-details/{id?}", "Admin\ReviewController@ReviewDetails")->name("ReviewDetails");
    Route::get("transfer-review/{review_id}", "Admin\ReviewController@transferReview")->name("transfer-review");
    Route::post("add-balance-ToUser", "Admin\ReviewController@AddBalance")->name("Add-Balance-To-User-After-Review");
    Route::get("review-edit/{id?}", "Admin\ReviewController@ReviewEdit")->name("ReviewEdit");
    Route::post("ReviewUpdate", "Admin\ReviewController@ReviewUpdate")->name("ReviewUpdate");
    Route::get("DeleteReview/{id?}", "Admin\ReviewController@DeleteReview")->name("DeleteReview");

    /*=====  End of Reviews  ======*/
    
    /*==================================
    =            Conflicts              =
    ==================================*/
    Route::get("ConflictList", "Admin\ConflictController@listConflicts")->name("ConflictList");
    Route::get("Conflict-details/{id?}", "Admin\ConflictController@ConflictDetails")->name("ConflictDetails");
    Route::get("DeleteConflict/{id?}", "Admin\ConflictController@DeleteConflict")->name("DeleteConflict");
    Route::get("Response/{id}", "Admin\ConflictController@RepsonseConflict")->name("ResponseConflict");
    Route::post("Add-Response/{id}", "Admin\ConflictController@AddResponseToConflictAdmin")->name("AddResponseToConflictAdmin");

    
    /*=====  End of Conflicts  ======*/ 



    /*==================================
    =      Transfer Confirmations      =
    ==================================*/
    
    Route::get("TransferList", "Admin\TransferController@TransferList")->name("TransferList");
    Route::get("Transfer-details/{id?}", "Admin\TransferController@TransferDetails")->name("TransferDetails");
    Route::get("confirm-transfer/{transfer_id}", "Admin\TransferController@ConfirmTransfer")->name("confirm-transfer");
    Route::post("Confirmation-Transfer-Add-balance", "Admin\TransferController@AddBalance")->name("Add-Balance-To-User-After-Transfer");
    Route::get("Transfer-edit/{id?}", "Admin\TransferController@TransferEdit")->name("TransferEdit");
    Route::post("TransferUpdate", "Admin\TransferController@TransferUpdate")->name("TransferUpdate");
    Route::get("DeleteTransfer/{id?}", "Admin\TransferController@DeleteTransfer")->name("DeleteTransfer");
    Route::get("RefuseTransfer/{id?}", "Admin\TransferController@RefuseTransfer")->name("RefuseTransfer");
    
    Route::post("SendRefusedMessage", "Admin\TransferController@SendRefusedMessage")->name("SendRefusedMessage");
    

    

    /*===========================================
    =            website Developemnt            =
    ===========================================*/
    
    Route::get("development-received-list", "WebsiteDevelopmentController@websiteDevelopmentList")->name("websiteDevelopmentList");

    Route::get("website-development-delete/{id?}", "WebsiteDevelopmentController@websiteDevelopmentDelete")->name("websiteDevelopmentDelete");

    # Reply module

    Route::get("website-development-reply/{id?}", "WebsiteDevelopmentController@websiteDevelopmentReply")->name("websiteDevelopmentReply");
    Route::post("website-development-reply-post", "WebsiteDevelopmentController@websiteDevelopmentReplyPost")->name("websiteDevelopmentReplyPost");
    Route::get("website-development-reply-delete/{id?}", "WebsiteDevelopmentController@websiteDevelopmentReplyDelete")->name("websiteDevelopmentReplyDelete");
    Route::get("website-development-details/{id?}", "WebsiteDevelopmentController@websiteDevelopmentDetails")->name("websiteDevelopmentDetails");

    # End Reply Module

    /*=====  End of website Developemnt  ======*/
    

    /*=============================================
    =            Email Template Module            =
    =============================================*/
    
    Route::get("email-template-list", "Admin\EmailTemplateController@emailTemplateList")->name("emailTemplateList");
    Route::get("email-template-add", "Admin\EmailTemplateController@emailTemplateAdd")->name("emailTemplateAdd");
    Route::post("email-template-store", "Admin\EmailTemplateController@emailTemplateStore")->name("emailTemplateStore");
    Route::get("email-template-edit/{id?}", "Admin\EmailTemplateController@emailTemplateEdit")->name("emailTemplateEdit");
    Route::post("email-template-update", "Admin\EmailTemplateController@emailTemplateUpdate")->name("emailTemplateUpdate");
    Route::get("email-template-delete/{id?}", "Admin\EmailTemplateController@emailTemplateDelete")->name("emailTemplateDelete");


    /*=====  End of Email Template Module  ======*/


    /*=====================================
    =            Coupon Module            =
    =====================================*/
    
    Route::get("coupon-list", "Admin\CouponController@couponList")->name("couponList");
    Route::get("coupon-add", "Admin\CouponController@couponAdd")->name("couponAdd");
    Route::post("coupon-store", "Admin\CouponController@couponStore")->name("couponStore");
    Route::get("coupon-edit/{id?}", "Admin\CouponController@couponEdit")->name("couponEdit");
    Route::post("coupon-update", "Admin\CouponController@couponUpdate")->name("couponUpdate");
    Route::get("coupon-delete/{id?}", "Admin\CouponController@couponDelete")->name("couponDelete");
    
    /*=====  End of Coupon Module  ======*/
    
    
    /*======================================================
    =            send message and notifications            =
    ======================================================*/
    
    Route::get("send-message", "Admin\MessageController@sendMessage")->name("sendMessage");
    Route::match( array('GET','POST'), "send-message-post", "Admin\MessageController@sendMessagePost")->name("sendMessagePost");
    Route::any("send-message-post-process", "Admin\MessageController@processPostMessage")->name("processPostMessage");
    Route::any("send-email", "Admin\MessageController@sendMail")->name("sendMail");

   # Email list
   Route::get("email-list", "Admin\MessageController@getAllSendEmail")->name("getAllSendEmail");

   # Email delete
   Route::get("email-delete/{id?}", "Admin\MessageController@emailDelete")->name("emailDelete");

 

    # Notification Module
    Route::get("send-notification", "Admin\NotificationController@sendNotification")->name("sendNotification");
    Route::any("send-notification-process", "Admin\NotificationController@sendNotificationProcess")->name("sendNotificationProcess");
    Route::any("send-notification-post", "Admin\NotificationController@sendNotificationPost")->name("sendNotificationPost");
    Route::any("process-post-notification", "Admin\NotificationController@processPostNotification")->name("processPostNotification");
    Route::any("send-notification-to-client", "Admin\NotificationController@sendNotificationClient")->name("sendNotificationClient");

    # Notification list
    Route::get("notification-list", "Admin\NotificationController@getAllSendNotification")->name("getAllSendNotification");

    # Notification delete
    Route::get("notification-delete/{id?}", "Admin\NotificationController@notificationDelete")->name("notificationDelete");

    
    
    /*=====  End of send message and notifications  ======*/

    /*==================================================
    =            mail template ajax purpose            =
    ==================================================*/
    
    Route::get("mail-template-by-id/{id?}", "Admin\EmailTemplateController@getMailTemplateById")->name("getMailTemplateById");
    
    /*=====  End of mail template ajax purpose  ======*/
    
    
    /*=========================================
    =            Brand Type Module            =
    =========================================*/
    
    Route::get("brand-type-list", "Admin\BrandTypeController@brandTypeList")->name("brandTypeList");
    Route::get("brand-type-add", "Admin\BrandTypeController@brandTypeAdd")->name("brandTypeAdd");
    Route::post("brand-type-store", "Admin\BrandTypeController@brandTypeStore")->name("brandTypeStore");
    Route::get("brand-type-edit/{id?}", "Admin\BrandTypeController@brandTypeEdit")->name("brandTypeEdit");
    Route::post("brand-type-update", "Admin\BrandTypeController@brandTypeUpdate")->name("brandTypeUpdate");
    Route::get("brand-type-delete/{id?}", "Admin\BrandTypeController@brandTypeDelete")->name("brandTypeDelete");
    
    /*=====  End of Brand Type Module  ======*/


    /*====================================
    =            Brand Module            =
    ====================================*/
    
    Route::get("stores-list", "Admin\BrandController@brandList")->name("brandList");
    Route::get("stores-add", "Admin\BrandController@brandAdd")->name("brandAdd");
    Route::post("brand-store", "Admin\BrandController@brandStore")->name("brandStore");
    Route::get("brand-edit/{id?}", "Admin\BrandController@brandEdit")->name("brandEdit");
    Route::post("brand-update", "Admin\BrandController@brandUpdate")->name("brandUpdate");
    Route::get("brand-delete/{id?}", "Admin\BrandController@brandDelete")->name("brandDelete");
    
    /*=====  End of Brand Module  ======*/

    /*========================================
    =            Blog Type Module            =
    ========================================*/
    
    Route::get("blog-type-list", "Admin\BlogTypeController@blogTypeList")->name("blogTypeList");
    Route::get("blog-type-add", "Admin\BlogTypeController@blogTypeAdd")->name("blogTypeAdd");
    Route::post("blog-type-store", "Admin\BlogTypeController@blogTypeStore")->name("blogTypeStore");
    Route::get("blog-type-edit/{id?}", "Admin\BlogTypeController@blogTypeEdit")->name("blogTypeEdit");
    Route::post("blog-type-update", "Admin\BlogTypeController@blogTypeUpdate")->name("blogTypeUpdate");
    Route::get("blog-type-delete/{id?}", "Admin\BlogTypeController@blogTypeDelete")->name("blogTypeDelete");
    
    /*=====  End of Blog Type Module  ======*/


    /*===================================
    =            Blog Module            =
    ===================================*/
    
    Route::get("blog-list", "Admin\BlogController@blogList")->name("blogList");
    Route::get("blog-add", "Admin\BlogController@blogAdd")->name("blogAdd");
    Route::post("blog-store", "Admin\BlogController@blogStore")->name("blogStore");
    Route::get("blog-edit/{id?}", "Admin\BlogController@blogEdit")->name("blogEdit");
    Route::post("blog-update", "Admin\BlogController@blogUpdate")->name("blogUpdate");
    Route::get("blog-delete/{id?}", "Admin\BlogController@blogDelete")->name("blogDelete");
    
    /*=====  End of Blog Module  ======*/
    
    
    
    /*======================================
    =            package Status            =
    ======================================*/
    
    Route::get("package-status-list", "Admin\PackageStatusController@packageStatusList")->name("packageStatusList");
    Route::get("package-status-add", "Admin\PackageStatusController@packageStatusAdd")->name("packageStatusAdd");
    Route::post("package-status-store", "Admin\PackageStatusController@packageStatusStore")->name("packageStatusStore");
    Route::get("package-status-edit/{id?}", "Admin\PackageStatusController@packageStatusEdit")->name("packageStatusEdit");
    Route::post("package-status-update", "Admin\PackageStatusController@packageStatusUpdate")->name("packageStatusUpdate");
    Route::get("package-status-delete/{id?}", "Admin\PackageStatusController@packageStatusDelete")->name("packageStatusDelete");


    
    /*=====  End of package Status  ======*/


    /*===============================
    =            Package            =
    ===============================*/
    Route::get("first-stage-list", "Admin\PackageController@photoPackageList")->name("photoPackageList");
	Route::get("second-stage-list", "Admin\PackageController@completePackageList")->name("completePackageList");
    Route::get("package-list", "Admin\PackageController@packageList")->name("packageList");
    Route::post("package-find-client", "Admin\PackageController@findClient")->name("findClient");
    Route::post("package-select-client", "Admin\PackageController@selectClient")->name("selectClient");
    Route::get("package-add", "Admin\PackageController@packageAdd")->name("packageAdd");
    Route::post("package-store", "Admin\PackageController@packageStore")->name("packageStore");
	Route::post("package-store-one", "Admin\PackageController@packageStoreOne")->name("packageStoreOne");
    Route::get("package-details/{id?}", "Admin\PackageController@packageDetails")->name("packageDetails");
    Route::get("package-edit/{id?}", "Admin\PackageController@packageEdit")->name("packageEdit");
	Route::get("package-print/{type?}/{id?}", "Admin\PackageController@packagePrint")->name("packagePrint");
	Route::get("package-print-all/{type?}/{id?}", "Admin\PackageController@packagePrintAll")->name("packagePrintAll");
    Route::post("package-update", "Admin\PackageController@packageUpdate")->name("packageUpdate");
    Route::get("package-delete/{id?}", "Admin\PackageController@packageDelete")->name("packageDelete");
    Route::get("send-package/{package_id}", "Admin\PackageController@sendPackageToClient")->name("sendPackageToClient");

    
    // Tarek Mahfouz =========================
    Route::post("print-packages", "Admin\PackageController@printPackages")->name("printPackages");
    Route::get("billed-packages-list", "Admin\PackageController@billedPackageList")->name("billedPackageList");
    Route::get("ready-packages-list", "Admin\PackageController@readyPackageList")->name("readyPackageList");

    // =======================================

    /*=====  End of Package  ======*/


    /*========================================
    =            package Products            =
    ========================================*/
    


    // Tarek Mahfouz ============
    Route::get("add-product/{package_id}", "Admin\PackageController@addProductToPackage")->name("addProductToPackage");
    // =======================

    Route::get("package-product-add", "Admin\PackageController@packageProductAdd")->name("packageProductAdd");
    Route::post("package-product-store", "Admin\PackageController@packageProductStore")->name("packageProductStore");
    Route::post("package-product-store-from-package-details", "Admin\PackageController@packageProductStoreFromPackageDetails")->name("packageProductStoreFromPackageDetails");
    Route::get("package-product-edit/{id?}", "Admin\PackageController@packageProductEdit")->name("packageProductEdit");
    Route::post("package-product-update", "Admin\PackageController@packageProductUpdate")->name("packageProductUpdate");
    Route::get("package-product-delete/{id?}", "Admin\PackageController@packageProductDelete")->name("packageProductDelete");


    /*=====  End of package Products  ======*/
    
    
    /*===================================
    =            Order Route            =
    ===================================*/
    
    Route::get("order-list", "Admin\OrderController@orderList")->name("orderList");
    Route::get("order-add", "Admin\OrderController@orderAdd")->name("orderAdd");
    Route::post("order-store", "Admin\OrderController@orderStore")->name("orderStore");
    Route::post("order-product-store", "Admin\OrderController@orderProductStore")->name("orderProductStore");
    Route::get("order-edit/{id?}", "Admin\OrderController@orderEdit")->name("orderEdit");
    Route::get("order-details/{id?}", "Admin\OrderController@orderDetails")->name("orderDetails");
    Route::get("order-delete/{id?}", "Admin\OrderController@orderDelete")->name("orderDelete");
    Route::post("order-update", "Admin\OrderController@orderUpdate")->name("orderUpdate");

    Route::get("order-add-minimum-payamount", "Admin\OrderController@addMinimumPayamount")->name("addMinimumPayamount");
    Route::post("order-store-minimum-payamount", "Admin\OrderController@storeMinimumPayamount")->name("storeMinimumPayamount");
    Route::get("order-minimum-payamount-edit/{id?}", "Admin\OrderController@orderMinimumPayamountEdit")->name("orderMinimumPayamountEdit");
    Route::post("order-minimum-payamount-update", "Admin\OrderController@orderMinimumPayamountUpdate")->name("orderMinimumPayamountUpdate");


    Route::get("add-new-order-product", "Admin\OrderController@addNewOrderProduct")->name("addNewOrderProduct");
    Route::post("new-order-product-store", "Admin\OrderController@NewOrderProductStore")->name("NewOrderProductStore");
    Route::get("order-product-details/{id?}", "Admin\OrderController@orderProductDetails")->name("orderProductDetails");
    Route::get("order-product-edit/{id?}", "Admin\OrderController@orderProductEdit")->name("orderProductEdit");
    Route::post("order-product-update", "Admin\OrderController@orderProductUpdate")->name("orderProductUpdate");
    Route::get("order-product-delete/{id?}", "Admin\OrderController@orderProductDelete")->name("orderProductDelete");

    Route::get("add-new-order-product-offer", "Admin\OrderController@addNewOrderProductOffer")->name("addNewOrderProductOffer");
    Route::post("new-order-product-offer-store", "Admin\OrderController@newOrderProductOfferStore")->name("newOrderProductOfferStore");
    Route::get("order-product-offer-edit/{id?}", "Admin\OrderController@orderProductOfferEdit")->name("orderProductOfferEdit");
    Route::post("order-product-offer-update", "Admin\OrderController@orderProductOfferUpdate")->name("orderProductOfferUpdate");
    Route::get("order-product-offer-delete/{id?}", "Admin\OrderController@orderProductOfferDelete")->name("orderProductOfferDelete");


    /*=====  End of Order Route  ======*/
    

    /*======================================
    =            Service Module            =
    ======================================*/
    
    Route::get("image-service-list", "Admin\ServiceController@imageServiceList")->name("imageServiceList");
    Route::get("video-service-list", "Admin\ServiceController@videoServiceList")->name("videoServiceList");
    Route::get("other-service-list", "Admin\ServiceController@otherServiceList")->name("otherServiceList");

    Route::get("image-video-service-add", "Admin\ServiceController@imageVideoServiceAdd")->name("imageVideoServiceAdd");
    Route::post("image-video-service-store", "Admin\ServiceController@imageVideoServiceStore")->name("imageVideoServiceStore");
    Route::get("image-video-service-edit/{id?}", "Admin\ServiceController@imageVideoServiceEdit")->name("imageVideoServiceEdit");
    Route::post("image-video-service-update", "Admin\ServiceController@imageVideoServiceUpdate")->name("imageVideoServiceUpdate");
    Route::get("image-video-service-delete/{id?}", "Admin\ServiceController@imageVideoServiceDelete")->name("imageVideoServiceDelete");

    Route::get("other-service-add", "Admin\ServiceController@otherServiceAdd")->name("otherServiceAdd");
    Route::post("other-service-store", "Admin\ServiceController@otherServiceStore")->name("otherServiceStore");
    Route::get("other-service-edit/{id?}", "Admin\ServiceController@otherServiceEdit")->name("otherServiceEdit");
    Route::post("other-service-update", "Admin\ServiceController@otherServiceUpdate")->name("otherServiceUpdate");
    Route::get("other-service-delete/{id?}", "Admin\ServiceController@otherServiceDelete")->name("otherServiceDelete");

    
    
    /*=====  End of Service Module  ======*/


    /*======================================
    =            Invoice Routes            =
    ======================================*/
    
    Route::get("invoice-list", "Admin\InvoiceController@invoiceList")->name("invoiceList");
    Route::get("invoice-add", "Admin\InvoiceController@invoiceAdd")->name("invoiceAdd");
    Route::post("invoice-store", "Admin\InvoiceController@invoiceStore")->name("invoiceStore");
    Route::get("invoice-edit/{id?}", "Admin\InvoiceController@invoiceEdit")->name("invoiceEdit");
    Route::post("invoice-update", "Admin\InvoiceController@invoiceUpdate")->name("invoiceUpdate");
    Route::get("invoice-details/{id?}", "Admin\InvoiceController@invoiceDetails")->name("invoiceDetails");
    Route::get("invoice-delete/{id?}", "Admin\InvoiceController@invoiceDelete")->name("invoiceDelete");

    
    /*=====  End of Invoice Routes  ======*/
    

    /*======================================================
    =            cleint or group balance routes            =
    ======================================================*/
    
    Route::get("client-balance-list", "Admin\ClientGroupBalanceController@clientBalanceList")->name("clientBalanceList");
    Route::get("client-All-balance-list", "Admin\ClientGroupBalanceController@clientAllBalanceList")->name("clientAllBalanceList");
    
    Route::get("client-balance-add", "Admin\ClientGroupBalanceController@clientBalanceAdd")->name("clientBalanceAdd");
    Route::post("client-balance-store", "Admin\ClientGroupBalanceController@clientBalanceStore")->name("clientBalanceStore");
    Route::get("client-balance-edit/{id?}", "Admin\ClientGroupBalanceController@clientBalanceEdit")->name("clientBalanceEdit");
    Route::get("client-All-balance-edit/{id?}", "Admin\ClientGroupBalanceController@clientAllBalanceEdit")->name("clientAllBalanceEdit");
    Route::post("client-balance-update", "Admin\ClientGroupBalanceController@clientBalanceUpdate")->name("clientBalanceUpdate");
    Route::get("client-balance-delete/{id?}", "Admin\ClientGroupBalanceController@clientBalanceDelete")->name("clientBalanceDelete");


    Route::get("group-balance-list", "Admin\ClientGroupBalanceController@groupBalanceList")->name("groupBalanceList");
    Route::get("group-balance-add", "Admin\ClientGroupBalanceController@groupBalanceAdd")->name("groupBalanceAdd");
    Route::post("group-balance-store", "Admin\ClientGroupBalanceController@groupBalanceStore")->name("groupBalanceStore");
    Route::get("group-balance-edit/{id?}", "Admin\ClientGroupBalanceController@groupBalanceEdit")->name("groupBalanceEdit");
    Route::post("group-balance-update", "Admin\ClientGroupBalanceController@groupBalanceUpdate")->name("groupBalanceUpdate");
    Route::get("group-balance-delete/{id?}", "Admin\ClientGroupBalanceController@groupBalanceDelete")->name("groupBalanceDelete");
    
    /*=====  End of cleint or group balance routes  ======*/


    /*======================================
    =            Recharge Card             =
    ======================================*/
    
    Route::get("recharge-card-list", "Admin\RechargeCardController@rechargeCardList")->name("rechargeCardList");
    Route::get("recharge-card-add", "Admin\RechargeCardController@rechargeCardAdd")->name("rechargeCardAdd");
    Route::post("recharge-card-store", "Admin\RechargeCardController@rechargeCardStore")->name("rechargeCardStore");
    Route::get("recharge-card-activate-deactivate/{id?}", "Admin\RechargeCardController@rechargeCardActivateDeActivate")->name("rechargeCardActivateDeActivate");
    Route::get("recharge-card-delete/{id?}", "Admin\RechargeCardController@rechargeCardDelete")->name("rechargeCardDelete");

    Route::post("recharge-card-bulk-action", "Admin\RechargeCardController@rechargeCardbulkAction")->name("rechargeCardbulkAction");
    
    /*=====  End of Recharge Card   ======*/
    
    /*============================================
    =            shipping cost Module            =
    ============================================*/
    
    Route::get("shipping-list/{delivery_type?}", "Admin\ShippingCostController@InternationalShippingList")->name("InternationalShippingList");
    Route::get("shipping-add/{delivery_type?}", "Admin\ShippingCostController@InternationalShippingAdd")->name("InternationalShippingAdd");
    Route::post("shipping-store", "Admin\ShippingCostController@ShippingStore")->name("ShippingStore");
    Route::get("shipping-edit/{id?}", "Admin\ShippingCostController@InternationalShippingEdit")->name("InternationalShippingEdit");
    Route::post("shipping-update", "Admin\ShippingCostController@ShippingUpdate")->name("ShippingUpdate");
    Route::get("shipping-details/{id?}", "Admin\ShippingCostController@InternationalShippingDetails")->name("InternationalShippingDetails");
    Route::get("shipping-add-more-weight", "Admin\ShippingCostController@ShippingAddMoreWeight")->name("ShippingAddMoreWeight");
    Route::post("shipping-add-more-weight-store", "Admin\ShippingCostController@ShippingAddMoreWeightStore")->name("ShippingAddMoreWeightStore");
    Route::get("shipping-weight-delete/{id?}", "Admin\ShippingCostController@ShippingWeightDelete")->name("ShippingWeightDelete");
    Route::get("shipping-delete/{id?}", "Admin\ShippingCostController@ShippingDelete")->name("ShippingDelete");
    
    
    /*=====  End of shipping cost Module  ======*/
    
    
    /*=========================================
    =            Calculator Module            =
    =========================================*/
    
    Route::get("calculator-list/{moduleName?}/{for?}", "Admin\CalculatorController@calculatorList")->name("calculatorList");
    Route::get("calculator-add/{moduleName?}/{for?}/{title?}", "Admin\CalculatorController@calculatorAdd")->name("calculatorAdd");
    Route::post("calculator-store", "Admin\CalculatorController@calculatorStore")->name("calculatorStore");
    Route::get("calculator-edit/{id?}", "Admin\CalculatorController@calculatorEdit")->name("calculatorEdit");
    Route::post("calculator-update", "Admin\CalculatorController@calculatorUpdate")->name("calculatorUpdate");
    Route::get("calculator-delete/{id?}", "Admin\CalculatorController@calculatorDelete")->name("calculatorDelete");

    
    /*=====  End of Calculator Module  ======*/
    
    /*=======================================
    =            Advance Payment            =
    =======================================*/
    
    Route::get("advance-payment-list", "Admin\AdvancePaymentController@AdvancePaymentList")->name("AdvancePaymentList");
    Route::get("advance-payment-add", "Admin\AdvancePaymentController@AdvancePaymentAdd")->name("AdvancePaymentAdd");
    Route::post("advance-payment-store", "Admin\AdvancePaymentController@AdvancePaymentStore")->name("AdvancePaymentStore");
    Route::get("advance-payment-edit/{id?}", "Admin\AdvancePaymentController@AdvancePaymentEdit")->name("AdvancePaymentEdit");
    Route::post("advance-payment-update", "Admin\AdvancePaymentController@AdvancePaymentUpdate")->name("AdvancePaymentUpdate");
    Route::get("advance-payment-delete/{id?}", "Admin\AdvancePaymentController@AdvancePaymentDelete")->name("AdvancePaymentDelete");
    
    /*=====  End of Advance Payment  ======*/
    



    
    Route::get("ViewAllBankTransferData", "Admin\ClientGroupBalanceController@ViewAllBankTransferData")->name("ViewAllBankTransferData");
    
    Route::get("accept-withdraw/{id}", "Admin\ClientGroupBalanceController@AcceptBankWithdraw")->name("accept-withdraw");
    Route::get("refused-withdraw/{id}", "Admin\ClientGroupBalanceController@RefusedBankTransfer")->name("refused-withdraw");
    Route::post("refused-withdraw", "Admin\ClientGroupBalanceController@SendNotificationRefusedBankTransferWithdraw")->name("SendNotificationRefusedBankTransferWithdraw");
    

    Route::get("sendNOTE/{id}", "Admin\ClientGroupBalanceController@SendNote")->name("sendNote");
    Route::get("sendMessage/{id}", "Admin\ClientGroupBalanceController@sendE_MAIL")->name("sendE_MAIL");
    Route::post("sendMessage", "Admin\ClientGroupBalanceController@storeNewMessage")->name("storeNewMessage");

  

}); # End of admin Middleware


/*=====  End of Admin Dashboard Routes  ======*/
