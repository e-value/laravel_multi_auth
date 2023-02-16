<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class,, 'index']'])->name('home');

// Admin 新規登録
Route::group(['prefix' => 'admin'], function () {
    Route::get('register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('register', [App\Http\Controllers\Admin\Auth\RegisterController::class, 'register']);
});

// Admin ログイン
Route::group(['prefix' => 'admin'], function() {
    Route::get('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
});

// Admin ログアウト・ログイン後トップページ
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('home', [App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin.home');
    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class,'logout'])->name('admin.logout');
});

// Admin パスワード再設定
Route::group(['prefix' => 'admin'], function () {
    Route::get('password/reset', [Admin\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [Admin\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('admin.password.email');
    Route::post('password/reset', [Admin\Auth\ResetPasswordController::class,'reset'])->name('admin.password.update');
    Route::get('password/reset/{token}', [Admin\Auth\ResetPasswordController::class,'showResetForm'])->name('admin.password.reset');
});

// Company ログイン
Route::group(['prefix' => 'company'], function() {
    Route::get('login', [App\Http\Controllers\Company\Auth\LoginController::class,'showLoginForm'])->name('company.login');
    Route::post('login', [App\Http\Controllers\Company\Auth\LoginController::class,'login']);
});

// Company ログアウト・ログイン後トップページ
Route::group(['prefix' => 'compay', 'middleware' => 'auth:company'], function() {
    Route::get('home', [App\Http\Controllers\Company\HomeController::class,'index'])->name('company.home');
    Route::post('logout', [App\Http\Controllers\Company\Auth\LoginController::class,'logout'])->name('company.logout');
});
