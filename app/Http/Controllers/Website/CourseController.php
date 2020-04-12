<?php

namespace App\Http\Controllers\Website;

use App\User;
use App\Course;
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
        $courses = Course::withCount([
            'enrollments',
            'enrollments as voters' => function ($q) {
                return $q->has('review');
            }
        ])->paginate(5);
        $duration = Course::withDuration()
            ->whereIn('courses.id', $courses->pluck('id'))
            ->pluck('duration', 'id');
        $stars = Course::withStars()
            ->whereIn('courses.id', $courses->pluck('id'))
            ->pluck('stars', 'id');
        return view('website.course.index', compact(
            'duration',
            'stars',
            'courses'
        ));
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
        $enrollments = $course->studentReviews()->get();
        $duration = Course::withDuration()->where('courses.id', $course->id)->pluck('duration', 'id');
        $stars = Course::withStars()->where('courses.id', $course->id)->pluck('stars', 'id');
        $course = Course::withCount([
            'enrollments',
            'enrollments as voters' => function ($q) {
                return $q->has('review');
            }
        ])
            ->with(['requirements', 'sections.lectures'])
            ->where('courses.id', $course->id)->first();

        return view('website.course.show', compact(
            'enrollments',
            'duration',
            'stars',
            'course'
        ));
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
