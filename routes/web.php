<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BirthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\BreedingController;
use App\Http\Controllers\MarriageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotifController;

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
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('reminder', [NotifController::class, 'reminder']);

//superadmin middleware
Route::middleware(['auth', 'cekRole:superadmin'])->group( function(){
   //user route
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('editEmployee');
    Route::patch('/users/{id}/edit', [UserController::class, 'update'])->name('updateEmployee');
    Route::delete('/users/{id}/delete', [UserController::class, 'destroy']);
});

Route::middleware(['auth', 'cekRole:karyawan,superadmin'])->group(function(){
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    //notif
    Route::get('/notification', [NotifController::class, 'reminder']);
    Route::get('/notification/{id}', [NotifController::class, 'readMessage'])->name('baca_notif');

    //breeding route
    Route::get('/breeding/input', [BreedingController::class, 'index']);
    Route::post('/breeding/input', [BreedingController::class, 'store']);
    Route::get('/breeding/list', [BreedingController::class, 'show']);
    Route::get('/breeding/{id}/edit', [BreedingController::class, 'edit']);
    Route::patch('/breeding/{id}/edit', [BreedingController::class, 'update']);
    Route::delete('/breeding/list/{id}', [BreedingController::class, 'destroy']);

    //mariage route
    Route::get('/perkawinan/input', [MarriageController::class, 'index']);
    Route::post('/perkawinan/input', [MarriageController::class, 'store'])->name('inputKawin');
    Route::get('/perkawinan/list', [MarriageController::class, 'show']);
    Route::get('/perkawinan/{id}/edit', [MarriageController::class, 'edit'])->name('edit_kawin');
    Route::patch('/perkawinan/{id}/edit', [MarriageController::class, 'update']);
    Route::delete('/perkawinan/list/{id}', [MarriageController::class, 'destroy']);

    //healthiness
    Route::get('/kesehatan/input', [HealthController::class, 'create']);
    Route::post('/kesehatan/input', [HealthController::class, 'store']);
    Route::get('/kesehatan/list', [HealthController::class, 'show']);
    Route::get('/kesehatan/{id}/edit', [HealthController::class, 'edit']);
    Route::patch('/kesehatan/{id}/edit', [HealthController::class, 'update']);
    Route::delete('/kesehatan/list/{id}', [HealthController::class, 'destroy']);

    //birth
    Route::get('/kelahiran/input', [BirthController::class, 'create']);
    Route::post('/kelahiran/input', [BirthController::class, 'store']);
    Route::get('/kelahiran/list', [BirthController::class, 'show']);
});

