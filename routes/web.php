<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\UserDashboardController;
use App\Models\Admin;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

Route::get('/developer/run/migrations', function () {
    Artisan::call('migrate');
    return 'All migrations run successfully';
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

    Route::get('admin', function () {
        return view('admin.login');
    })->name('admin_login');

    Route::post('/admin-sign-in',[AuthController::class, 'admin_sign_in']);
});


// User Dashboard routes
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('users.dashboard');
    });
    Route::get('/check_pin_code', [AuthController::class, 'check_user_pin']);

    // notifications
    Route::get('/notifications',[UserDashboardController::class,'notifications']);
    Route::get('/contact',[UserDashboardController::class, 'contact']);
    Route::get('/referrals', [UserDashboardController::class, 'referrals']);

    // Services routes
    Route::get('/buy-mobile-data',[UserDashboardController::class, 'buy_mobile_data']);
    Route::get('/buy-airtime',[UserDashboardController::class, 'buy_airtime']);
    Route::get('/buy-cable-subscription',[UserDashboardController::class,'buy_cable_subscription']);
    Route::get('/buy-electricity',[UserDashboardController::class,'buy_electricity']);
    Route::get('/preorder-data',[UserDashboardController::class, 'preorder_data']);


    // Ajax requests for data
    Route::get('/data/get_plan_type',[DataController::class,'get_plan_types']);
    Route::get('data/get_data_plans',[DataController::class,'get_data_plans']);
    Route::get('/data/get_plan',[DataController::class,'get_plan']);
    Route::post('/data/buy_data',[DataController::class,'buy_data']);
    Route::get('/get_preorders',[DataController::class,'get_preorders']);
    Route::get('/get_preorders_details',[DataController::class,'get_preorders_details']);
    Route::post('/submit_preorder',[DataController::class,'submit_preorders']);

    // AJAX for Airtime
    Route::post('/airtime/buy_airtime',[DataController::class,'buy_airtime']);

    // AJAX for TV
    Route::get('/tv/get_plans',[TvController::class,'get_plans']);
    Route::get('/tv/get_plan_info',[TvController::class,'get_plan_info']);


    // Wallets AJAX
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

    // Airtime to cash
    Route::get('/a-to-c',[UserDashboardController::class,'a_to_cash']);
    Route::get('/airtime-to-cash', [UserDashboardController::class,'airtime_to_cash']);
    Route::post('/airtime_to_cash_convert', [UserDashboardController::class,'airtime_to_cash_convert']);

    // Vendors routes
    Route::get('/become-a-vendor', [UserDashboardController::class,'become_a_vendor']);
    Route::get('/pay-vendor-fee',[UserDashboardController::class,'pay_vendor_fee']);
});


// Admin Management Panel
Route::get('create_admin', function () {
    Admin::create([
        'password' => password_hash('123456789',PASSWORD_DEFAULT)
    ]);

    dd('Admin Created Successfully');
});

Route::get('/admins', function () {
    return redirect('/auth/admin');
});

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard',[AdminController::class, 'admin_dashboard']);
    // User Management
    Route::get('/users',[AdminController::class, 'users']);
    Route::get('/user/view',[AdminController::class, 'view_user']);
    Route::post('/user/credit',[AdminController::class, 'credit_user']);
    Route::post('/user/debit',[AdminController::class, 'debit_user']);
    Route::post('/user/message',[AdminController::class, 'message_user']);
    Route::get('/user/delete',[AdminController::class, 'delete_user']);

    // Network management
    Route::get('/networks',[AdminController::class, 'networks']);
    Route::post('/network/edit',[AdminController::class, 'edit_network']);
    Route::get('/network/delete',[AdminController::class, 'delete_network']);
    Route::post('/network/add',[AdminController::class, 'add_network']);

    // Data types management
    Route::get('/data-types',[AdminController::class, 'data_types']);
    Route::post('/data-type/edit',[AdminController::class, 'edit_data_type']);
    Route::get('/data-type/delete',[AdminController::class, 'delete_data_type']);
    Route::post('/data-type/add',[AdminController::class, 'add_data_type']);
    Route::get('/data-type/status',[AdminController::class, 'status']);

    // Data plan management
    Route::get('/data-plans',[AdminController::class, 'data_plans']);
    Route::post('/data-plan/edit',[AdminController::class, 'edit_data_plan']);
    Route::get('/data-plan/delete',[AdminController::class, 'delete_data_plan']);
    Route::post('/data-plan/add',[AdminController::class, 'add_data_plan']);
    Route::get('/data/get_plan_type', [DataController::class, 'get_plan_types']);

    // Cable list management
    Route::get('/cables',[AdminController::class, 'cable_list']);
    Route::get('/cable/edit',[AdminController::class, 'edit_cable_list']);
    Route::get('/cable/delete',[AdminController::class, 'delete_cable_list']);
    Route::post('/cable/add',[AdminController::class, 'add_cable_list']);

    // Cable plan management
    Route::get('/cable-plans',[AdminController::class, 'cable_plans']);
    Route::post('/cable-plan/edit',[AdminController::class, 'edit_cable_plan']);
    Route::get('/cable-plan/delete',[AdminController::class, 'delete_cable_plan']);
    Route::post('/cable-plan/add',[AdminController::class, 'add_cable_plan']);

    // Preorder management
    Route::get('/preorders',[AdminController::class, 'preorders']);
    Route::get('/preorder/all',[AdminController::class, 'all_preorder']);
    Route::get('/preorder/approve',[AdminController::class, 'approve_preorder']);
    Route::post('/preorder/deny',[AdminController::class, 'deny_preorder']);
    Route::get('/preorder/delete',[AdminController::class, 'delete_preorder']);
    Route::post('/preorder/add',[AdminController::class, 'add_preorder']);
    Route::post('/preorder/edit',[AdminController::class, 'edit_preorder']);

    // Pull Data From API
    Route::get('/pull_mtn_sme',[AdminController::class, 'pull_mtn_sme']);
    Route::get('/mtn_corporate',[AdminController::class,'mtn_corporate']);
    Route::get('/mtn_gifting',[AdminController::class,'mtn_gifting']);
    Route::get('/mtn_awoof',[AdminController::class, 'mtn_awoof']);
    Route::get('/mtn_coupon',[AdminController::class, 'mtn_coupon']);

    Route::get('/glo_corporate',[AdminController::class,'glo_corporate']);
    Route::get('/glo_gifting',[AdminController::class,'glo_gifting']);

    Route::get('/airtel_gifting',[AdminController::class, 'airtel_gifting']);
    Route::get('/airtel_corporate',[AdminController::class, 'airtel_corporate']);

    Route::get('/mobile_gifting',[AdminController::class, 'mobile_gifting']);
    Route::get('/mobile_corporate',[AdminController::class, 'mobile_corporate']);

    // Profits management
    Route::get('/profits',[AdminController::class, 'profits']);
    Route::post('/profit/edit',[AdminController::class, 'edit_profit']);

    // airtime to cash
    Route::get('/airtime_to_cash',[AdminController::class, 'airtime_to_cash']);
    Route::get('/airtime_to_cash/view',[AdminController::class, 'view_airtime_to_cash']);
    Route::get('/airtime_to_cash/approve',[AdminController::class, 'approve_airtime_to_cash']);
    Route::get('/airtime_to_cash/reject',[AdminController::class, 'reject_airtime_to_cash']);

    //config
    Route::get('/config/airtime_to_cash',[AdminController::class, 'config_airtime_to_cash']);
    Route::post('/config/airtime_to_cash',[AdminController::class, 'update_config_airtime_to_cash']);
    Route::get('/config/vendors',[AdminController::class, 'config_vendors']);
    Route::post('/config/vendors',[AdminController::class, 'update_config_vendors']);
});

Route::post('monify/webhook',[AppController::class,'monify_webhook']);