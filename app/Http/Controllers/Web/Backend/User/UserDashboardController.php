<?php

namespace App\Http\Controllers\Web\Backend\User;

use Inertia\Inertia;
use App\Imports\SmsImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

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

   public function import(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:xlsx,csv',
        'message' => 'required|string',
        'sender_id' => 'required|string',
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $filePath = $file->storeAs('uploads/sms', $filename, 'public');
    }

    Excel::import(
        new SmsImport($request->message, $request->sender_id),
        storage_path('app/public/' . $filePath)
    );

    return back()->with('message', 'Data imported and saved to database.');
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
