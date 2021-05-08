<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HeroController extends Controller
{

    public function index()
    {
        return response()->json(['heros']);
    }

}
