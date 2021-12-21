<?php

namespace App\View\Components;

use App\Models\Opinion;
use Illuminate\View\Component;
use App\Models\User;

class OpinionFeedback extends Component
{
    public User $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
