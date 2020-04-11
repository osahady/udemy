<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Feedback extends Pivot
{
    protected $primaryKey = 'enrollment_id';

    //overriding a method getRouteKeyName from model
    //to get a feedback by enrollment_id
    // public function getRouteKeyName ()
    // {
    //     return 'enrollment_id';
    // }
}
