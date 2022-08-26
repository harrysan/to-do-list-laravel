<?php

use App\Http\Controllers\TasksController;
use App\Http\Controllers\TierTaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TasksController::class, 'index'])->name('index');

Route::get('/setting', [TierTaskController::class, 'index'])->name('setting');

/*Route::delete('/task/{id}', 'TasksController@destroy')
    ->name('task.destroy');*/
Route::get('/updatestatus/{id}', 'TasksController@updatestatus')->name('updatestatus');

//Route::get('/create', [TasksController::class, 'create'])->name('create');

Route::resource('task', 'TasksController');
Route::resource('tt', 'TierTaskController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
