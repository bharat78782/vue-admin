<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        // Perform any necessary logic and return JSON data for the dashboard
        return response()->json(['data' => 'Dashboard data']);
    }

    public function userList()
    {
       $users =  User::whereNoT('id',auth()->user()->id)->get();
        return response()->json(['data' => $users]);
    }


    public function user_delete($id)
    {
        $users =  User::find($id);
        $users->delete();
        if($users)
        {
            return response()->json(['message' => 'User has been deleted','success'=>true]);
        }elsE{
            return response()->json(['message' => 'Something went wrong please try again','success'=>false]);
        }
    }

    public function edit_user($id)
    {
       return $users =  User::find($id);
    }

    public function update_user(Request $request)
    {
        $input = $request->except(['profile'],$request->all());
  

        if($request->hasFile('profile'))
        {
            $img = Str::random(20).$request->file('profile')->getClientOriginalName();
            $input['profile'] = $img;
            $request->profile->move(public_path("documents/profile/"), $img);
        }

         $users =  User::find($request->id);
         $users->update($input);
         if($users)
         {
             return response()->json(['message' => 'User has been updated','success'=>true]);
         }elsE{
             return response()->json(['message' => 'Something went wrong please try again','success'=>false]);
         }

    }
}
