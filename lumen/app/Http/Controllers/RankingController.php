<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use Illuminate\Http\Request;

class RankingController extends Controller
{

    public function index()
    {
        return response()->json(Ranking::get());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|unique:rankings',
            'alias'   => 'required'
        ]);

        $raking = Ranking::create($request->only(['title', 'alias']));

        return response()->json([
            "success"   => true,
            "raking"    => $raking
        ],200);

    }

    public function update(Request $request, $id)
    {
  
        $this->validate($request, [
            'title'   => 'unique:rankings'
        ]);

        $ranking = Ranking::find($id);

        if(!$ranking)
        {
            return response()->json([
                "success" => false,
                "message" => "Ranking not found"
            ],404);
        }    

        $ranking->update($request->only(['title', 'alias']));

        return response()->json([
            "success"   => true,
            "ranking"   => $ranking
        ], 200);

    }

    public function destroy($id)
    {
        $ranking = Ranking::find($id);

        if(!$ranking)
        {
            return response()->json([
                "success" => false,
                "message" => "Ranking not found"
            ],404);
        }    

        $ranking->delete();

        return response()->json([
            "success" => false,
            "message" => "Ranking destroyed with success"
        ], 200);
    }



}
