<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\Admin\AdminAuthController;
use App\Http\Controllers\Web\Backend\Admin\DashboardController;
use App\Http\Controllers\Web\Frontend\Admin\CustomerController;
use App\Http\Controllers\Web\Frontend\Admin\LandingPageController;


Route::get('admin/login', [AdminAuthController::class, 'login'])->name('adminlogin');
Route::post('admin/login', [AdminAuthController::class, 'adminLogin'])->name('admin.login');

Route::group(['middleware' => ['auth', 'admin']], function () {
   Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

   Route::get('/admin/pending/kyc', [CustomerController::class, 'pendingKYC'])->name('pending.kyc');
   Route::get('/view/kyc/{id}', [CustomerController::class, 'viewKYC'])->name('view.kyc');
   Route::post('/admin/approve/kyc/{id}', [CustomerController::class, 'approveKYC'])->name('approve.kyc');
   Route::get('/admin/customers/create', [CustomerController::class, 'createCustomer'])->name('create.customer');
   Route::post('/admin/user/store', [CustomerController::class, 'userStore'])->name('admin.user.store');
   Route::get('/admin/manage/customers', [CustomerController::class, 'manageCustomer'])->name('manage.customers');
   Route::get('/view/customer/{id}', [CustomerController::class, 'about'])->name('customer.view');
   Route::post('/update/rate/{id}', [CustomerController::class, 'updateRate'])->name('update.rate');

   // sender
   Route::get('/admin/sender', [CustomerController::class, 'sender'])->name('admin.sender');
   Route::get('/admin/sender/edit/{id}', [CustomerController::class, 'senderEdit'])->name('admin.sender.edit');
   Route::post('/admin/sender/update/{id}', [CustomerController::class, 'senderUpdate'])->name('admin.sender.update');
  

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
   Route::post('/admin/faqs/store', [LandingPageController::class, 'faqsStore'])->name('admin.faqs.store');
   Route::get('/admin/faqs/edit/{id}', [LandingPageController::class, 'faqsEdit'])->name('admin.faqs.edit');
   Route::post('/admin/faqs/update/{id}', [LandingPageController::class, 'faqsUpdate'])->name('admin.faqs.update');
   Route::delete('/admin/faqs/delete/{id}', [LandingPageController::class, 'faqsDelete'])->name('admin.faqs.delete');

   // Landing Page Blog
   Route::get('/admin/blog', [LandingPageController::class, 'blog'])->name('admin.blog');
   Route::get('/admin/blog/create', [LandingPageController::class, 'blogCreate'])->name('admin.blog.create');
   Route::post('/admin/blog/store', [LandingPageController::class, 'blogStore'])->name('admin.blog.store');
   Route::get('/admin/blog/edit/{id}', [LandingPageController::class, 'blogEdit'])->name('admin.blog.edit');
   Route::post('/admin/blog/update/{id}', [LandingPageController::class, 'blogUpdate'])->name('admin.blog.update');
   Route::delete('/admin/blog/delete/{id}', [LandingPageController::class, 'blogDelete'])->name('admin.blog.delete');
   
   // Landing Page Contact
   Route::get('/admin/contact', [LandingPageController::class, 'contact'])->name('admin.contact');
   Route::delete('/admin/blog/contact/{id}', [LandingPageController::class, 'contactDelete'])->name('admin.contact.delete');
   // Landing Page Client Says
   Route::get('/admin/client-says', [LandingPageController::class, 'clientSays'])->name('admin.client-says');
});
