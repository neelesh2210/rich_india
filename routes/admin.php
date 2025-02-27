<?php

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\PayoutController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\TargetController;
use App\Http\Controllers\Admin\OldDataController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\WebinarController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\LeaderboardController;
use App\Http\Controllers\Admin\InstagramLinkController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\AutomatedPayoutController;
use App\Http\Controllers\Admin\TestimonialVideoController;
use App\Http\Controllers\Admin\CommissionSettingController;
use App\Http\Controllers\Admin\EmergingAssociateController;
use App\Http\Controllers\Admin\ErrorRegistrationController;
use App\Http\Controllers\Admin\MarketingMaterialController;
use App\Http\Controllers\Admin\WithdrawalRequestController;
use App\Http\Controllers\Admin\LevelupTransactionController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

//Login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login'])->name('admin.login.submit');

Route::group(['middleware'=>'auth:admin','as'=>'admin.'],function () {
    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Course
    Route::resource('course',CourseController::class);
    Route::get('course-status/{id}/{status}',[CourseController::class,'status'])->name('course.status');

    //Topic
    Route::resource('topic', TopicController::class);
    Route::get('topic-status/{id}/{status}',[TopicController::class,'status'])->name('topic.status');

    //User
    Route::get('user-index',[UserController::class,'index'])->name('user.index');
    Route::get('user-profile/{id}',[UserController::class,'profile'])->name('user.profile');
    Route::get('add-user',[UserController::class,'create'])->name('add.user');
    Route::post('store-user',[UserController::class,'store'])->name('store.user');
    Route::get('edit-user/{id}',[UserController::class,'edit'])->name('edit.user');
    Route::post('update-user/{id}',[UserController::class,'update'])->name('update.user');
    Route::post('change-password',[UserController::class,'changePassword'])->name('change.password');
    Route::get('upgrade-plan-index/{user_id}',[UserController::class,'upgradePlanIndex'])->name('upgrade.plan.index');
    Route::post('upgrade-plan/{user_id}',[UserController::class,'upgradePlan'])->name('upgrade.plan');
    Route::get('change-user-status/{id}/{status}',[UserController::class,'changeUserStatus'])->name('change.user.status');
    Route::post('user-login/{user_id}',[UserController::class,'userLogin'])->name('user.login');

    //WebsiteSetting
    Route::resource('websitesetting',WebsiteSettingController::class);

        //FAQ
        Route::resource('faq',FaqController::class);

        //Plan
        Route::resource('plan',PlanController::class);
        Route::get('plan-status/{id}/{status}',[PlanController::class,'status'])->name('plan.status');

        //Testimonial
        Route::resource('testimonialvideo',TestimonialVideoController::class);
        Route::get('testimonialvideo-status/{id}/{status}',[TestimonialVideoController::class,'status'])->name('testimonialvideo.status');

        //Commsion
        Route::resource('commission-setting',CommissionSettingController::class);

        //Update Commission Level
        Route::post('update-commission-level',[CommissionSettingController::class,'updateCommissionLevel'])->name('update.commission.level');
        Route::post('update-withdrawal-deduction-charges',[CommissionSettingController::class,'updateWithdrawalDeductionCharges'])->name('update.withdrawal.deduction.charges');

    //Payment Transaction
    Route::get('payment-transaction-index',[PaymentController::class,'index'])->name('payment.transaction.index');
    //Route::get('payment-transaction-delete/{id}',[PaymentController::class,'destroy'])->name('payment.transaction.delete');
    Route::get('payment-invoice/{id}',[PaymentController::class,'invoice'])->name('payment.invoice');

    //Error Registration
    Route::get('error-registration',[ErrorRegistrationController::class,'index'])->name('error.registration');

    //Leaderboard
    Route::get('leaderboard-index',[LeaderboardController::class,'index'])->name('leaderboard.index');
    Route::get('get-leaderboard-user',[LeaderboardController::class,'getUser'])->name('get.leaderboard.user');
    Route::get('set-leaderboard-user-session',[LeaderboardController::class,'setSession'])->name('set.leaderboard.user.session');
    Route::get('hide-leaderboard-user',[LeaderboardController::class,'hideUser'])->name('hide.leaderboard.user');

    //Commission
    Route::get('commission-index',[CommissionController::class,'index'])->name('commission.index');

    //Earning
    Route::get('earnings',[CommissionController::class,'earning'])->name('earning');

    //Withdrawal
    Route::get('withdrawal',[PayoutController::class,'withdrawal'])->name('withdrawal');

    //Associates
    Route::get('associates',[UserController::class,'associates'])->name('associates');

    //Withdrawal Request
    Route::get('withdrawal-request-index',[WithdrawalRequestController::class,'index'])->name('withdrawal.request.index');
    Route::get('withdrawal-request-status',[WithdrawalRequestController::class,'stauts'])->name('withdrawal.request.status');

    //Payout
    Route::get('payout-index',[PayoutController::class,'index'])->name('payout.index');
    Route::post('pay-payout',[PayoutController::class,'store'])->name('pay.payout');

    //Payout Transaction
    Route::get('success-payout-transaction-index',[PayoutController::class,'payoutTransactionIndex'])->name('payout.transaction.index');
    Route::get('failed-payout-transaction-index',[PayoutController::class,'failedpayoutTransactionIndex'])->name('failed.payout.transaction.index');

    //Coupon
    Route::resource('coupons',CouponController::class);

    //Emerging Associate
    Route::get('emerging-associate',[EmergingAssociateController::class,'index'])->name('emerging.associate');

    //Instructor
    Route::resource('instructors',InstructorController::class);

    //Review
    Route::resource('reviews',ReviewController::class);

    //Media
    Route::resource('medias',MediaController::class);

    //Manage Old Data
    Route::get('get-old-users',[OldDataController::class,'getOldUsers'])->name('get.old.users');
    Route::get('create-old-user',[OldDataController::class,'createOldUser'])->name('create.old.user');
    Route::post('store-old-user',[OldDataController::class,'storeOldUser'])->name('store.old.user');
    Route::get('edit-old-user/{user_id}',[OldDataController::class,'editOldUser'])->name('edit.old.user');
    Route::post('update-old-user/{user_id}',[OldDataController::class,'updateOldUser'])->name('update.old.user');

    Route::get('set_session',[OldDataController::class,'setSession'])->name('set.session');

    Route::post('admin-change-password',[DashboardController::class,'adminChangePassword'])->name('admin.change.password');

    Route::resource('roles',RoleController::class);

    Route::resource('staff',StaffController::class);

    Route::get('unpaid-user-list',[UserController::class,'unpaidUserList'])->name('unpaidUserList');
    Route::post('old-payout',[PayoutController::class,'oldPayout'])->name('old.payout');

    //Webinar
    Route::resource('webinars', WebinarController::class);

    //Training
    Route::resource('trainings', TrainingController::class);

    //Offer
    Route::resource('offers', OfferController::class);

    //Marketing Material
    Route::resource('marketing-materials', MarketingMaterialController::class);

    //Automated Payout
    Route::get('automated-payout',[AutomatedPayoutController::class,'automatedPayout'])->name('automated.payout');

    //Pending Wallet Amount
    Route::get('total-pending-wallet-amount',[ReportController::class,'totalPendingWalletAmount'])->name('total.pending.wallet.amount');
    Route::get('payment-transaction-report',[ReportController::class,'paymentTransaction'])->name('payment.transaction.report');

    //Blog
    Route::resource('blog', BlogController::class);

    //Language
    Route::resource('language', LanguageController::class)->except('create','show');

    //Instagram Link
    Route::resource('instagram-link', InstagramLinkController::class)->except('create','show');

    //Levelup Wallet Transaction
    Route::get('levelup-transaction',[LevelupTransactionController::class,'index'])->name('levelup.transaction');

    //Target
    Route::resource('target', TargetController::class);
    Route::get('achieved-users/{target_id}',[TargetController::class,'achievedUsers'])->name('achieved.users');

    //User Commission / Payout
    Route::get('user-commission-payout',[UserController::class,'userCommissionPayout'])->name('user.commission.payout');

    Route::post('logout/', [LoginController::class, 'logout'])->name('logout');
});



