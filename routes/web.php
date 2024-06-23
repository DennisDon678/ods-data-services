<?php

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

Route::get('/auth/sign-in', function () {
    return view('sign-in');
});

// sign-up
Route::get('/auth/sign-up', function () {
    return view('sign-up');
});

Route::post('/auth/sign-up', function () {
    return view('sign-up');
});