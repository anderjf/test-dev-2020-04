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
    
    // Home
    Route::get('/', 'DashboardController@index')->name('dashboard');

    // Course routes 
    Route::get('/course', 'CourseController@list')->name('course.list');
    Route::get('/course/create', 'CourseController@create')->name('course.create');
    Route::get('/course/edit/{id}', 'CourseController@edit')->where('id', '[0-9]+')->name('course.edit');

    Route::post('/course', 'CourseController@register')->name('course.register');
    Route::post('/course/{id}', 'CourseController@update')->where('id', '[0-9]+')->name('course.update');
    Route::delete('/course/{id}', 'CourseController@delete')->where('id', '[0-9]+')->name('course.delete');

    // Student routes 
    Route::get('/student', 'StudentController@list')->name('student.list');
    Route::get('/student/create', 'StudentController@create')->name('student.create');
    Route::get('/student/edit/{id}', 'StudentController@edit')->where('id', '[0-9]+')->name('student.edit');

    Route::post('/student', 'StudentController@register')->name('student.register');
    Route::post('/student/{id}', 'StudentController@update')->where('id', '[0-9]+')->name('student.update');
    Route::delete('/student/{id}', 'StudentController@delete')->where('id', '[0-9]+')->name('student.delete');

    // Registration routes
    Route::get('/registration/{courseId}', 'RegistrationController@list')->where('courseId', '[0-9]+')->name('registration.list');
    Route::get('/registration/edit/{courseId}', 'RegistrationController@edit')->where('courseId', '[0-9]+')->name('registration.edit');
    
    Route::post('/registration/{courseId}', 'RegistrationController@update')->where('courseId', '[0-9]+')->name('registration.update');
    Route::delete('/registration/{courseId}/{studentId}', 'RegistrationController@delete')->where('courseId', '[0-9]+')->where('studentId', '[0-9]+')->name('registration.delete');

    // Logout
    Route::post('/logout', 'LoginController@logout');
});
