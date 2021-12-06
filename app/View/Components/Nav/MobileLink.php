<?php

namespace App\View\Components\Nav;

use Illuminate\View\Component;

class MobileLink extends Component
{
    private string $name;
    private string $route;
    private bool   $isActive;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $route)
    {
        $this->name = $name;
        $this->route = $route;
        $this->isActive = request()->fullUrlIs($route);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav.mobile-link')->with([
            'name' => $this->name,
            'route' => $this->route,
            'isActive' => $this->isActive,
        ]);
    }
}
