<?php

namespace App\Http\Livewire;

use App\Models\Practice;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPractices extends Component
{
    use WithPagination;

    public const DEFAULT_LIMIT = 5;

    public int $limit = self::DEFAULT_LIMIT;
    protected $listeners = ['update' => 'update'];

    public function update()
    {
        $this->resetPage();
    }

    public function render()
    {
        $practices = Practice::published()->modifiedInLastDays($this->limit)->get();

        return view('livewire.show-practices')->with('practices', $practices);
    }
}
