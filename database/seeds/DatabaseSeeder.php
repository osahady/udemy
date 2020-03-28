<?php

use Illuminate\Database\Seeder;
use RolesTableSeeder;

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
            // EnrollmentsTableSeeder::class,
            LecturesTableSeeder::class
        ]);
    }
}
