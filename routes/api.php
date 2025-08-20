<?php

use App\Http\Controllers\Web\Backend\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/send-sms', [ApiController::class, 'sendSmsStore'])->name('send.sms.store');