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

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'views');
    }
}
