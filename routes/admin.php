<?php

use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('admin/login', function () {
    return Inertia::render('admin/auth/AdminLogin');
})->name('admin.login');

Route::post('admin/login', [AdminAuthController::class, 'adminLogin'])->name('admin.login');

Route::get('admin/dashboard', function () {
   return Inertia::render('admin/dashboard/AdminDashboard');
})->name('admin.dashboard');

