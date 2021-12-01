<?php

namespace App\Http\Livewire;

use App\Models\Practice;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShowDomainsPractices extends Component
{
    public int $selected_domain_id;
    public Collection $domains;
    public int $numberOfPractices;

    protected $listeners = ['update' => 'update'];

    public function mount(Collection $domains, int $numberOfPractices)
    {
        $this->selected_domain_id = $domains->first()->id;
        $this->numberOfPractices = $numberOfPractices;
        $this->domains = $domains;
    }

    public function render()
    {
        if ($this->selected_domain_id === 0) {
            $practices = Practice::paginate();
        } else {
            $practices = Practice::whereHas('domain', function($q) {
                $q->where('id', '=', $this->selected_domain_id);
            })->paginate();
            
        }

        return view('livewire.show-domains-practices', [
            'domains' => $this->domains,
            'selected_domain_id' => $this->selected_domain_id,
            'practices' => $practices,
            'numberOfPractices' => $this->numberOfPractices,
        ]);
    }
}
