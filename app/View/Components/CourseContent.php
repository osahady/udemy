<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CourseContent extends Component
{
    protected $course;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($xyz)
    {
        $this->course = $xyz;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.course-content');
    }

    public function sections()
    {
        return $this->course->sections;
    }
}
