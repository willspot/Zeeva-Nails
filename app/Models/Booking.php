<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'full_name','email','phone','services','preferred_date','preferred_time',
        'special_request','confirmation_code','status'
    ];

    protected $casts = [
        'services' => 'array',
        'preferred_date' => 'date',
    ];
}
