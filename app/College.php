<?php

namespace App;

use App\Role;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{

    protected $fillable = [
        'name', 'img'
    ];

    function admin(){
        return $this->hasMany('App\User')
                ->where('role_id',
                        Role::where('name', 'admin')
                            ->fist()
                            ->id
            );
    }

    function student(){
        return $this->hasMany('App\User')
            ->where('role_id',
                        Role::where('name', 'student')
                                ->fist()
                                ->id
                    );
    }


    function users(){

        return $this->hasMany('App\User');
    }

    function projects(){

        return $this->hasMany('App\Project');
    }


}
