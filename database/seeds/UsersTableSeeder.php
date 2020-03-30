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
        factory(User::class)->state('obada')->create();
        factory(User::class, 10)->create();
=======
        factory(User::class)->states('obada')->create();
        factory(User::class, 10)->create(); //students
>>>>>>> d56fa8cbed287c036c32eed6bffdac74c88e7ed8
    }
}
