<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class PracticeController extends Controller
{
    public function index()
    {
        if (!Gate::allows('access-all-practices')) {
            abort(403);
        }

        $domains = Domain::listOfPractices();
        return view('practices.all')->with('domains', $domains);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        // non admin users can only access published practices
        if (!Gate::allows('access-all-practices')) {
            if (!Practice::isPublished($id)) {
                Session::flash('error', "La practice à laquelle vous essayez d'afficher n'est pas publiée ou n'existe pas !");
                return redirect()->route('homepage');
            }
        }

        $practice = Practice::with('opinions', 'user')->find($id);
        $references = Reference::sortedByDescription()->get();

        return view('practices.update')
            ->with('practice', $practice)
            ->with('references', $references);
    }

    public function publish(int $id)
    {
        $practice = Practice::findOrFail($id);
        $response = Gate::inspect('publish', $practice);

        if ($response->allowed()) {
            $practice->publish();
            session()->flash('success', __('La practice a été publiée !'));
        } else {
            session()->flash('error', __("La practice n'a pas pu être publiée !"));
        }

        return redirect()->back();
    }
}
