<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //
    public function index()
    {
        $customers = DB::table('customers')->where('user_id',Auth::user()->id)->get();
        return view('dashboard', ['customers' => $customers]);
    }
}
