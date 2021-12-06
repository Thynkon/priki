<?php

namespace App\View\Components\Nav;

use Illuminate\View\Component;

class MobileDropdown extends Component
{
    private string $name;
    private bool   $isActive;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $routeGroup)
    {
        $this->name = $name;
        $this->isActive = request()->is($routeGroup . '*');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav.mobile-dropdown')->with([
            'name' => $this->name,
            'isActive' => $this->isActive,
        ]);
    }
}
