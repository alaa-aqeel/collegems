<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{


    public function show($id)
    {
        $project = Project::find($id);
        if (!$project){
            return response()->json([ 'error' => 'not found' ], 404);
        }

        sleep(1);

        return response()->json([
            'project' =>  [
                'id' => $project->id,
                'name' => $project->name,
                'user' => $project->user->fullname,
                'college' => $project->college->name,
                'create' => $project->create_at,
                'description' => $project->description,
                 'link' =>  $project->link,
                 'active' =>  $project->active,
            ]
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $project = Project::find($id);
        if(!$project){

            return response()->json(['msg' => 'Not found'], 404);
        }

        $project->active = !$project->active;
        $project->save();

        return response()->json([
            'msg' => 'Successfuly update',
            'project' => [
                'id' => $project->id
            ]
        ]);
    }

}
