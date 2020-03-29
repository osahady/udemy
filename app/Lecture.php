<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = [
        'title', 'duration', 'section_id'
    ];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
