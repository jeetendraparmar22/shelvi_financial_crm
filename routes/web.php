<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// Auth Routes
Route::post('/login', [LoginController::class, 'authLogin'])->name('login');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// User routes
Route::get('user-form', [UserController::class, 'userForm'])->name('user-form');
Route::get('user-list', [UserController::class, 'userList'])->name('user-list');
Route::get('user-register', [UserController::class, 'userRegisterForm'])->name('user-register');
Route::post('register', [UserController::class, 'userRegistration'])->name('register');
