<?php

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
        $users = User::all();
        $users->each(function ($user) {

            foreach ($user->enrolledCourses as $course) {
                dump($course->sections);
                // foreach ($course->sections as $section) {
                //     foreach ($section->lectures as $lecture) {
                //         dump($lecture);
                //     }
                // }
            }
            dd('Hey');
        });

        // for ($i=0; $i < ; $i++) {

        // }
    }
}
