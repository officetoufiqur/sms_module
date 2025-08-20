<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Backend\PaymentController;
use App\Http\Controllers\Web\Backend\QueueJobController;
use App\Http\Controllers\Web\Frontend\DocumentController;
use App\Http\Controllers\Web\Backend\User\GroupController;
use App\Http\Controllers\Web\Frontend\Admin\CustomerController;
use App\Http\Controllers\Web\Backend\User\UserDashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact/store', [HomeController::class, 'contactStore'])->name('contact.store');

Route::group(['middleware' => ['auth', 'verified', 'kyc']], function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/recharge', [UserDashboardController::class, 'recharge'])->name('recharge');
    Route::get('/transections', [UserDashboardController::class, 'transections'])->name('transections');
    Route::get('/rate-plan', [UserDashboardController::class, 'ratePlan'])->name('rate-plan');
    Route::post('/buy-now/{id}', [PaymentController::class, 'buyNow'])->name('buy.now');

    // paypal payment
    Route::get('paypal/payment', [PaymentController::class, 'payment'])->name('paypal.payment');
    Route::get('paypal/payment/success', [PaymentController::class, 'paymentSuccess'])->name('paypal.payment.success');
    Route::get('paypal/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('paypal.payment.cancel');

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


    Route::get('/sender-id', [UserDashboardController::class, 'senderId'])->name('sender_id');
    Route::get('/create/sender-id', [UserDashboardController::class, 'createSenderId'])->name('create.sender.id');
    Route::post('/store/sender-id', [UserDashboardController::class, 'storeSenderId'])->name('store.sender.id');
    Route::get('/mark-as-read', [CustomerController::class, 'markAsRead'])->name('mark.as.read');
    // Route::get('/sender-id/edit/{id}', [UserDashboardController::class, 'editSenderId'])->name('edit.sender.id');
    // Route::post('/sender-id/update/{id}', [UserDashboardController::class, 'updateSenderId'])->name('update.sender.id');
    // Route::delete('/sender-id/destroy/{id}', [UserDashboardController::class, 'destroySenderId'])->name('destroy.sender.id');

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

Route::group(['middleware' => ['auth', 'verified', 'web']], function () {
    // kyc verification
    Route::get('/kyc', [UserDashboardController::class, 'kyc'])->name('kyc');
    Route::post('/kyc/store', [UserDashboardController::class, 'kycStore'])->name('kyc.store');
    Route::get('/kyc/mobile/otp', [UserDashboardController::class, 'mobileOtp'])->name('mobile.otp');
    Route::post('/kyc/mobile/otp/store', [UserDashboardController::class, 'mobileOtpStore'])->name('mobile.otp.store');
});

Route::get('/run-queue-job', [QueueJobController::class, 'runQueueJob'])->name('run.queue.job');


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
