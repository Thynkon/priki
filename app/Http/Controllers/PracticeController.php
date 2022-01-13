<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practice;
use Illuminate\Support\Facades\Session;

class PracticeController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Practice::isPublished($id)) {
            Session::flash('error', "La practice à laquelle vous essayez d'afficher n'est pas publiée ou n'existe pas !");
            return redirect()->route('homepage');
        } else {
            $practice = Practice::with('opinions', 'user')->find($id);
            return view('practices.update')->with(['practice' => $practice]);
        }
    }
}
