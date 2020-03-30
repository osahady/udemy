<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->states('osama')->create();
<<<<<<< HEAD
<<<<<<< HEAD
        factory(User::class)->state('obada')->create();
        factory(User::class, 10)->create();
=======
        factory(User::class)->states('obada')->create();
        factory(User::class, 10)->create(); //students
>>>>>>> d56fa8cbed287c036c32eed6bffdac74c88e7ed8
=======
        factory(User::class)->state('obada')->create();
        factory(User::class)->state('teacher')->create();
        factory(User::class)->state('student')->create();
        factory(User::class, 5)->create(); //students
>>>>>>> e6aac5afe4f48b0f6be22043a301134a2769bcb1
    }
}
