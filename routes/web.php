<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\DB;
Route::get('/clear-all', function () {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    Artisan::call('view:clear');
    $homeURL = url('/');
    return 'Views Cleared, Routes Cleared, Cache Cleared, and Config Cleared Successfully ! <a href="' . $homeURL . '">Go Back To Home</a>';
});

Route::get('/db-backup', function () {
    Artisan::call('db:backup');
    return 'Backup created Successfully ! <a href="' . url('/') . '">Go Back To Home</a>';
});

Route::get('/migrate', function () {
    Artisan::call('migrate');
});
Route::get('/storage', function () {
    Artisan::call('storage:link');
});

Route::get('/dbseed', function () {
    Artisan::call('db:seed');
});

Route::get('/sitemap.xml/all', 'SitemapController@allSiteMap');

Route::get('/','HomeController@loadHomeView')->name('index');
//custmerReviews

Route::resource('custmerReviews','ReviewController');
Route::post('uploadFile','HomeController@uploadAllFiles')->name('uploadFile');
Route::post('uploadMultipleFiles','HomeController@uploadMultipleFiles')->name('uploadMultipleFiles');
Route::view('/strView','strview');
Route::post('contact-us-email','HomeController@contactUsEmail')->name('contact-us-email');
Route::view('checkout','checkout')->name('checkout');
Route::view('order-submitted','thankyou')->name('thankyou');
Route::view('link-dashboard','link_dashboard')->name('link_dashboard');
Route::view('payment-error','order_error')->name('orderError');
Route::view('somethingWrong','something_wrong')->name('something_wrong');
Route::view('notFound','not_found')->name('not_found');
Route::get('shop','HomeController@shop')->name('shop');
Route::get('getRealTimeHeightWidth','OrderController@getRealTimeHeightWidth')->name('getRealTimeHeightWidth');
Route::view('terms-condition','terms-condition')->name('terms-condition');
Route::view('return-policy','return-policy')->name('return-policy');
Route::view('about','about')->name('about');
Route::view('faq','faq')->name('faq');
Route::get('p/{slug}','ProductController@productDetail')->name('product-detail');
Route::view('contact-us','contact-us')->name('contact-us');
Route::view('design','design_your_own')->name('design_your_own');
Route::get('/designyourown', function () {return redirect('/design');});
Route::get('/designyoursign', function () {return redirect('/design');});
Route::get('/design-your-own-neon', function () {return redirect('/design');});
Route::view('somethingWrong','something_wrong')->name('something_wrong');
Route::view('notFound','not_found')->name('not_found');
Route::post('custom-add-to-cart','OrderController@customAddToCart')->name('customAddToCart');
Route::get('add-to-cart','OrderController@addToCart')->name('addToCart');
Route::get('updateCartQuantity','OrderController@updateCartQuantity')->name('updateCartQuantity');
Route::get('delete-item-from-cart/{id}','OrderController@deleteItemFromCart')->name('deleteItemFromCart');
Route::post('stripe', 'OrderController@stripe')->name('stripe.payment');
Route::post('paypal', 'OrderController@paypal')->name('paypal.payment');
Route::get('paypal', array('as' => 'status','uses' => 'OrderController@getPaymentStatus',));
Route::get('checkValidCoupon','CouponController@checkValidCoupon')->name('checkValidCoupon');

Route::middleware(['auth','admincheck'])->prefix('admin')->group(function(){
    Route::view('/dashboard','admin.index')->name('dashboard');
    Route::resource('categories','CategoryController');
    Route::resource('products','ProductController');
    Route::resource('coupons','CouponController');
    Route::resource('reviews','ReviewController');
    Route::get('coupons/status/update/{id}','CouponController@couponStatusUpdate')->name('coupons.status.update');
    Route::resource('orders','OrderController');
    Route::get('exportOrders','OrderController@exportOrdersWithImage')->name('exportOrdersWithImage');
    Route::get('addOrderTracking/{id}','OrderController@addOrderTracking')->name('addOrderTracking');
    Route::get('stripeOrderRefund/{id}','OrderController@stripeRefund')->name('stripeRefund');
    Route::get('paypalOrderRefund/{id}','OrderController@paypalRefund')->name('paypalRefund');
    Route::get('updateOrderTracking/{id}','OrderController@updateOrderTracking')->name('updateOrderTracking');
    Route::post('addOrderTrackingPost','OrderController@addOrderTrackingPost')->name('addOrderTrackingPost');
    Route::post('againSendOrderEmailToCustomer','OrderController@againSendOrderEmailToCustomer')->name('againSendOrderEmailToCustomer');
    Route::post('updateOrderTrackingPost','OrderController@updateOrderTrackingPost')->name('updateOrderTrackingPost');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


