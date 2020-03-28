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
            if ($user->id == 1) {
                DB::table('role_user')->insert([
                    'user_id' => $user->id,
                    'role_id' => 1
                ]);
            } elseif($user->id == 2){
                DB::table('role_user')->insert([
                    'user_id' => $user->id,
                    'role_id' => 3
                ]);
            } else {
                DB::table('role_user')->insert([
                    'user_id' => $user->id,
                    'role_id' => rand(2,4),
                ]);
            }
        });
    }
}
