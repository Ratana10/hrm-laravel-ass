<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;


Auth::routes(['register' => false, 'login' => false]);

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login-form', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login_post');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/switch-lang/{lang}', [LanguageController::class,'switchLang'])->name('lang');

    //company
    Route::get('/company/list', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
    Route::get('/company-list/edit', [App\Http\Controllers\CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/company-list/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');

    //user
    Route::get('/user/list', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/user/add', [App\Http\Controllers\UserController::class, 'add'])->name('user.add');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    Route::get('/user/{userId}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{userId}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/user/{userId}/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

    //exchange rate
    Route::get('/exchange-rate/list', [App\Http\Controllers\ExchangeRateController::class, 'index'])->name('exchange_rate.index');
    Route::post('/exchange-rate/add', [App\Http\Controllers\ExchangeRateController::class, 'add'])->name('exchange_rate.add');

    //payment method
    Route::get('/payment-method/list', [App\Http\Controllers\PaymentMethodController::class, 'index'])->name('payment_method.index');
    Route::get('/payment-method/add', [App\Http\Controllers\PaymentMethodController::class, 'add'])->name('payment_method.add');
    Route::post('/payment-method/store', [App\Http\Controllers\PaymentMethodController::class, 'store'])->name('payment_method.store');
    Route::get('/payment-method/{paymentMethodId}/edit', [App\Http\Controllers\PaymentMethodController::class, 'edit'])->name('payment_method.edit');
    Route::post('/payment-method/update/{paymentMethodId}', [App\Http\Controllers\PaymentMethodController::class, 'update'])->name('payment_method.update');
    Route::get('/payment-method/{paymentMethodId}/delete', [App\Http\Controllers\PaymentMethodController::class, 'delete'])->name('payment_method.delete');});

Route::fallback(function(){
    return redirect()->route('home');
});



