<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

//** Registro y envio de emails */
Route::get('/', [RegisterController::class, 'register'])->name('register');
Route::post('/', [RegisterController::class, 'store']);

//** Muestra a todos los usuarios */
Route::get('/usuarios', [RegisterController::class, 'show'])->name('show');


//* Mensaje de aviso de envio y confirmación de email */

Route::get('/mensaje', [RegisterController::class, 'mensaje'])->name('mensaje');
Route::post('/mensaje', [RegisterController::class, 'reenviar']);
Route::get('/confirmar', [RegisterController::class, 'confirmar']);
