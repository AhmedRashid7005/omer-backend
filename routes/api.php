<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [App\Http\Controllers\Apis\AuthController::class, 'login']);

Route::group(['middleware' =>'checkUserToken'] , function () {
    Route::post('/logout', [App\Http\Controllers\Apis\AuthController::class, 'logout']);
    Route::post('usernameAndSuit', [App\Http\Controllers\Apis\AddressController::class, 'returnName']);
    Route::post('UpdateName', [App\Http\Controllers\Apis\UserProfileController::class, 'UpdatName']);
    Route::post('UpdateEmail', [App\Http\Controllers\Apis\UserProfileController::class, 'UpdateEmail']);
    Route::post('UpdatePhone', [App\Http\Controllers\Apis\UserProfileController::class, 'UpdatePhone']);
    Route::post('AddPhone', [App\Http\Controllers\Apis\UserProfileController::class, 'addPhone']);
    Route::post('getNumberOfNotifications', [App\Http\Controllers\Apis\NotificationController::class, 'getUnReadedNotifications']);
    Route::post('readNote', [App\Http\Controllers\Apis\NotificationController::class, 'readNote']);
    Route::post('AllNotes', [App\Http\Controllers\Apis\NotificationController::class, 'AllNotes']);
    Route::get('allPackages', [App\Http\Controllers\Apis\PackageController::class, 'showAllPackages']);
    Route::get('Packages_status_numbers', [App\Http\Controllers\Apis\PackageController::class, 'NumberOfEachPackageStatus']);
    Route::post('Packages_products', [App\Http\Controllers\Apis\PackageController::class, 'packageProducts']);
    Route::post('allPackagesUSA', [App\Http\Controllers\Apis\PackageController::class, 'showAllPackagesFrom']);
    Route::post('AddNotesPackage', [App\Http\Controllers\Apis\PackageController::class, 'AddNotesToPackage']);
    Route::post('AddCheckPackage', [App\Http\Controllers\Apis\PackageController::class, 'AddCheckToPackage']);
    Route::post('AddTurnOnToPackage', [App\Http\Controllers\Apis\PackageController::class, 'AddTurnOnToPackage']);
    //get user package and compare it with the stored in database
    Route::get('returnPhotoRange', [App\Http\Controllers\Apis\PackageController::class, 'returnPhotoRange']);
    Route::get('returnVideoRange', [App\Http\Controllers\Apis\PackageController::class, 'returnVideoRange']);
    Route::post('SendContactUS', [App\Http\Controllers\Apis\ContactUsController::class, 'SendContactMessage']);
    Route::post('SendConflict', [App\Http\Controllers\Apis\ConflictController::class, 'SendConflict']);
    Route::post('EndConflict', [App\Http\Controllers\Apis\ConflictController::class, 'EndConflict']);
    Route::post('sendResponse', [App\Http\Controllers\Apis\ConflictController::class, 'sendResponse']);
    Route::post('retrieveResponse', [App\Http\Controllers\Apis\ConflictController::class, 'retrieveResponse']);
    Route::get('AllUserConflicts', [App\Http\Controllers\Apis\ConflictController::class, 'AllUserConflicts']);
    Route::post('returnCashBack', [App\Http\Controllers\Apis\CalculatorController::class, 'returnCashBack']);
    Route::post('checkCard', [App\Http\Controllers\Apis\CalculatorController::class, 'checkCard']);
    Route::post('AddBalance', [App\Http\Controllers\Apis\CalculatorController::class, 'AddBalance']);
    Route::post('AddReview', [App\Http\Controllers\Apis\ReviewController::class, 'AddReview']);
    Route::post('SendManualTransfer', [App\Http\Controllers\Apis\ConfirmTransferController::class, 'SendManualTransfer']);
    Route::post('sendTransferWithPhoto', [App\Http\Controllers\Apis\ConfirmTransferController::class, 'sendTransferWithPhoto']);
    Route::get('returnAfflitateData', [App\Http\Controllers\Apis\AffiliateController::class, 'returnAfflitateData']);
    Route::post('Search', [App\Http\Controllers\Apis\AffiliateController::class, 'Search']);
    Route::post('TransferRecievableBalance', [App\Http\Controllers\Apis\WalletController::class, 'TransferRecievableBalance']);
    Route::post('BankTransferWithdraw', [App\Http\Controllers\Apis\WalletController::class, 'BankTransferWithdraw']);
    Route::post('RequestDebt', [App\Http\Controllers\Apis\WalletController::class, 'RequestDebt']);
    Route::post('PayRequired', [App\Http\Controllers\Apis\WalletController::class, 'PayRequired']);
    Route::get('returnAllBalance', [App\Http\Controllers\Apis\WalletController::class, 'returnAllBalance']);
    Route::get('allGroupBalances', [App\Http\Controllers\Apis\WalletController::class, 'allGroupBalances']);

   



});
Route::post('password/email', [App\Http\Controllers\Apis\AuthController::class, 'ForgetPassword']);

Route::get('suits', [App\Http\Controllers\Apis\AddressController::class, 'get_Address']);
Route::get('suits/{id}', [App\Http\Controllers\Apis\AddressController::class, 'get_Address_info']);

Route::post('/AddNewPart', [App\Http\Controllers\Apis\HomeController::class, 'AddNewPart']);
