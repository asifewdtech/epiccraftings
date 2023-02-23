<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Validator;
use Session;
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.add_coupon');
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
            'user_coupon_code'=>'required|unique:coupons',
            'coupon_type'=>'required',
            'coupon_type_value'=>'required'
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
        $coupon = new Coupon();
        $data = $request->except('_token');
        $data['coupon_code'] = strtoupper($request->user_coupon_code);
        $coupon->fill($data);
        if($coupon->save()){
            return response()->json(['success' => true, 'message' =>'Coupon has been added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit_coupon',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $validations = Validator::make($request->all(),[
            'user_coupon_code'=>'required',
            'coupon_type'=>'required',
            'coupon_type_value'=>'required'
        ]);

        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }
    
        $data = $request->except('_token');
        $data['coupon_code'] = strtoupper($request->user_coupon_code);
        $coupon->fill($data);
        if($coupon->save()){
            return response()->json(['success' => true, 'message' =>'Coupon has been updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }

    // enable and disable status of coupon code
    public function couponStatusUpdate(Request $request,$id)
    {
        $coupon = Coupon::find($id);
        $coupon->status = $request->status;
        if($coupon->save())
            return response()->json(['success' => true, 'message' =>'Coupon status has been updated successfully']);
    }

    // check valid coupon
    public function checkValidCoupon(Request $request){
        $coupon = Coupon::where('coupon_code',strtoupper($request->coupon))->first();
        if($coupon !=null)
        {
            if($coupon->status=='1'){
                $total = $request->total;
                $remainTotal = $request->total;
                if($coupon->coupon_type=='Fixed'){
                    $remainTotal-=$coupon->coupon_type_value;
                    if($remainTotal<0){$remainTotal=$total;}
                }else{
                    $remainTotal-=(($total*$coupon->coupon_type_value/100));
                }
                session()->put('coupon', ['code'=>$coupon->user_coupon_code,'type'=>$coupon->coupon_type,'value'=>$coupon->coupon_type_value]);
                return response()->json(['success' => true,'type'=>$coupon->coupon_type,'value'=>$coupon->coupon_type_value, 'message' =>'Your coupon has been added successfully','total'=>$remainTotal]);
            }else{
                return response()->json(['success' => false, 'message' =>'Your coupon has been expired']);
            }
        }
        else{
            return response()->json(['success' => false, 'message' =>'Please enter valid coupon code']);
        }
    }
}
