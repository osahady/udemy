<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $fillable = [
        'content', 'course_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
