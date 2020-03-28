<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FbAnswer extends Model
{
    protected $fillable = [
        'answer', 'fb_answer_id'
    ];
}
