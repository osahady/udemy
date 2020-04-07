<?php

namespace App;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'title', 'course_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function lectures()
    {
        return $this->hasMany('App\Lecture');
    }

    public function duration($time)
    {
        return CarbonInterval::seconds($time)->cascade();
    }

    
}
