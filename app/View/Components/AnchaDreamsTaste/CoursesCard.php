<?php

namespace App\View\Components\AnchaDreamsTaste;

use App\Models\MyCourse;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CoursesCard extends Component
{
    public $rate = 0;
    /**
     * Create a new component instance.
     */
    public function __construct(public $course, public $isInstructorPainel = false, public $expand = 4)
    {
        $sum = 0;
        $count = 0;
        if (count($course->testimonials) != 0) {
            foreach ($course->testimonials as $testimonial) {
                $sum = $sum + $testimonial->rate;
                $count = $count + 1;
            }
            $this->rate = $sum/$count;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ancha-dreams-taste.courses-card');
    }
}
