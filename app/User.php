<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Custom\Storage;

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


    /*
     *  GET Avatar for the user from storage cloud
     */
    function getAvatar(){

        return Storage::url($this->image, 'users');
    }


    /* Relationship  Many To Many
     *
     * Get all projects for the user
    */
    function projects(){

        return $this->belongsToMany('App\Project' ,'project_user');
    }

    /* Relationship  One To Many (Inverse)
     *
     * Get role for the user
     */
    function role(){

        return $this->belongsTo('App\Role');
    }

    /* Relationship  One To Many (Inverse)
     *
     * Get college for the user
     */
    function college(){

        return $this->belongsTo('App\College');
    }

    /* Relationship  One To Many (Inverse)
     *
     * Get stage for the user
     */
    function stage(){

        return $this->belongsTo('App\Stage');
    }

}
