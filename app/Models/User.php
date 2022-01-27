<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fullname',
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public function feedbacks()
    {
        return $this->belongsToMany(Opinion::class, 'user_opinion')->as('feedback')->withPivot('comment', 'points');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function practices()
    {
        return $this->hasMany(Practice::class);
    }

    // Set a default role for new users
    // Reference: https://stackoverflow.com/a/43127168
    public static function create(array $attributes)
    {
        // Only set a default role if it is not provided
        if (!array_key_exists('role_id', $attributes)) {
            $attributes["role_id"] = Role::where('slug', 'MBR')->firstOrFail()->id;
        }

        return (new static)->newQuery()->create($attributes);
    }

    public function commentsOfPractice($practice)
    {
        return $this->opinions()->whereHas('practice', function (Builder $query)  use ($practice) {
            $query->where($practice->getKeyName(), $practice->id);
        });
    }

    public function wrote(Opinion $opinion)
    {
        // getKeyName returns the primary key field
        return $this->opinions()->where($opinion->getKeyName(), $opinion->id)->exists();
    }

    public function isModerator()
    {
        return $this->role->slug === 'MOD';
    }

    public function changelogs()
    {
        return $this->belongsToMany(Practice::class, 'changelogs')->as('changelogs')->withPivot('reason', 'previously', 'created_at', 'updated_at');
    }
}
