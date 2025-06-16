<?php

use App\Http\Controllers\Web\Backend\Admin\AdminAuthController;
use App\Http\Controllers\Web\Frontend\Admin\CustomerController;
use App\Http\Controllers\Web\Frontend\Admin\LandingPageController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('admin/dashboard', function () {
   return Inertia::render('admin/dashboard/AdminDashboard');
})->name('admin.dashboard');

Route::get('admin/login', [AdminAuthController::class, 'login'])->name('adminlogin');
Route::post('admin/login', [AdminAuthController::class, 'adminLogin'])->name('admin.login');

Route::get('/admin/pending/kyc', [CustomerController::class, 'pendingKYC'])->name('pending.kyc');
Route::get('/admin/create/customer', [CustomerController::class, 'create'])->name('create.customer');
Route::get('/admin/manage/customers', [CustomerController::class, 'manageCustomer'])->name('manage.customers');
Route::get('/customers/about', [CustomerController::class, 'about'])->name('customer.about');
Route::get('/customers/rate/plan', [CustomerController::class, 'ratePlan'])->name('customer.rate.plan');
Route::get('/customers/tnx', [CustomerController::class, 'tnx'])->name('customer.tnx');

// Landing Page Banner
Route::get('/admin/banner', [LandingPageController::class, 'banner'])->name('admin.banner');
Route::get('/admin/banner/edit/{id}', [LandingPageController::class, 'bannerEdit'])->name('admin.banner.edit');
Route::post('/admin/banner/update/{id}', [LandingPageController::class, 'bannerUpdate'])->name('admin.banner.update');

// Landing Page About
Route::get('/admin/about', [LandingPageController::class, 'about'])->name('admin.about');
Route::get('/admin/about/edit', [LandingPageController::class, 'aboutEdit'])->name('admin.about.edit');
Route::post('/admin/about/update', [LandingPageController::class, 'aboutUpdate'])->name('admin.about.update');

// Landing Page Pricing
Route::get('/admin/pricing', [LandingPageController::class, 'pricing'])->name('admin.pricing');
Route::get('/admin/pricing/create', [LandingPageController::class, 'pricingCreate'])->name('admin.pricing.create');
Route::post('/admin/pricing/store', [LandingPageController::class, 'pricingStore'])->name('admin.pricing.store');
Route::get('/admin/pricing/edit/{id}', [LandingPageController::class, 'pricingEdit'])->name('admin.pricing.edit');
Route::post('/admin/pricing/update/{id}', [LandingPageController::class, 'pricingUpdate'])->name('admin.pricing.update');
Route::delete('/admin/pricing/delete/{id}', [LandingPageController::class, 'pricingDestroy'])->name('admin.pricing.delete');

// Landing Page faqs Sections
Route::get('/admin/faqs', [LandingPageController::class, 'faqs'])->name('admin.faqs');
Route::get('/admin/faqs/create', [LandingPageController::class, 'faqsCreate'])->name('admin.faqs.create');
Route::get('/admin/faqs/edit/{id}', [LandingPageController::class, 'faqsEdit'])->name('admin.faqs.edit');
Route::post('/admin/faqs/update/{id}', [LandingPageController::class, 'faqsUpdate'])->name('admin.faqs.update');

// Landing Page Blog
Route::get('/admin/blog', [LandingPageController::class, 'blog'])->name('admin.blog');
Route::get('/admin/blog/create', [LandingPageController::class, 'blogCreate'])->name('admin.blog.create');
Route::get('/admin/blog/edit/{id}', [LandingPageController::class, 'blogEdit'])->name('admin.blog.edit');
Route::post('/admin/blog/update/{id}', [LandingPageController::class, 'blogUpdate'])->name('admin.blog.update');

// Landing Page Contact
Route::get('/admin/contact', [LandingPageController::class, 'contact'])->name('admin.contact');
// Landing Page Client Says
Route::get('/admin/client-says', [LandingPageController::class, 'clientSays'])->name('admin.client-says');

