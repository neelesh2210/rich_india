<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Middleware\CheckUserStatus;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\PhonepeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AssociateController;
use App\Http\Controllers\InstamojoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BankDetailController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\WalletTransactionController;
use App\Http\Controllers\WithdrawalRequestController;
use App\Http\Controllers\UpgradePlanRequestController;
use App\Http\Controllers\RegistrationRequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['login'=>false,'register'=>false,'logout'=>false]);

//Home
Route::get('/', [HomeController::class, 'index'])->name('index');

//Course
Route::view('course', 'frontend.course')->name('course');
Route::get('course-detail/{slug}',[CourseController::class,'courseDetail'])->name('course.detail');

//Plan
Route::get('plan',[PlanController::class,'planIndex'])->name('plan');
Route::get('plan-detail/{slug}', [PlanController::class,'planDetail'])->name('plan.detail');

//Checkout
Route::get('checkout', [CheckoutController::class,'checkout'])->name('checkout');
Route::post('get-plan-detail',[CheckoutController::class,'getPlanDetail'])->name('get.plan.detail');

Route::get('about', [HomeController::class,'about'])->name('about');
Route::view('contact-us', 'frontend.contact')->name('contact');

//Policies
Route::view('privacy-policy', 'frontend.privacy_policy')->name('privacy_policy');
Route::view('term-and-condition', 'frontend.term_and_condition')->name('term_and_condition');
Route::view('cancel-and-refund-policy', 'frontend.cancel_and_refund_policy')->name('cancel_and_refund_policy');

Route::get('get-referral-users/{referral_code}',[RegisterController::class,'distributeCommission']);

//Register
Route::post('user-register',[RegisterController::class,'register'])->name('register');
Route::post('vaildate-user-registeration',[RegisterController::class,'validateUserRegistration'])->name('vaildate.user.registeration');
Route::post('payment', [RegisterController::class,'payment'])->name('payment');

//Instamojo
Route::get('instamojo/payment/pay-success',[InstamojoController::class, 'success'])->name('instamojo.success');

//Phonepe
Route::post('phonepe-payment',[RegisterController::class,'phonepePayment'])->name('phonepe.payment');
Route::get('phonepe/callback',[PhonepeController::class, 'callback'])->name('phonepe.callback');
Route::get('phonepe/redirectUrl',[PhonepeController::class, 'redirectUrl'])->name('phonepe.redirectUrl');
Route::get('phonepe/redirectUrl/update',[PhonepeController::class, 'redirectUrlUpdate'])->name('phonepe.redirectUrl.update');

//Cash
Route::get('cash-payment',[RegisterController::class,'cashPayment'])->name('cash.payment');
Route::post('cash-payment-verify/{id}',[RegisterController::class,'cashPaymentVerify'])->name('cash.payment.verify');

//Wallet Referrel Request
Route::post('wallet-referrel-request',[RegisterController::class,'walletReferrelRequest'])->name('wallet.referrel.request');
Route::get('wallet-request-confirmation/{id}',[RegisterController::class,'walletRequestConfirmation'])->name('wallet.request.confirmation');

//Thank You
Route::view('thank-you', 'frontend.thank_you')->name('thank.you');
Route::view('data-modification-error', 'frontend.data_modification_error')->name('data.modification.error');

Route::view('cashthank-you', 'frontend.cashthank_you')->name('cashthank_you');

//Route::get('import-data',[RegisterController::class,'importData']);

//Check Coupon
Route::post('check-coupon',[RegisterController::class,'checkCoupon'])->name('check.coupon');
Route::post('check-upgrage-coupon',[PlanController::class,'checkUpgradeCoupon'])->name('check.upgrade.coupon');

//Login
Route::get('signin',function(){
    if(Auth::guard('web')->user()){
        return redirect()->route('user.dashboard');
    }else{
        return view('frontend.signin');
    }
})->name('signin');
Route::post('user-login',[LoginController::class,'login'])->name('login');

//Forgot Password
Route::get('forgot-password',function(){
    if(Auth::guard('web')->user()){
        return redirect()->route('user.dashboard');
    }else{
        return view('frontend.forgot_password');
    }
})->name('forgot.password');
Route::post('send-mail-forgot-password',[ForgotPasswordController::class,'sendMailForgotPassword'])->name('send.mail.forgot.password');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//Blog
Route::get('blog',[BlogController::class,'index'])->name('blog');
Route::get('blog_detail/{slug}',[BlogController::class,'show'])->name('blog.detail');

Route::group(['middleware'=>['auth:web',CheckUserStatus::class],'prefix'=>'user','as'=>'user.'],function () {

    //User Dashboard
    Route::get('user-dashboard', [UserDashboardController::class,'dashboard'])->name('dashboard');

    //User Profile
    Route::get('user-profile', [UserProfileController::class,'profile'])->name('user.profile');
    Route::post('save-user-profile', [UserProfileController::class,'saveUserProfile'])->name('save.user.profile');

    //User Bank Detail
    Route::get('verify-email-bank-detail',[BankDetailController::class,'verifyEmail'])->name('verify.email.bank.detail');
    Route::get('user-bank-detail',[UserProfileController::class,'bankDetail'])->name('bank.detail');
    Route::post('user-document-detail-save',[UserProfileController::class,'userDocumentDetailSave'])->name('document.detail.save');

    //User Bank Detail
    Route::post('bank-detail-store',[BankDetailController::class,'store'])->name('bank.detail.store');

    Route::get('traffic',[CommissionController::class,'userCommissionList'])->name('traffic');

    Route::get('leaderboard',[UserDashboardController::class,'leaderboard'])->name('leaderboard');
    Route::view('funds', 'user_dashboard.affiliate.funds')->name('funds');

    Route::get('associates',[AssociateController::class,'associate'])->name('associates');

    //Registration Request
    Route::get('registration-request',[RegistrationRequestController::class,'index'])->name('registration.request');
    Route::get('registration-request-detail/{id}',[RegistrationRequestController::class,'detail'])->name('registration.request.detail');
    Route::post('registration-request-store/{id}',[RegistrationRequestController::class,'store'])->name('registration.request.store');

    Route::get('course',[CourseController::class,'index'])->name('course');
    Route::get('course-detail/{course_id}',[CourseController::class,'detail'])->name('course.detail');

    Route::get('plan',[PlanController::class,'index'])->name('plan');
    Route::post('upgrade-plan-payment',[PlanController::class,'upgradePlanPayment'])->name('upgrade.plan.payment');
    Route::get('upgrade-plan',[PlanController::class,'upgradePlan'])->name('upgrade.plan');
    Route::get('instamojo/payment/pay-success-upgrade',[InstamojoController::class, 'upgrade_success'])->name('instamojo.upgrade_success');

    //Upgrade Plan Request
    Route::get('upgrade-plan-request-list',[UpgradePlanRequestController::class,'index'])->name('upgrade.plan.request.list');
    Route::get('upgrade-plan-request/{id}',[UpgradePlanRequestController::class,'show'])->name('upgrade.plan.request.show');
    Route::post('upgrade-plan-request',[UpgradePlanRequestController::class,'store'])->name('upgrade.plan.request');
    Route::put('upgrade-plan-request-process/{id}',[UpgradePlanRequestController::class,'update'])->name('upgrade.plan.request.process');

    Route::get('payouts', [PayoutController::class,'index'])->name('payouts');

    Route::view('affiliate-links', 'user_dashboard.affiliate.affiliate_links')->name('affiliate.links');
    Route::view('offer', 'user_dashboard.affiliate.offer')->name('offer');
    Route::view('marketing_materials', 'user_dashboard.affiliate.marketing_materials')->name('marketing_materials');
    Route::view('change-password', 'user_dashboard.affiliate.change_password')->name('change-password');
    Route::post('update-password', [UserProfileController::class,'updatePassword'])->name('update.password');
    Route::view('bank-details', 'user_dashboard.payment.bank_details')->name('bank.details');
    Route::view('support', 'user_dashboard.support')->name('support');
    Route::view('social-media-handles', 'user_dashboard.social_media_handles')->name('social.media.handles');

    //Withdrawal Request
    Route::get('withdrawal-request-index',[WithdrawalRequestController::class,'index'])->name('withdrawal.request.index');
    Route::post('withdrawal-request-store',[WithdrawalRequestController::class,'store'])->name('withdrawal.request.store');

    //Webinar
    Route::get('webinar',[UserDashboardController::class,'webinar'])->name('webinar');

    //Training
    Route::get('training',[UserDashboardController::class,'training'])->name('training');

    //Wallet Transaction
    Route::get('wallet-transaction',[WalletTransactionController::class,'index'])->name('wallet.transaction.index');

    //Logout
    Route::post('user-logout',[LoginController::class,'logout'])->name('logout');

});
