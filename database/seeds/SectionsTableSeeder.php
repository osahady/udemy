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
        factory(Section::class, 15)->make()->each(function($section) use ($courses){
            $section->course_id = $courses->random()->id;
            $section->save();
        });
    }
}
