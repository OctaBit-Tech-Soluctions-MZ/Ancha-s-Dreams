<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CourseCard extends Component
{

    public $course;
    public $isInstructorPainel;

    /**
     * Create a new component instance.
     */
    public function __construct($course, $isInstructorPainel = false)
    {
        $this->course = $course;
        $this->isInstructorPainel = $isInstructorPainel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.course-card');
    }
}
