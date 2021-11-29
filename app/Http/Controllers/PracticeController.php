<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Http\Controllers\Controller;

class PracticeController extends Controller
{
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
}
