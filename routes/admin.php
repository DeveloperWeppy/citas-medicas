<?php

use App\Http\Controllers\BenefitsPlanController;
use App\Http\Controllers\CategoryServiceController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ServiceController;
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
    Route::controller(PlanController::class)
    ->group(function () { 
        Route::get('/planes', 'index')->name('plane.index');
        Route::get('/planes/create', 'create')->name('plane.create');
        Route::get('/planes/obtener', 'getPlanes')->name('plane.obtener');
        Route::post('/planes/store', 'store')->name('plane.store');
        Route::get('/planes/edit/{id}', 'edit')->name('plane.edit');
        Route::get('/planes/detalle-plan/{id}', 'show')->name('plane.show');
    });
    

    //ROUTES FOR MANAGEMENT BENEFITS OF PLANES
    Route::controller(ServiceController::class)
    ->group(function () { 
        Route::get('/servicios', 'index')->name('servicios.index');
        Route::get('/servicios/obtener', 'getServicios')->name('servicios.obtener');
        Route::post('/servicios/store', 'store')->name('servicios.store');
        Route::get('/servicios/create', 'create')->name('servicios.create');
        Route::get('/servicios/edit/{id}', 'edit')->name('servicios.edit');
        Route::get('/servicios/update', 'update')->name('usuarios.update');
        Route::get('/servicios/detalle-servicio/{id}', 'show')->name('servicios.show');
    });

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

        //ROUTES FOR MANAGEMENT CATEGORYS OF SERVICES
    Route::controller(InterestsController::class)
    ->group(function () {
        Route::get('/intereses', 'index')->name('intereses.index');
        Route::post('/intereses/store', 'store')->name('intereses.store');
        Route::post('/intereses/update', 'update')->name('intereses.update');
        Route::get('/intereses/destroy/{id}', 'destroy')->name('intereses.destroy');
    });
});
