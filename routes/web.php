<?php

use App\Http\Controllers\Web\Backend\User\GroupController;
use App\Http\Controllers\Web\Backend\User\UserDashboardController;
use App\Http\Controllers\Web\Frontend\DocumentController;
use App\Http\Controllers\Web\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact/store', [HomeController::class, 'contactStore'])->name('contact.store');

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

    // SMS related routes
    Route::get('/send-sms', [UserDashboardController::class, 'sendSms'])->name('send-sms');
    Route::get('/send-sms-file', [UserDashboardController::class, 'sendSmsFile'])->name('send-sms-file');
    Route::post('/send-sms-file', [UserDashboardController::class, 'import']);
    Route::post('/send-sms-store', [UserDashboardController::class, 'sendSmsStore'])->name('send-sms-store');


    Route::get('/sender_id', [UserDashboardController::class, 'senderId'])->name('sender_id');

    // SMS Logs
    Route::get('/sms_logs', [UserDashboardController::class, 'smsLogs'])->name('sms_logs');

    // block user
    Route::get('/block_user', [UserDashboardController::class, 'blockUser'])->name('block_user');
    Route::get('/block/user/create', [UserDashboardController::class, 'blockUserCreate'])->name('block.user.create');
    Route::post('/block/user/store', [UserDashboardController::class, 'blockUserStore'])->name('block.user.store');
    Route::delete('/block/user/update/{id}', [UserDashboardController::class, 'blockUserUpdate'])->name('block.user.update');

    // document
    Route::get('/send/sms/using/json', [DocumentController::class, 'sendSmsUsingJson'])->name('send.sms.using.json');
    Route::get('/send/sms/using/xml', [DocumentController::class, 'sendSmsUsingXml'])->name('send.sms.using.xml');
    Route::get('/utilities', [DocumentController::class, 'utilities'])->name('utilities');
    Route::get('/doc/general', [DocumentController::class, 'docGeneral'])->name('doc.general');
    Route::get('//doc/contacts/interface', [DocumentController::class, 'contactsInterface'])->name('contacts.interface');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
