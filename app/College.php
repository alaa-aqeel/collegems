<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{

    protected $fillable = [
        'name', 'img'
    ];

    function admin(){

        return $this->hasMany('App\User')->where('role_id', 1);
    }

    function users(){

        return $this->hasMany('App\User')->where('role_id', 2);
    }

    function projects(){

        return $this->hasMany('App\Project');
    }


}
