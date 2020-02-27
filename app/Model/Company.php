<?php

namespace App\Model;

use App\Model\Review;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'title',
        'email',
        'address',
        'province_id',
        'district_id',
        'municipal_id',
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
        'map',
    ];

    public function industry(){
        return $this->belongsTo('App\Model\Industry', 'industry_id');
    }
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
    public function events(){
        return $this->hasMany('App\Model\Event', 'company_id')->orderBy('event_date', 'ASC');
    }
    public function services(){
        return $this->hasMany('App\Model\Service', 'company_id')->orderBy('order');
    }
    public function jobs(){
        return $this->hasMany('App\Model\Job', 'company_id');
    }
    public function notices(){
        return $this->hasMany('App\Model\Notice', 'company_id');
    }
    public function reviews(){
        return $this->hasMany('App\Model\Review', 'company_id');
    }
    public function avgReview(){
        if($this->reviews()){
            return floor(Review::where('company_id', $this->id)->where('status', 'Active')->avg('rating'));
        }else{
            return 0;
        }
    }
}
