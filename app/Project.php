<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Custom\Storage;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'link', 'language', 'active', 'stage_id', 'college_id', 'image'
    ];

    protected $hidden = [
        'user_id', 'user_id', 'college_id', 'active'
    ];


    /*
     *  GET image for the project from storage cloud
     */
    function getImage(){

        return Storage::url($this->image, 'projects');
    }

    function users(){

        return $this->belongsToMany('App\User', 'project_user');
    }


    function college(){

        return $this->belongsTo('App\College');
    }

    function stage(){

        return $this->belongsTo('App\Stage');
    }
}
