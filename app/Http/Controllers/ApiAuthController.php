<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'Validation failed',
                'errors' => $validator->errors()->all(),
            ], 422);
        }
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $response = [];//need to create token using laravel authentication
        $response['token'] = $user->createToken('MySToken')->accessToken;
        $response['name'] = $user->name;
        $response['email'] = $user->email;

        return response()->json([
            'status' => 1,
            'message' => 'User registered successfully',
            'data' => $response
        ], 201); 
    }
    public function login(Request $request){
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $token = $user->createToken('MyToken')->plainTextToken;
            return response()->json([
                'status' => 1,
                'message' => "User Logged in",
                'data' => [
                    "token" => $token,
                    "user" => $user->name,
                    "email" => $user->email,

                ]

            ]);
            // $response = [];
            // $response['token'] = $user->createToken('MyApp')->accessToken;
            // $response['user'] = $user->name;
            // $response['email'] = $user->email;

            
        }
                return response()->json([
            'status' => 0,
            'message' => 'Login failed, please check your credentials',
            'data' => null
        ], 401);

    }
}
