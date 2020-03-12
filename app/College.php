<?php

namespace App;

use App\User;
use App\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class College extends Model
{

    protected $fillable = [
        'name', 'img'
    ];

    function admin(){
        return $this->hasMany('App\User')
                ->whereHas('role', function (Builder $query) {
                    $query->where('name','admin');
                });
    }

    function student(){
        return $this->hasMany('App\User')
                ->whereHas('role', function (Builder $query) {
                    $query->where('name','student');
                });
    }


    function users(){

        return $this->hasMany('App\User');
    }

    function projects(){

        return $this->hasMany('App\Project');
    }


}
