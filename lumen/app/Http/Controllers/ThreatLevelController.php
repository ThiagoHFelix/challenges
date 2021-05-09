<?php

namespace App\Http\Controllers;

use App\Models\ThreatLevel;
use Illuminate\Http\Request;

class ThreatLevelController extends Controller
{

    public function index()
    {
        return response()->json(ThreatLevel::get());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'   => 'required|unique:threat_levels'
        ]);

        $threat_level = ThreatLevel::create($request->only(['title']));

        return response()->json([
            "success"       => true,
            "threat_level"  => $threat_level
        ],200);

    }

    public function update(Request $request, $id)
    {
  
        $this->validate($request, [
            'title'   => 'required|unique:threat_levels'
        ]);

        $threat_level = ThreatLevel::find($id);

        if(!$threat_level)
        {
            return response()->json([
                "success" => false,
                "message" => "Threat Level not found"
            ],404);
        }    

        $threat_level->update($request->only(['title']));

        return response()->json([
            "success"       => true,
            "threat_level"  => $threat_level
        ], 200);

    }

    public function destroy($id)
    {
        $threat_level = ThreatLevel::find($id);

        if(!$threat_level)
        {
            return response()->json([
                "success" => false,
                "message" => "Threat Level not found"
            ],404);
        }    

        $threat_level->delete();

        return response()->json([
            "success" => true,
            "message" => "Threat Level destroyed with success"
        ], 200);
    }



}
