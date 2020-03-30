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

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function student()
    {
        return $this->belongsTo('App\User'); //the foreign key will be by convention
        //the name of the relationship method (student) _ primary key [student_id]
    }

    public function fbQuestions()
    {
        return $this->belongsToMany('App\FbQuestion')
                    ->using('App\Feedback');
    }
}
