<?php

use App\Lecture;
use App\Section;
use Illuminate\Database\Seeder;

class LecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = Section::all();
        factory(Lecture::class, 200)->make()->each(function($lecture) use($sections){
            $lecture->section_id = $sections->random()->id;
            $lecture->save();
        });
    }
}
