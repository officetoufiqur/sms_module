<?php

namespace App\Http\Controllers\Web\Frontend\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function pendingKYC()
    {
        return Inertia::render('admin/dashboard/PendingKYC');
    }
    public function createCustomer()
    {
        return Inertia::render('admin/dashboard/CreateCustomer');
    }

    public function manageCustomer()
    {
        return Inertia::render('admin/dashboard/ManageCustomers');
    }

    public function about()
    {
        return Inertia::render('admin/dashboard/customer/About');
    }

    public function ratePlan()
    {
        return Inertia::render('admin/dashboard/customer/RatePlan');
    }

    public function tnx()
    {
        return Inertia::render('admin/dashboard/customer/Transaction');
    }
}
