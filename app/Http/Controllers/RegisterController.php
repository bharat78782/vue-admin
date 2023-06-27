<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
       
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        
        ]);


        $input = $request->except(['profile'],$request->all());
  

        if($request->hasFile('profile'))
        {
            $img = Str::random(20).$request->file('profile')->getClientOriginalName();
            $input['profile'] = $img;
            $request->profile->move(public_path("documents/profile/"), $img);
        }
        $input['password'] = bcrypt($request->password);
        $user = User::Create($input);

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

    public function updateProfile(Request $request)
    {
    //    return $request->all();
       $input = $request->except(['profile'],$request->all());
  

        if($request->hasFile('profile'))
        {
            $img = Str::random(20).$request->file('profile')->getClientOriginalName();
            $input['profile'] = $img;
            $request->profile->move(public_path("documents/profile/"), $img);
        }

        $update =  User::find(auth()->user()->id);
        $update->update($input);
       if($update)
        return response()->json([
            'message' => 'User Updated successfully',
            'success'=>true]);
        else
            return response()->json([
            'message' => 'Something went wrong',
           'success'=>false]);
    }
}
