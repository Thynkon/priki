<?php

namespace App\View\Components;

use App\Models\Opinion;
use Illuminate\View\Component;

class OpinionFeedback extends Component
{
    public Opinion $opinion;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Opinion $opinion)
    {
        $this->opinion = $opinion;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.opinion-feedback');
    }
}
