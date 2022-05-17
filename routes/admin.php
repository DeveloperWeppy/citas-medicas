<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    //ruta de usuarios
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios/store', [UserController::class, 'store'])->name('usuarios.store');
    Route::post('/usuarios/status', [UserController::class, 'status'])->name('usuarios.status');

    Route::get('/planes', [PlanController::class, 'index'])->name('plane.index');
});
