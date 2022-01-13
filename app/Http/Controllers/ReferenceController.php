<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReferenceCreateRequest;
use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $references = Reference::all();
        return view('references.all')->with('references', $references);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('references.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReferenceCreateRequest $request)
    {
        $validated_data = $request->validated();
        // This should the checked by creating an unique index in reference table and check if an exception was thrown.
        // But, since all students should have the same database, I am not going to add the unique index.
        $existing_reference = Reference::where('url', $validated_data['url'])->get();

        if ($existing_reference->isNotEmpty()) {
            session()->flash('message', __('Il existe déjà une référence avec le même URL!'));
        } else {
            $reference = Reference::create($validated_data);
            session()->flash('message', __('Vous avez créé une nouvelle référence avec succès !'));
        }

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
