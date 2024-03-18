<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontentdController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\AboutCoinController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\HealthCareController;
use App\Http\Controllers\Admin\EmpoweringCareController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContactController;
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

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/login', function () {
    return redirect('/');
});


Route::get('/',[FrontentdController::class,'index'])->name('home');
Route::get('about',[FrontentdController::class,'about'])->name('about');
Route::get('about-portal',[FrontentdController::class,'aboutPortal'])->name('about-portal');
Route::get('contact',[FrontentdController::class,'contact'])->name('contact');
Route::get('global-currency',[FrontentdController::class,'globalCurrency'])->name('global-currency');
Route::post('get_currency_calculate',[FrontentdController::class,'getCurrencyCalculate'])->name('get_currency_calculate');
Route::get('purchase-heal-coin',[FrontentdController::class,'purchaseHealCoin'])->name('purchase-heal-coin');
Route::post('purchase-coins',[FrontentdController::class,'purchaseCoins'])->name('purchase-coins');
Route::post('purchase-coin-data',[FrontentdController::class,'purchaseCoinData'])->name('purchase-coin-data');

Route::get('sign-up',[FrontentdController::class,'signUp'])->name('sign-up');
Route::post('user-register',[FrontentdController::class,'userRegister'])->name('user-register');

//contact form save
Route::post('contact-save',[FrontentdController::class,'contactSave'])->name('contact-save');
//captcha 
Route::get('/reload-captcha', [FrontentdController::class, 'reloadCaptcha']);

Route::get('admin/login',[AdminController::class,'adminLogin'])->name('admin/login');
Route::get('/reload-captcha-admin', [AdminController::class, 'reloadCaptchaAdmin'])->name('reload-captcha-admin');
Route::post('/authenticated',[AdminController::class,'authenticate'])->name('admin.authenticate');


Route::group(['prefix' => 'admin', 'middleware' => ['is_Admin']], function () {

    Route::get('logout',[DashBoardController::class,'logout'])->name('admin.logout');
    Route::get('dashboard',[DashBoardController::class,'index'])->name('admin.dashboard');

    //chaneg passwod
    Route::get('change-password',[DashBoardController::class,'changePassword'])->name('change-password');
    Route::post('change-password-save',[DashBoardController::class,'changePpasswordSave'])->name('change-password-save');

    //banner
    Route::get('banner-list',[BannerController::class,'index'])->name('banner-list');
    Route::match(['get','post'],'/banner-create',[BannerController::class,'bannerCreate'])->name('banner-create');
    Route::get('banner/edit/{id}',[BannerController::class,'bannerEdit']);
    Route::post('banner-update',[BannerController::class,'bannerUpdate'])->name('banner-update');
    Route::post('banner-delete',[BannerController::class,'bannerDelete'])->name('banner-delete');
    Route::post('banner-status',[BannerController::class,'bannersStatus'])->name('banner-status');
    Route::get('banner-trash',[BannerController::class,'bannerTrash'])->name('banner-trash');
    Route::post('banner-restore-data',[BannerController::class,'bannerRestoreData'])->name('banner-restore-data');
    Route::post('banner-hard-delete',[BannerController::class,'bannerHardDelete'])->name('banner-hard-delete');

     //card 
     Route::get('card-list',[CardController::class,'index'])->name('card-list');
     Route::match(['get','post'],'/card-create',[CardController::class,'cardCreate'])->name('card-create');
     Route::get('card/edit/{id}',[CardController::class,'cardEdit']);
     Route::post('card-update',[CardController::class,'cardUpdate'])->name('card-update');
     Route::post('card-delete',[CardController::class,'cardDelete'])->name('card-delete');
     Route::post('card-status',[CardController::class,'cardStatus'])->name('card-status');
     Route::get('card-trash',[CardController::class,'cardTrash'])->name('card-trash');
     Route::post('card-restore-data',[CardController::class,'cardRestoreData'])->name('card-restore-data');
     Route::post('card-hard-delete',[CardController::class,'cardHardDelete'])->name('card-hard-delete');

     //card 
     Route::get('about-coin-list',[AboutCoinController::class,'index'])->name('about-coin-list');
     Route::match(['get','post'],'/about-coin-create',[AboutCoinController::class,'aboutCoinCreate'])->name('about-coin-create');
     Route::get('about/coin/edit/{id}',[AboutCoinController::class,'aboutCoinEdit']);
     Route::post('about-coin-update',[AboutCoinController::class,'aboutCoinUpdate'])->name('about-coin-update');
     Route::post('about-coin-delete',[AboutCoinController::class,'aboutCoinDelete'])->name('about-coin-delete');
     Route::post('about-coin-status',[AboutCoinController::class,'aboutCoinStatus'])->name('about-coin-status');
     Route::post('deleted-coin-data',[AboutCoinController::class,'deletedCoinData'])->name('deleted_coin_data');
     Route::get('about-coin-trash',[AboutCoinController::class,'aboutCoinTrash'])->name('about-coin-trash');
     Route::post('about-coin-restore-data',[AboutCoinController::class,'aboutCoinRestoreData'])->name('about-coin-restore-data');
     Route::post('about-coin-hard-delete',[AboutCoinController::class,'aboutCoinHardDelete'])->name('about-coin-hard-delete');

      //cms manage
      Route::get('cms-list',[CmsController::class,'index'])->name('cms-list');
      Route::match(['get','post'],'/cms-create',[CmsController::class,'CmsCreate'])->name('cms-create');
      Route::get('cms/edit/{id}',[CmsController::class,'cmsEdit']);
      Route::post('cms-update',[CmsController::class,'cmsUpdate'])->name('cms-update');
      Route::post('cms-delete',[CmsController::class,'cmsDelete'])->name('cms-delete');
      Route::post('cms-status',[CmsController::class,'cmsStatus'])->name('cms-status');
      Route::post('cms-data',[CmsController::class,'cmsDataDeleted'])->name('cms-data');
      Route::get('cms-trash',[CmsController::class,'cmsTrash'])->name('cms-trash');
      Route::post('cms-restore-data',[CmsController::class,'cmsRestoreData'])->name('cms-restore-data');
      Route::post('cms-hard-delete',[CmsController::class,'cmsHardDelete'])->name('cms-hard-delete');

       //cms healthmanage
       Route::get('healthmanage-list',[HealthCareController::class,'index'])->name('healthmanage-list');
       Route::match(['get','post'],'/healthmanage-create',[HealthCareController::class,'healthCreate'])->name('healthmanage-create');
       Route::get('healthmanage/edit/{id}',[HealthCareController::class,'healthmanageEdit']);
       Route::post('healthmanage-update',[HealthCareController::class,'healthmanageUpdate'])->name('healthmanage-update');
       Route::post('healthmanage-delete',[HealthCareController::class,'healthmanageDelete'])->name('healthmanage-delete');
       Route::post('healthmanage-status',[HealthCareController::class,'healthmanageStatus'])->name('healthmanage-status');
       Route::post('healthmanage-data',[HealthCareController::class,'healthmanageDataDeleted'])->name('healthmanage-data');
       Route::post('health/image/remove',[HealthCareController::class,'healthImageRemove'])->name('health/image/remove');
       Route::get('healthmanage-trash',[HealthCareController::class,'healthmanageTrash'])->name('healthmanage-trash');
       Route::post('healthmanage-restore-data',[HealthCareController::class,'healthmanageRestoreData'])->name('healthmanage-restore-data');
       Route::post('healthmanage-hard-delete',[HealthCareController::class,'healthmanageHardDelete'])->name('healthmanage-hard-delete');

        //cms empowering
        Route::get('empower-list',[EmpoweringCareController::class,'index'])->name('empower-list');
        Route::match(['get','post'],'/empower-create',[EmpoweringCareController::class,'empowerCreate'])->name('empower-create');
        Route::get('empower/edit/{id}',[EmpoweringCareController::class,'empowerEdit']);
        Route::post('empower-update',[EmpoweringCareController::class,'empowerUpdate'])->name('empower-update');
        Route::post('empower-delete',[EmpoweringCareController::class,'empowerDelete'])->name('empower-delete');
        Route::post('empower-status',[EmpoweringCareController::class,'empowerStatus'])->name('empower-status');
        //Route::post('empower-data',[EmpoweringCareController::class,'empowerDataDeleted'])->name('empower-data');
        Route::get('empower-trash',[EmpoweringCareController::class,'empowerTrash'])->name('empower-trash');
        Route::post('empower-restore-data',[EmpoweringCareController::class,'empowerRestoreData'])->name('empower-restore-data');
        Route::post('empower-hard-delete',[EmpoweringCareController::class,'empowerHardDelete'])->name('empower-hard-delete');

        //testimonial route
        Route::get('testimonial-list',[TestimonialController::class,'index'])->name('testimonial-list');
        Route::match(['get','post'],'/testimonial-create',[TestimonialController::class,'testimonialCreate'])->name('testimonial-create');
        Route::get('testimonial/edit/{id}',[TestimonialController::class,'testimonialEdit']);
        Route::post('testimonial-update',[TestimonialController::class,'testimonialUpdate'])->name('testimonial-update');
        Route::post('testimonial-delete',[TestimonialController::class,'testimonialDelete'])->name('testimonial-delete');
        Route::post('testimonial-status',[TestimonialController::class,'testimonialStatus'])->name('testimonial-status');
        Route::get('testimonial-trash',[TestimonialController::class,'testimonialTrash'])->name('testimonial-trash');
        Route::post('testimonial-restore-data',[TestimonialController::class,'testimonialRestoreData'])->name('testimonial-restore-data');
        Route::post('testimonial-hard-delete',[TestimonialController::class,'testimonialHardDelete'])->name('testimonial-hard-delete');

        // contact list
        Route::get('contact-list',[ContactController::class,'index'])->name('contact-list');
        Route::post('contact-delete',[ContactController::class,'contactDelete'])->name('contact-delete');
});