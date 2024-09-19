<?php

use App\Http\Controllers\AppliedJobsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authorize;

Route::view('/', 'index');
Route::view('/contact', 'contact');
Route::view('/about', 'about');

Route::get('/jobs', [JobController::class, 'index']);

// checking a user has permission to create job or not
Route::get('/jobs/create', [JobController::class, 'create'])->can('create job'); 
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth')->can('create job');;

Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::POST('/jobs/{job}/apply', [JobController::class, 'apply'])
    ->middleware('auth')
    ->can('apply', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::post('/login', [SessionController::class, 'store']);
Route::get('/login', [SessionController::class, 'create'])->name('login');

Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/charts', function (){
    return view('charts');
});

Route::get('/applied-jobs', [AppliedJobsController::class, 'index'])->middleware('auth');
Route::get('/applied-jobs/{appliedJob}', [AppliedJobsController::class, 'show'])->middleware('auth');
Route::delete('/applied-jobs/{appliedJob}', [AppliedJobsController::class, 'delete'])->middleware('auth');
