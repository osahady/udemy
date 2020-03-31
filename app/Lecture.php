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
        return $this->hasMany('App\Comment');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    // public function users()
    // {
    //     return $this->belongsToMany('App\User', 'views');
    // }

    public function views()
    {
        return $this->belongsToMany('App\Lecture', 'views') // overriding convention (lecture_user)
                    // default: echo $view->pivot->completed;
                    // ->as('table') // Rename (pivot attribute name) [for fetching data from database] => echo $view->table->completed
                    ->withTimestamps() // Adding timestamps columns to pivot table
                    ->withPivot('completed', 'position'); // Adding intermediate custom columns
    }
}
