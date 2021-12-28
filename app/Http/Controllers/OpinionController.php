<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpinionCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Opinion;
use App\Models\Practice;

class OpinionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpinionCreateRequest $request, int $practice_id)
    {
        $validated_data = $request->validated();

        $user = Auth::user();
        $practice = Practice::findOrFail($practice_id);

        $opinion = Opinion::make(["description" => $validated_data["opinion"]]);
        $opinion->user()->associate($user);
        $opinion->practice()->associate($practice);

        $opinion->save();

        session()->flash('message', 'Opinion successfully added');

        return redirect()->back()->withInput();
    }

    public function delete(int $id)
    {
        $opinion = Opinion::find($id);
        $opinion->delete();

        session()->flash('message', 'Opinion successfully deleted');

        return redirect()->back()->withInput();
    }

}
