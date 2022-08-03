<?php

use App\Http\Controllers\calculatorController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// CALCULADORA
    Route::get('calculator', [calculatorController::class, 'calculator']);

    Route::post('sum', [calculatorController::class, 'sum']);

// USUARIOS
    Route::get('users', [userController::class, 'index'])->name('users.index');
    Route::get('users/create', [userController::class, 'create'])->name('users.create');

    Route::post('users', [userController::class, 'store'])->name('users.store');