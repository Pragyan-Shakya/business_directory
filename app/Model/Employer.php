<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    //
    protected $fillable = [
        'user_id',
        'top_employer',
        'status',
        'image',
    ];

    public function companies(){
        return $this->hasMany('App\Model\Company', 'employers_id');
    }

    public function get_name(){
        $user = User::find($this->user_id);
        return $user->full_name();
    }
}
