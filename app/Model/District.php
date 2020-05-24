<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'province_id',
        'district_name',
        'image',
    ];

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function municipals(){
        return $this->hasMany(Municipal::class);
    }

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function get_image(){
        if(filter_var($this->image, FILTER_VALIDATE_URL)){
            return $this->image;
        }
        else{
            return asset($this->image);
        }
    }
}
