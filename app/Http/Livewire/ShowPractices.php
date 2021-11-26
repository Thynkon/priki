<?php

namespace App\Http\Livewire;

use App\Models\Practice;
use App\Models\PublicationState;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPractices extends Component
{
    use WithPagination;

    public const DEFAULT_LIMIT = 5;

    public int $limit = self::DEFAULT_LIMIT;
    protected $listeners = ['update' => 'update'];

    public function update($limit)
    {
        $this->limit = $limit;
        $this->resetPage();
    }

    public function render()
    {
        $date = Carbon::now('UTC')->startOfDay();
        $date->subDays($this->limit);
        $state = PublicationState::where('slug', 'PUB')->get()[0];
        $practices = Practice::where([
            ['publication_state_id', $state->id],
            ['updated_at', '>=', $date->toDateTimeString()]
        ])->paginate(9);

        return view('livewire.show-practices')->with(['practices' => $practices]);
    }
}
