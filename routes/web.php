<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use \App\Models\Todo;
use Symfony\Component\Console\Input\Input;

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

Route::get('/', [TodoController::class,'index']);


Route::resource('todo',TodoController::class);

//Route::get('/search/', [TodoController::class,'search'])->name('search');


Auth::routes();
Route::get('/home', [TodoController::class,'index']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
