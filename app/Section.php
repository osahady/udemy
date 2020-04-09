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
        $time = CarbonInterval::seconds($time)->cascade()->format($time >= 3600 ? '%hhr %imin' : '%imin');
        $time = str_replace(' 0min', '', $time);
        return $time;
    }
}
