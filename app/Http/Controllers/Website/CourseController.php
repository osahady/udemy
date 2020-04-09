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
        $courses = Course::all();
        return view('website.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        dd($request->all());
        return $request->all();
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
        $requirements = $course->requirements;
        $course = $course->list();
        // $reviews = $course->reviewing()->get();
        
        $enrollments = $course->enrollments()
                          ->select('id', 'student_id')
                          ->with('review') 
                          ->has('review')
                          ->with('student.image:imageable_id,path')  
                          ->with('student:id,name')
                          ->get();
        return view('website.course.show', compact('course', 'requirements', 'enrollments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('website.course.edit', compact('course'));
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
        dd($request->all());
        return redirect()->back()->withSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back()->withAlert('Deleted Successfully');
    }

    public function listMyCreatedCourses(User $user)
    {
        $createdCourses = $user->createdCourses;
        return view('website.course.list_my_created_courses', compact('createdCourses', 'user'));
    }

    public function listMyEnrolledCourses(User $user)
    {
        $courses = $user->enrolledCourses->pluck('course_id');
        $enrolledCourses = Course::findMany($courses);
        return view('website.course.list_my_enrolled_courses', compact('enrolledCourses', 'user'));
    }

    public function listingSections(Course $course)
    {
        $list = Course::list($course)->findOrFail($course->id);
        return view('website.course.listing_sections', compact('list'));
    }
}
