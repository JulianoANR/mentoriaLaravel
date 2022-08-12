<?php

use App\Http\Controllers\Auth\{loginController, registerController};
use App\Http\Controllers\Participant\Dashboard\dashboardController as participanteDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organization\{
    Dashboard\dashboardController as organizationDashboardController,
    Event\eventController,
    Event\eventPresenceController,
    Event\eventSubscriptionController
};

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
    
    // GRUPO DE ROTAS QUE UTILIZAM O MESMO PREFIXO, AS E MIDDLEWARE
    Route::group(['prefix' => 'organization', 'as' => 'organization.', 'middleware' => 'role:organization'], function(){
        // INICIO ORGANIZAÇÃO
            Route::get('dashboard', [organizationDashboardController::class, 'index'])->name('dashboard.index');
        
        // INICIO DOS EVENTOS
            Route::get('events', [eventController::class, 'index'])->name('events.index');
    
        // CRUD DOS EVENTOS
            Route::post('events/{event}/subscriptions', [eventSubscriptionController::class, 'store'])->name('events.subscriptions.store');
            Route::delete('events/{event}/subscriptions/{user}', [eventSubscriptionController::class, 'destroy'])->name('events.subscriptions.destroy');
            Route::post('events/{event}/presences/{user}', eventPresenceController::class)->name('events.presences');
            Route::resource('events', eventController::class);
    });
});