<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
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
            ->where('role', '=', 'employer')
            ->count('id');

        $totalInactiveUsers = DB::table('users')
            ->where('status', '=', 0)
            ->count('id');

        return view('home', compact('totalActiveAdmins',
            'totalActiveManagers', 'totalActiveTrainees', 'totalActiveEmployers', 'totalInactiveUsers'));
    }
}
