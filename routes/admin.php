<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    //ruta de usuarios
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');

    Route::get('/planes', [PlanController::class, 'index'])->name('plane.index');


});