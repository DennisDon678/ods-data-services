<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\api\transactions;
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

        // buy tv
        Route::post('/buy_tv', [transactions::class, 'buy_tv']);

        // buy preorders
        Route::post('/buy_preorders', [transactions::class, 'buy_preorders']);
    });
});
Route::post('/paystack/webhooks', [PaystackController::class, 'webhookAction']);