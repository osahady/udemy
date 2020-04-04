<?php

namespace App\Http\Controllers\Website;

use App\Course;
use App\Feedback;
use App\Http\Controllers\Controller;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Review::all();
        return view('website.review.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.review.create');
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
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('website.review.show');
    }

    public function listStudentReview(User $user)
    {
        $enrollments = $user->enrolledCourses->pluck('id');
        // return Review::findMany($enrollments);
        return view('website.review.list_student_review');
    }

    public function listCourseReview(Course $course)
    {
        $enrollments = $course->enrollments->pluck('id');
        // return Review::findMany($enrollments);
        return view('website.review.list_course_review');
    }
}
