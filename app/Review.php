<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primaryKey = 'enrollment_id';

    protected $fillable = [
        'stars', 'content'
    ];

    public function enrollment()
    {
        return $this->belongsTo('App\Enrollment');
    }

    
}
