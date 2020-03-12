<?php

namespace App;

use App\User;
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
                            ->first()
                            ->id
            );
    }

    function user($rolename){
        // return $this->hasMany('App\User')
        //     ->where('role_id',
        //                 Role::where('name', 'student')
        //                         ->first()
        //                         ->id
        //             );

        return User::whereHas('roles', function ($query) {
            $query->where('name', $rolename);
        });
    }


    function users(){

        return $this->hasMany('App\User');
    }

    function projects(){

        return $this->hasMany('App\Project');
    }


}
