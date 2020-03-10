<?php

namespace App\Http\Controllers;

use App\User;
use App\College;
use App\Stage;
use App\Project;
use App\Role;
use App\Tranining;
use Illuminate\Http\Request;

class AdminViewController extends Controller
{

    public function index(){

        return view('admin.dashborad', [
            'users' => User::all()->take(6),
            'colleges' => College::all(),
            'projects' => Project::all()->take(6),
            'tranining'  => Tranining::all()->take(4)
        ]);
    }

    public function users(Request $request,User $users){

        if ( $collegeid = $request->query('college') ){
            $users = College::find($collegeid)->users();
        }

        if ( $stage = $request->query('stage') ){
            $users = $users->where('stage_id', $stage);
        }

        if ($query = $request->query('s')){

            $users = $users->where('fullname','LIKE', "%".$query."%");
        }


        return view('admin.users',[
            'stages' => Stage::all(),
            'roles' => Role::all(),
            'users' => $users->paginate(12)
        ]);
    }

    public function projects(Request $request, $active){

        $projects = Project::where('active',  !!$active);

        
        if ( $collegeid = $request->query('college') ){
            $projects = $projects->where('college_id', $collegeid);
        }

        if ( $stage = $request->query('stage') ){
            $projects = $projects->where('stage_id', $stage);
        }

        if ($query = $request->query('s')){

            $projects = $projects->where('name','LIKE', "%".$query."%");
        }

        return view('admin.projects',[
            'stages' => Stage::all(),
            'projects' => $projects->paginate(15)
        ]);
    }

    public function tranining(Request $request){
        $tran = Tranining::paginate(15);

        return view('admin.tranining',[
            'trans' => $tran
        ]);
    }

}
