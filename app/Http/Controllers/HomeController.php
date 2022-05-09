<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
    }

    public function search() {
        $items = Item::where('status', '1')->get();

        return view('home.search', ['items'=>$items]);
    }
}
