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

    function student(){
        // return $this->hasMany('App\User')
        //     ->where('role_id',
        //                 Role::where('name', 'student')
        //                         ->first()
        //                         ->id
        //             );
        return User::whereHas('role', function ($query) {
            $query->where('name', 'student');
        });
    }


    function users(){

        return $this->hasMany('App\User');
    }

    function projects(){

        return $this->hasMany('App\Project');
    }


}
