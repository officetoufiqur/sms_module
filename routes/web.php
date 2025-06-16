<?php

use App\Http\Controllers\Web\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('recharge', function () {
    return Inertia::render('user_dashboard/Recharge');
})->middleware(['auth', 'verified'])->name('recharge');

Route::get('transections', function () {
    return Inertia::render('user_dashboard/Transections');
})->middleware(['auth', 'verified'])->name('transections');

Route::get('rate-plan', function () {
    return Inertia::render('user_dashboard/RatePlan');
})->middleware(['auth', 'verified'])->name('rate-plan');

Route::get('group', function () {
    return Inertia::render('user_dashboard/Group/Index');
})->middleware(['auth', 'verified'])->name('group');

Route::get('group/contact/{id}', function () {
    return Inertia::render('user_dashboard/Group/GroupContact');
})->middleware(['auth', 'verified'])->name('group.contact');

Route::get('group/contact/edit/{id}', function () {
    return Inertia::render('user_dashboard/Group/Edit');
})->middleware(['auth', 'verified'])->name('group.contact.edit');

Route::get('send-sms', function () {
    return Inertia::render('user_dashboard/SendSms');
})->middleware(['auth', 'verified'])->name('send-sms');

Route::get('send-sms-file', function () {
    return Inertia::render('user_dashboard/SendSmsFile');
})->middleware(['auth', 'verified'])->name('send-sms-file');

Route::get('sender_id', function () {
    return Inertia::render('user_dashboard/SendId');
})->middleware(['auth', 'verified'])->name('sender_id');

Route::get('sms_logs', function () {
    return Inertia::render('user_dashboard/SmsLogs');
})->middleware(['auth', 'verified'])->name('sms_logs');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
