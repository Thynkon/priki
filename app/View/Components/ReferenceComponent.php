<?php

namespace App\View\Components;

use App\Models\Reference;
use Illuminate\View\Component;

class ReferenceComponent extends Component
{
    public Reference $reference;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Reference $reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.reference-component')->with('reference', $this->reference);
    }
}
