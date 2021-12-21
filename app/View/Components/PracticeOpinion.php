<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Opinion;

class PracticeOpinion extends Component
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
        return view('components.practice-opinion');
    }
}
