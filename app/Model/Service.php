<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'company_id',
        'title',
        'icon',
        'status',
        'order',
        'description',
    ];
}
