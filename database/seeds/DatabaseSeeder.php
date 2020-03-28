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
            FbQestionsTableSeeder::class
 
        ]);
    }
}
