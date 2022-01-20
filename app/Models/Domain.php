<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $table = "domains";
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function practices()
    {
        return $this->hasMany(Practice::class);
    }

    public function scopeListOfPractices($query)
    {
        return $query->orderBy('slug')->with(['practices' => function ($query) {
            $query->orderBy('publication_state_id', 'ASC');
        }]);
    }
}
