<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function index(Request $request){

        return response()->json(['users' => User::select('id', 'fullname')->all()]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user){
            return response()->json(['msg' => 'Not found user'], 404);
        }

        if ($request->active != $user->active){
            $user->active = $request->active;
        }

        if ($request->role != $user->role->id){
            if ( $role = Role::find($request->role) ){
                $user->role()->associate($role);
            }
        }

        $user->save();

        return response()->json([
            'msg' => 'Successfuly update',
            'user' => [
                'id' => $user->id
            ]
        ]);
    }

    public function show(Request $request, $id){
        $user = User::find($id);

        if(!$user){

            return response()->json(['msg' => 'Not found'], 404);
        }

        return response()->json([
            'user' => [
                'id' => $user->id,
                'avatar'   => $user->getAvatar(),
                'fullname' => $user->fullname,
                'active'   => $user->active,
                'role'     => $user->role_id,
            ]
        ]);
    }


    public function destroy(Request $request, $id){
        $user = User::find($id);

        if(!$user){

            return response()->json(['msg' => 'NOT FOUND'], 404);
        }

        $user->delete();
        return response()->json(['msg' => 'Successfuly delete']);
    }

}


