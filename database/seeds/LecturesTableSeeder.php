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
        for ($i=0; $i < count($sections); $i++) { 
            $section = $sections[$i];
            for ($j=0; $j < rand(1, 5); $j++) {  //creating some-5 lectures per section
                factory(Lecture::class)->create([
                    'section_id' => $section->id
                ]);
            }
        }
    }
}
