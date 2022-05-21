<?php

use App\Http\Controllers\BenefitsPlanController;
use App\Http\Controllers\CategoryServiceController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UserController;
use App\Models\CategoryService;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    //ROUTES FOR MANAGEMENT USERS
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/store', [UserController::class, 'store'])->name('usuarios.store');
    Route::post('/usuarios/status', [UserController::class, 'status'])->name('usuarios.status');

    //ROUTES FOR MANAGEMENT PLANS
    Route::get('/planes', [PlanController::class, 'index'])->name('plane.index');

    //ROUTES FOR MANAGEMENT BENEFITS OF PLANES
    Route::get('/beneficios', [BenefitsPlanController::class, 'index'])->name('beneficios.index');

    //ROUTES FOR MANAGEMENT CATEGORYS OF SERVICES
    Route::get('/categorias', [CategoryServiceController::class, 'index'])->name('categorias.index');

    //ROUTES FOR MANAGEMENT SPECIALITYES
    Route::get('/especialidades', [SpecialtyController::class, 'index'])->name('especialidades.index');
});
