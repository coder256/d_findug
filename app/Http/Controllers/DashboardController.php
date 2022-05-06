<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $totalActiveAdmins = DB::table('users')
            ->where('status', '=', 1)
            ->where('role', '=', 'admin')
            ->count('id');

        $totalActiveManagers = DB::table('users')
            ->where('status', '=', 1)
            ->where('role', '=', 'manager')
            ->count('id');

        $totalActiveTrainees = DB::table('users')
            ->where('status', '=', 1)
            ->where('role', '=', 'intern')
            ->count('id');

        $totalActiveEmployers = DB::table('users')
            ->where('status', '=', 1)
            ->count('id');

        $totalInactiveUsers = User::where('status', '=', 0)
            ->count('id');

        return view('home', compact('totalActiveAdmins',
            'totalActiveManagers', 'totalActiveTrainees', 'totalActiveEmployers', 'totalInactiveUsers'));
    }
}
