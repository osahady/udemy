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
        $users->each(function($user){
            switch ($user->id) {
                case '1':
                    # code...
                    break;
                
                default:
                    $user->roles()
                    break;
            }
        });
        
    }
}
