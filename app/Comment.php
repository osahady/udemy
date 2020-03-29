<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'lecture_id', 'comment_id'
    ];

    public function lecture()
    {
        return $this->belongsTo('App\Lecture');
    }

    //reflexive relation
    public function ansewrs()
    {
        return $this->hasMany('App\Comment'); //owning model _id (convetion) <=> comment_id
    }

    public function question()
    {
        return $this->belongsTo('App\Comment', 'comment_id'); //name of relationship method _ primary key  <=> question_id
    }
}
