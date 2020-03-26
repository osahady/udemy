<?php

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

Route::get('/', 'CourseController');

Route::resource('users', 'UserController')->except('store');
Route::resource('enrollemnts', 'EnrollmentController')->except('show', 'edit', 'update');
Route::resource('courses', 'CourseController');
Route::resource('comments', 'CommentController')->except('show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

