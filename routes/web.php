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

Route::namespace('Website')->group(function () {
    

    Route::get('/', 'CourseController@index');
    
    Route::resource('users', 'UserController')->except('store'); //لأنه يتم تسجيل المستخدم عبر عملية تسجيل الدخول
    Route::resource('enrollments', 'EnrollmentController')->except('show', 'edit', 'update');
    Route::resource('courses', 'CourseController');
    Route::resource('comments', 'CommentController')->except('index', 'show');
    Route::get('/comments/{lecture}/{course?}', 'CommentController@index')->name('lectures.current');
    Route::resource('sections', 'SectionController');
    Route::resource('reviews', 'ReviewController')->except('edit', 'update', 'destroy');
    Route::get('course/{course}/reviews', 'ReviewController@listCourseReview')->name('reviews.course');
    Route::resource('lectures', 'LectureController');
    Route::resource('feedback', 'FeedbackController')->except('edit', 'update', 'destroy');
    Route::get('/course/{course}/feedback', 'FeedbackController@listCourseFeedback')->name('feedback.course');

    Route::group(['prefix' => 'teacher'],function (){
        Route::get('{user}/courses', 'CourseController@listMyCreatedCourses')->name('courses.teacher');
        Route::get('{teacher}/comments', 'CommentController@commentsForTeacher')->name('comments.teacher');
    
    });
    Route::group(['prefix' => 'student'], function(){
        Route::get('{user}/courses', 'CourseController@listMyEnrolledCourses')->name('courses.student');
        Route::get('{user}/reviews', 'ReviewController@listStudentReview')->name('reviews.student');
        Route::get('{user}/feedback', 'FeedbackController@listStudentFeedback')->name('feedback.student');
    
    });
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

