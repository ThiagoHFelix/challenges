<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function index()
    {
        return response()->json(Status::get());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|unique:status',
        ]);

        $status = Status::create($request->only(['title']));

        return response()->json([
            "success"  => true,
            "status"   => $status
        ],200);

    }

    public function update(Request $request, $id)
    {
  
        $this->validate($request, [
            'title'       => 'unique:status',
        ]);

        $status = Status::find($id);

        if(!$status)
        {
            return response()->json([
                "success" => false,
                "message" => "Status not found"
            ],404);
        }    

        $status->update($request->only(['title']));

        return response()->json([
            "success"  => true,
            "status"   => $status
        ],200);

    }

    public function destroy($id)
    {
        $status = Status::find($id);

        if(!$status)
        {
            return response()->json([
                "success" => false,
                "message" => "Status not found"
            ],404);
        }    

        $status->delete();

        return response()->json([
            "success" => false,
            "message" => "Status destroyed with success"
        ],200);
    }



}
