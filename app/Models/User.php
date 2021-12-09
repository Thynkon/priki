<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

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

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Set a default role for new users
    // Reference: https://stackoverflow.com/a/43127168
    public static function create(array $attributes)
    {
        // Only set a default role if it is not provided
        if (!array_key_exists('role_id', $attributes)) {
            $attributes["role_id"] = Role::where('slug','MBR')->firstOrFail()->id;
        }

        return (new static)->newQuery()->create($attributes);
    }
}
