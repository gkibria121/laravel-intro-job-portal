<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('jobs.index'));
Route::get('/login', fn() => to_route('auth.create'));

Route::resource('jobs',  JobController::class);
Route::resource('auth',  AuthController::class);

Route::middleware('auth')->group(function (){
    Route::delete('/logout', [AuthController::class,'logout'])->name('auth.logout'); 
    Route::get('jobs/{job}/apply',[JobController::class,'applyView'])->name('jobs.applyView');
    Route::post('jobs/{job}/apply',[JobController::class,'apply'])->name('jobs.apply');
    Route::resource('my-job-applications', MyJobApplicationController::class  );
} );