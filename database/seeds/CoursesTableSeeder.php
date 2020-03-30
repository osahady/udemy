<?php

use App\Course;
use App\Image;
use App\Requirement;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numCourses = 5;
        factory(Course::class, $numCourses)->create();
        $courses = Course::all();        
        factory(Requirement::class, 2*$numCourses)->make()->each(function ($requirement) use ($courses) {
            $requirement->course_id = $courses->random()->id;
            $requirement->save();
        });
        factory(Image::class, $numCourses)->make()->each(function($image, $index) use($courses){
            $image->imageable_id = $courses[$index]->id;
            $image->imageable_type = 'App\Course';
            $image->save();
        });
    }
}
