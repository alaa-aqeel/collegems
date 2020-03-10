<?php

namespace App\Http\Controllers;

use App\College;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index(Request $request){

        $project =  Project::where('active',  1);

        if ($query = $request->query('s')){

            $project = $project->where('name','LIKE', "%".$query."%");
        }


        return view("projects", [

            'projects' => $project->paginate(15)
        ]);
    }

    public function show(Request $request, $collegeid){

        $college = College::find($collegeid);

        $project =  $college->projects()->where('active',  1);

        if ($query = $request->query('s')){

            $project = $project->where('name','LIKE', "%".$query."%");
        }


        return view("projects", [
            'college' =>$college,
            'projects' => $project->paginate(15)
        ]);
    }

    public function create(){

        return view("addproject");
    }

    public function store(Request $request){

        // dd( $request->file('image') );
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:projects',
            'link'  => 'required',
            'image' => 'required|image',
            'description' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('/project/create')->withErrors($validator);
        }

        // $request->image.

        // if ($request->image){
        $image = md5_file($request->image).'.'.$request->image->extension();
        if(!file_exists(storage_path("public/images/projects/$image"))){
            $request->image->storeAs('/public/images/projects/',$image);
        }
        // }

        // 'name', 'description', 'link', 'language', 'active', 'user_id', 'college_id'
        $project = Project::create([
            'name' => $request->name,
            'link' => $request->link,
            'image' => $image,
            'description' => $request->description,
        ]);

        if(auth()->user()->stage){
            $project->stage()->associate(auth()->user()->stage);
        }

        if(auth()->user()->college){
            $project->college()->associate(auth()->user()->college);
        }

        $project->users()->attach(auth()->user()->id);
        $project->save();

        return redirect('/');
    }

    public function edit(Request $request, $id){
        $project =  auth()->user()->projects()->find($id); // Project::find($id);

        if (!$project){
            return redirect()->back();
        }

        return view('editproject',[ 'project' => Project::find($id)]);

    }

    public function update(Request $request, $id){
        $project =  auth()->user()->projects()->find($id);

        if (!$project){
            return redirect()->back();
        }

        if($request->image){
            $image = md5_file($request->image).'.'.$request->image->extension();
            if(!file_exists(storage_path("public/images/projects/$image"))){
                $request->image->storeAs('/public/images/projects/',$image);
            }

            $project->image = $image;
            $project->save();
        }

        $project->update($request->input());

        return redirect()->back();
    }

    // public function destroy(){
    //     auth()->user()
    //             ->projects()
    //             ->find($id)
    //             ->delete();
    //     return redirect()->back();
    // }

}
