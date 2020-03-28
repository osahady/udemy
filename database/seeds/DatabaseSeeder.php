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
            RoleUserTableSeeder::class,
<<<<<<< HEAD
            FbQestionsTableSeeder::class
 
=======
            FbQestionsTableSeeder::class,
>>>>>>> 5a7d025c8e507d394990d390bd21a337b1713487
        ]);
    }
}
