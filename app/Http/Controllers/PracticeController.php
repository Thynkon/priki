<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOpinionRequest;
use App\Models\Opinion;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOpinionRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();
        $practice = Practice::find($data["practice_id"]);

        $opinion = Opinion::make(["description" => $data["opinion"]]);
        $opinion->user()->associate($user);
        $opinion->practice()->associate($practice);

        $opinion->create();

        return view('homepage');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $practice = Practice::find($id);
        return view('practices.update')->with(['practice' => $practice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
