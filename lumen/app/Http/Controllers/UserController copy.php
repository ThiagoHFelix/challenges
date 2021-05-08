<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return response()->json([User::get()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
            "name"      => "required"
        ]);
        
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'api_token' => Str::random(60)
        ]);

        $user->password = Hash::make($request->password);

        $user->save();    

        return response()->json(['success' => true, 'user' => $user]);
    }

}
