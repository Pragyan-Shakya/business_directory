<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'title',
        'email',
        'address',
        'phone',
        'mobile',
        'fax',
        'description',
        'website',
        'total_employees',
        'branches',
        'industry_id',
        'ownership',
        'established_date',
        'moderator_id',
        'logo',
        'cover_image',
        'user_id',
        'slug',
        'seo',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function moderator(){
        return $this->belongsTo('App\User', 'moderator_id');
    }

    public function get_logo(){
        if(filter_var($this->logo, FILTER_VALIDATE_URL)){
            return $this->logo;
        }
        else{
            return asset($this->logo);
        }
    }

    public function get_cover_image(){
        if(filter_var($this->cover_image, FILTER_VALIDATE_URL)){
            return $this->cover_image;
        }
        else{
            return asset($this->cover_image);
        }
    }

    public function galleries(){
        return $this->hasMany('App\Model\Gallery', 'company_id');
    }
}
