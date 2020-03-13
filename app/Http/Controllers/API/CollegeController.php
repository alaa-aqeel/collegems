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
        ]);

        if ($validator->fails()) {

            return response()->json([$validator], 401);
        }

        $college = College::create([
            'name' => $request->name
        ]);


        return response()->json([
            'msg' => 'Successfuly add college',
            'college'=> [
                'id' => $college->id
            ]
        ]);
    }

    public function destroy($id){
        $college = College::find($id);

        if (!$college){
            return response()->json(['msg' => 'NOT FOUND'], 404);
        }
        College::find($id)->delete();

        return response()->json(['msg' => 'Successfuly delete College']);
    }

    public function update(Request $request, $id){
        $college = College::find($id);

        if (!$college){
            return response()->json(['msg' => 'NOT FOUND'], 404);
        }

        $college->update([
            'name' => $request->name
        ]);

        $college = College::find($id);

        return response()->json(['msg' => 'Successfuly update']);
    }
}
