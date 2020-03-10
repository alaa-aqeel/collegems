<?php

namespace App\Http\Controllers\API;


use App\Tranining;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TraniningController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lane  $lane
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $validator = Validator::make($request->all(), [
            'support'  => 'required',
            'text'  => 'required',
            'at' => 'required'
        ]);


        if ($validator->fails()) {

            return response()->json($validator, 401);
        }

        $tran = Tranining::create([
            'support' => $request->support,
            'text'    => $request->text,
            'at'      => $request->at
        ]);

        return response()->json([
            'msg'=> 'Successfuly add tranining', 
            'tran' => $tran
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lane  $lane
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tran = Tranining::find($id);

        if (!$tran){
            return response()->json(['msg'=> 'Not found '], 404);
        }
        // dd($request->input());
        $tran->update($request->input());
        
        return response()->json([
            'msg'=> 'Successfuly update tranining', 
            'tran' =>  $tran
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lane  $lane
     * @param  \DummyFullModelClass  $DummyModelVariable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tran = Tranining::find($id);
        if (!$tran){
            return response()->json(['msg'=> 'Not found '], 404);
        }
        $tran->delete();
        return response()->json([
            'msg'=> 'Successfuly delete'
        ]);
    }
}
