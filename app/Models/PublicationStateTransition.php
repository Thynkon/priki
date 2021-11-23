<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationStateTransition extends Model
{
    use HasFactory;

    protected $table = "publication_state_transitions";
    protected $primaryKey = "id";
    public $timestamps = false;

}
