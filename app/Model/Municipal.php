<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Municipal extends Model
{
    protected $fillable = [
        'district_id',
        'municipal_name',
    ];

    public function district(){
        return $this->belongsTo(District::class);
    }
}
