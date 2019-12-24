<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'status',
        'message',
        'avatar',
    ];

    public function get_avatar(){
        if(filter_var($this->avatar, FILTER_VALIDATE_URL)){
            return $this->avatar;
        }
        else{
            return asset($this->avatar);
        }
    }
}
