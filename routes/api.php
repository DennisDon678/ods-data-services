<?php

use App\Http\Controllers\API\AuthController;
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

});
Route::post('/paystack/webhooks', [PaystackController::class, 'webhookAction']);