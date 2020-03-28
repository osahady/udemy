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
<<<<<<< HEAD
            // RolesTableSeeder::class,
            // CategoriesTableSeeder::class,
            // UsersTableSeeder::class,
            // CoursesTableSeeder::class,
            // SectionsTableSeeder::class,
            // EnrollmentsTableSeeder::class,
            // LecturesTableSeeder::class,
            FbQestionsTableSeeder::class
=======
            RolesTableSeeder::class,
            CategoriesTableSeeder::class,
            UsersTableSeeder::class,
            CoursesTableSeeder::class,
            SectionsTableSeeder::class,
            EnrollmentsTableSeeder::class,
            LecturesTableSeeder::class
>>>>>>> 3a1d7c597d76141e9bb02256ad0afc69b80f5bd0
        ]);
    }
}
