<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Color::get();
        if(count($data)>0){
            return response()->json(['data' => $data]);
        }else{
            return response()->json([
                'data' => $data,
                'success'=>false]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->id;
        $request->validate([
            'color_name' => 'required',
            'color' => 'required',
         ]);

         $input = $request->except(['id'],$request->all());
        $add = Color::updateOrCreate(['id'=>$request->color_id],$input);
        if($request->color_id)
        $message = 'Color updated successfully';
        else
        $message = 'Color added successfully';
        if($add)
        {
            return response()->json([
                'message' =>  $message,
                'success'=>true]);
        }else{
            return response()->json([
                'message' => 'Something went wrong please try again',
                'success'=>true]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $add = Color::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $add = Color::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $input = $request->except(['id'],$request->all());
        $update = Color::find($id);
        $update->update($input);
        if($update)
        {
            return response()->json([
                'message' => 'Color updated successfully',
                'success'=>true]);
        }else{
            return response()->json([
                'message' => 'Something went wrong please try again',
                'success'=>true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Color::find($id);
        $delete->delete();
        if($delete)
        {
            return response()->json([
                'message' => 'Color deleted successfully',
                'success'=>true]);
        }else{
            return response()->json([
                'message' => 'Something went wrong please try again',
                'success'=>true]);
        }
    }
}
