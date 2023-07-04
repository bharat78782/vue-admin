<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::get();
       
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_short_desc' => 'required',
            'product_long_desc' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
           
            'product_image' => 'required',
         ]);
        
     
        $input = Arr::except($request->all(), ['product_image', 'color_id', 'size_id', 'images']);
         try {
            if ($request->hasFile('product_image')) {
                    $img = Str::random(20) . $request->file('product_image')->getClientOriginalName();
                    $input['product_image'] = $img;
                    $request->product_image->move(public_path("documents/products/"), $img);
                }
                $addProduct = Product::create($input);
                if ($addProduct) {
                    foreach ($request->color_id as $color) {
                        
                        ProductColor::create(['color_id' => $color, 'product_id' => $addProduct->id]);
                    }
            
                    foreach ($request->size_id as $size_id) {
                        ProductSize::create(['size_id' => $size_id, 'product_id' => $addProduct->id]);
                    }

                    // if (count($request->file('images')) > 0) {
                    if ($request->hasFile('images')) {
                        $images = $request->file('images');
                        foreach ($images as $image) {
                            if ($image->isValid()) {
                                $img = Str::random(20) . $image->getClientOriginalName();
                                $image->move(public_path("documents/products/"), $img);
                                ProductImage::create(['image' => $img, 'product_id' => $addProduct->id]);
                            }
                        }
                    }
                    
                    return response()->json(['message' => 'Product added successfully'], 200); 
                }

            } catch (Exception $e) {
               
                Log::error($e->getMessage());
                return response()->json(['error' => 'An error occurred'], 500);
            }
    }
       
      
    

 
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Product::with(['colors','sizes','images'])
         ->whereHas('colors')->whereHas('sizes')->whereHas('images')
        ->find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::find($id)->delete();
        if($delete){
              return response()->json(['message' => 'Product has been deleted','success'=>true]);
        }else{
            return response()->json(['message' => 'Product has not deleted please try again','success'=>false]);
        }
    }
}
