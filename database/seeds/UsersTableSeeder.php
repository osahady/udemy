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
        factory(User::class)->state('obada')->create();
        factory(User::class, 5)->create(); //students
    }
}
