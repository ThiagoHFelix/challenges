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
        return response()->json(Threat::with(['monster','level'])->get());                          
    }

    public function show($id)
    {
        $threat = Threat::with(['monster','level'])->findOrFail($id);
        return response()->json($threat);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'monster_id'    => 'required_without:monster_name|integer',
            'monster_name'  => 'required_without:monster_id',
            'level_id'      => 'required_without:level_title|integer',
            'level_title'   => 'required_without:level_id', 
            'latitude'      => 'required|numeric',
            'longitude'     => 'required|numeric'
        ]);

        $threat_data = $request->only(['monster_id' , 'level_id', 'latitude', 'longitude']);

        if($request->input('monster_id'))
        {
            Monster::findOrFail($request->monster_id);
        }
        else if ($request->input('monster_name'))
        {
            $monster = Monster::firstOrCreate([
                "name" => $request->monster_name
            ]);
            $threat_data["monster_id"] = $monster->id;
        }

        if($request->input('level_id'))
        {
            ThreatLevel::findOrFail($request->level_id);
        }
        else if ($request->input('level_title'))
        {
            $threat_level = ThreatLevel::firstOrCreate([
                "title" => $request->level_title
            ]);
            $threat_data["level_id"] = $threat_level->id;
        }
     
        $threat = Threat::create($threat_data);

        $threat->monster;
        $threat->level;

        return response()->json([
            "success" => true,
            "threat"  => $threat
        ],200);

    }

    public function update(Request $request, $id)
    {
  
        $this->validate($request, [
            'monster_id'    => 'integer',
            'level_id'      => 'integer',
            'latitude'      => 'numeric',
            'longitude'     => 'numeric'
        ]);
            
        $fields = $request->only(['monster_id', 'monster_name', 'level_title' , 'level_id', 'latitude', 'longitude']);

        if(!count($fields))
        {
            return response()->json([
                "success" => true,
                "message" => "There is nothing to change"
            ],200);
        }

        $threat_data = $request->only(['monster_id' , 'level_id', 'latitude', 'longitude']);

        if($request->input('monster_id'))
        {
            Monster::findOrFail($request->monster_id);
        }
        else if ($request->input('monster_name'))
        {
            $monster = Monster::firstOrCreate([
                "name" => $request->monster_name
            ]);
            $threat_data["monster_id"] = $monster->id;
        }

        if($request->input('level_id'))
        {
            ThreatLevel::findOrFail($request->level_id);
        }
        else if ($request->input('level_title'))
        {
            $threat_level = ThreatLevel::firstOrCreate([
                "title" => $request->level_title
            ]);
            $threat_data["level_id"] = $threat_level->id;
        }

        $threat = Threat::find($id);

        if(!$threat)
        {
            return response()->json([
                "success" => false,
                "message" => "Threat not found"
            ],404);
        }  
        
        $threat->update($threat_data);

        $threat->monster;
        $threat->level;

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
            "success" => true,
            "message" => "Threat destroyed with success"
        ], 200);
    }



}
