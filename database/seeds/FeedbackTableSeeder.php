<?php

use App\Enrollment;
use App\FbQuestion;
use App\Feedback;
use Illuminate\Database\Seeder;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enrollments = Enrollment::all();
        $questions = FbQuestion::all();

        factory(Feedback::class)->create();
    }
}
