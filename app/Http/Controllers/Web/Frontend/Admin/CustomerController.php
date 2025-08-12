<?php

namespace App\Http\Controllers\Web\Frontend\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

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

    public function ratePlan($id)
    {
        $user = User::find($id);
        return Inertia::render('admin/dashboard/customer/RatePlan', compact('user'));
    }

    public function tnx()
    {
        return Inertia::render('admin/dashboard/customer/Transaction');
    }
}
