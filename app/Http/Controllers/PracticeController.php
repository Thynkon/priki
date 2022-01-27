<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdatePracticeRequest;

class PracticeController extends Controller
{
    public function index()
    {
        if (!Gate::allows('access-all-practices')) {
            abort(Response::HTTP_FORBIDDEN);
        }

        $domains = Domain::listOfPractices()->get();
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

    public function edit(int $id)
    {
        $practice = Practice::findOrFail($id);
        $response = Gate::inspect('update', $practice);

        if ($response->allowed()) {
            return view('practices.edit')->with('practice', $practice);
        } else {
            abort(403, __('Vous ne pouvez pas éditer le titre de cette practice !'));
        }
    }

    public function update(UpdatePracticeRequest $request, int $id)
    {
        $data = $request->validated();
        $existing_practice = Practice::byTitle($data['title'])->get();
        $practice = Practice::findOrFail($id);
        $old_title = "";

        $response = Gate::inspect('update', $practice);

        // deny access if user is not mod or owner of the practice
        if (!$response->allowed()) {
            abort(403);
        }

        if ($existing_practice->isNotEmpty()) {
            session()->flash('error', __('Il existe déjà une practice avec ce titre !'));
            return redirect()->back()->withInput();
        } else {
            $old_title = $practice->title;
            $practice->title = $data['title'];
            $practice->save();
            session()->flash('success', __('Le titre de la practice a été modifié !'));
        }

        $practice->changelogs()->attach(Auth::user()->id, [
            'reason' => $data['reason'],
            'previously' => $old_title,
        ]);

        $practice->save();

        return redirect()->route('practice.update', ['id' => $id]);
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
