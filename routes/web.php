<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BreedingController;

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

//login logout route
Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout']);

//user route
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('editEmployee');
Route::patch('/users/{id}/edit', [UserController::class, 'update'])->name('updateEmployee');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('deleteEmployee');

//data kambing route
Route::get('/input', [BreedingController::class, 'index']);
Route::post('/input', [BreedingController::class, 'store']);

// Route::resource('/users', UserController::class);