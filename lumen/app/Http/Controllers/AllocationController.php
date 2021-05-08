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
            'threat_id'  => 'required|integer',
            'hero_id'    => 'required|integer',
            'status_id'  => 'required|integer'
        ]);

        $allocation = Allocation::create($request->only(['threat_id', 'hero_id', 'status_id']));

        return response()->json([
            "success"     => true,
            "allocation"  => $allocation
        ],200);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'threat_id'  => 'integer',
            'hero_id'    => 'integer',
            'status_id'  => 'integer'
        ]);

        $allocation = Allocation::findOrFail($id);

        if($request->input('threat'))
        {
            Threat::findOrFail($request->threat);
        }

        if($request->input('hero'))
        {
            Hero::findOrFail($request->hero);
        }

        if($request->input('status'))
        {
            Status::findOrFail($request->status);
        }

        $allocation->update($request->only(['threat_id', 'hero_id', 'status_id']));

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

        $allocation->delete();

        return response()->json([
            "success" => false,
            "message" => "Allocation destroyed with success"
        ],200);
    }



}
