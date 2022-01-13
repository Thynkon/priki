<?php

namespace App\Models;

use App\Models\Opinion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reference extends Model
{
    use HasFactory;

    protected $table = "references";
    protected $primaryKey = "id";
    public $timestamps=false;
    protected $fillable = [
        'description',
        'url'
    ];

    public function opinions()
    {
        return $this->belongsToMany(Opinion::class);
    }
}
