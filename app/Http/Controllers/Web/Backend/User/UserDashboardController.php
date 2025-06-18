<?php

namespace App\Http\Controllers\Web\Backend\User;

use Inertia\Inertia;
use App\Imports\SmsImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SmsFile;
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
            'gender' => 'required|string',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filePath = $file->storeAs('uploads/sms', $filename, 'public');
        }

        Excel::import(
            new SmsImport($request->message, $request->sender_id, $request->gender),
            storage_path('app/public/' . $filePath)
        );

        return back()->with('message', 'Data imported and saved to database.');
    }

    public function sendSmsStore(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|string',
            'name' => 'required|string',
            'gender' => 'required|string',
            'message' => 'required|string',
            'number' => [
                'required',
                'regex:/^01[3-9][0-9]{8}$/', // Valid BD format
                function ($attribute, $value, $fail) {
                    $allowedPrefixes = ['013', '017', '014', '018']; // Example: GP + Robi
                    $prefix = substr($value, 0, 3);
                    if (!in_array($prefix, $allowedPrefixes)) {
                        $fail("The $attribute must be from an allowed mobile operator.");
                    }
                }
            ],
        ]);
        SmsFile::create([
            'sender_id' => $request->sender_id,
            'name' => $request->name,
            'number' => $request->number,
            'gender' => $request->gender,
            'message' => $request->message
        ]);

        return back()->with('message', 'Sms Sent Successfully!');
    }


    public function senderId()
    {
        return Inertia::render('user_dashboard/SendId');
    }
    public function smsLogs()
    {
        $smsLogs = SmsFile::all();
        return Inertia::render('user_dashboard/SmsLogs',compact('smsLogs'));
    }
}
