<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Size::get();
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
        $request->validate([
            'size_name_one' => 'required',
            'size_name_two' => 'required',
         ]);

        $check =  Size::where('size_name_one',$request->size_name_one)->where('size_name_two',$request->size_name_two)->first();
        if($check)
        {
            return response()->json([
                'message' => 'This data has already added please try another',
                'success'=>false]); 
        }
        $input = $request->except(['id'],$request->all());
        $add = Size::updateOrCreate(['id'=>$request->size_id],$input);
        if($request->size_id)
        $message = 'Size updated successfully';
        else
        $message = 'Size added successfully';
        if($add)
        {
            return response()->json([
                'message' =>  $message,
                'success'=>true]);
        }else{
            return response()->json([
                'message' => 'Something went wrong please try again',
                'success'=>false]);
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
        return $add = Size::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return  Size::find($id);
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
        $update = Size::find($id);
        $update->update($input);
        if($update)
        {
            return response()->json([
                'message' => 'Size updated successfully',
                'success'=>true]);
        }else{
            return response()->json([
                'message' => 'Something went wrong please try again',
                'success'=>false]);
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
        $delete = Size::find($id);
        $delete->delete();
        if($delete)
        {
            return response()->json([
                'message' => 'Size deleted successfully',
                'success'=>true]);
        }else{
            return response()->json([
                'message' => 'Something went wrong please try again',
                'success'=>true]);
        }
    }
}
