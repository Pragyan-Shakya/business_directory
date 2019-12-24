<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'image',
        'status',
        'company_id',
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
