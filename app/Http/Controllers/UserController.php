<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show User form
    public function userForm()
    {
        return view('user-form');
    }

    // Show user list
    public function userList()
    {
        return view('user-list');
    }

    // Registration form
    public function userRegisterForm()
    {
        return view('user-register');
    }

    // Register user
    public function userRegistration(Request $request)
    {
        return "done";
    }
}
