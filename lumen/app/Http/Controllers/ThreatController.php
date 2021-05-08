<?php

namespace App\Http\Controllers;

use App\Models\Monster;
use App\Models\Threat;
use App\Models\ThreatLevel;
use Illuminate\Http\Request;

class ThreatController extends Controller
{

    public function index()
    {
        return response()->json(Threat::with('level')->get());                          
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'monster_id' => 'required|integer',
            'level_id'   => 'required|integer'
        ]);

        Monster::findOrFail($request->monster_id);
        ThreatLevel::findOrFail($request->level_id);

        $threat = Threat::create($request->only(['monster_id', 'level_id']));

        return response()->json([
            "success" => true,
            "threat"  => $threat
        ],200);

    }

    public function update(Request $request, $id)
    {
  
        $this->validate($request, [
            'monster_id' => 'integer',
            'level_id'   => 'integer'
        ]);

        if($request->input('monster_id'))
        {
            Monster::findOrFail($request->monster_id);
        }

        if($request->input('level_id'))
        {
            ThreatLevel::findOrFail($request->level_id);
        }

        $threat = Threat::find($id);

        if(!$threat)
        {
            return response()->json([
                "success" => false,
                "message" => "Threat not found"
            ],404);
        }  
        
        $threat->update($request->only(['title','level_id']));

        return response()->json([
            "success"  => true,
            "threat"   => $threat
        ], 200);

    }

    public function destroy($id)
    {
        $threat = Threat::find($id);

        if(!$threat)
        {
            return response()->json([
                "success" => false,
                "message" => "Threat not found"
            ],404);
        }    

        $threat->delete();

        return response()->json([
            "success" => false,
            "message" => "Threat destroyed with success"
        ], 200);
    }



}
