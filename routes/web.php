<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

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
    return view('welcome');
})->name('home');
Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'sendlogin'])->name('sendlogin');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
    Route::post('/task', [TaskController::class, 'store'])->name('task');
    Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.del');
});