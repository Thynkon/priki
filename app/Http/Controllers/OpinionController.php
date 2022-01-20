<?php

namespace App\Http\Controllers;

use App\Helpers\Vote;
use App\Models\Opinion;
use App\Models\Practice;
use App\Models\Reference;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OpinionCreateRequest;
use App\Http\Requests\FeedbackCommentRequest;

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
        $reference = Reference::findOrFail($validated_data['reference_id']);

        $opinion = Opinion::make(["description" => $validated_data["opinion"]]);
        $opinion->user()->associate($user);
        $opinion->practice()->associate($practice);

        $opinion->save();

        $opinion->references()->attach($reference);

        session()->flash('success', __("Vous avez commenté la practice !"));

        return redirect()->back()->withInput();
    }

    public function delete(int $id)
    {
        $opinion = Opinion::find($id);
        if (!Auth::user()->wrote($opinion)) {
            session()->flash('error', __('Vous ne pouvez pas suprimmer des opinions autres que les vôtres !'));
            return redirect()->back();
        } else {
            $opinion->delete();
            session()->flash('success', __('Votre opinion a été suprimmée !'));
            return redirect()->back()->withInput();
        }
    }

    private function vote(int $opinion_id, int $vote)
    {
        $opinion = Opinion::findOrFail($opinion_id);

        if (Auth::user()->wrote($opinion)) {
            session()->flash('error', __('Vous ne pouvez pas vote votre opinion !'));
            return redirect()->back()->withInput();
        }

        if ($vote === Vote::UPVOTE) {
            $opinion->upvote();
        } else {
            $opinion->downvote();
        }

        session()->flash('success', __("Vous avez voté l'opinion !"));
        return redirect()->back()->withInput();
        
    }

    public function upvote(int $opinion_id)
    {
        return $this->vote($opinion_id, Vote::UPVOTE);
    }

    public function downvote(int $opinion_id)
    {
        return $this->vote($opinion_id, Vote::DOWNVOTE);
    }

    public function comment(FeedbackCommentRequest $request, int $opinion_id)
    {
        $validated_data = $request->validated();
        // make sure that opinion exists
        $opinion = Opinion::findOrFail($opinion_id);
        $user = Auth::user();

        $user->feedbacks()->attach($opinion->id, [
            'points' => 0, 'comment' => $validated_data['comment']
        ]);

        session()->flash('success', __('Vous avez commenté !'));
        return redirect()->back()->withInput();
    }

}
