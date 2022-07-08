<?php

use App\Http\Controllers\BenefitsPlanController;
use App\Http\Controllers\CategoryServiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\MembersClientController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RedeemedServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UserController;
use App\Models\CategoryService;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['middleware' => ['auth']], function () {
    Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'inicio'])->name('inicio.index');
    //ROUTES FOR MANAGEMENT USERS
    Route::controller(UserController::class)
        ->group(function () {
            Route::get('/admin/convenios', 'index')->name('usuarios.index');
            Route::get('/admin/usuarios/obtener', 'getUsuarios')->name('usuarios.obtener');
            Route::get('/admin/convenios/create', 'create')->name('usuarios.create');
            Route::get('/admin/usuarios/edit/{id}', 'edit')->name('usuarios.edit');
            Route::get('/admin/usuarios/destroy/{id}', 'destroy')->name('usuarios.destroy');
            Route::post('/admin/convenios/store', 'store')->name('usuarios.store');
            Route::post('/admin/usuarios/status', 'status')->name('usuarios.status');

            //GET PROFILE OF LOGIN USER
            Route::get('/perfil', 'profile')->name('usuario.perfil');

            //UPDATED OF USER PRESTADOR OF SERVICES
            Route::post('/perfil/actualizar-logo', 'updatedphoto')->name('prestador.updatedphoto');
            Route::post('/perfil/actualizar-informacion', 'updatedprestador')->name('prestador.updatedprestador');
        });

    //ROUTES FOR MANAGEMENT CLIENTS
    Route::controller(ClientController::class)
        ->group(function () {
            Route::get('/admin/subscriptores', 'index')->name('subscriptores.index');
            Route::get('/admin/subscriptores/obtener', 'getClientes')->name('subscriptores.obtener');
            Route::get('/admin/subscriptores/detalle-cliente/{id}', 'detallecliente')->name('subscriptores.detallecliente');

            Route::post('/mi-plan/registrar-miembro', 'store_member')->name('miplan.store_member');

            //UPDATED OF CLIENT
            Route::post('/perfil/actualizar-foto', 'updatedphoto')->name('cliente.updatedphoto');
            Route::post('/perfil/actualizar-datos', 'updatedclient')->name('cliente.updatedclient');
        });

    //ROUTES FOR MANAGEMENT MEMBERS CLIENT
    Route::controller(MembersClientController::class)
        ->group(function () {
            Route::get('/miembros-plan', 'index')->name('miembros.index');
            Route::get('/miembros-plan/obtener', 'getClientes')->name('miembros.obtener');
            Route::get('/miembros-plan/destroy/{id}', 'destroy')->name('miembros.destroy');

            //Route::post('/mi-plan/registrar-miembro', 'store_member')->name('miplan.store_member');
        });

    //ROUTES FOR MANAGEMENT PLANS
    Route::controller(PlanController::class)
        ->group(function () {
            Route::get('/admin/planes', 'index')->name('plane.index');
            Route::get('/admin/planes/create', 'create')->name('plane.create');
            Route::get('/admin/planes/obtener', 'getPlanes')->name('plane.obtener');
            Route::post('/admin/planes/store', 'store')->name('plane.store');
            Route::get('/admin/planes/edit/{id}', 'edit')->name('plane.edit');
            Route::get('/admin/planes/detalle-plan/{id}', 'show')->name('plane.show');
            Route::post('/admin/planes/update', 'update')->name('plane.update');

            //client
            Route::get('/mi-plan', 'index_client')->name('miplan.index');
        });


    //ROUTES FOR MANAGEMENT BENEFITS OF PLANES
    Route::controller(ServiceController::class)
        ->group(function () {
            Route::get('/admin/servicios', 'index')->name('servicios.index');
            Route::get('/servicios/obtener', 'getServicios')->name('servicios.obtener');
            Route::get('/servicios/obtenerfree', 'getServiciosFree')->name('serviciosfree.obtener');
            Route::post('/admin/servicios/store', 'store')->name('servicios.store');
            Route::get('/admin/servicios/create', 'create')->name('servicios.create');
            Route::get('/admin/servicios/edit/{id}', 'edit')->name('servicios.edit');
            Route::post('/admin/servicios/update', 'update')->name('servicios.update');
            Route::get('/admin/servicios/detalle-servicio/{id}', 'show')->name('servicios.show');
        });

    //ROUTES FOR MANAGEMENT CATEGORYS OF SERVICES
    Route::controller(CategoryServiceController::class)
        ->group(function () {
            Route::get('/admin/categorias', 'index')->name('categorias.index');
            Route::post('/admin/categorias/store', 'store')->name('categorias.store');
            Route::post('/admin/categorias/update', 'update')->name('categorias.update');
            Route::get('/admin/categorias/destroy/{id}', 'destroy')->name('categorias.destroy');
        });

    //ROUTES FOR MANAGEMENT SPECIALITYES
    Route::controller(SpecialtyController::class)
        ->group(function () {
            Route::get('/admin/especialidades', 'index')->name('especialidades.index');
            Route::post('/admin/especialidades/store', 'store')->name('especialidades.store');
            Route::post('/admin/especialidades/update', 'update')->name('especialidades.update');
            Route::get('/admin/especialidades/destroy/{id}', 'destroy')->name('especialidades.destroy');
        });

    //ROUTES FOR MANAGEMENT CATEGORYS OF SERVICES
    Route::controller(InterestsController::class)
        ->group(function () {
            Route::get('/admin/intereses', 'index')->name('intereses.index');
            Route::post('/admin/intereses/store', 'store')->name('intereses.store');
            Route::post('/admin/intereses/update', 'update')->name('intereses.update');
            Route::get('/admin/intereses/destroy/{id}', 'destroy')->name('intereses.destroy');

            //client
            Route::get('/intereses', 'view')->name('intereses.view');
            Route::post('/intereses/store', 'store_client')->name('misintereses.store');
            Route::get('/intereses/destroy-client/{id}', 'destroy_client')->name('misintereses.destroy');
        });

    //ROUTES FOR MANAGEMENT REDEEMED SERVICES
    Route::controller(RedeemedServiceController::class)
        ->group(function () {
            //service provider
            Route::get('/historial-redimidos', 'index')->name('redimidos.index');
            Route::post('/redimimir-servicio/store', 'store')->name('redimidos.store');
            Route::get('/historial-redimidos/obtener', 'getRedimidos')->name('redimidos.obtener');
            Route::post('/historial-redimidos/buscar', 'search')->name('redimidos.search');
            Route::get('/redimimir-servicio/{id}', 'redimir')->name('redimidos.redimir');
            Route::get('/redimimir-diagnostico/{id}', 'index_diagnostico')->name('redimidos.index_diagnostico');

            //diagnostics
            Route::post('/redimimir-diagnostico/store', 'store_diagnostico')->name('redimidos.store_diagnostico');
            Route::get('/loaddiagnostics', 'getDiagnostics')->name('redimidos.get_diagnostics');

            //client
            Route::get('/mis-redimidos', 'index_client')->name('redimidosclient.index');
            Route::get('/mis-redimidos/obtener', 'getMisRedimidos')->name('misredimidosclient.obtener');
        });
        Route::controller(SubscriptionController::class)
            ->group(function () {
                Route::get('/suscripcion', 'index')->name('subscription.index');
                Route::post('/subscribirme/store', 'store')->name('subscription.store');
                Route::get('/suscripcion-exitosa', 'suscripcion_exitosa')->name('front.suscripcion_exitosa');
        });
});
