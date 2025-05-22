<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealerCaseController;
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

    // Finance routes
    Route::post('search-application-data', [CustomerController::class, 'searchApplicationByFinance'])->name('search-application-data');

    // Customer Routes
    Route::resource('customers', CustomerController::class);

    Route::post('search-customer', [CustomerController::class, 'searchCustomer']);
    Route::get('/generate-pdf', [CustomerController::class, 'generatePDF'])->name('generate-pdf');
    Route::get('/update-transfer-status/{id}', [CustomerController::class, 'updateTransferStatus']);

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
    Route::get('loan-analytic-data/{year?}', [DashboardController::class, 'loanAnalyticData']);
    Route::get('loan-application-data', [DashboardController::class, 'loanApplicationData']);

    // Loan application with status
    Route::post('application-list-with-status', [DashboardController::class, 'loanApplicationListWithStatus']);

    // Dealer case details 
    Route::get('dealer-case', [DealerCaseController::class, 'index'])->name('dealer-case');
    Route::get('dealer-case-ajax', [DealerCaseController::class, 'dealerCaseListAjax'])->name('dealer-case-ajax');

    Route::get('pdd_approve/{id}', [DealerCaseController::class, 'pddApprove']);

    // Payload Route
    Route::get('payload', [CustomerController::class, 'payload']);
    Route::post('payload-data', [CustomerController::class, 'payloadData'])->name('payload-data');
    Route::get('generate-payload-pdf', [CustomerController::class, 'generatePayloadPDF'])->name('generate-payload-pdf');
    Route::post('customers/{customer}', [CustomerController::class, 'destroyLoanApplication'])->name('customers.destroy');

    // Update commision
    Route::post('update-commission', [CustomerController::class, 'updateCommission'])->name('update-commission');
    Route::post('update-payment-status', [CustomerController::class, 'updatePaymentStatus'])->name('update-payment-status');
});
