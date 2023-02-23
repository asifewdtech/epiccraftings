<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Mail;
use Validator;
use App\Mail\ContactUsMail;
use App\Traits\ImageUploadTrait;
use App\Review;
use Config;

class HomeController extends Controller
{
    use ImageUploadTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware(['auth','admincheck']);
        return view('admin.index');
    }

    // show shop page
    public function shop(Request $request){

        $check = false;
        $filterCategory = null;
        if($request->has('name')){
            $filterCategory = Category::join('products','categories.id','=','products.category_id')->where('categories.title','like','%' . $request->name . '%')->where('products.quantity','>',0)->select('categories.id','categories.title')->first();
            if($filterCategory !=null){$check=true;};
        }

        $categories = Category::join('products','categories.id','=','products.category_id')->where('products.quantity','>',0)->where('categories.title', 'not like', '%bar%')->where('categories.title', 'not like', '%event%')->select('categories.id','categories.title')->distinct()->get();
        return view('shop',compact('categories','check','filterCategory'));
    }

    // contact us email
    public function contactUsEmail(Request $request)
    {
        Mail::to('waseem@ewdtech.com')->send(new ContactUsMail(['username'=>$request->username,'email'=>$request->email,'subject'=>$request->subject,'message'=>$request->message]));
        return response()->json(['success' => true, 'message' =>'Email has been sent successfully']);
    }

    // upload file using ajax with progress bar
    public function uploadAllFiles(Request $request){
        $path = $this->uploadImage('file',$request->upload_path,$request);
        return response()->json(['status'=>true,'path'=>$path]);
    }

    // upload multiple files
    public function uploadMultipleFiles(Request $request){
        $validatedData = $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
        ]);

        if($request->TotalImages > 0)
        {
                
            for ($x = 0; $x < $request->TotalImages; $x++) 
            {

                if ($request->hasFile('images'.$x)) 
                {
                    $file      = $request->file('images'.$x);

                    $path = $file->store('public/images');
                    $name = $file->getClientOriginalName();

                    $insert[$x]['name'] = $name;
                    $insert[$x]['path'] = $path;
                }
            }

        }
        else
        {
            return response()->json(["message" => "Please try again."]);
        }
    }

    // load home page view
    public function loadHomeView(){
        $reviews = Review::where('domain',Config::get('app.domain'))->get();
        $homeDocer = Category::join('products','categories.id','=','products.category_id')->where('categories.title','like','%home decor%')->where('products.quantity','>',0)->select('products.id','products.image','products.title','products.min_price')->inRandomOrder()->get()->take(4);
        $bar = Category::join('products','categories.id','=','products.category_id')->where('categories.title','like','%bar%')->where('products.quantity','>',0)->select('products.id','products.image','products.title','products.min_price')->inRandomOrder()->get()->take(4);
        $event = Category::join('products','categories.id','=','products.category_id')->where('categories.title','like','%event%')->where('products.quantity','>',0)->select('products.id','products.image','products.title','products.min_price')->inRandomOrder()->get()->take(4);
        $wedding = Category::join('products','categories.id','=','products.category_id')->where('categories.title','like','%weddings%')->where('products.quantity','>',0)->select('products.id','products.image','products.title','products.min_price')->inRandomOrder()->get()->take(4);
        return view('index',compact('reviews','homeDocer','bar','event','wedding'));
    }
}
