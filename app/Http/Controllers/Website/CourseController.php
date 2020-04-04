<?php

namespace App\Http\Controllers\Website;

use App\User;
use App\Course;
use App\Enrollment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Course::all();
        return view('website.course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return 'Course Create';
        return view('website.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back()->withSuccess('Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        // return $course;
        return view('website.course.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        // return $course;
        return view('website.course.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        return redirect()->back()->withSuccess('Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        return redirect()->back()->withAlert('Deleted.');
    }

    public function listMyCreatedCourses(User $user)
    {
        // return $user->createdCourses;
        return view('website.course.list_my_created_courses');
    }

    public function listMyEnrolledCourses(User $user)
    {
        $courses = $user->enrolledCourses->pluck('course_id');
        // return Course::findMany($courses);
        return view('website.course.list_my_enrolled_courses');
    }
}
