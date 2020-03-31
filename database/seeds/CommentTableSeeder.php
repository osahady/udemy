<?php

use App\Comment;
use App\Lecture;
use App\User;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lectures = Lecture::all();
        $users = User::all();
        foreach ($lectures as $lecture) {
            if (rand(1, 5) > 3) {
                for ($i=0; $i < rand(1, 5); $i++) {
                    factory(Comment::class)->create([
                        'user_id' => $users->random()->id,
                        'lecture_id' => $lecture->id,
                    ]);
                }
            }
        }
        $lectures = Lecture::has('comments')->get();
        foreach ($lectures as $lecture) {
            if (rand(1, 5) > 2) {
                foreach ($lecture->comments as $comment) {
                    for ($i=0; $i < rand(1, 5); $i++) {
                        factory(Comment::class)->create([
                            'user_id' => $users->random()->id,
                            'lecture_id' => $lecture->id,
                            'comment_id' => $comment->id,
                        ]);
                    }
                }
            }
        }
    }
}
