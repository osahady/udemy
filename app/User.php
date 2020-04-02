<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'resume', 'locale'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function views()
    {
        return $this->belongsToMany('App\Lecture', 'views') // overriding convention (lecture_user)
                    // default: echo $view->pivot->completed
                    // ->as('xyz') // Rename (pivot attribute name) => echo $view->xyz->completed
                    ->withTimestamps() // Adding timestamps columns to pivot table
                    ->withPivot('completed', 'position'); // Adding intermediate custom columns
    }

    public function enrolledCourses()
    {
        return $this->hasMany('App\Enrollment', 'student_id');
    }

    public function createdCourses()
    {
        return $this->hasMany('App\Course', 'teacher_id');
    }

    // public function getRouteKeyName ()
    // {
    //     return 'name';
    // }
}
