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
            Route::get('/usuarios/obtener', 'getUsuarios')->name('usuarios.obtener');
            Route::get('/usuarios/create', 'create')->name('usuarios.create');
            Route::get('/usuarios/edit/{id}', 'edit')->name('usuarios.edit');
            Route::post('/usuarios/store', 'store')->name('usuarios.store');
            Route::post('/usuarios/status', 'status')->name('usuarios.status');
        });


    //ROUTES FOR MANAGEMENT PLANS
    Route::get('/planes', [PlanController::class, 'index'])->name('plane.index');

    //ROUTES FOR MANAGEMENT BENEFITS OF PLANES
    Route::get('/beneficios', [BenefitsPlanController::class, 'index'])->name('beneficios.index');

    //ROUTES FOR MANAGEMENT CATEGORYS OF SERVICES
    Route::controller(CategoryServiceController::class)
        ->group(function () {
            Route::get('/categorias', 'index')->name('categorias.index');
            Route::post('/categorias/store', 'store')->name('categorias.store');
            Route::post('/categorias/update', 'update')->name('categorias.update');
            Route::get('/categorias/destroy/{id}', 'destroy')->name('categorias.destroy');
        });


    //ROUTES FOR MANAGEMENT SPECIALITYES
    Route::controller(SpecialtyController::class)
        ->group(function () {
            Route::get('/especialidades', 'index')->name('especialidades.index');
            Route::post('/especialidades/store', 'store')->name('especialidades.store');
            Route::post('/especialidades/update', 'update')->name('especialidades.update');
            Route::get('/especialidades/destroy/{id}', 'destroy')->name('especialidades.destroy');
        });
});
