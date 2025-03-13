<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;


Auth::routes(['register' => false, 'login' => false]);

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login-form', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login_post');

Route::middleware(['auth', 'role'])->group(function(){

    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

 
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

    // Telegram
    Route::post('/telegram/webhook', [App\Http\Controllers\TelegramController::class, 'handle']);

      // Employee
    Route::get('/employees/list', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/add', [App\Http\Controllers\EmployeeController::class, 'add'])->name('employees.add');
    Route::post('/employees/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employeeId}/edit', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');
    Route::post('/employees/update/{employeeId}', [App\Http\Controllers\EmployeeController::class, 'update'])->name('employees.update');
    Route::get('/employees/{employeeId}/delete', [App\Http\Controllers\EmployeeController::class, 'delete'])->name('employees.delete');


    Route::get('/attendances/list', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendances.index');
    Route::get('/attendances/add', [App\Http\Controllers\AttendanceController::class, 'add'])->name('attendances.add');
    Route::post('/attendances/store', [App\Http\Controllers\AttendanceController::class, 'store'])->name('attendances.store');
    Route::get('/attendances/{attendanceId}/edit', [App\Http\Controllers\AttendanceController::class, 'edit'])->name('attendances.edit');
    Route::post('/attendances/update/{attendanceId}', [App\Http\Controllers\AttendanceController::class, 'update'])->name('attendances.update');
    Route::get('/attendances/{attendanceId}/delete', [App\Http\Controllers\AttendanceController::class, 'delete'])->name('attendances.delete');


    Route::get('/leaves/list', [App\Http\Controllers\LeaveController::class, 'index'])->name('leaves.index');
    Route::get('/leaves/add', [App\Http\Controllers\LeaveController::class, 'add'])->name('leaves.add');
    Route::post('/leaves/store', [App\Http\Controllers\LeaveController::class, 'store'])->name('leaves.store');
    Route::get('/leaves/{leaveId}/edit', [App\Http\Controllers\LeaveController::class, 'edit'])->name('leaves.edit');
    Route::post('/leaves/update/{leaveId}', [App\Http\Controllers\LeaveController::class, 'update'])->name('leaves.update');
    Route::get('/leaves/{leaveId}/delete', [App\Http\Controllers\LeaveController::class, 'delete'])->name('leaves.delete');

    Route::get('/payrolls/list', [App\Http\Controllers\PayrollController::class, 'index'])->name('payrolls.index');
    Route::get('/payrolls/add', [App\Http\Controllers\PayrollController::class, 'add'])->name('payrolls.add');
    Route::post('/payrolls/store', [App\Http\Controllers\PayrollController::class, 'store'])->name('payrolls.store');
    Route::get('/payrolls/{payrollId}/edit', [App\Http\Controllers\PayrollController::class, 'edit'])->name('payrolls.edit');
    Route::post('/payrolls/update/{payrollId}', [App\Http\Controllers\PayrollController::class, 'update'])->name('payrolls.update');
    Route::get('/payrolls/{payrollId}/delete', [App\Http\Controllers\PayrollController::class, 'delete'])->name('payrolls.delete');

    Route::get('/roles/list', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/add', [App\Http\Controllers\RoleController::class, 'add'])->name('roles.add');
    Route::post('/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{roleId}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/update/{roleId}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::get('/roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'delete'])->name('roles.delete');
});

Route::fallback(function(){
    return redirect()->route('home');
});



