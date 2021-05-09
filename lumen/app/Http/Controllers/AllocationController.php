<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Hero;
use App\Models\Status;
use App\Models\Threat;
use Illuminate\Http\Request;

class AllocationController extends Controller
{

    public function index()
    {
        return response()->json(Allocation::with(['threat', 'hero', 'status'])->get());
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'threat_id'     => 'required|integer',
            'hero_id'       => 'required_without:hero_name|integer',
            'hero_name'     => 'required_without:hero_id|unique:heroes,name',
            'status_id'     => 'required_without:status_title|integer',
            'status_title'  => 'required_without:status_id|unique:status,title'
        ]);

        $allocation_data = $request->only(['threat_id', 'hero_id', 'status_id']);

        if($request->input('hero_id'))
        {
            Hero::findOrFail($request->hero_id);
        }    
        else if($request->input('hero_name'))
        {
            $hero = Hero::firstOrCreate([
                "name" => $request->hero_name
            ]);
            $allocation_data["hero_id"] = $hero->id;
        }

        if($request->input('status_id'))
        {
            Status::findOrFail($request->status_id);
        }    
        else if($request->input('status_title'))
        {
            $status = Status::firstOrCreate([
                "title" => $request->status_title
            ]);
            $allocation_data["status_id"] = $status->id;
        }
        
        $allocation = Allocation::create($allocation_data);

        $allocation->status;
        $allocation->threat;
        $allocation->hero;

        return response()->json([
            "success"     => true,
            "allocation"  => $allocation
        ],200);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'threat_id'     => 'integer',
            'hero_id'       => 'integer',
            'hero_name'     => 'unique:heroes,name',
            'status_id'     => 'integer',
            'status_title'  => 'unique:status,title'
        ]);

        $allocation_data = $request->only(['threat_id', 'hero_id', 'status_id', 'status_title', 'hero_name']);

        if(!count($allocation_data))
        {
            return response()->json([
                "success" => false,
                "message" => "There is nothing to change"
            ]);
        }    

        $allocation = Allocation::findOrFail($id);
       
        if($request->input('hero_id'))
        {
            Hero::findOrFail($request->hero_id);
        }    
        else if($request->input('hero_name'))
        {
            $hero = Hero::firstOrCreate([
                "name" => $request->hero_name
            ]);
            $allocation_data["hero_id"] = $hero->id;
        }

        if($request->input('status_id'))
        {
            Status::findOrFail($request->status_id);
        }    
        else if($request->input('status_title'))
        {
            $status = Status::firstOrCreate([
                "title" => $request->status_title
            ]);
            $allocation_data["status_id"] = $status->id;
        }
        $allocation->update($allocation_data);

        $allocation->status;
        $allocation->threat;
        $allocation->hero;

        return response()->json([
            "success"     => true,
            "allocation"  => $allocation
        ],200);

    }

    public function destroy($id)
    {
        $allocation = Allocation::find($id);

        if(!$allocation)
        {
            return response()->json([
                "success" => false,
                "message" => "Allocation not found"
            ],404);
        }    

        if($allocation->delete())
        {
            return response()->json([
                "success" => true,
                "message" => "Allocation destroyed with success"
            ],200);
        }

        return response()->json([
            "success" => true,
            "message" => "There was not possible to destroy the allocation"
        ],500);

        
    }



}
