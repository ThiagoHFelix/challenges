<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{

    public function index()
    {
        return response()->json(Hero::with('ranking')->get());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'       => 'required|unique:heroes',
            'latitude'   => 'required|numeric',
            'longitude'  => 'required|numeric',
            'ranking_id' => 'required|integer'
        ]);

        $hero = Hero::create($request->only(['name', 'latitude', 'longitude', 'ranking_id']));

        return response()->json([
            "success" => true,
            "hero"    => $hero
        ],200);

    }

    public function update(Request $request, $id)
    {
  
        $this->validate($request, [
            'name'       => 'unique:heroes',
            'latitude'   => 'numeric',
            'longitude'  => 'numeric',
            'ranking_id' => 'integer'
        ]);

        $hero = Hero::find($id);

        if(!$hero)
        {
            return response()->json([
                "success" => false,
                "message" => "Hero not found"
            ],404);
        }    

        $hero->update($request->only(['name', 'latitude', 'longitude', 'ranking_id']));

        return response()->json([
            "success" => true,
            "hero"    => $hero
        ],200);

    }

    public function destroy($id)
    {
        $hero = Hero::find($id);

        if(!$hero)
        {
            return response()->json([
                "success" => false,
                "message" => "Hero not found"
            ],404);
        }    

        $hero->delete();

        return response()->json([
            "success" => false,
            "message" => "Hero destroyed with success"
        ],200);
    }



}
