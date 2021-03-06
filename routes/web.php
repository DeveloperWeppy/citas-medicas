<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
})->name('front.inicio');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(FrontendController::class)
    ->group(function () {
        Route::get('/envio', 'envio')->name('front.envio');
        Route::get('/como-funciona', 'comofunciona')->name('front.comofunciona');
        Route::get('/beneficios', 'beneficios')->name('front.servicios');
        Route::get('/planes', 'planes')->name('front.afiliate');
        Route::get('/contactanos', 'contacto')->name('front.contacto');
        Route::get('/preguntas-frecuentes', 'preguntasfrecuentes')->name('front.preguntas');
        Route::get('/subscribirme', 'subscribirme')->name('front.subscribirme');
        Route::get('/detalles-plan/{id}', 'detallesplan')->name('front.detallesplan');
        Route::get('/convenio/{id}', 'detallesentidad')->name('front.detallesentidad');
        Route::post('/contacto/envio-email', 'enviarCorreoContacto')->name('front.enviarCorreoContacto');


        Route::get('/ciudades', 'getCiudades')->name('front.getCiudades');

        /**********  ROUTE OF REGISTER OF CLIENT IN THE FRONTEND  **************************** */
        Route::get('/subscribirme/finalizar-suscripcion', 'finis_subscribe')->name('front.finis_subscribe');
        Route::post('/subscribirme/store-cliente', 'store_client')->name('front.store_client');
        Route::get('/pagar/{signature}/{plan}/', 'pagar')->name('front.pagar');
        Route::post('/suscripcion-validar', 'validar')->name('front.validar');
        Route::get('/suscripcion-exitosa', 'suscripcion_exitosa')->name('front.suscripcion_exitosa');
    });

//simbolico para generar storage en hosting
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
});
Route::get('/updatedatesubscription', function () {
      $exitCode = Artisan::call('suscripcion:consultaryactualizarsuscripcion');
      print_r($exitCode);
});
