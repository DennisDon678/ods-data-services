<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy-policy', function () {
    return view('privacy');
});

Route::get('/account-deletion-policy', function () {
    return view('account');
});

Route::prefix('/auth')->group(function () {
    Route::get('/sign-in', function () {
        return view('sign-in');
    })->name('login');

    Route::get('/sign-up', function () {
        return view('sign-up');
    });

    Route::post('/sign-up', [AuthController::class, 'sign_up']);
    Route::post('sign-in', [AuthController::class, 'sign_in']);

    Route::get('/sign-out', function () {
        return view('sign-out');
    });

    Route::get('/forgot-password', function () {
        return view('forgot-password');
    });

    Route::post('/reset-password', [AuthController::class, 'reset_password']);
    Route::get('/logout',[AuthController::class, 'logout']);
});


// User Dashboard routes
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('users.dashboard');
    });
    Route::get('/check_pin_code', [AuthController::class, 'check_user_pin']);

    // notifications
    Route::get('/notifications',[UserDashboardController::class,'notifications']);


    // Ajax requests for data
    Route::get('/data/get_plan_type',[DataController::class,'get_plan_types']);
    Route::get('data/get_data_plans',[DataController::class,'get_data_plans']);
    Route::get('/data/get_plan',[DataController::class,'get_plan']);
    Route::post('/data/buy_data',[DataController::class,'buy_data']);
    Route::post('/fund-wallet/create',[UserDashboardController::class,'create_deposit']);

    // Transaction
    Route::get('/transactions',[UserDashboardController::class,'transactions']);
    Route::get('/transaction/view/{id}',[UserDashboardController::class,'view_transaction']);

    // Profile management
    Route::get('/profile',[UserDashboardController::class,'profile']);
    Route::post('/change_password',[UserDashboardController::class,'change_password']);
    Route::post('/change_pin',[UserDashboardController::class,'change_pin']);


    // Generate bank
    Route::get('/generate_bank',[UserDashboardController::class,'generate_bank']);
});
