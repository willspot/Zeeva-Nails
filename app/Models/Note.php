<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // Only these fields can be mass-assigned
    protected $fillable = [
        'content',
        'user_id',
    ];
}
