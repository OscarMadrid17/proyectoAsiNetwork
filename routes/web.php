<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;

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
Route::redirect('/', '/admin/home');

// RUTAS DE AUTH Y GUEST
Route::middleware(['guest'])->group((function () {
    Route::view('/login', 'pages.login')->name('login');
    Route::post('/login', [ AuthController::class, 'login'])->name('api.login');
}));

// EMPLOYEES ROUTES

Route::middleware(['auth'])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::view('/home',                'pages.employees.home')->name('home');
        // Route::view('/tickets',             'pages.employees.tickets')->name('admin.tickets');

        Route::get('/tickets',              [TicketController::class,   'showCustomersTicket'])->name('admin.tickets');

        Route::view('/employees',           'pages.employees.employees')->name('admin.employees');

        Route::post('/logout',              [ AuthController::class, 'admin_logout'])->name('admin.logout');
    });
});

// CUSTOMERS ROUTES
// Welcome Route is public since here is where JS checks if backend sends a Customer JWT and stores it at browsers localstorage
Route::view('/welcome',                     'pages.customers.welcome')->name('welcome');

Route::middleware(['customers_auth'])->group(function() {
    Route::view('/tickets',                 'pages.customers.tickets')->name('tickets');

    Route::post('/logout',                  [ AuthController::class, 'logout'])->name('logout');
});

Route::get('/createTicket', [TicketController::class,   'create'])->name('ticket.create');

Route::post('/createTicket', [TicketController::class,   'store'])->name('ticket.store');

Route::get('/tickets', [TicketController::class,   'showMyTicket'])->name('tickets.customers');
