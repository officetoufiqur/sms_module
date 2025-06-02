<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

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

Route::get('send-sms', function () {
    return Inertia::render('user_dashboard/SendSms');
})->middleware(['auth', 'verified'])->name('send-sms');

Route::get('sender_id', function () {
    return Inertia::render('user_dashboard/SendId');
})->middleware(['auth', 'verified'])->name('sender_id');

Route::get('sms_logs', function () {
    return Inertia::render('user_dashboard/SmsLogs');
})->middleware(['auth', 'verified'])->name('sms_logs');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
