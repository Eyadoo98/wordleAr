<?php

use App\Http\Middleware\CheckSession;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordleAr\SocialiteController;
use App\Http\Controllers\WordleAr\SessionController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::group([CheckSession::class], function() {
//    Route::get('/{view?}', \App\Livewire\WordleAr\MainComponent::class)->name('main');
//
//});

Route::get('/{view?}', \App\Livewire\WordleAr\MainComponent::class)->name('main');
//google auth
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');//for go to google login page
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');// for get user data from google

//facebook auth
Route::get('/auth/facebook', [SocialiteController::class, 'redirectToFacebook'])->name('facebook.login');//for go to google login page
Route::get('/auth/facebook/callback', [SocialiteController::class, 'handleFacebookCallback'])->name('facebook.callback');// for get user data from google


Route::get('/auth/socialite', [SocialiteController::class, 'authSocialite'])->name('auth.Socialite');//for go to google login page

Route::post('/auth/login', [SocialiteController::class, 'authLogin'])->name('auth.Login');//for go to google login page

Route::post('/session', [SessionController::class, 'setSession']);

Route::post('/getSession', [SessionController::class, 'getSession']);

Route::get('/status/player', [\App\Http\Controllers\WordleAr\StatusController::class, 'getStatus'])->name('status.player');

//Route::get('/status', function () {
//    return view('partials.WordleAr.status');
//})->name('status.player');