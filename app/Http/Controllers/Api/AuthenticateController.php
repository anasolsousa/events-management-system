<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Http\Requests\RegisterRequest;

class AuthenticateController extends Controller
{
    public function register(RegisterRequest $request)
    {
       $userExists = User::where('email', $request->email)->first();

       if($userExists) 
       {
        return response()->json([
            'error'=> "Email já esta registado"
        ], 400);
       }

       $user = new User();

       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->role_id = 1;

       $user->save();

       $token = JWTAuth::claims([
            'role' => $user->role->role
       ])->fromUser($user);
       
       return response()->json([
        "user" => $user,
        "token" => $token
       ], 201);
    }

    public function login(Request $request)
    {
        
        $login = JWTAuth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);


        if(!$login) {
            return response()->json([
                "error" => "Wrong credentials"
            ],400);
        }


        $user = auth()->user();

        $token = JWTAuth::claims([
            "role"=> "user"
        ])->fromUser($user);

        return response()->json([
            "message" => "Autenticado com sucesso",
            "token" => $token
        ]);
    }
}
