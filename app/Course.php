<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeWithMeta(Builder $query)
    {
        $query->withCount([
            'enrollments',
            'enrollments as voters' => function ($q) {
                return $q->has('review');
            }
        ])->with([
            'sections' => function ($q) {
                $q->join('lectures', 'lectures.section_id', '=', 'sections.id')
                    ->selectRaw('SUM(lectures.duration) as section_duration, sections.*')
                    ->groupBy('sections.id');
            },
            'enrollments' => function ($q) {
                $q->join('reviews', 'reviews.enrollment_id', '=', 'enrollments.id')
                    ->selectRaw('SUM(reviews.stars) as stars, enrollments.*')
                    ->groupBy('enrollments.id');
            }
        ]);
    }

    public function studentReviews()
    {
        return $this->enrollments()
            ->select('id', 'student_id')
            ->with('review')
            ->has('review')
            ->with('student.image:imageable_id,path')
            ->with('student:id,name');
    }
}
