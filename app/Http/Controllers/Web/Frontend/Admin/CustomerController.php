<?php

namespace App\Http\Controllers\Web\Frontend\Admin;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Sender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\ApprovedNotification;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function pendingKYC()
    {
        $users = User::where('kyc_verified', 0)->where('role', '0')->get();
        return Inertia::render('admin/dashboard/PendingKYC', compact('users'));
    }

    public function viewKYC($id)
    {
        $user = User::find($id);
        return Inertia::render('admin/dashboard/ViewKYC', compact('user'));
    }

    public function approveKYC(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('pending.kyc')->with('error', 'User not found.');
        }

        $user->kyc_verified = 1;
        $user->musking = $request->input('musking');
        $user->non_musking = $request->input('non_musking');
        $user->save();

        return redirect()->route('pending.kyc')->with('message', 'KYC Approved successfully.');
    }


    public function createCustomer()
    {
        return Inertia::render('admin/dashboard/CreateCustomer');
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'company_number' => 'required|string|max:255',
            'company_type' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'file_type' => 'required|string|max:255',
            'file' => 'required|file|max:2048|mimetypes:image/jpeg,image/png,image/gif',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filePath = $file->storeAs('uploads/kyc', $filename, 'public');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'company_name' => $request->company_name,
            'company_number' => $request->company_number,
            'company_type' => $request->company_type,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'file_type' => $request->file_type,
            'file' => '/storage/' . $filePath,
        ]);

        return redirect()->route('manage.customers')->with('message', 'Customer created successfully.');
    }

    public function manageCustomer()
    {
        $users = User::where('role', '0')->get();
        return Inertia::render('admin/dashboard/ManageCustomers', compact('users'));
    }

    public function about($id)
    {
        $user = User::find($id);
        return Inertia::render('admin/dashboard/customer/About', compact('user'));
    }

    public function updateRate(Request $request, $id)
    {
        $user = User::find($id);

        $user->musking = $request->input('musking');
        $user->non_musking = $request->input('non_musking');

        $user->save();
        return redirect()->back()->with('message', 'Rate updated successfully.');
    }

    public function sender()
    {
        $senders = Sender::all();

        return Inertia::render('admin/dashboard/SenderId/Index', compact('senders'));
    }

    public function senderEdit($id)
    {
        $sender = Sender::find($id);

        return Inertia::render('admin/dashboard/SenderId/Edit', compact('sender'));
    }

    public function senderUpdate(Request $request, $id)
    {
        $sender = Sender::find($id);

        $sender->sender_id = $request->input('sender_id');
        $sender->type = $request->input('type');
        $sender->status = $request->input('status');

        $sender->save();

        // send notification
        $user = User::find($sender->user_id);
        $status = $request->input('status');
        $message = 'Sender Id Approved';
        $user->notify(new ApprovedNotification($message, $status));

        return redirect()->route('admin.sender')->with('message', 'Sender ID updated successfully.');
    }

    public function markAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect()->route('sender_id');
    }
}
