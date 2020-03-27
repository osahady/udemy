<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect(['admin', 'student', 'teacher', 'guest']);
        $roles->each(function($r){
            $role = new Role();
            $role->name = $r;
            $role->save();
        });
    }
}
