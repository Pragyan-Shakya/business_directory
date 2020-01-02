<?php

namespace App;

use App\Model\Company;
use App\Model\Employer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'gender',
        'phone',
        'status',
        'avatar',
        'profession',
        'education',
        'moderator_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employer(){
        return $this->hasOne('App\Model\Employer', 'user_id');
    }

    public function full_name(){
        return $this->first_name . ' ' . $this->last_name;
    }

    public function get_avatar(){
        if(filter_var($this->avatar, FILTER_VALIDATE_URL)){
            return $this->avatar;
        }
        else{
            return asset($this->avatar);
        }
    }

    public function isEmployer(){
        $user = Employer::where('user_id', $this->id)->get();
        return count($user)>0?true:false;
    }

    public function company(){
        return $this->hasOne('App\Model\Company', 'user_id');
    }

    public function hasCompany(){
        if($this->isEmployer()){
            $company = Company::where('user_id', $this->id)->get();
            return count($company)>0?true:false;
        }
    }
    public function moderator(){
        return $this->belongsTo('App\User', 'moderator_id');
    }
}
