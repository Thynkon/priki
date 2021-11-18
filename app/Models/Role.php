<?php

namespace App\Models;

use App\Traits\DatabaseName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, DatabaseName;

    protected $table = "roles";
    protected $primaryKey = "id";
    // Indicates if the model's ID is auto-incrementing.
    public $incrementing = true;
}
