<?php

use App\Course;
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
        factory(Course::class, 5)->create();
        $courses = Course::all();
        factory(Requirement::class, 5)->make()->each(function ($requirement) use ($courses) {
            $requirement->course_id = $courses->random()->id;
            $requirement->save();
        });
    }
}
