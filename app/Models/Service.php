<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title', 'duration', 'price', 'image', 'description', 'features',
    ];

    protected $casts = [
        'features' => 'array', // JSON → array
    ];
}
