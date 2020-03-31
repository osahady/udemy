<?php

use App\Course;
use App\Section;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();
        for ($i=0; $i < count($courses); $i++) { 
            $course = $courses[$i];
            for ($j=0; $j < rand(3, 10); $j++) { 
                factory(Section::class)->create([
                    'course_id' => $course->id
                ]);
            }
        }
    }
}
