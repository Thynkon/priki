<?php

namespace App\View\Components\Nav;

use App\Models\Domain;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $domains = domain::withCount(['practices' => fn ($q) => $q->published()]);

        return view('components.nav.navbar')->with([
            'domains' => $domains->get()
        ]);
    }
}
