<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;


Auth::routes(['register' => false, 'login' => false]);

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login-form', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login_post');

Route::group(['middleware' => 'auth'], function(){
    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('home');

    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('home');

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
    Route::get('/payment-method/{paymentMethodId}/delete', [App\Http\Controllers\PaymentMethodController::class, 'delete'])->name('payment_method.delete');

    //room type
    Route::get('/room-type/list', [App\Http\Controllers\RoomTypeController::class, 'index'])->name('room_type.index');
    Route::get('/room-type/add', [App\Http\Controllers\RoomTypeController::class, 'add'])->name('room_type.add');
    Route::post('/room-type/store', [App\Http\Controllers\RoomTypeController::class, 'store'])->name('room_type.store');
    Route::get('/room-type/{roomTypeId}/edit', [App\Http\Controllers\RoomTypeController::class, 'edit'])->name('room_type.edit');
    Route::post('/room-type/update/{roomTypeId}', [App\Http\Controllers\RoomTypeController::class, 'update'])->name('room_type.update');
    Route::get('/room-type/{roomTypeId}/delete', [App\Http\Controllers\RoomTypeController::class, 'delete'])->name('room_type.delete');

    //room
    Route::get('/room/list', [App\Http\Controllers\RoomController::class, 'index'])->name('room.index');
    Route::get('/room/add', [App\Http\Controllers\RoomController::class, 'add'])->name('room.add');
    Route::post('/room/store', [App\Http\Controllers\RoomController::class, 'store'])->name('room.store');
    Route::get('/room/{roomId}/edit', [App\Http\Controllers\RoomController::class, 'edit'])->name('room.edit');
    Route::post('/room/update/{roomId}', [App\Http\Controllers\RoomController::class, 'update'])->name('room.update');
    Route::get('/room/{roomId}/delete', [App\Http\Controllers\RoomController::class, 'delete'])->name('room.delete');

    // customer
    Route::get('/customer/list', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/add', [App\Http\Controllers\CustomerController::class, 'add'])->name('customer.add');
    Route::post('/customer/store', [App\Http\Controllers\CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/{customerId}/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update/{customerId}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customer.update');
    Route::get('/customer/{customerId}/delete', [App\Http\Controllers\CustomerController::class, 'delete'])->name('customer.delete');   

    // custome comment
    Route::get('/customer-comment/list/{customerId}', [App\Http\Controllers\CustomerCommentController::class, 'index'])->name('customer_comment.index');
    Route::get('/customer-comment/add/{customerId}', [App\Http\Controllers\CustomerCommentController::class, 'add'])->name('customer_comment.add');
    Route::post('/customer-comment/store/{customerId}', [App\Http\Controllers\CustomerCommentController::class, 'store'])->name('customer_comment.store');
    Route::get('/customer-comment/{customerCommentId}/edit', [App\Http\Controllers\CustomerCommentController::class, 'edit'])->name('customer_comment.edit');
    Route::post('/customer-comment/update/{customerCommentId}', [App\Http\Controllers\CustomerCommentController::class, 'update'])->name('customer_comment.update');
    Route::get('/customer-comment/{customerCommentId}/delete', [App\Http\Controllers\CustomerCommentController::class, 'delete'])->name('customer_comment.delete');

    // open room
    Route::get('/open-room/list-room', [App\Http\Controllers\OpenRoomController::class, 'list'])->name('open_room.list_room');
    Route::get('/open-room/add/{room_id}', [App\Http\Controllers\OpenRoomController::class, 'add'])->name('open_room.add');
    Route::post('/open-room/{room_id}/store', [App\Http\Controllers\OpenRoomController::class, 'store'])->name('open_room.store');
    Route::get('/open-room/{openRoomId}/edit', [App\Http\Controllers\OpenRoomController::class, 'edit'])->name('open_room.edit');
    Route::post('/open-room/update/{openRoomId}', [App\Http\Controllers\OpenRoomController::class, 'update'])->name('open_room.update');
    Route::get('/open-room/{openRoomId}/delete', [App\Http\Controllers\OpenRoomController::class, 'delete'])->name('open_room.delete');
    Route::get('/open-room/{openRoomId}/invoices', [App\Http\Controllers\OpenRoomController::class, 'invoices'])->name('open_room.invoices');


    // invoice
    Route::get('/invoice/list', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/add', [App\Http\Controllers\InvoiceController::class, 'add'])->name('invoice.add');
    Route::post('/invoice/store', [App\Http\Controllers\InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/{invoiceId}/edit', [App\Http\Controllers\InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::post('/invoice/update/{invoiceId}', [App\Http\Controllers\InvoiceController::class, 'update'])->name('invoice.update');
    Route::get('/invoice/{invoiceId}/delete', [App\Http\Controllers\InvoiceController::class, 'delete'])->name('invoice.delete');
    Route::get('/invoice/{invoiceId}/send-telegram', [App\Http\Controllers\InvoiceController::class, 'sendTelegramMessage']) ->name('invoice.sendTelegram');

    // payment 
    Route::get('/payment/list/{invoiceId}', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/add/{invoiceId}', [App\Http\Controllers\PaymentController::class, 'add'])->name('payment.add');
    Route::post('/payment/store/{invoiceId}', [App\Http\Controllers\PaymentController::class, 'store'])->name('payment.store');

    // your logic ....
    Route::get('/payment/{paymentId}/edit', [App\Http\Controllers\PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('/payment/update/{paymentId}', [App\Http\Controllers\PaymentController::class, 'update'])->name('payment.update');
    Route::get('/payment/{paymentId}/delete', [App\Http\Controllers\PaymentController::class, 'delete'])->name('payment.delete');
    Route::get('/payment/{invoiceId}', [App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payments/pdf', [App\Http\Controllers\PaymentController::class, 'exportPdf'])->name('payments.pdf');
    Route::get('/payments/excel', [App\Http\Controllers\PaymentController::class, 'exportExcel'])->name('payments.excel');


    // report
    Route::get('/report/payment', [App\Http\Controllers\ReportController::class, 'payment'])->name('report.payment');
    Route::get('/report/outstanding', [App\Http\Controllers\ReportController::class, 'outstanding'])->name('report.outstanding');

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
});

Route::fallback(function(){
    return redirect()->route('home');
});



