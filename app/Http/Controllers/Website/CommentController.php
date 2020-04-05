<?php

namespace App\Http\Controllers\Website;

use App\Comment;
use App\Course;
use App\Http\Controllers\Controller;
use App\Lecture;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lecture $lecture, bool $course = false)
    {
        if($course){
            $course = $lecture->section->course->id;
            $qyr =
            'SELECT *
            FROM `comments`
                INNER JOIN `lectures` ON `comments`.`lecture_id` = `lectures`.`id`
                INNER JOIN `sections` ON `lectures`.`section_id` = `sections`.`id`
            WHERE `sections`.`course_id` = ?';
            $courseComments = DB::select($qyr, [$course]);
            return view('website.comment.index')->with($courseComments);
        }
        else
            return $lecture->comments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('website.comment.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        return redirect()->back()->withSuccess('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        return redirect()->back()->withAlert('Deleted Successfully');
    }

    public function commentsForTeacher(User $teacher)
    {
        if (count($teacher->createdCourses)) {
            $qyr =
            'SELECT `comments`.`content`, `courses`.`title` as `course`,
            `lectures`.`id` as `lecture_id`, `comments`.`comment_id`
            FROM `comments`
                INNER JOIN `lectures` ON `comments`.`lecture_id` = `lectures`.`id`
                INNER JOIN `sections` ON `lectures`.`section_id` = `sections`.`id`
                INNER JOIN `courses` ON `sections`.`course_id` = `courses`.`id`
            WHERE `courses`.`teacher_id` = ? ';
            $comments_for_teacher = DB::select($qyr, [$teacher->id]);

            return view('website.comment.comments_for_teacher', compact('comments_for_teacher'));
        }else{
            return 'There are no comments';
        }
    }
}
