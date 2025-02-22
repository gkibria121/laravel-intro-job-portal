<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('jobs.index'));
Route::get('/login', fn() => to_route('auth.create'));
Route::resource('jobs',  JobController::class);
Route::resource('auth',  AuthController::class);
