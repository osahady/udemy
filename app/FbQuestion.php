<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbQuestion extends Model
{
    protected $fillable = [
        'question',
    ];

    public function fbAnswers()
    {
        return $this->hasMany('App\FbAnswer');
    }

    public function enrollments()
    {
        return $this->belongsToMany('App\Enrollment')
                    ->using('App\Feedback');
    }
}
