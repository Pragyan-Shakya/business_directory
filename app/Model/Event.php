<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'location',
        'event_date',
        'description',
        'status',
        'image'
    ];

    public function get_image(){
        if(filter_var($this->image, FILTER_VALIDATE_URL)){
            return $this->image;
        }
        else{
            return asset($this->image);
        }
    }
}
