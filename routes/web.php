<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;


Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/switch-lang/{lang}', [LanguageController::class,'switchLang'])->name('lang');
});

Route::fallback(function(){
    return redirect()->route('home');
});



