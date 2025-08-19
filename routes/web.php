<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Http\Middleware\EmployerMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => to_route('jobs.index'));
Route::get('/login', fn() => to_route('auth.create'))->name('login');

Route::resource('jobs',  JobController::class);
Route::resource('auth',  AuthController::class);

Route::middleware('auth')->group(function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('jobs/{job}/apply', [JobController::class, 'applyView'])->name('jobs.applyView');
    Route::post('jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply');
    Route::resource('my-job-applications', MyJobApplicationController::class);
    Route::put('my-jobs/{my_job}/restore', [MyJobController::class, 'restore'])->name('my-jobs.restore')->middleware(EmployerMiddleware::class);
    Route::resource('my-jobs', MyJobController::class)->middleware(EmployerMiddleware::class);

    Route::resource('employers', EmployerController::class);
});
