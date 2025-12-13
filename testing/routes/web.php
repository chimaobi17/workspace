<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;



Route::view('/', 'home');

Route::view('/contact', 'contact');

// Route::controller(JobController::class)->group(function (){
//     // index, first page you will see in jobs
//     Route::get('/jobs', 'index');
//     // create jobs
//     Route::get('/jobs/create', 'create');
//     // show a job
//     Route::get('/jobs/{job}', 'show');
//     // store validated data in the database
//     Route::post('/jobs', 'store');
//     // Edit jobs
//     Route::get('/jobs/{job}/edit', 'edit');
//     // update jobs functionality
//     Route::patch('/jobs/{job}', 'update');
//     // destroy(delete)
//     Route::delete('/jobs/{job}', 'destroy');
// });
Route::resource('jobs', JobController::class);

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::POST('/login', [SessionController::class, 'store']);