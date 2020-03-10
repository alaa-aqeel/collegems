<?php

namespace App\Http\Controllers\API;

use App\College;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CollegeController extends Controller
{
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:colleges',
            // 'img'   => 'image',
        ]);

        if ($validator->fails()) {

            return response()->json([$validator], 401);
        }

        $college = College::create([
            'name' => $request->name
        ]);

        // if ($request->img){
        //     $image = md5_file($request->img).'.'.$request->img->extension();
        //     if(!file_exists(storage_path("public/images/projects/$image"))){
        //         $request->img->storeAs('/public/images/projects/',$image);
        //     }
        //     $college->img = $image;
        //     $college->save();
        // }

        return response()->json([
            'msg' => 'Successfuly add college',
            'college'=> [
                'id' => $college->id
            ]
        ]);
    }

    public function destroy($id){
        College::find($id)->delete();

        return response()->json(['msg' => 'Successfuly delete College']);
    }
}
