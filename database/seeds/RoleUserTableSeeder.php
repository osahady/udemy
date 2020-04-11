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
        $roles = Role::all();
        $users->each(function ($user) use ($roles){
            switch ($user->id) {
                case 1:
                case 2:
                    $user->roles()->sync(1);
                    break;

                default:
                    for ($i=0; $i < rand(1, count($roles)); $i++) { 
                        $role = $roles->random()->id;
                        $user->roles()->syncWithoutDetaching($role == 1 ? 2 : $role);
                    }
                    break;
            }

        });
        
    }
}
