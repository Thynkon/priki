<?php

namespace App\View\Components;

use App\Models\Practice;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class OpinionForm extends Component
{
    public Practice $practice;
    public Collection $references;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Practice $practice, Collection $references)
    {
        $this->practice = $practice;
        $this->references = $references;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.opinion-form')->with('practice', $this->practice)->with('references', $this->references);
    }
}
