<?php

use App\Http\Controllers\Frontend\ContactStoreController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\GiftBookingStoreController;
use App\Http\Controllers\Frontend\PackageBookingController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\PopUp;
use App\Models\Review;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {
    $sliders = Slider::get();
    $popups=PopUp::where('status','1')->get();
    $reviews=Review::where('status','1')->get();
    $services = Category::whereHas('realstate')->get();
    return view('welcome',compact('sliders','services','popups','reviews'));
});

Auth::routes();
Route::get('/cache-clear',function(){
    \Artisan::call('cache:clear');
    \Artisan::call('view:clear');

});
Route::get('storage-link',function(){
    \Artisan::call('storage:link');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test',function(){
    $blog = Blog::first();
  
});
Route::controller(FrontendController::class)->group(function(){
    Route::get('categories','services')->name('services');
    Route::get('category/detail/{id}','categoryDetail')->name('category.detail');
    Route::get('service/detail/{id}','serviceDetail')->name('services.detail');
    Route::get('gifts','giftCard')->name('gift.card');
    Route::get('gift/detail/{id}','giftCardDetail')->name('gift.detail');
    Route::get('package','package')->name('package');
    Route::get('package/detail/{id}','packageDetail')->name('package.detail');
    Route::get('gallery','gallery')->name('gallery');
    Route::get('gallery/detail/{id}','galleryDetail')->name('gallery.detail');
    Route::get('blog','blog')->name('blog'); 
    Route::get('blogDetail/{id}','blogDetail')->name('blog.detail'); 
    Route::get('blog/search','searchBlog')->name('search.blog');
    Route::get('about-us','aboutUs')->name('aboutus');
    Route::get('contact-us','contact')->name('contact');

});

//store contact
Route::post('store-contact',[ContactStoreController::class,'store'])->name('store.contact');
//store booking
Route::post('gift-booking',[GiftBookingStoreController::class,'store'])->name('booking.store');

Route::post('package-booking',[PackageBookingController::class,'store'])->name('package.booking.store');


