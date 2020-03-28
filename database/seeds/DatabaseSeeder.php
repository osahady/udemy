<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            CategoriesTableSeeder::class,
            UsersTableSeeder::class,
            CoursesTableSeeder::class,
            SectionsTableSeeder::class,
            EnrollmentsTableSeeder::class,
            LecturesTableSeeder::class,
<<<<<<< HEAD
            RoleUserTableSeeder::class,
=======
            FbQestionsTableSeeder::class
 
>>>>>>> 2574848642ab4741d8a5f7b23846139bbb8e1ed3
        ]);
    }
}
