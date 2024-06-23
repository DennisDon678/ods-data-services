<?php

use App\Http\Controllers\AuthController;
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
    });

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

    Route::get('/reset-password', function () {
        return view('reset-password');
    });

    Route::post('/reset-password', function () {
        return view('reset-password');
    });
});


// User Dashboard routes
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        dd(Auth::user());
    });
});
