<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

         if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('authToken')->plainTextToken;

            return response()->json([
                'token' => $token,
                'data' =>auth()->user(),
            ]);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);

    }
}
