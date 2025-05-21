<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ManageBeneficiary;
use App\Http\Controllers\API\Monnify;
use App\Http\Controllers\API\PreorderController;
use App\Http\Controllers\API\transactions;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\PaystackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function(){
    Route::post('/register', [AuthController::class,'register']);
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/get_password_reset_token', [AuthController::class,'get_password_reset_token']);
    Route::get('/verify_password_reset_token', [AuthController::class,'verify_password_reset_token']);
    Route::post('/reset_password', [AuthController::class,'reset_password']);
});

Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('/',[UserController::class, 'user_account_info']);
        Route::post('/update_pin_code', [UserController::class, 'update_pin_code']);
        Route::post('/reset_password', [UserController::class, 'reset_password']);
        Route::get('/check_tag_availability', [UserController::class, 'check_tag_availability']);
        Route::post('/set_tag', [UserController::class, 'set_tag']);

        // Wallet funding
        Route::get('/wallet_funding_details', [UserController::class, 'wallet_funding_details']);
        Route::post('submit_manual_funding', [UserController::class, 'submit_manual_funding']);

        // notifications
        Route::get('/notifications', [UserController::class, 'get_user_notifications']);
        Route::get('/unread_notifications', [UserController::class, 'get_unread_user_notifications']);
        Route::post('/mark_notification_as_read', [UserController::class, 'mark_notification_as_read']);
        Route::post('/mark_all_notifications_as_read', [UserController::class, 'mark_all_notifications_as_read']);
    });

    Route::prefix('transaction')->group(function(){
        // network providers 
        Route::get('get_networks',[transactions::class, 'get_networks']);
        // buy airtime
        Route::post('/buy_airtime', [transactions::class, 'buy_airtime']);

        // Get all network plans
        Route::get('/network_plans', [transactions::class, 'network_plans']);

        // buy data
        Route::post('/buy_data', [transactions::class, 'buy_data']);

        // Get Cable Providers
        Route::get('/cable_providers', [transactions::class, 'cable_providers']);

        // Validate cable IUC
        Route::get('/validate_iuc', [transactions::class, 'validate_iuc']);

        // Cable Plans
        Route::get('/cable_plans', [transactions::class, 'cable_plans']);

        // electricity Providers
        Route::get('/electricity_providers', [transactions::class, 'electricity_providers']);

        // Validate Meter
        Route::get('/validate_meter', [transactions::class, 'validate_meter']);

        // buy electricity
        Route::post('/buy_electricity', [transactions::class, 'buy_electricity']);

        // buy tv
        Route::post('/buy_cable', [transactions::class, 'buy_cable_subscription']);

        // buy preorders
        Route::post('/buy_preorders', [transactions::class, 'buy_preorders']);

        // get all transactions
        Route::get('/all_transactions', [transactions::class, 'all_transactions']);

        // get electricity providers
        Route::get('/electricity_providers', [transactions::class, 'electricity_providers']);

        

    });

    // monnify Deposit system
    Route::prefix('deposit')->group(function(){
        Route::post('/initiate_deposit', [Monnify::class, 'initiate_deposit']);
        Route::post('/verify_deposit', [Monnify::class, 'verify_deposit']);
        Route::get('/get_banks/{reference}', [Monnify::class, 'create_bank_account']);
        Route::get('/verify_deposit', [Monnify::class, 'verify_payment']);
        Route::post('/dedicated_account', [Monnify::class, 'dedicated_account']);
        Route::get('/dedicated_account', [Monnify::class, 'get_dedicated_account']);
    });

    // preorder handler
    Route::prefix('preorder')->group(function(){
        Route::get('/', [PreorderController::class, 'providers']);
        Route::post('/submit', [PreorderController::class, 'submit_preorder']);
    });

    // become a vendor
    Route::prefix('vendor')->group(function(){
        Route::get('/', [UserController::class, 'become_vendor']);
        Route::post('/submit', [UserController::class, 'submit_vendor_request']);
    });

    // airtime2cash
    Route::prefix('airtime2cash')->group(function(){
        Route::get('/', [transactions::class, 'airtime2cash']);
        Route::post('/submit', [transactions::class, 'submit_airtime2cash']);
    });

    // referrals
    Route::prefix('referrals')->group(function(){
        Route::get('/', [UserController::class, 'referrals']);
    });

    // Beneficiary
    Route::prefix('beneficiary')->group(function(){
        Route::get('/', [ManageBeneficiary::class, 'list_beneficiaries']);
        Route::post('/add', [ManageBeneficiary::class, 'add_beneficiary']);
        Route::post('/{id}/edit', [ManageBeneficiary::class, 'edit_beneficiary']);
        Route::post('/{id}/delete', [ManageBeneficiary::class, 'delete_beneficiary']);
    });

    // announcement
    Route::prefix('announcement')->group(function(){
        Route::get('/', [\App\Http\Controllers\API\Announcement::class, 'get_announcement']);
    });
});
Route::post('/paystack/webhooks', [PaystackController::class, 'webhookAction']);