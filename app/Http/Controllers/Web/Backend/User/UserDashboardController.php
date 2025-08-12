<?php

namespace App\Http\Controllers\Web\Backend\User;

use Inertia\Inertia;
use App\Models\SmsFile;
use App\Imports\SmsImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserDashboardController extends Controller
{
    public function kyc()
    {
        return Inertia::render('user_dashboard/Kyc');
    }

    public function kycStore(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string',
            'company_number' => 'required|string',
            'company_type' => 'required|string',
            'address' => 'required|string',
            'mobile' => 'required|string',
            'file_type' => 'required|string',
            'file' => 'required|file|mimes:jpg,png,jpeg,pdf,doc,docx',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filePath = $file->storeAs('uploads/kyc', $filename, 'public');
        }

        $user = Auth::user();
        $user->company_name = $request->company_name;
        $user->company_number = $request->company_number;
        $user->company_type = $request->company_type;
        $user->address = $request->address;
        $user->mobile = $request->mobile;
        $user->file_type = $request->file_type;
        $user->file = '/storage/' . $filePath;
        $user->save();

        return redirect()->route('kyc')->with('message', 'KYC Submitted successfully.');
    }
    
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
            'age' => 'nullable|string',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filePath = $file->storeAs('uploads/sms', $filename, 'public');
        }

        Excel::import(
            new SmsImport($request->message, $request->sender_id, $request->gender, $request->age),
            storage_path('app/public/' . $filePath)
        );

        return back()->with('message', 'Data imported and saved to database.');
    }

    public function sendSmsStore(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|string',
            'name' => 'nullable|string',
            'gender' => 'nullable|string',
            'age' => 'nullable|string',
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
            'age' => $request->age,
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

    public function blockUser()
    {
        $blockUser = SmsFile::where('block', 1)->get();
        return Inertia::render('user_dashboard/BlockUser',compact('blockUser'));
    }

    public function blockUserCreate()
    {
        return Inertia::render('user_dashboard/BlockUserCreate');
    }

    public function blockUserStore(Request $request)
    {
        $request->validate([
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
            'name' => $request->name,
            'age' => $request->age,
            'number' => $request->number,
            'gender' => $request->gender,
            'block' => 1
        ]);

        return back()->with('message', 'User Blocked Successfully!');
    }

    public function blockUserUpdate($id)
    {
        SmsFile::where('id', $id)->update(['block' => 0]);
        return back()->with('message', 'User Unblocked Successfully!');
    }
}
