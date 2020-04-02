<?php

namespace App\Http\Controllers;

use App\Course;
use App\Feedback;
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
        return Review::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'Review Create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return $review;
    }

    public function listStudentReview(User $user)
    {
        $enrollments = $user->enrolledCourses->pluck('id');
        return Review::findMany($enrollments);
    }

    public function listCourseReview(Course $course)
    {
        $enrollments = $course->enrollments->pluck('id');
        return Review::findMany($enrollments);
    }
}
