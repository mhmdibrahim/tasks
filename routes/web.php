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
Route::get('deletDepartment/{id}', 'Dashboard@deleteDepartment')
    ->middleware('auth')
    ->middleware('admin');
Route::get('task', 'TasksController@index')
    ->middleware('auth');
Route::post('task', 'TasksController@addTask')
    ->middleware('auth');
Route::get('track','TrackController@index')
    ->middleware('auth')
    ->middleware('tracker');
Route::get('/track/{department}','TrackController@showDepartment');