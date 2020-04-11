<?php

use App\Course;
use App\Enrollment;
use App\Review;
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
        $enroll = [];

        for ($i = 0; $i < 200; $i++) {
            $enroll[$users->random()->id . '-' . $courses->random()->id] = $i;
        }
        $enroll = array_keys($enroll);

        factory(Enrollment::class, count($enroll))->make()->each(function ($enrollment, $index) use ($enroll) {
            $enrollment->student_id = substr($enroll[$index], 0, strpos($enroll[$index], '-'));
            $enrollment->course_id = substr($enroll[$index], strpos($enroll[$index], '-') + 1);
            $enrollment->save();
        });

        $enrollments = Enrollment::all();
        factory(Review::class, count($enroll))->make()->each(function ($review, $index) use ($enrollments) {
            if (rand(1,5) > 2) {
                $review->enrollment_id = $enrollments[$index]->id;
                $review->save();
            }
        });
    }
}
