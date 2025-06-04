<?php

use App\Http\Controllers\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('admin/login', function () {
    return Inertia::render('admin/auth/AdminLogin');
})->name('admin.login');

Route::post('admin/login', [AdminAuthController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin/pending/kyc', function () {
   return Inertia::render('admin/dashboard/PendingKYC');
})->name('pending.kyc');

Route::get('/admin/create/customer', function () {
   return Inertia::render('admin/dashboard/CreateCustomer');
})->name('create.customer');

Route::get('/admin/manage/customers', function () {
   return Inertia::render('admin/dashboard/ManageCustomers');
})->name('manage.customers');

Route::get('/admin/manage/customers/{id}', function () {
   return Inertia::render('admin/dashboard/customer/CustomerDetails');
})->name('customer.details');




Route::get('admin/dashboard', function () {
   return Inertia::render('admin/dashboard/AdminDashboard');
})->name('admin.dashboard');

