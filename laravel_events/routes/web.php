<?php

use App\Http\Controllers\Auth\{loginController, registerController};
use App\Http\Controllers\Participant\Dashboard\dashboardController as participanteDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organization\Dashboard\dashboardController as organizationDashboardController;

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
// GRUPO DE ROTAS QUE COMEÇAM COM AUTH
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

// GRUPO DE ROTAS QUE UTILIZAM O MIDDLEWARE AUTH    
Route::group(['middleware' => 'auth'], function(){
    // INICIO PARTICIPANTE
        Route::get('participant/dashboard', [participanteDashboardController::class, 'index'])->name('participant.dashboard.index')->middleware('role:participant');
    // INICIO ORGANIZAÇÃO
        Route::get('organization/dashboard', [organizationDashboardController::class, 'index'])->name('organization.dashboard.index')->middleware('role:organization'); 
});