<?php

namespace App\Http\Livewire;

use App\Models\Practice;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Opinion;

class OpinionForm extends Component
{
    public $practice_id;
    public $opinion;

    protected $rules = [
        "practice_id" => "required|numeric",
        "opinion" => "required|string",
    ];

    public function mount($practice_id)
    {
        $this->practice_id = $practice_id;
    }

    public function submit()
    {
        $this->validate();
        $user = Auth::user();
        $practice = Practice::find($this->practice_id);

        $this->opinion = Opinion::make(["description" => $this->opinion]);
        $this->opinion->user()->associate($user);
        $this->opinion->practice()->associate($practice);

        $this->opinion->save();

        session()->flash('message', 'Opinion successfully added');
    }

    public function render()
    {
        $practice = Practice::find($this->practice_id);

        return view('livewire.opinion-form')->with('practice', $practice);
    }
}
