<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SubscriptionController;

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
        Route::get('/nosotros', 'nosotros')->name('front.nosotros');
        Route::get('/servicios', 'servicios')->name('front.servicios');
        Route::get('/afiliate-ahora', 'afiliate')->name('front.afiliate');
        Route::get('/contactanos', 'contacto')->name('front.contacto');
        Route::get('/subscribirme', 'subscribirme')->name('front.subscribirme');

        /**********  ROUTE OF REGISTER OF CLIENT IN THE FRONTEND  **************************** */
        Route::post('/subscribirme/finalizar-suscripcion', 'finis_subscribe')->name('front.finis_subscribe');
        Route::post('/subscribirme/store-cliente', 'store_client')->name('front.store_client');
    });

Route::controller(SubscriptionController::class)
    ->group(function () {
        Route::post('/subscribirme/store', 'store')->name('front.store');
        Route::post('/suscripcion-exitosa');
    });
//simbolico para generar storage en hosting
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
});*/