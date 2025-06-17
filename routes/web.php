<?php

use App\Http\Controllers\Web\Backend\User\GroupController;
use App\Http\Controllers\Web\Backend\User\UserDashboardController;
use App\Http\Controllers\Web\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/recharge', [UserDashboardController::class, 'recharge'])->name('recharge');
    Route::get('/transections', [UserDashboardController::class, 'transections'])->name('transections');
    Route::get('/rate-plan', [UserDashboardController::class, 'ratePlan'])->name('rate-plan');

    // Group related routes
    Route::get('/group', [GroupController::class, 'group'])->name('group');
    Route::post('/group/store', [GroupController::class, 'groupStore'])->name('group.store');
    Route::get('/group/contact/{id}', [GroupController::class, 'groupContact'])->name('group.contact');
    Route::post('/group/contact/store', [GroupController::class, 'groupContactStore'])->name('group.contact.store');
    Route::get('/group/contact/edit/{id}', [GroupController::class, 'groupContactEdit'])->name('group.contact.edit');
    Route::post('/group/contact/update/{id}', [GroupController::class, 'groupContactUpdate'])->name('group.contact.update');
    Route::delete('/group/delete/{id}', [GroupController::class, 'groupDelete'])->name('group.delete');
    Route::delete('/group/contact/delete/{id}', [GroupController::class, 'groupContactDelete'])->name('group.contact.delete');


    Route::get('/send-sms', [UserDashboardController::class, 'sendSms'])->name('send-sms');
    Route::get('/send-sms-file', [UserDashboardController::class, 'sendSmsFile'])->name('send-sms-file');
    Route::post('/send-sms-file', [UserDashboardController::class, 'import']);
    Route::get('/sender_id', [UserDashboardController::class, 'senderId'])->name('sender_id');
    Route::get('/sms_logs', [UserDashboardController::class, 'smsLogs'])->name('sms_logs');
});                                                                                                                                        

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
