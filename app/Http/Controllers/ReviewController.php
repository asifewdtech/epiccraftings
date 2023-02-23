<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Validator;

class ReviewController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.reviews.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validations = Validator::make($request->all(),[
            'domain_name'=>'required',
            'customer_name'=>'required',
            'customer_rating'=>'required',
            'customer_comment'=>'required|max:150',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        $review = new Review();
        $review->domain = $request->domain_name;
        $review->name = $request->customer_name;
        $review->rating = $request->customer_rating;
        $review->review = $request->customer_comment;
        $review->picture = $request->image;
        if($review->save()){
            return response()->json(['success' => true, 'message' =>'Review has been added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('admin.reviews.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $validations = Validator::make($request->all(),[
            'domain_name'=>'required',
            'customer_name'=>'required',
            'customer_rating'=>'required',
            'customer_comment'=>'required|max:150',
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        $review->domain = $request->domain_name;
        $review->name = $request->customer_name;
        $review->rating = $request->customer_rating;
        $review->review = $request->customer_comment;
        $review->picture = $request->image;
        if($review->save()){
            return response()->json(['success' => true, 'message' =>'Review has been updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        if($review->delete()){
            return response()->json(['success' => true, 'message' =>'Review has been deleted successfully']);
        }
    }
}
