<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function feedbacks()
    {
        return $this->belongsToMany(User::class, 'user_opinion')->as('feedback')->withPivot('comment', 'points');
    }

    public function upvotes()
    {
        return $this->feedbacks()->wherePivot('points', '>', 0);
    }

    public function downvotes()
    {
        return $this->feedbacks()->wherePivot('points', '<', 0);
    }
}
