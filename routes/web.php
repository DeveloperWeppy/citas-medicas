<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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
});
