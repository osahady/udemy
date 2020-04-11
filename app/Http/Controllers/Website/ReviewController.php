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
        $reviews = Review::all();
        return view('website.review.index', compact('reviews'));
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
        return view('website.review.show', compact('review'));
    }

    public function listStudentReview(User $user)
    {
        $enrollments = $user->enrolledCourses;
        return view('website.review.list_student_review', compact('enrollments', 'user'));
    }

    public function listCourseReview(Course $course)
    {
        $enrollments = $course->enrollments;
        return view('website.review.list_course_review', compact('enrollments', 'course'));
    }
}
