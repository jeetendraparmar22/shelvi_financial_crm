<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $customers = DB::table('customers')->get();
        return view('dashboard', ['customers' => $customers]);
    }
}
