<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name', 
        'description', 
        'description2', 
        'description3', 
    ];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}
