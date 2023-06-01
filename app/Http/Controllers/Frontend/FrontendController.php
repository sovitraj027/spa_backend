<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\Portfolio;
use App\Models\RealState;
use App\Models\Services;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function services()
    {
        $categories = Category::with('realstate')->whereHas('realstate')->get();
        $services = $categories->first()->realstate;
        return view('frontend.services',compact('categories','services'));
    }

    public function categoryDetail($id)
    {
        $categories = Category::with('realstate')->whereHas('realstate')->get();

        $services = Category::findOrFail($id)->realstate;
   
        return view('frontend.category-detail',compact('services','categories'));

    }
    public function serviceDetail($id)
    {
        $service = RealState::with('category')->findOrFail($id);
        if($service->same_as_portfolio && Portfolio::where('type','banner')->exists()){
            $banner = Portfolio::where('type','banner')->first();
           
            return view('frontend.services-detail',compact('service','banner'));
        }

        return view('frontend.services-detail',compact('service'));

    }

    public function giftCard()
    {
        $categories = Category::with('realstate')->whereHas('realstate')->get();
        $services = Client::get();
        return view('frontend.gift-card',compact('categories','services'));
    }

    public function giftCardDetail($id)
    {
        
        $service = Client::findOrFail($id);
        $banner = Portfolio::where('type','banner')->first();
        return view('frontend.gift-card-detail',compact('service','banner'));
    }

    public function package()
    {
        $package_category = PackageCategory::get();
        $categories = Category::with('realstate')->whereHas('realstate')->get();

    

        return view('frontend.package',compact('package_category','categories'));
    }

    public function packageDetail($id)
    {
        $package_category = PackageCategory::with('package')->find($id);
     
        return view('frontend.package-detail',compact('package_category'));
    }

    public function gallery()
    {
        $galleries = Gallery::get();
        return view('frontend.gallery',compact('galleries'));
    }

    public function galleryDetail($id)
    {
        $gallery = Gallery::find($id);

        return view('frontend.gallery-detail',compact('gallery'));
    }

    public function blog()
    {
        $blogs = Blog::where('type','blog')->with('category')->orderBy('created_at','desc')->paginate(6);
      
        $latest_posts = Blog::inRandomOrder()->limit(2)->get();
        $latest_gallery = Gallery::inRandomOrder()->limit(2)->get();
        return view('frontend.blog',compact('blogs','latest_posts','latest_gallery'));
    }

    public function blogDetail($id)
    {
        $blog = Blog::find($id);
        return view('frontend.blog-detail',compact('blog'));
    }

    public function searchBlog(Request $request)
    {
      
        $blogs = Blog::where('type','blog')->with('category')->where('title_1','LIKE','%'.$request->search.'%')->orderBy('created_at','desc')->paginate(6);
  
        $latest_posts = Blog::inRandomOrder()->limit(2)->get();
        $search = $request->search;
        $latest_gallery = Gallery::inRandomOrder()->limit(2)->get();
        return view('frontend.blog',compact('blogs','latest_posts','search','latest_gallery'));

    }

    public function aboutUs()
    {
        $section_one = AboutUs::where('type','section_two')->first();
        $section_two = AboutUs::where('type','section_three')->first();
        return view('frontend.about-us',compact('section_one','section_two'));
    }

    public function contact()
    {
       
        return view('frontend.contact');
    }


}
