<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'id', 'fullname', 'email', 'password', 'active', 'gender', 'avatar', 'github', 'work', 'address',
        'stage_id','role_id', 'college_id'
    ];

    
    protected $hidden = [
        'password', 'remember_token', 'role_id', 'college_id', 'stage_id'
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function projects(){

        return $this->belongsToMany('App\Project' ,'project_user');
    }

    function role(){

        return $this->belongsTo('App\Role');
    }

    function college(){

        return $this->belongsTo('App\College');
    }
    
    function stage(){

        return $this->belongsTo('App\Stage');
    }
    
}
