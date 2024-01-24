<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\CustomersAuthController;

use App\Http\Controllers\Employees\AdminEmployeesController;
use App\Http\Controllers\Tickets\AdminTicketsController;
use App\Http\Controllers\Tickets\CustomersTicketsController;

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
    Route::view('/welcome',             'pages.customers.welcome')->name('customers.welcome');

    Route::get('/tickets',              [ CustomersTicketsController::class, 'tickets'])->name('customers.tickets');
    Route::get('/tickets/create',       [ CustomersTicketsController::class, 'tickets_create'])->name('customers.tickets.create');
    Route::get('/tickets/{id}',         [ CustomersTicketsController::class, 'tickets_preview'])->name('customers.tickets.preview');
    Route::get('/tickets/{id}/preview', [ CustomersTicketsController::class, 'tickets_file_preview'])->name('customers.tickets.file.preview');
    Route::post('/tickets/create',      [ CustomersTicketsController::class, 'tickets_store'])->name('customers.tickets.store');
    Route::post('/tickets/comment',     [ CustomersTicketsController::class, 'tickets_comment'])->name('customers.tickets.comment');

    Route::post('/logout',              [ CustomersAuthController::class, 'logout'])->name('customers.logout');
}));



/**
 * --------------------------------------------------------------------------------------------------------
 * ADMIN ROUTES
 * --------------------------------------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function() {
    Route::middleware(['guest'])->group((function () {
        Route::view('/login',               'pages.auth.admin_login')->name('admin.view.login');
        Route::post('/login',               [ AdminAuthController::class, 'login'])->name('admin.login');
    }));

    Route::middleware(['auth'])->group((function () {
        Route::view('/home',                'pages.admin.home')->name('admin.home');

        Route::get('/tickets',              [ AdminTicketsController::class, 'tickets'])->name('admin.tickets');
        Route::get('/tickets/{id}',         [ AdminTicketsController::class, 'tickets_preview'])->name('admin.tickets.preview');
        Route::get('/tickets/{id}/preview', [ AdminTicketsController::class, 'tickets_file_preview'])->name('admin.tickets.file.preview');
        Route::post('/tickets/status',      [ AdminTicketsController::class, 'tickets_status'])->name('admin.tickets.status');
        Route::post('/tickets/comment',     [ AdminTicketsController::class, 'tickets_comment'])->name('admin.tickets.comment');

        Route::get('/employees',            [ AdminEmployeesController::class, 'employees'])->name('admin.employees');
        Route::get('/employees/create',     [ AdminEmployeesController::class, 'employees_create'])->name('admin.employees.create');
        Route::post('/employees/create',    [ AdminEmployeesController::class, 'employees_store'])->name('admin.employees.store');

        Route::post('/logout',      [ AdminAuthController::class, 'logout'])->name('admin.logout');
    }));
});

