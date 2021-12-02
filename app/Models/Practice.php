<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    protected $table = "practices";
    protected $primaryKey = "id";

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function publicationState()
    {
        return $this->belongsTo(PublicationState::class);
    }

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public static function publishedModified(int $nbrDays)
    {
        $date = Carbon::now('UTC')->startOfDay();
        $date->subDays($nbrDays);

        return self::where('updated_at', '>=', $date)
            ->whereHas('publicationState', function($q) {
                $q->where('slug', 'PUB');
            })->get();

    }
}
