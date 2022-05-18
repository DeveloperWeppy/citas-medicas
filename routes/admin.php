<?php

use App\Http\Controllers\BenefitsPlanController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    //RUTAS DE GESTIÓN DE USUARIOS
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios/store', [UserController::class, 'store'])->name('usuarios.store');
    Route::post('/usuarios/status', [UserController::class, 'status'])->name('usuarios.status');

    //RUTAS DE GESTIÓN DE PLANES O PAQUETES
    Route::get('/planes', [PlanController::class, 'index'])->name('plane.index');

    //RUTAS DE GESTIÓN DE BENEFICIOS DE PLANES
    Route::get('/beneficios', [BenefitsPlanController::class, 'index'])->name('beneficios.index');
});
