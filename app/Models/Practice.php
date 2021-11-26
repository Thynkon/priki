<?php

namespace App\Models;

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

    public function publication_state()
    {
        return $this->belongsTo(PublicationState::class);
    }
}
