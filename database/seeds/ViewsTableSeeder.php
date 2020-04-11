<?php

use App\Course;
use App\Enrollment;
use App\Lecture;
use App\User;
use Illuminate\Database\Seeder;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enrollments = Enrollment::all();
        foreach ($enrollments as $enrollment) {
            $course = $enrollment->course;
            $student = $enrollment->student;
            if (rand(1,5) > 2) {
                foreach ($course->sections as $section) {
                    if (rand(1,5) > 2) {
                        foreach ($section->lectures as $lecture) {
                            if (rand(1,5) > 2) {
                                $lecture->views()->save($lecture, ['user_id' => $student->id, 'completed' => rand(0, 1)]);
                            }
                        }
                    }
                }
            }
        }
    }
}
