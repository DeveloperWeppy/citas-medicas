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
    Route::controller(UserController::class)
    ->group(function () {
        Route::get('/usuarios', 'index')->name('usuarios.index');
        Route::get('/usuarios/create', 'create')->name('usuarios.create');
        Route::post('/usuarios/store', 'store')->name('usuarios.store');
        Route::post('/usuarios/status', 'status')->name('usuarios.status');
    });
    

    //ROUTES FOR MANAGEMENT PLANS
    Route::get('/planes', [PlanController::class, 'index'])->name('plane.index');

    //ROUTES FOR MANAGEMENT BENEFITS OF PLANES
    Route::get('/beneficios', [BenefitsPlanController::class, 'index'])->name('beneficios.index');

    //ROUTES FOR MANAGEMENT CATEGORYS OF SERVICES
    Route::get('/categorias', [CategoryServiceController::class, 'index'])->name('categorias.index');
    Route::post('/categorias/store', [CategoryServiceController::class, 'store'])->name('categorias.store');

    //ROUTES FOR MANAGEMENT SPECIALITYES
    Route::controller(SpecialtyController::class)
    ->group(function () {
        Route::get('/especialidades', 'index')->name('especialidades.index');
        Route::get('/especialidades/get', 'getEspecialidades')->name('especialidades.getEspecialidades');
        Route::post('/especialidades/store', 'store')->name('especialidades.store');
        Route::post('/especialidades/update', 'update')->name('especialidades.update');
        Route::get('/especialidades/destroy/{id}', 'destroy')->name('especialidades.destroy');
    });
});
