<?php

use App\FbAnswer;
use App\FbQuestion;
use Illuminate\Database\Seeder;

class FbQestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = collect([
                                'q1' => [
                                    'qq1',
                                    'a1',
                                    'a2',
                                    'a3',
                                    'a4'
                                ],
                                'q2' => [
                                    'qq2',
                                    'b1',
                                    'b2',
                                    'b3'
                                ],
                                'q3' => [
                                    'qq3',
                                    'c1',
                                    'c2',
                                    'c3',
                                    'c4'
                                ],
                                'q4' => [
                                    'qq4',
                                    'd1'
                                ]
                            ]);
        $questions->each(function($question){
            $q = new FbQuestion();
            $q->question = $question[0];            
            $q->save();

            for ($i=1; $i < count($question); $i++) { 
                $a = new FbAnswer();
                $a->fb_question_id = $q->id;
                $a->answer = $question[$i];
                $a->save();
            }

        });
    }
}
