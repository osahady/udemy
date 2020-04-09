<?php

namespace App;

use Carbon\CarbonInterval;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'title', 'description', 'teacher_id', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function sections()
    {
        return $this->hasMany('App\Section');
    }

    public function requirements()
    {
        return $this->hasMany('App\Requirement');
    }

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function enrollments()
    {
        return $this->hasMany('App\Enrollment');
    }

    public function teacher()
    {
        return $this->belongsTo('App\User'); // by convention the name of the foregin
        //key is: name of the relationship mehtod (teacher) _ owner key
        // which is the primary key of the user that is id
        // <=> teacher_id
    }

    public function list()
    {
        return $this->with([
            'sections.lectures',
            'sections' => function ($q) {
                return $q->withCount('lectures');
            }
        ])
            ->withCount('sections')
            ->where('id', $this->id)
            ->first();
    }

    public function calcDuration()
    {
        // $query =
        // 'SELECT SUM(`lectures`.`duration`)
        // FROM `lectures`
        //     INNER JOIN `sections` ON `lectures`.`section_id` = `sections`.`id`
        //     INNER JOIN `courses` ON `sections`.`course_id` = `courses`.`id`
        // WHERE courses.id = ?';

        // $d = DB::select($query, $this->id);

        $query = DB::table('lectures')
            ->join('sections', 'lectures.section_id', '=', 'sections.id')
            ->join('courses', 'sections.course_id', '=', 'courses.id')
            ->selectRaw('SUM(`lectures`.`duration`) as course_duration')
            ->where('courses.id', $this->id)
            ->first();

        $time = $query->course_duration;
        $time = CarbonInterval::seconds($time)->cascade()->format($time>=3600 ? '%hhr %imin' : '%imin');
        $time = str_replace(' 0min', '', $time);
        return $time;
    }

    public function rating()
    {
        $rating= DB::table('reviews')
            ->join('enrollments', 'enrollments.id', '=', 'reviews.enrollment_id')
            ->join('courses', 'courses.id', '=', 'enrollments.course_id')
            ->selectRaw('SUM(`reviews`.`stars`) as stars, COUNT(`reviews`.`enrollment_id`) as voters')
            ->where('courses.id', $this->id)
            ->first();

        return [
            "stars" => $rating->stars,
            "voters" => $rating->voters,
            "rating" => $rating->stars/2/$rating->voters

        ];
        
    }

    public function reviewing()
    {
        $rating= DB::table('reviews')
            ->join('enrollments', 'enrollments.id', '=', 'reviews.enrollment_id')
            ->join('users', 'users.id', '=', 'enrollments.student_id')
            ->leftJoin('images', function ($join) {
                $join->on('images.imageable_id', '=', 'users.id')
                     ->where('images.imageable_type', '=', User::class);
            })
            ->select('users.name', 'reviews.content', 'reviews.stars', 'images.path')
            ->where('enrollments.course_id', $this->id)
            ->get();
            
        return $rating;

        // $query = 
        // 'SELECT `users`.`name`, `reviews`.`content`, `reviews`.`stars`, `images`.`path`
        // FROM `reviews`
        //     INNER JOIN `enrollments` ON (`enrollments`.`id` = `reviews`.`enrollment_id`)
        //     INNER JOIN `users` ON (`users`.`id` = `enrollments`.`student_id`)
        //     LEFT JOIN `images` ON (`images`.`imageable_id` = `users`.`id` AND `images`.`imageable_type` LIKE "%User")
        // WHERE `enrollments`.`course_id` = ?';

        // $reviews = DB::select($query, [$this->id]);
        // return json_encode($reviews);

    }
}
