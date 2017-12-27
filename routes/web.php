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

//Route::get('/', function () {
//    return view('home');
//});
Route::get('/', 'Dashboard@index')
    ->middleware('auth')
    ->middleware('admin');
Route::get('login', 'Auth\LoginController@showLoginForm')
    ->name('login')
    ->middleware('guest');
Route::post('login', 'Auth\LoginController@login')
    ->middleware('guest');
Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout')
    ->middleware('web');
Route::post('addemp', 'Dashboard@createUser')
    ->middleware('auth')
    ->middleware('admin');
Route::post('d-department', 'Dashboard@createDepartment')
    ->middleware('auth')
    ->middleware('admin');
Route::post('deleteDepartment', 'Dashboard@deleteDepartment')
    ->middleware('auth')
    ->middleware('admin');
Route::get('task', 'TasksController@index')
    ->middleware('auth');
Route::post('task', 'TasksController@addTask')
    ->middleware('auth');
Route::get('track', 'TrackController@index')
    ->middleware('auth')
    ->middleware('tracker');
Route::get('/track/{department}', 'TrackController@showDepartment')
    ->middleware('auth')
    ->middleware('tracker');
Route::get('/moreDetails/{department}', 'TrackController@moreDetails')
    ->middleware('auth')
    ->middleware('tracker');
Route::get('/changePassword','ChangePasswordController@index')
    ->middleware('auth');
Route::post('/change','ChangePasswordController@change')
    ->middleware('auth');
Route::get('edit','EditProfileController@index')
    ->middleware('auth');
Route::post('edit','EditProfileController@edit')
    ->middleware('auth');

Route::get('language/{lang}','LanguageController@changeLanguage')
    ->name('language-chooser');

