<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Validator;
use App\Category;
use App\ProductImage;

class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
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
        $validations = Validator::make($request->all(),[
            'category'=>'required',
            'title'=>'required',
            'min_price'=>'required',
            'summery'=>'required|max:150',
            'description'=>'required',
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg|max:5120'
        ]);
        
        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
    
        $product = new Product();
        $product->category_id = $request->category;
        $product->title = $request->title;
        $product->slug = $request->title;
        $product->min_price = $request->min_price;
        $product->max_price = $request->max_price;
        $product->size = $request->size;
        $product->quantity = $request->quantity;
        $product->summery = $request->summery;
        $product->description = $request->description;
        $product->additional_information = $request->additional_information;
        $product->how_to_order = $request->how_to_order;
        $product->shipping_process = $request->shipping_process;
        $product->packaging = $request->packaging;
        $product->features = $request->features;
        $product->image = "test.jpg";
        if($product->save()){
            $product->image = $this->uploadMultipleFiles($request,"images",$request->upload_path,$product,false);
            $product->save();
            return response()->json(['success' => true, 'message' =>'Product has been added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->first();
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::where('id',$id)->first();
        return view('admin.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $totalImages = count($product->images()->pluck('id')->toArray());
        $arrDiff = $request->old_image_ids ? array_values(array_diff($product->images()->pluck('id')->toArray(),array_values($request->old_image_ids))):$product->images()->pluck('id')->toArray();
        $validationscCheck = (count($arrDiff) > 0 && count($arrDiff)==$totalImages) && ($request->file("images")?count($request->file("images")):0) ==0?true:false;
        
        $validationRules = [
            'category'=>'required',
            'title'=>'required',
            'category'=>'required',
            'summery'=>'required|max:150',
            'description'=>'required',
        ];

        if($validationscCheck){
            $validationRules['images'] = "required";
            $validationRules['images.*'] = 'mimes:jpg,png,jpeg,gif,svg|max:5120';
        }

        $validations = Validator::make($request->all(),$validationRules);
        
        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
        
        $product->category_id = $request->category;
        $product->title = $request->title;
        $product->slug = $request->title;
        $product->min_price = $request->min_price;
        $product->max_price = $request->max_price;
        $product->size = $request->size;
        $product->quantity = $request->quantity;
        $product->summery = $request->summery;
        $product->description = $request->description;
        $product->additional_information = $request->additional_information;
        $product->how_to_order = $request->how_to_order;
        $product->shipping_process = $request->shipping_process;
        $product->packaging = $request->packaging;
        $product->features = $request->features;
        if($product->save()){
            if(count($arrDiff)>0 && ( $request->file('images') && count($request->file('images')) > 0 ) ){
                ProductImage::whereIn("id",$arrDiff)->delete();
                $product->image = $this->uploadMultipleFiles($request,"images",$request->upload_path,$product,false);  
            }else if(count($arrDiff)>=0 && ( !$request->file('images') || count($request->file('images')) == 0 ) ){
                ProductImage::whereIn("id",$arrDiff)->delete();
                $product->image = ProductImage::where("product_id",$product->id)->first()->image_url;
            }else if(count($arrDiff)==0 && ( $request->file('images') && count($request->file('images')) > 0 ) ){
                $product->image = $this->uploadMultipleFiles($request,"images",$request->upload_path,$product,false);
            }
            $product->save();
            return response()->json(['success' => true, 'message' =>'Product has been updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Product::where('id',$id)->delete()){
            return response()->json(['success' => true, 'message' =>'Product has been deleted successfully']);
        }
    }

    // show product detail
    public function productDetail($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('product_detail',compact('product'));
    }
}
