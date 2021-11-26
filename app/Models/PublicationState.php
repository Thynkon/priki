<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationState extends Model
{
    use HasFactory;

    protected $table = "publication_states";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function practices()
    {
        return $this->hasMany(Practice::class);
    }
}
