<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'reason', 'user_id', 'course_id'
    ];

    public function review()
    {
        return $this->hasOne('App\Review');
    }
}
