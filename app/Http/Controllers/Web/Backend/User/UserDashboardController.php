<?php

namespace App\Http\Controllers\Web\Backend\User;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }

    public function recharge()
    {
        return Inertia::render('user_dashboard/Recharge');
    }
    public function transections()
    {
        return Inertia::render('user_dashboard/Transections');
    }
    public function ratePlan()
    {
        return Inertia::render('user_dashboard/RatePlan');
    }
    
    public function sendSms()
    {
        return Inertia::render('user_dashboard/SendSms');
    }
    public function sendSmsFile()
    {
        return Inertia::render('user_dashboard/SendSmsFile');
    }
    public function senderId()
    {
        return Inertia::render('user_dashboard/SendId');
    }
    public function smsLogs()
    {
        return Inertia::render('user_dashboard/SmsLogs');
    }

}
