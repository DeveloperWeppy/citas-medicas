<?php

use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    Route::get('/planes', [PlanController::class, 'index'])->name('plane.index');
});