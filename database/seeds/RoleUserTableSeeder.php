<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $users->each(function ($user){
            switch ($user->id) {
                case 1:
                case 2:
                    $user->roles()->sync(1);
                    break;

                default:
                $user->roles()->sync(rand(2,3));
                    break;
            }

        });
        
    }
}
