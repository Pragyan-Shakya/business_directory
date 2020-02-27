<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SaveListing extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
    ];
}
