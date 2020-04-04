<?php

namespace App\Http\Controllers\Website;

use App\Course;
use App\Feedback;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Feedback::all();
        return view('website.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return 'feedback create';
        return view('website.feedback.create');
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
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        // return Feedback::where('enrollment_id', '=', $feedback->enrollment_id)->get();
        return view('website.feedback.show');
    }

    public function listStudentFeedback(User $user)
    {
        $enrolled_id = $user->enrolledCourses->pluck('id');
        // return Feedback::findMany($enrolled_id);
        return view('website.feedback.list_student_feedback');
    }

    public function listCourseFeedback(Course $course)
    {

        $enrolled_id = $course->enrollments->pluck('id');
        // return Feedback::findMany($enrolled_id);
        return view('website.feedback.list_course_feedback');
    }
}
