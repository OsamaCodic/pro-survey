<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\admin\SurveyController;
use App\Http\Controllers\admin\SurveyQuestionController;
use App\Http\Controllers\admin\HomeController;

use RealRashid\SweetAlert\Facades\Alert;
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


Route::group(['middleware' => 'auth'], function () {
    //Routes for Logged user

    Route::get('/home', [App\Http\Controllers\HomeController ::class, 'index'])->name('home');
    
    Route::group(['prefix' => 'admin'], function ()
    {
        Route::resource('/survey',SurveyController::class);
        Route::POST('/survey/delete_selected_rows', [App\Http\Controllers\admin\SurveyController ::class, 'delete_selected_rows']);
        Route::GET('/survey_trail/{survey_id}', [App\Http\Controllers\admin\SurveyController ::class, 'survey_trail']);
        Route::resource('/survey_questions',SurveyQuestionController::class); 
        Route::post('/question_answers', [App\Http\Controllers\admin\SurveyQuestionController ::class, 'question_answers']);
    });

});

