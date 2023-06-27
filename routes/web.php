<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::group(['middleware'=>['auth']],function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/promocode', [App\Http\Controllers\PromocodeController::class, 'promocode'])->name('promocode');
    Route::post('/create/promocode', [App\Http\Controllers\PromocodeController::class, 'createPromocode'])->name('promocode.create');
    Route::get('delete_rpomocode/{id}',[App\Http\Controllers\PromocodeController::class, 'deletePromocode'])->name('promocode.delete');

	Route::get('/package_pricing', [App\Http\Controllers\PackagePricingController::class, 'pricing'])->name('package.pricing');
	Route::get('/package_pricing/update', [App\Http\Controllers\PackagePricingController::class, 'EditPricing'])->name('pricing.update');
	Route::post('/package_pricing/price/update', [App\Http\Controllers\PackagePricingController::class, 'UpdatePrice'])->name('price.update');

    Route::get('/message', [App\Http\Controllers\MessageController::class, 'message'])->name('message');
    Route::post('/create/message', [App\Http\Controllers\MessageController::class, 'createMessage'])->name('message.create');
    Route::get('delete_message/{id}',[App\Http\Controllers\MessageController::class, 'deleteMessage'])->name('message.delete');

    Route::get('/users/list', [App\Http\Controllers\UserController::class, 'getUsers'])->name('users.list');
    Route::get('login', [App\Http\Controllers\UserController::class, 'login'])->name('users.login');
    Route::get('/users/details/{id}', [App\Http\Controllers\UserController::class, 'getUsersDetails'])->name('users.details');
    Route::get('/tutor_review/list', [App\Http\Controllers\UserController::class, 'getTutorReviews'])->name('tutor.review');

    Route::get('/tutor_review/edit/{id}', [App\Http\Controllers\UserController::class, 'editTutorReviews'])->name('tutor.edit.review');
    Route::post('/tutor_review/update/{id}', [App\Http\Controllers\UserController::class, 'updateTutorReviews'])->name('tutor.update.review');
    Route::get('/tutor_review/delete/{id}',[App\Http\Controllers\UserController::class, 'deleteTutorReviews'])->name('tutor_review.delete');
    Route::get('/tutor_review/approve/{id}',[App\Http\Controllers\UserController::class, 'approveTutorReviews'])->name('tutor_review.approve');

    Route::get('/video_link/list',[App\Http\Controllers\UserController::class, 'getVideoLink'])->name('dashboard.video_link');
    Route::post('/video_link/update/{id}', [App\Http\Controllers\UserController::class, 'updateVideoLink'])->name('video.update');

    Route::get('/social_links/list',[App\Http\Controllers\UserController::class, 'getSocialLink'])->name('dashboard.social_links');
    Route::post('/social_links/update/{id}', [App\Http\Controllers\UserController::class, 'updateSocialLink'])->name('social_links.update');
    
    Route::get('/faq/list',[App\Http\Controllers\UserController::class, 'faqList'])->name('faq.list');
    Route::post('/faq/update/{id}', [App\Http\Controllers\UserController::class, 'updateFaq'])->name('faq.update');
    Route::get('/faq/delete/{id}',[App\Http\Controllers\UserController::class, 'deleteFaq'])->name('faq.delete');

    Route::get('/users/delete/{id}',[App\Http\Controllers\UserController::class, 'deleteUsers'])->name('users.delete');

    Route::get('/change_password/',[App\Http\Controllers\HomeController::class, 'showChangePassword'])->name('profile.showChangePassword');

    Route::post('/change-user-password',[App\Http\Controllers\HomeController::class, 'changePassword'])->name('profile.changePassword');    

    

});
