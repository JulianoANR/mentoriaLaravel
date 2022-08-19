<?php

use App\Http\Controllers\Auth\{
    RegisterController,
    LoginController
};
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Participant\Dashboard\DashboardController as ParticipantDashboardController;
use App\Http\Controllers\Organization\Dashboard\DashboardController as OrganizationDashboardController;


use Illuminate\Auth\Events\Login;

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
/*
Route::get('/', function () {
    return view('welcome');
});

GET
-O que é digitado no navegador
-Utilizado para recuperar / exibir paginas

Route::get('test', function () {
    return 'hello world';
});

Route::get('sum/{a}/{b}', function ($a, $b) {
    return $a + $b;
});

Route::get('calculator', [CalculatorController::class, 'calculatorPage']);


POST
-Utilizado para enviar
-Os dados enviados não ficam visiveis para o usuario


Route::post('sum', [CalculatorController::class, 'soma']);

Route::get('user', [UserController::class, 'index'])->name('user.index');
Route::get('user/create', [UserController::class, 'create'])->name('user.create');
Route::post('user', [UserController::class, 'store'])->name('user.store');
 */

Route::group(['as' => 'auth.'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('register', [RegisterController::class,  'create'])->name('register.create');
        Route::post('register', [RegisterController::class, 'store'])->name('register.store');
        Route::get('login', [LoginController::class, 'create'])->name('login.create');
        Route::post('login', [LoginController::class, 'store'])->name('login.store');
    });


    Route::post('logout', [LoginController::class, 'destroy'])->name('login.destroy')->middleware('auth');
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('participant/dashboard', [ParticipantDashboardController::class,  'index'])->name('participant.dashboard.index')->middleware('role:participant');

    Route::group(['prefix' => 'organization', 'as' => 'organization.', 'middleware' => 'role:organization'], function () {
        Route::get('dashboard', [OrganizationDashboardController::class, 'index'])->name('dashboard.index');

        Route::get('events', [EventController::class, 'index'])->name('events.index');

        Route::get('events/create', [EventController::class, 'create'])->name('events.create');

        Route::post('events', [EventController::class, 'store'])->name('events.store');

        Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::put('events/{event}', [EventController::class, 'update'])->name('events.update');
        Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    });
});
