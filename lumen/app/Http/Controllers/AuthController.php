<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function register(Request $request) {
        
         $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        
        $user = new User([
            'name'=> $request->name,
            'email' => $request->email,
            'remember_token' => Str::random(60)
        ]);

        $user->password = Hash::make($request->password);

        $user->save();
      
        return response()->json([
            'res'=>'User created with success'
        ], 201);
    }

    public function login(Request $request) {
        
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
     
        $user = User::where("email", $request->email)->first();

        if($user && Hash::check($request->password, $user->password))
        {
            $token = $user->createToken('Access token')->accessToken;

            return response()->json([
                'token' => $token
            ], 200);
        }

        return response()->json([
            'res' => 'Unauthorized'
        ], 400);
        
    }

    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

}
