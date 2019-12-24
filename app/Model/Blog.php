<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image',
        'author',
        'author_image',
        'author_description',
        'author_facebook_link',
        'author_google_link',
        'seo_title',
        'seo_description',
        'status',
    ];

    public function get_image(){
        if(filter_var($this->image, FILTER_VALIDATE_URL)){
            return $this->image;
        }
        else{
            return asset($this->image);
        }
    }

    public function get_author_image(){
        if(filter_var($this->author_image, FILTER_VALIDATE_URL)){
            return $this->author_image;
        }
        else{
            return asset($this->author_image);
        }
    }
}
