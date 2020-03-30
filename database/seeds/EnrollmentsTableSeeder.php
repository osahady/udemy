<?php

use App\Course;
use App\Enrollment;
use App\User;
use Illuminate\Database\Seeder;

class EnrollmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $courses = Course::all();
        factory(Enrollment::class, 100)->make()->each(function($enrollment) use($users, $courses){
            $enrollment->user_id = $users->random()->id;
            $enrollment->course_id = $courses->random()->id;
            $enrollment->save();
        });
    }
}
