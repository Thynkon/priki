<?php

namespace App\Models;

use App\Helpers\Vote;
use App\Models\Reference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opinion extends Model
{
    use HasFactory;

    protected $table = "opinions";
    protected $primaryKey = "id";

    protected $fillable = ['description', 'user_id', 'practice_id'];

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // a feedback is an user opinion whose comment is not empty
    // a vote is an user opinion whose comment is empty and points are not zero
    private function fb()
    {
        return $this->belongsToMany(User::class, 'user_opinion')->as('feedback')->withPivot('comment', 'points');
    }

    public function feedbacks()
    {
        return $this->fb()->wherePivot('comment', '!=', '');
    }

    private function votes()
    {
        return $this->fb()->wherePivot('comment', '=', '');
    }

    public function upvotes()
    {
        return $this->votes()->wherePivot('points', '>', 0);
    }

    public function downvotes()
    {
        return $this->votes()->wherePivot('points', '<', 0);
    }

    public function upvote()
    {
        return $this->vote(Vote::UPVOTE);
    }

    public function downvote()
    {
        return $this->vote(Vote::DOWNVOTE);
    }

    private function vote(int $vote)
    {
        $exists = $this->votes()->wherePivot('user_id', Auth::id())->exists();
        if (!$exists) {
            $this->votes()->attach(Auth::id(), ['comment' => '', 'points' => $vote]);
        } else {
            $this->votes()->updateExistingPivot(Auth::id(), ['points' => $vote]);
        }
    }

    public function references()
    {
        return $this->belongsToMany(Reference::class);
    }
}
