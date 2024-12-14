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
    Route::get('/user/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/user/{userId}/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
});

Route::fallback(function(){
    return redirect()->route('home');
});



