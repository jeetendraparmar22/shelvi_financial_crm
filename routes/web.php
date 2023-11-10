<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VillageController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login', function () {
    return view('login');
})->name('/');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Use the '/' to specify the URL you want to redirect to
})->name('logout');

// Auth Routes
Route::post('/login', [LoginController::class, 'authLogin'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User routes
    Route::resource('users', UserController::class);

    // Customer Routes
    Route::resource('customers', CustomerController::class);
    

    // Coutry list
    Route::get('countries', [CountryController::class, 'countryList']);

    // state List
    Route::get('states', [StateController::class, 'stateList']);
    Route::post('add-state', [StateController::class, 'addState']);

    // City List
    Route::get('cities', [CityController::class, 'cityList']);
    Route::post('add-city', [CityController::class, 'addCity']);

    // Village List
    Route::get('villages', [VillageController::class, 'villageList']);
    Route::post('add-village', [VillageController::class, 'addVillage']);

    // Loan analytic data
    Route::get('loan-analytic-data', [DashboardController::class, 'loanAnalyticData']);
});
