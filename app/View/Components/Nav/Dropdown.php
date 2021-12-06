<?php

namespace App\View\Components\Nav;

use Illuminate\View\Component;

class Dropdown extends Component
{
    private string $name;
    private string $route;
    private string $title;
    private bool   $isActive;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $route, string $routeGroup, ?string $title)
    {
        $this->name = $name;
        $this->route = $route;
        $this->title = $title;
        $this->isActive = request()->is($routeGroup . '*');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav.dropdown')->with([
            'name' => $this->name,
            'route' => $this->route,
            'title' => $this->title,
            'isActive' => $this->isActive,
        ]);
    }
}
