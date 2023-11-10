<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::redirect('/', '/home');


// RUTAS DE AUTH Y GUEST
Route::middleware(['guest'])->group((function () {
    Route::get('/login' ,           [LoginController::class     ,           'show'])->name('login');
    Route::post('/login',           [LoginController::class     ,           'login'])->name('user.login');

}));

// RUTAS DE EMPLEADOS
Route::middleware(['auth'])->group(function() {
    Route::post('/logout'   , [LoginController::class   ,  'logout'])->name('logout');

    Route::get('/home'      , [HomeController::class    ,   'index'])->name('home');
});

// RUTAS DE CLIENTES
Route::get('/mis-tickets', [ HomeController::class, 'index'])->name('home');

Route::middleware(['customer_auth'])->group(function() {
    // CREAT TICKET
    // LISTAR MIS TICKETS
    // VER Y CREAR COMENTARIOS
});

