<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
        'company_id',
        'user_id',
        'comment',
        'rating',
        'status',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
