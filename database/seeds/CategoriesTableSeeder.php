<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Laravel', 'Vue', 'Javascript', 'PHP', 'React', 'Python', 'ASP.NET', 'Bootstrap', 'API Canvas']);
        $categories->each(function ($catName) {
            $cat = new Category();
            $cat->name = $catName;
            $cat->save();
        });
    }
}
