<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Practice;

class PracticeCard extends Component
{
    public Practice $practice;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Practice $practice)
    {
        $this->practice = $practice;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.practice-card');
    }
}
