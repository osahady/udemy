<?php

use App\Comment;
use App\Lecture;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lectures = Lecture::all();
        foreach ($lectures as $lecture) {
            if (rand(1, 5) > 3) {
                $student = $lecture->section->course->enrollments->random()->student_id;
                for ($i=0; $i < rand(1, 5); $i++) {
                    factory(Comment::class)->create([
                        'user_id' => $student,
                        'lecture_id' => $lecture->id,
                    ]);
                }
            }
        }
        $lectures = Lecture::has('comments')->get();
        foreach ($lectures as $lecture) {
            if (rand(1, 5) > 2) {
                foreach ($lecture->comments as $comment) {
                    if (rand(0, 5) > 3) {//احتمال الأستاذ يحاوب ثلثين بثلث
                        $user = $lecture->section->course->enrollments->random()->student_id;
                    } else {
                        $user = $lecture->section->course->teacher_id;
                    }

                    for ($i=0; $i < rand(1, 5); $i++) {
                        factory(Comment::class)->create([
                            'user_id' => $user,
                            'lecture_id' => $lecture->id,
                            'comment_id' => $comment->id,
                        ]);
                    }
                }
            }
        }
    }
}
