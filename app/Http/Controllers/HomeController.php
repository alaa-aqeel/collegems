<?php

namespace App\Http\Controllers;

use App\College;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){

        if (auth()->user()){
            if(!auth()->user()->email_verified_at){ return redirect('/email/verify');  }
            if (auth()->user()->college){
                $project = College::find(auth()->user()->college->id)->projects()->where('active', 1)->paginate(15);

            }
            return view('home',[
                'projects'=> isset($project) ? $project : []
            ]);
        }
        return view('index');
    }
}
