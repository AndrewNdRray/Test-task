<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/user', function () {
    return view('welcome');
});


Auth::routes(['verify' => true]);


    Route::prefix('user')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('user');
        Route::resource('projects', ProjectController::class);
        Route::get('/show', [ProjectController::class, 'show'])->name('show');
        Route::resource('tasks', TaskController::class);




        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


    });
