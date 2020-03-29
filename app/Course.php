<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function sections()
    {
        return $this->hasMany('App\Section');
    }

    public function requirements()
    {
        return $this->hasMany('App\Requirement');
    }
}
