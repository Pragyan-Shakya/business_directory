<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactCompany extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'email',
        'message',
        'status',
    ];
}
