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

Route::get('/login', 'LoginController@show')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/course', 'CourseController@list')->name('course.list');
    Route::get('/course/create', 'CourseController@create')->name('course.create');
    Route::get('/course/edit/{id}', 'CourseController@edit')->where('id', '[0-9]+')->name('course.edit');

    Route::post('/course', 'CourseController@register')->name('register');
    Route::post('/course/{id}', 'CourseController@update')->where('id', '[0-9]+')->name('update');
    Route::delete('/course/{id}', 'CourseController@delete')->where('id', '[0-9]+')->name('delete');

    Route::get('/student', 'StudentController@index')->name('student');

    Route::get('/registration', 'RegistrationController@index')->name('registration');

    Route::post('/logout', 'LoginController@logout');
});
