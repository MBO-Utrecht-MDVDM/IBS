<?php

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

Route::get('/login', 'LoginController@index');
Route::post('/login/checklogin', 'LoginController@checklogin');
Route::get('/login/loginsuccess', 'LoginController@loginsuccess');
Route::get('/login/logout', 'LoginController@logout');
Route::resource('users', 'UserController');
Route::resource('questionnaires', 'QuestionnaireController');
Route::resource('questionnaires.questions', 'QuestionController');
Route::resource('questionnaires.questions.answers', 'AnswerController');
Route::get('/usersanswers', 'UsersAnswersController@index')->name('usersanswers.index');
Route::post('/usersanswers/{user_id}', 'UsersAnswersController@store')->name('usersanswers.store');