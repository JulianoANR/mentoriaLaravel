<?php

use App\Http\Controllers\Auth\{loginController, registerController};
use App\Http\Controllers\Participant\Dashboard\dashboardController;
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
// GRUPO DE ROTAS
    Route::group(['as' => 'auth.'], function(){
        Route::group(['middleware' => 'guest'], function(){
            // REGISTRO
                Route::get('register', [registerController::class, 'create'])->name('register.create');
                Route::post('register', [registerController::class, 'store'])->name('register.store');
            // END REGISTRO
            
            // LOGIN
                Route::get('login', [loginController::class, 'create'])->name('login.create');
                Route::post('login', [loginController::class, 'store'])->name('login.store');
            // END LOGIN
        });

    Route::post('logout', [loginController::class, 'destroy'])->name('login.destroy')->middleware('auth');
    });

// INICIO
    Route::get('participant/dashboard', [dashboardController::class, 'index'])->name('participant.dashboard.index')->middleware('auth');