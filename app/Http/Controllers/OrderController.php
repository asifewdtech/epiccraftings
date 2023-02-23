<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\OrderDetail;
use App\Payment as sysPayment;
use App\Customer;
use Illuminate\Http\Request;
use Session;
use Stripe;
use Validator;
use URL;
use Redirect;
use App\Coupon;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendOrderMailToCustomer;
use App\Mail\OrderRefundOrCancel;
use App\Mail\OrderTrackingMailToCustomer;
use App\Mail\UpdateOrderTrackingMailToCustomer;
use App\Mail\AgainSendOrderMailToCustomer;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Excel;
use Config;

class OrderController extends Controller
{

    private $paypalProvider;

    public function __construct()
    {
        $paypal_configuration = \Config::get('paypal');
        $this->paypalProvider = new ExpressCheckout();
        $this->paypalProvider->setApiCredentials($paypal_configuration);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.orders.index',compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = "cancel";
        $order->save();
        Mail::to($order->customer->email)->send(new OrderRefundOrCancel($order));
        return response()->json(['success' => true, 'message' =>"Order has been cancelled successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Order::where('id',$id)->delete()){
            return response()->json(['success' => true, 'message' =>'Order has been deleted successfully']);
        }
    }

    // add custom design product into shopping cart
    public function customAddToCart(Request $request){

        $image = $request->image;
        $location = "uploads/";
        $image_parts = explode(";base64,", $image);
        $image_base64 = base64_decode($image_parts[1]);
        $filename = "screenshot_" . uniqid() . '.png';
        $file = $location . $filename;
        Storage::disk('local')->put($file, $image_base64);
        $deliver_date = explode(' ', $request->deliver_date);
        $deliver_date = date('Y/m/d', strtotime($deliver_date[0]));
        if (strpos($request->install, 'Rush-Order') !== false) {
            $rush = '1';
        } else {
            $rush = '0';
        }

        $finalResponse =  $this->getRealTimeHeightWidthPriceAtBackend($request);

        $id=rand();
        $title= "Custom Design";
        $cart = session()->get('cart');
        // if cart is empty then this is first product
        if (!$cart) {
            $cart = [
                $id => [
                    "id"=>$id,
                    "type"=>'custom',
                    "title"=>$title,
                    "fonts" => $request->font,
                    "line_one_text" => $request->line_one_text,
                    "line_two_text" => $request->line_two_text,
                    "line_three_text" => $request->line_three_text,
                    "deliver_date" => $deliver_date,
                    "order_id" => $request->order_id,
                    "backing_shape" => $request->backing_shape,
                    "backing_color" => $request->backing_color,
                    "install" => $request->install,
                    "colors" => $request->colors,
                    "size" => $request->size,
                    "is_rush_order" => $rush,
                    "price" => $finalResponse["totalCost"],
                    "width" => $finalResponse["totalWidth"],
                    "height" => $finalResponse["totalHeight"],
                    'quantity'=>1,
                    "image" => url("storage/uploads" . "/" . $filename),
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' =>$title.' has been added into your cart successully']);
        }
        // if cart not empty then check and product has already been add into cart
        if (isset($cart[$id])) {
            session()->put('cart', $cart);
            return response()->json(['success' => false, 'message' =>$title.' has already been added into your cart']);
        }

        // if product does not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "id"=>$id,
            "title"=>$title,
            "type"=>'custom',
            "fonts" => $request->font,
            "line_one_text" => $request->line_one_text,
            "line_two_text" => $request->line_two_text,
            "line_three_text" => $request->line_three_text,
            "deliver_date" => $deliver_date,
            "order_id" => $request->order_id,
            "backing_shape" => $request->backing_shape,
            "backing_color" => $request->backing_color,
            "install" => $request->install,
            "colors" => $request->colors,
            "size" => $request->size,
            "is_rush_order" => $rush,
            "price" => $finalResponse["totalCost"],
            "width" => $finalResponse["totalWidth"],
            "height" => $finalResponse["totalHeight"],
            'quantity'=>1,
            "image" => url("storage/uploads" . "/" . $filename),
        ];
        session()->put('cart', $cart);
        return response()->json(['success' => true, 'message' =>$title.' has been added into your cart successully']);

    }

    // add product into shopping cart
    public function addToCart(Request $request)
    {
        $id = $request->id;
        $product = Product::where('id',$id)->first();
        if ($request->quantity > $product->quantity) {
            return response()->json(['success' => false, 'message' =>"Quantity number ".$request->quantity." is not available"]);
        }
        $cart = session()->get('cart');
        // if cart is empty then this is first product
        if (!$cart) {
            $cart = [
                $id => [
                    'id'=>$product->id,
                    "type"=>'own',
                    'title'=>$product->title,
                    'price'=>$product->min_price,
                    'quantity'=>$request->quantity,
                    "is_rush_order" =>0,
                    'image'=>$product->image
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' =>$product->title.' has been added into your cart successully']);
        }
        // if cart not empty then check and product has already been add into cart
        if (isset($cart[$id])) {
            if ( (int) $cart[$id]['quantity']++ <= $product->quantity) {
                $cart[$id]['quantity'] = (int) $cart[$request->id]['quantity']++;
                session()->put('cart',$cart);
            }
            return response()->json(['success' => true, 'message' =>$product->title.' has been added into your cart successully']);
        }

        // if product does not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            'id'=>$product->id,
            "type"=>'own',
            'title'=>$product->title,
            'price'=>$product->min_price,
            'quantity'=>$request->quantity,
            "is_rush_order" =>0,
            'image'=>$product->image
        ];
        session()->put('cart', $cart);
        return response()->json(['success' => true, 'message' =>$product->title.' has been added into your cart successully']);
    }

    // update quantity of cart item
    public function updateCartQuantity(Request $request){
        $cart = session()->get('cart');
        if (isset($cart[$request->id])) {
            $product = Product::where('id',$request->id)->first();
            if($product !=null){
                if ($request->qty > $product->quantity) {
                    $cart[$request->id]['quantity'] = $product->quantity;
                    session()->put('cart',$cart);
                    return response()->json(['success' => false, 'message' =>"Quantity number ".$request->qty." is not available","quantity"=>$product->quantity,'data' =>$request->all()]);
                }
            }
            $cart[$request->id]['quantity'] = $request->qty;
            session()->put('cart',$cart);
            return response()->json(['success' => true, 'data' =>$request->all()]);
        }
    }

    public function deleteItemFromCart($id){
        $cart = session()->get('cart');
        $product = $cart[$id]['title'];
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' =>$product.' has been removed from your cart successully']);
        }
    }

    // save order and get payment through stripe
    public function stripe(Request $request){
        if($request->billing_same_different){
            $validations = Validator::make($request->all(),[
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required | email',
                'phone'=>'required',
                'city'=>'required',
                'country'=>'required',
                'postal_code'=>'required',
                'address'=>'required',
                'term_conditions'=>'required',
            ]);

        }else{
            $validations = Validator::make($request->all(),[
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required | email',
                'phone'=>'required',
                'city'=>'required',
                'country'=>'required',
                'postal_code'=>'required',
                'address'=>'required',
                'billing_first_name'=>'required',
                'billing_last_name'=>'required',
                'billing_email'=>'required | email',
                'billing_phone'=>'required',
                'billing_city'=>'required',
                'billing_country'=>'required',
                'billing_postal_code'=>'required',
                'billing_address'=>'required',
                'term_conditions'=>'required',
            ]);
        }

        if($validations->fails()){
            return back()->withErrors($validations)->withInput();
        }

        $total = $request->total;
        // if($request->coupon_check){
        //     $total = $this->checkValidCoupon(strtoupper($request->coupon_code),$total);
        // }

        $data = ["name"=>$request->first_name.' '.$request->last_name,'email'=>$request->email,'phone'=>$request->phone,'city'=>$request->city,'country'=>$request->country,'address'=>$request->address,'postal_code'=>$request->postal_code];
        $shipping_details = view('partials.shipping-billing-detail',compact('data'))->render();
        if($request->billing_same_different){
            $billing_details = $shipping_details;
        } else{
            $data = ["name"=>$request->billing_first_name.' '.$request->billing_last_name,'email'=>$request->billing_email,'phone'=>$request->billing_phone,'city'=>$request->billing_city,'country'=>$request->billing_country,'address'=>$request->billing_address,'postal_code'=>$request->billing_postal_code];
            $billing_details = view('partials.shipping-billing-detail',compact('data'))->render();
        }

        $stripeConfig = Config::get('stripe');
        $stripe = new \Stripe\StripeClient($stripeConfig['stripe_sk']);

        // check cart contain more than or equal to 1
        if(Session::has('cart') && count(Session::get('cart')) > 0){
            $order = new Order();
            $order->order_number = $this->generateUniqueOrderNumber();
            $order->total_products = count(Session::get('cart'));
            $order->order_from = Config::get('app.mail_from_name');
            $order->order_email_from = Config::get('app.mail_from');
            $order->shipping_cost = $request->shipping_cost;
            $order->discount_check = $request->discount_check;
            $order->discount_amount = $request->discount_amount;
            $order->is_rush_order = $request->is_rush_order;
            // $order->sub_total = $request->sub_total;
            // $order->total = $request->total;
            $order->special_instruction = $request->special_instruction;
            $order->sub_total = $total;
            $order->total = $total;
            $order->payment_method = "stripe";
            $order->status = "unpaid";
            if($order->save()){
                $items = '';
                $metadata = [];
                $metadata['Order_Number'] = $order->order_number;
                $metadata['Customer_Name'] = $request->first_name." ".$request->last_name;
                $metadata['Customer_Email'] = $request->email;
                $metadata['Site_Url'] = url('/');
                foreach(Session::get('cart') as $key=>$item){
                    $orderDetail = new OrderDetail();
                    $data = ["name"=>$item["title"],'quantity'=>$item['quantity']];
                    $metadata["item"]= view("partials.item-detail",compact('data'))->render();
                    if($item['type']=='custom'){
                        $orderDetail->fonts = $item["fonts"];
                        $orderDetail->title = $item["title"];
                        $orderDetail->line_one_text = $item["line_one_text"];
                        $orderDetail->line_two_text = $item["line_two_text"];
                        $orderDetail->line_three_text = $item["line_three_text"];
                        $orderDetail->order_id = $order->id;
                        $orderDetail->backing_shape = $item["backing_shape"];
                        $orderDetail->backing_color = $item["backing_color"];
                        $orderDetail->install = $item["install"];
                        $orderDetail->colors = $item["colors"];
                        $orderDetail->size = $item["size"];
                        $orderDetail->is_rush_order = $order->is_rush_order;
                        $orderDetail->unit_price = $item["price"];
                        $orderDetail->image = $item["image"];
                        $orderDetail->width = $item["width"];
                        $orderDetail->height = $item["height"];
                        $orderDetail->quantity = $item['quantity'];
                        $orderDetail->sub_total = $item['price']*$item['quantity'];
                    }else{
                        $orderDetail->order_id = $order->id;
                        $orderDetail->product_id = $item['id'];
                        $orderDetail->title = $item['title'];
                        $orderDetail->unit_price = $item['price'];
                        $orderDetail->image = $item["image"];
                        $orderDetail->quantity = $item['quantity'];
                        $orderDetail->is_rush_order = $order->is_rush_order;
                        $orderDetail->sub_total = $item['price']*$item['quantity'];
                        Product::find($item['id'])->decrement('quantity',$item['quantity']);
                    }
                    $orderDetail->save();
                }

                $customer = new Customer();
                $customer->order_id = $order->id;
                $customer->first_name = $request->first_name;
                $customer->last_name = $request->last_name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
                $customer->company = $request->company;
                $customer->city = $request->city;
                $customer->country = $request->country;
                $customer->address = $request->address;
                $customer->post_code = $request->postal_code;
                if($request->billing_same_different){
                    $customer->billing_first_name = $request->first_name;
                    $customer->billing_last_name = $request->last_name;
                    $customer->billing_email = $request->email;
                    $customer->billing_phone = $request->phone;
                    $customer->billing_company = $request->company;
                    $customer->billing_city = $request->city;
                    $customer->billing_country = $request->country;
                    $customer->billing_address = $request->address;
                    $customer->billing_post_code = $request->postal_code;
                }else{
                    $customer->billing_first_name = $request->billing_first_name;
                    $customer->billing_last_name = $request->billing_last_name;
                    $customer->billing_email = $request->billing_email;
                    $customer->billing_phone = $request->billing_phone;
                    $customer->billing_company = $request->billing_company;
                    $customer->billing_city = $request->billing_city;
                    $customer->billing_country = $request->billing_country;
                    $customer->billing_address = $request->billing_address;
                    $customer->billing_post_code = $request->billing_postal_code;
                }
                $customer->save();

                // $description['Order Number'] = $order->order_number;
                // $metadata['shipping_details'] = $shipping_details;
                $metadata['Billing_Detail'] = $billing_details;
                $errorCheck = false;
                $errorArray = [];
                try {

                    // $customer = $stripe->customers->create([
                    //     'source' => $request->stripeToken,
                    //     'name' => isset($request->billing_same_different) ? $request->first_name.' '.$request->last_name:$request->billing_first_name.' '.$request->billing_last_name,
                    //     'email' => isset($request->same_different) ? $request->email:$request->billing_email,
                    //     'phone' => isset($request->same_different) ? $request->phone:$request->billing_phone,
                    // ]);

                    // $stripe->customers->createSource(
                    //     $customer->id,
                    //     ['source' => $request->stripeToken]
                    // );

                    $charge = $stripe->charges->create([
                        "amount" => 100 * $total,
                        "currency" => "usd",
                        "source" => $request->stripeToken,
                        "receipt_email"=>$request->email,
                        "description" => $request->first_name.' '.$request->last_name.' has been paid his order Email: '.$request->email." Order Number:".$order->order_number." ".Config::get('app.domain'),
                        "metadata"=>$metadata,
                        "shipping"=>["name"=>$request->first_name.' '.$request->last_name,"phone"=>$request->phone,"address"=>['city'=>$request->city,'country'=>$request->country,'line1'=>$request->address,'postal_code'=>$request->postal_code]]
                    ]);

                } catch (\Stripe\Error\ApiConnection $e) {
                    $errorArray['type'] = $e->getError()->type;
                    $errorArray['message'] = $e->getError()->message;
                    $order->payment_error_type = $e->getError()->type;
                    $order->payment_error_message = $e->getError()->message;
                    $errorCheck = true;
                } catch (\Stripe\Exception\CardException $e) {
                    $errorArray['type'] = $e->getError()->type;
                    $errorArray['message'] = $e->getError()->message;
                    $order->payment_error_type = $e->getError()->type;
                    $order->payment_error_message = $e->getError()->message;
                    $errorCheck = true;
                } catch (\Stripe\Exception\InvalidRequestException $e) {
                    $errorArray['type'] = $e->getError()->type;
                    $errorArray['message'] = $e->getError()->message;$order->payment_error_type = $e->getError()->type;
                    $order->payment_error_message = $e->getError()->message;
                    $errorCheck = true;
                } catch(\Stripe\Exception\ApiConnectionException $e){
                    $errorArray['type'] = $e->getError()->type;
                    $errorArray['message'] = $e->getError()->message;
                    $order->payment_error_type = $e->getError()->type;
                    $order->payment_error_message = $e->getError()->message;
                    $errorCheck = true;
                }catch (Exception $e) {
                    $errorArray['type'] = $e->getError()->type;
                    $errorArray['message'] = $e->getError()->message;
                    $order->payment_error_type = $e->getError()->type;
                    $order->payment_error_message = $e->getError()->message;
                    $errorCheck = true;
                }

                if($errorCheck){
                    $order->save();
                    return redirect()->route('orderError')->with("errorArray",$errorArray);
                }

                if($charge->amount >0 && $charge->status=='succeeded'){
                    $order->status = "paid";
                    $order->save();
                    $payment = new sysPayment();
                    $payment->order_id = $order->id;
                    $payment->transaction_id = $charge->id;
                    $payment->amount = $charge->amount/100;
                    $payment->payment_method = "stripe";
                    $payment->status = $charge->status;
                    $payment->save();
                }

                try{
                    Mail::to($customer->email)->send(new SendOrderMailToCustomer(Order::where('id',$order->id)->first()));
                    $order->is_email_send = '1';
                    $order->save();
                }catch(\Swift_TransportException $transportExp){
                    // return $transportExp->getMessage();
                }

                Session::forget('cart');
                Session::forget('coupon');
                return redirect()->route('thankyou');
                // return back()->with('success','Order has been placed successffully Thanks');
            }
        }else{
            return back();
        }

    }

    // refund order with stripe payment
    public function stripeRefund($id){
        $order = Order::find($id);
        $stripeConfig = \Config::get('stripe');
        $stripe = new \Stripe\StripeClient($stripeConfig['stripe_sk']);
        $refund = $stripe->refunds->create(['charge' => $order->payment->transaction_id]);
        if($refund->status=="succeeded"){
            $order->status="refund";
            $order->save();
            $order->payment->refund_transaction_id = $refund->id;
            $order->payment->refund_status = "yes";
            $order->payment->save();
            Mail::to($order->customer->email)->send(new OrderRefundOrCancel($order));
            return response()->json(['success' => true, 'message' =>"Order has been refunded successfully"]);
        }else{
            return response()->json(['success' => false, 'message' =>"Order may be already refunded"]);
        }
    }

    public function paypal(Request $request){

        if($request->billing_same_different){
            $validations = Validator::make($request->all(),[
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required | email',
                'phone'=>'required',
                'city'=>'required',
                'country'=>'required',
                'postal_code'=>'required',
                'address'=>'required',
                'term_conditions'=>'required',
            ]);

        }else{
            $validations = Validator::make($request->all(),[
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required | email',
                'phone'=>'required',
                'city'=>'required',
                'country'=>'required',
                'postal_code'=>'required',
                'address'=>'required',
                'billing_first_name'=>'required',
                'billing_last_name'=>'required',
                'billing_email'=>'required | email',
                'billing_phone'=>'required',
                'billing_city'=>'required',
                'billing_country'=>'required',
                'billing_postal_code'=>'required',
                'billing_address'=>'required',
                'term_conditions'=>'required',
            ]);
        }

        if($validations->fails()){
            return back()->withErrors($validations)->withInput();
        }

        $data = [];
        foreach(Session::get('cart') as $item){
            $data['items'][] = [
                'name' => $item["title"],
                'price' => $item['price'],
                'qty' => $item['quantity']
            ];
        }

        $total = $request->total;

        // if($request->coupon_check){
        //     $total = $this->checkValidCoupon(strtoupper($request->coupon_code),$total);
        // }

        $shipping_details ="name:".$request->first_name.' '.$request->last_name;
        $shipping_details.=' email:'.$request->email.'phone:'.$request->phone.' city:'.$request->city;
        $shipping_details.=' country:'.$request->country.' line1:'.$request->address.' postal_code:'.$request->postal_code;
        if($request->billing_same_different){
            $billing_details ="name:".$request->first_name.' '.$request->last_name;
            $billing_details.='email:'.$request->email.'phone:'.$request->phone.'city:'.$request->city;
            $billing_details.='country:'.$request->country.'line1:'.$request->address.'postal_code:'.$request->postal_code;
        } else{
            $billing_details ="name:".$request->billing_first_name.' '.$request->billing_last_name;
            $billing_details.='email:'.$request->billing_email.'phone:'.$request->billing_phone.'city:'.$request->billing_city;
            $billing_details.='country:'.$request->billing_country.'line1:'.$request->billing_address.'postal_code:'.$request->billing_postal_code;
        }

        if(Session::has('cart') && count(Session::get('cart')) > 0){
            $order = new Order();
            $order->order_number = $this->generateUniqueOrderNumber();
            $order->total_products = count(Session::get('cart'));
            $order->shipping_cost = $request->shipping_cost;
            $order->discount_check = $request->discount_check;
            $order->discount_amount = $request->discount_amount;
            $order->is_rush_order = $request->is_rush_order;
            $order->special_instruction = $request->special_instruction;
            $order->sub_total = $total;
            $order->total = $total;
            $order->payment_method = "paypal";
            $order->status = "unpaid";
            if($order->save()){
                $items = '';
                foreach(Session::get('cart') as $item){
                    $orderDetail = new OrderDetail();
                    $items .= 'Item Name:'.$item["title"].',Item Quantity:'.$item['quantity'].'\n';
                    if($item['type']=='custom'){
                        $orderDetail->fonts = $item["fonts"];
                        $orderDetail->title = $item["title"];
                        $orderDetail->line_one_text = $item["line_one_text"];
                        $orderDetail->line_two_text = $item["line_two_text"];
                        $orderDetail->line_three_text = $item["line_three_text"];
                        $orderDetail->order_id = $order->id;
                        $orderDetail->backing_shape = $item["backing_shape"];
                        $orderDetail->backing_color = $item["backing_color"];
                        $orderDetail->install = $item["install"];
                        $orderDetail->colors = $item["colors"];
                        $orderDetail->size = $item["size"];
                        $orderDetail->is_rush_order = $order->is_rush_order;
                        $orderDetail->unit_price = $item["price"];
                        $orderDetail->image = $item["image"];
                        $orderDetail->width = $item["width"];
                        $orderDetail->height = $item["height"];
                        $orderDetail->quantity = $item['quantity'];
                        $orderDetail->sub_total = $item['price']*$item['quantity'];
                    }else{
                        $orderDetail->order_id = $order->id;
                        $orderDetail->product_id = $item['id'];
                        $orderDetail->title = $item['title'];
                        $orderDetail->unit_price = $item['price'];
                        $orderDetail->image = $item["image"];
                        $orderDetail->quantity = $item['quantity'];
                        $orderDetail->is_rush_order = $order->is_rush_order;
                        $orderDetail->sub_total = $item['price']*$item['quantity'];
                        Product::find($item['id'])->decrement('quantity',$item['quantity']);
                    }
                    $orderDetail->save();
                }

                $customer = new Customer();
                $customer->order_id = $order->id;
                $customer->first_name = $request->first_name;
                $customer->last_name = $request->last_name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
                $customer->company = $request->company;
                $customer->city = $request->city;
                $customer->country = $request->country;
                $customer->address = $request->address;
                $customer->post_code = $request->postal_code;
                if($request->billing_same_different){
                    $customer->billing_first_name = $request->first_name;
                    $customer->billing_last_name = $request->last_name;
                    $customer->billing_email = $request->email;
                    $customer->billing_phone = $request->phone;
                    $customer->billing_company = $request->company;
                    $customer->billing_city = $request->city;
                    $customer->billing_country = $request->country;
                    $customer->billing_address = $request->address;
                    $customer->billing_post_code = $request->postal_code;
                }else{
                    $customer->billing_first_name = $request->billing_first_name;
                    $customer->billing_last_name = $request->billing_last_name;
                    $customer->billing_email = $request->billing_email;
                    $customer->billing_phone = $request->billing_phone;
                    $customer->billing_company = $request->billing_company;
                    $customer->billing_city = $request->billing_city;
                    $customer->billing_country = $request->billing_country;
                    $customer->billing_address = $request->billing_address;
                    $customer->billing_post_code = $request->billing_postal_code;
                }
                $customer->save();
            }

            Session::put('allInfo',Order::where('id',$order->id)->first());
            $data['invoice_id'] = $order->order_number;
            $data['invoice_description'] = $order->customer->first_name.' '.$order->customer->last_name.' has been paid his order Email: '.$order->customer->email." Order Number:".$order->order_number." oneoncrafts.com";
            $data['return_url'] = route('status');
            $data['cancel_url'] = route('status');
            $data['total'] = $order->total;
            Session::put('data',$data);
            $response = $this->paypalProvider->setExpressCheckout($data);
            if($response['paypal_link']!=null){
                return redirect($response['paypal_link']);
            }else{
                $order->payment_error_type = "error";
                $order->payment_error_message = "Sorry! Something went wrong";
                $order->save();
                return redirect()->route('orderError')->with("errorArray",['type'=>"error","message"=>"Sorry! Something went wrong"]);
                // return back()->with('error','Please Try Again');
            }
        }else{
            return back();
        }
    }

    // refund order with paypal payment
    public function paypalRefund($id){
        $order = Order::find($id);
        $response = $this->paypalProvider->refundTransaction($order->payment->transaction_id);
        if($response["ACK"]=="Success"){
            $order->status="refund";
            $order->save();
            $order->payment->refund_transaction_id = $response["REFUNDTRANSACTIONID"];
            $order->payment->refund_status = "yes";
            $order->payment->save();
            Mail::to($order->customer->email)->send(new OrderRefundOrCancel($order));
            return response()->json(['success' => true, 'message' =>"Order has been refunded successfully"]);
        }else{
            return response()->json(['success' => false, 'message' =>"Order may be already refunded"]);
        }
    }

    public function getPaymentStatus(Request $request)
    {
        $response = $this->paypalProvider->doExpressCheckoutPayment(Session::get('data'), $request->token, $request->PayerID);
        if($response["PAYMENTINFO_0_PAYMENTSTATUS"]=="Completed"){
            $req = Session::get('allInfo');
            $req->status = "paid";
            $req->save();
            $payment = new sysPayment();
            $payment->order_id = $req->id;
            $payment->transaction_id = $response["PAYMENTINFO_0_TRANSACTIONID"];
            $payment->payer_id = $request->PayerID;
            $payment->amount = $response["PAYMENTINFO_0_AMT"];
            $payment->payment_method = "paypal";
            $payment->status = 'approved';
            $payment->save();
            try{
                Mail::to($req->customer->email)->send(new SendOrderMailToCustomer($req));
                $req->is_email_send = '1';
                $req->save();
            }catch(\Swift_TransportException $transportExp){
                // return $transportExp->getMessage();
            }
            Session::forget('allInfo');
            Session::forget('cart'); 
            Session::forget('coupon');
            return redirect()->route('thankyou');
            
        }      
        return redirect()->route('orderError')->with("errorArray",['type'=>"error","message"=>"Sorry! Something went wrong"]);

    }

    // load view for add order tracking
    public function addOrderTracking($id){
        return view('admin.orders.add_order_tracking',compact('id'));
    }

    // load view for update order tracking
    public function updateOrderTracking($id){
        $order = Order::find($id);
        return view('admin.orders.update_order_tracking',compact('order'));
    }

    // add order tracking
    public function addOrderTrackingPost(Request $request){
        $validations = Validator::make($request->all(),[
            'order_tracking'=>'required',
            'order_tracking_courier'=>'required',
            'order_shipping_date'=>'required',
        ]);
        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        $order = Order::find($request->order_id);
        $order->order_tracking = $request->order_tracking;
        $order->order_courier = $request->order_tracking_courier;
        $order->order_shipping_date = $request->order_shipping_date;
        $order->is_track = '1';
        if($order->save()){
            Mail::to($order->customer->email)->send(new OrderTrackingMailToCustomer($order));
            return response()->json(['success' => true, 'message' =>'Order tracking has been added successfully']);
        }
    }

    // update order tracking
    public function updateOrderTrackingPost(Request $request){
        $validations = Validator::make($request->all(),[
            'order_tracking'=>'required',
            'order_tracking_courier'=>'required',
            'order_shipping_date'=>'required',
        ]);
        if($validations->fails())
        {
            return response()->json(['success' => false, 'message' => $validations->errors()]);
        }

        $order = Order::find($request->order_id);
        $order->order_tracking = $request->order_tracking;
        $order->order_courier = $request->order_tracking_courier;
        $order->order_shipping_date = $request->order_shipping_date;
        $order->is_track = '1';
        if($order->save()){
            Mail::to($order->customer->email)->send(new UpdateOrderTrackingMailToCustomer($order));
            return response()->json(['success' => true, 'message' =>'Order tracking has been updated successfully']);
        }
    }

    // check coupon code
    private function checkValidCoupon($code,$total){
        $coupon = Coupon::where('coupon_code',$code)->first();
        if($coupon !=null)
        {
            if($coupon->status=='1'){
                $total = $total;
                $remainTotal = $total;
                if($coupon->coupon_type=='Fixed'){
                    $remainTotal-=$coupon->coupon_type_value;
                    if($remainTotal<=0){$remainTotal=$total;}
                }else{
                    $remainTotal-=(($total*$coupon->coupon_type_value/100));
                }
                return $remainTotal;
            }else{
                return $total;
            }
        }
        else{
            return $total;
        }
    }

    // againSendOrderEmailToCustomer
    public function againSendOrderEmailToCustomer(Request $request){
        $order = Order::find($request->id);
        try{
            Mail::to($order->customer->email)->send(new AgainSendOrderMailToCustomer($order));
            $order->is_email_send = '1';
            $order->save();
            return response()->json(['success' => true, 'message' =>'Email has been sent to customer successfully']);
        }catch(\Swift_TransportException $transportExp){
            return response()->json(['success' => false, 'message' =>'Sorry!,Email has not been sent to customer']);
        }
    }

    // get unique order number
    private function generateUniqueOrderNumber()
    {
        do {
            $unique_code = rand(11111111,99999999);
        } while (Order::where('order_number', $unique_code)->count() > 0);
        return $unique_code;
    }

    // export orders with image
    // public function exportOrdersWithImage(Excel $excel)
    public function exportOrdersWithImage()
    {
        // return view('admin.orders.export_index',['orders'=>Order::all()]);
        // method 1
        // return $excel->download(new OrdersExport,'orders.xlsx');
        // method 2
        return Excel::download(new OrdersExport,'orders.xlsx');
    }

    // get realtime width height and price
    public function getRealTimeHeightWidth(Request $request){
        $fontSize = 300;
        $box = imagettfbbox($fontSize, 0, $request->fontPath, $request->imgText);
        $boxInformation = array_map('abs', $box);
        $boxHeight = max($boxInformation[3] + $boxInformation[7], $boxInformation[1] + $boxInformation[5]);
        $boxWidth = max($boxInformation[0] + $boxInformation[4], $boxInformation[2] + $boxInformation[6]);
        return response()->json(["success"=>true,"aspectRatio"=>number_format($boxWidth/$boxHeight,2)]);
    }

    // get realtime width height and price at backend
    private function getRealTimeHeightWidthPriceAtBackend($request){
        $finalWidthArr = [];
        $totalWidth = 0.00;
        $totalHeight = 0.00;
        $totalCost = 0.00;
        $accessoriesList = [];
        foreach(explode(',',$request->install) as $val){
            if(!in_array( $val,[" $0.00"," $10.00"," $50.00","Wall-Mounting-Kit"," Rush-Order"])){
                $accessoriesList[] = $val;
            }
        }
        if($request->line_one_text !='' && $request->line_one_font!=""){
            $lineOneResponse = $this->getRealTimeHeightWidthPriceAtBackendOfSingleLine($request->line_one_text,$request->line_one_font);
            $finalWidthArr[] = $lineOneResponse['width'];
            $totalHeight = $totalHeight + (float) $lineOneResponse['height'];
            $totalCost = $totalCost + (float) $lineOneResponse['totalCost'];
        }

        if($request->line_two_text !='' && $request->line_two_font!=""){
            $lineTwoResponse = $this->getRealTimeHeightWidthPriceAtBackendOfSingleLine($request->line_two_text,$request->line_two_font);
            $finalWidthArr[] = $lineTwoResponse['width'];
            $totalHeight = $totalHeight + (float) $lineTwoResponse['height'];
            $totalCost = $totalCost + (float) $lineTwoResponse['totalCost'];
        }

        if($request->line_three_text !='' && $request->line_three_font!=""){
            $lineThreeResponse = $this->getRealTimeHeightWidthPriceAtBackendOfSingleLine($request->line_three_text,$request->line_three_font);
            $finalWidthArr[] = $lineThreeResponse['width'];
            $totalHeight = $totalHeight + (float) $lineThreeResponse['height'];
            $totalCost = $totalCost + (float) $lineThreeResponse['totalCost'];
        }

        $totalWidth = max($finalWidthArr);
        $totalCost = $totalCost + (count($accessoriesList) * 10);
        return ["totalHeight"=>number_format($totalHeight,2),"totalWidth"=>number_format($totalWidth,2),"totalCost"=>number_format($totalCost,2)];
    }

    // get realtime width height and price at backend
    private function getRealTimeHeightWidthPriceAtBackendOfSingleLine($imgText,$fontPath){
        $box = imagettfbbox(300, 0, $fontPath, $imgText);
        $boxInformation = array_map('abs', $box);
        $boxHeight = max($boxInformation[3] + $boxInformation[7], $boxInformation[1] + $boxInformation[5]);
        $boxWidth = max($boxInformation[0] + $boxInformation[4], $boxInformation[2] + $boxInformation[6]);
        $finalWidth = ($boxWidth/96);
        $finalHeight =  ($boxHeight/96);
        $sqrt = sqrt($finalWidth * $finalHeight);
        $manufacture_cost = $sqrt * 4.75;
        $conversion = (2.54 * 2.54 * 2.54) / 5000;
        $shipping_cost = intval(MAX(30, (((($finalWidth + 2) * ($finalHeight + 2)) * 4) * $conversion * 9.49+16.3)));
        $total_cost = ($shipping_cost + $manufacture_cost) * 2;
        $total_cost = intval($total_cost) * 2.4;
        return ["width"=>number_format($boxWidth/96,2), "height"=>number_format($boxHeight/96,2),"totalCost"=>$total_cost];
    }
}
