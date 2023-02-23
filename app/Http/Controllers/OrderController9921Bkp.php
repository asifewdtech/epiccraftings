<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\OrderDetail;
use App\Customer;
use Illuminate\Http\Request;
use Session;
use Stripe;
use Validator;
use URL;
use Redirect;
use App\Coupon;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendOrderMailToCustomer;
use App\Mail\OrderTrackingMailToCustomer;
use App\Mail\UpdateOrderTrackingMailToCustomer;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\Mail;
class OrderController9921Bkp extends Controller
{

    private $_api_context;
    
    public function __construct()
    {    
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
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
    public function update(Request $request, Order $order)
    {
        //
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
                    "price" => $request->price,
                    "width" => $request->width,
                    "height" => $request->height,
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
            "price" => $request->price,
            "width" => $request->width,
            "height" => $request->height,
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
            session()->put('cart', $cart);
            return response()->json(['success' => false, 'message' =>$product->title.' has already been added into your cart']);
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

    public function stripe(Request $request){
        
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

        if($validations->fails()){
            return back()->withErrors($validations)->withInput();
        }

        $total = $request->total;
        if($request->coupon_check){
            $total = $this->checkValidCoupon($request->coupon_code,$total);
        }
        $stripeConfig = \Config::get('stripe');
        Stripe\Stripe::setApiKey($stripeConfig['stripe_sk']);
        $charge = Stripe\Charge::create([
            "amount" => 100 * $total,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => $request->first_name.' '.$request->last_name.' has been paid his order Email: '.$request->email
            // "billing_details"=>[
            //     'name'=>$request->first_name.' '.$request->last_name,
            //     'email'=>$request->email,
            //     'phone'=>$request->phone,
            //     'address'=>[
            //         'city'=>$request->city,
            //         'country'=>$request->country,
            //         'line1'=>$request->address,
            //         'postal_code'=>$request->postal_code,
            //     ]
            // ]
        ]);

        if($charge->amount >0 && $charge->status=='succeeded'){
            $order = new Order();
            $order->order_number = rand();
            $order->total_products = count(Session::get('cart'));
            $order->shipping_cost = $request->shipping_cost;
            // $order->sub_total = $request->sub_total;
            // $order->total = $request->total;
            $order->sub_total = $total;
            $order->total = $total;
            $order->payment_method = "stripe";
            $order->status = "paid";
            if($order->save()){

                foreach(Session::get('cart') as $item){
                    $orderDetail = new OrderDetail();
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
                        $orderDetail->is_rush_order = $item["is_rush_order"];
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
                $customer->save();
                Mail::to($customer->email)->send(new SendOrderMailToCustomer($order));
                Session::forget('cart');
                return back()->with('success','Order has been placed successffully Thanks');
            }
        }
    }

    public function paypal(Request $request){
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

        if($validations->fails()){
            return back()->withErrors($validations)->withInput();
        }
        $total = $request->total;
        if($request->coupon_check){
            $total = $this->checkValidCoupon($request->coupon_code,$total);
        }
        Session::put('allInfo',$request->all());
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($total);

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($total);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::flash('error','Connection timeout');
                return Redirect::route('checkout');                
            } else {
                \Session::flash('error','Some error occur, sorry for inconvenient');
                return Redirect::route('checkout');                
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {            
            return Redirect::away($redirect_url);
        }

        \Session::flash('error','Unknown error occurred');
    	return Redirect::route('checkout');

    }

    public function getPaymentStatus(Request $request)
    {        
        $payment_id = Session::get('paypal_payment_id');
        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::flash('error','Your Payment has been failed');
            return Redirect::route('checkout');
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {         
            Session::flash('success','Order has been placed successffully Thanks');
            $req = Session::get('allInfo');
            $order = new Order();
            $order->order_number = rand();
            $order->total_products = count(Session::get('cart'));
            $order->shipping_cost = $req["shipping_cost"];
            $sub_total = $req["sub_total"];
            $total = $req["total"];
            if($req["coupon_check"]){
                $sub_total = $this->checkValidCoupon($req["coupon_code"],$sub_total);
                $total = $this->checkValidCoupon($req["coupon_code"],$total);
            }
            $order->sub_total = $sub_total;
            $order->total = $total;
            $order->payment_method = "paypal";
            $order->status = "paid";
            if($order->save()){

                foreach(Session::get('cart') as $item){
                    $orderDetail = new OrderDetail();
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
                        $orderDetail->is_rush_order = $item["is_rush_order"];
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
                        $orderDetail->quantity = $item['quantity'];
                        $orderDetail->image = $item["image"];
                        $orderDetail->sub_total = $item['price']*$item['quantity'];
                        Product::find($item['id'])->decrement('quantity',$item['quantity']);
                    }
                    $orderDetail->save();
                }

                $customer = new Customer();
                $customer->order_id = $order->id;
                $customer->first_name = $req["first_name"];
                $customer->last_name = $req["last_name"];
                $customer->email = $req["email"];
                $customer->phone = $req["phone"];
                $customer->company = $req["company"];
                $customer->city = $req["city"];
                $customer->country = $req["country"];
                $customer->address = $req["address"];
                $customer->post_code = $req["postal_code"];
                $customer->save();
                Mail::to($customer->email)->send(new SendOrderMailToCustomer($order));
                Session::forget('cart');
                Session::forget('allInfo');
                return back()->with('success','Order has been placed successffully Thanks');
            }
            return Redirect::route('checkout');
        }

        Session::flash('error','Your Payment has been failed');
		return Redirect::route('checkout');
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
}
