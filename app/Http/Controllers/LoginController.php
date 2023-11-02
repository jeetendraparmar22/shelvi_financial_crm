<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // update username method
    public function username()
    {
        return 'mobile_no';
    }
    // Authenticate for user
    public function authLogin(Request $request)
    {
        // Check user credential for user
        $credentials = $request->validate([
            'mobile_no' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'mobile_no' => 'Enter Valid Mobile Number or Password.',
        ])->onlyInput('mobile_no');
    }
}
