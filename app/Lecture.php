<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'title', 'duration', 'section_id'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
}
