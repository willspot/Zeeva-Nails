<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoyaltyCode extends Model
{
    

    protected $fillable = ['code', 'status', 'full_name', 'phone', 'email'];
    protected $table = 'loyalty_codes';  // explicitly set this if needed

}
