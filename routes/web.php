<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\admin\SurveyController;
use App\Http\Controllers\admin\HomeController;

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
});


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
   
    Route::resource('/survey',SurveyController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

