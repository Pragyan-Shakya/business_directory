<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'status',
        'top',
    ];

    public function companies(){
        return $this->hasMany(Company::class, 'industry_id');
    }
}
