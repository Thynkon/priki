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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOfDomain($query, string $domain)
    {
        return $query->whereHas(
            'domain',
            fn ($q) => $q->where('slug', $domain)
        );
    }

    public function scopePublished($query)
    {
        return $this->wherePublicationState($query, 'PUB');
    }

    public function scopeModifiedInLastDays($query, int $days)
    {
        $date = Carbon::now('UTC')->startOfDay();
        $date->subDays($days);

        return $query->where('updated_at', '>=', $date);
    }

    private function wherePublicationState($query, string $state)
    {
        return $query->whereHas(
            'publicationState',
            fn ($q) => $q->where('slug', $state)
        );
    }

    public static function isPublished(int $id)
    {
        return static::published()->where('id', $id)->exists();
    }

    public function scopeOrderByState($query)
    {
        return $query->orderby('publication_state_id');
    }

    public function scopeOrderByDomain($query)
    {
        return $query->orderBy('domain_id');
    }

    public function canBePublished()
    {
        return $this->publicationState->slug === 'PRO';
    }

    public function publish()
    {
        $publicationState = PublicationState::where('slug', '=', 'PUB')->first();

        $this->publicationState()->associate($publicationState);
        $this->save();
    }

    public function scopeByTitle($query, string $title)
    {
        return $query->where('title', $title);
    }

    public function changelogs()
    {
        return $this->belongsToMany(User::class, 'changelogs')->as('changelogs')->withPivot('reason', 'previously', 'created_at', 'updated_at');
    }
}
