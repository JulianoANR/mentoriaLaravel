<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\UserController;
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

/* Route::get('/', function () {
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
}); */

Route::get('calculator', [CalculatorController::class, 'calculatorPage']);

/*
POST
-Utilizado para enviar
-Os dados enviados não ficam visiveis para o usuario
*/

Route::post('sum', [CalculatorController::class, 'soma']);

Route::get('user', [UserController::class, 'index']);
Route::get('user/create', [UserController::class, 'create']);
Route::post('user', [UserController::class, 'store']);
