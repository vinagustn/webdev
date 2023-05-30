<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('editEmployee');
Route::patch('/users/{id}/edit', [UserController::class, 'update'])->name('updateEmployee');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('deleteEmployee');

Route::get('/input', [DataController::class, 'create']);

// Route::resource('/users', UserController::class);