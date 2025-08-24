<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(){

        $totalRevenue = Payment::sum('amount');

         $monthlyData = Payment::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(amount) as total')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

        $totalUser = User::where('role', '0')->count();
        $pendingKyc = User::where('kyc_verified', 0)->where('role', '0')->count();


    return Inertia::render('admin/dashboard/AdminDashboard', compact('totalRevenue', 'totalUser', 'pendingKyc','monthlyData'));
    }
}
