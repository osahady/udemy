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
        
        for ($j=0; $j < count($enrollments); $j++) { 
            $e = $enrollments[$j]->id;
            for ($i=0; $i < rand(0, count($questions)); $i++) { 
                $feedback = new Feedback();
                $q = $questions[$i];
                $feedback->enrollment_id = $e;
                $feedback->fb_question_id = $q->id;
                $feedback->fb_answer_id = $q->fbAnswers->random()->id;
                $feedback->save();
            } 
        }
    }
}
