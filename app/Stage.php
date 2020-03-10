<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $fillable = [
        'fullname'
    ];


    function users(){

        return $this->hasMany('App\User');
    }

    function projects(){

        return $this->hasMany('App\Project');
    }
}
