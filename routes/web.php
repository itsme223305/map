<?php

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


/*
 * Admin login routes
 */
Route::get('admin/login', 'App\Http\Controllers\LoginController@getLogin')->middleware('guest')->name('admin.login.get');
Route::post('admin/login', 'App\Http\Controllers\LoginController@login')->middleware('guest')->name('admin.login.post');

/*
 * Admin routes
 */
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard','App\Http\Controllers\AdminController@getDashboard')->name('admin.dashboard.get');
    Route::post('logout','App\Http\Controllers\AdminController@logout')->name('admin.logout');
    Route::get('getProblems','App\Http\Controllers\AdminController@getProblems')->name('admin.problems.get');
    Route::post('setProblemStatus','App\Http\Controllers\AdminController@setProblemStatus')->name('admin.problem-status.post');
    Route::post('deleteProblems','App\Http\Controllers\AdminController@deleteProblems')->name('admin.problems.delete');
});

Route::get('/', 'App\Http\Controllers\HomeController@getHome')->name('home.get');
Route::get('mapa', 'App\Http\Controllers\HomeController@getMap')->name('map.get');
Route::post('addProblem', 'App\Http\Controllers\ProblemsController@addProblem')->name('map.problem.add');
Route::get('confirmProblem/{token}', 'App\Http\Controllers\ProblemsController@confirmProblem')->name('map.problem.confirm');
Route::get('tabela', 'App\Http\Controllers\HomeController@getTable')->name('table.get');
Route::get('politika', 'App\Http\Controllers\HomeController@getPolitics')->name('politics.get');
Route::get('akteri', 'App\Http\Controllers\HomeController@getActors')->name('actors.get');


