<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\BajaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('activos', ActivoController::class);
//Route::resource('bajas', BajaController::class);
Route::get('bajas/create/{activo_id}', [BajaController::class, 'create'])->name('bajas.create');
Route::post('bajas', [BajaController::class, 'store'])->name('bajas.store');
