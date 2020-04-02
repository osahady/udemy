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

Route::get('/', 'CourseController@index');

Route::resource('users', 'UserController')->except('store'); //لأنه يتم تسجيل المستخدم عبر عملية تسجيل الدخول
Route::resource('enrollments', 'EnrollmentController')->except('show', 'edit', 'update');
Route::resource('courses', 'CourseController');
Route::get('/student/{user}/courses', 'CourseController@listMyEnrolledCourses')->name('student.courses');
Route::get('/teacher/{user}/courses', 'CourseController@listMyCreatedCourses')->name('teacher.courses');
Route::resource('comments', 'CommentController')->except('index', 'show');
Route::get('/comments/{lecture}/{course?}', 'CommentController@index')->name('current.lecture');
Route::get('/teacher/{teacher}/comments', 'CommentController@commentsForTeacher')->name('comments.teacher');
Route::resource('sections', 'SectionController');
Route::resource('reviews', 'ReviewController')->except('edit', 'update', 'destroy');
Route::get('student/{user}/reviews', 'ReviewController@listStudentReview')->name('student.reviews');
Route::get('course/{course}/reviews', 'ReviewController@listCourseReview')->name('course.reviews');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

