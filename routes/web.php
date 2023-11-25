<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\CustomersAuthController;

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

// ALWAYS REDIRECT TO HOME
Route::redirect('/', '/welcome');

/**
 * --------------------------------------------------------------------------------------------------------
 * CUSTOMERS ROUTES
 * --------------------------------------------------------------------------------------------------------
*/

Route::middleware(['customers_guest'])->group((function () {
    Route::view('/login',               'pages.auth.customers_login')->name('customers.view.login');
    Route::post('/login',               [ CustomersAuthController::class, 'login'])->name('customers.login');
}));

Route::middleware(['customers_auth'])->group((function () {
    Route::view('/welcome',         'pages.customers.welcome')->name('customers.welcome');
    Route::post('/logout',          [ CustomersAuthController::class, 'logout'])->name('customers.logout');
}));



/**
 * --------------------------------------------------------------------------------------------------------
 * ADMIN ROUTES
 * --------------------------------------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function() {
    Route::middleware(['guest'])->group((function () {
        Route::view('/login',       'pages.auth.admin_login')->name('admin.view.login');
        Route::post('/login',       [ AdminAuthController::class, 'login'])->name('admin.login');
    }));

    Route::middleware(['auth'])->group((function () {
        Route::view('/home',        'pages.admin.home')->name('admin.home');
        Route::view('/employees',   'pages.admin.employees')->name('admin.employees');
        Route::view('/tickets',     'pages.admin.tickets')->name('admin.tickets');

        Route::post('/logout',      [ AdminAuthController::class, 'logout'])->name('admin.logout');
    }));

});
