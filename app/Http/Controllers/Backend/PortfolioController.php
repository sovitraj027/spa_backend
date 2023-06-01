<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    //
    use ImageTrait;
    //
    public function index()
    {
       
        return view('backend.homepage.section-one.list');
    }

    public function bannerCreate()
    {
     
      if(Portfolio::where('type','banner')->exists()){
         $banner = Portfolio::where('type','banner')->first();
         return view('backend.portfolio.banner.create',compact('banner'));
      }
      return view('backend.portfolio.banner.create');
      
    }

    

    public function store(Request $request)
    {
        
        if($request->file('image')){
            $path =  $this->imageUpload($request->image,'portfolio');

        }
           
        $services = Portfolio::create([
            'title_1'=>$request->title_1,
            'title_2'=>$request->title_2,
            'description'=>$request->description,
            'image'=>$path ?? null,
            'type'=>$request->type,
            ]);

        
      

       if($services){
        showMessage('success','created');
       }
    
       return redirect()->back(); 

    }

 

    public function update(Request $request,$id)
    {
      
        $portfolio = Portfolio::find($id);
        if($request->file('image')){
            if($portfolio->image && File::exists(raw_image_path($portfolio->image))){
                unlink(raw_image_path($portfolio->image));
            }
            $path = $this->imageUpload($request->image,'portfolios');
        }
    
        $update = $portfolio->update([
            'title_1'=>$request->title_1,
            'title_2'=>$request->title_2,
            'description'=>$request->description,
            'image'=>$path ?? $portfolio->image,
            'type'=>$request->type,
           ]);
        if($update){
            showMessage('success','updated');
        }
        return redirect()->back();

    }

    public function delete($id)
    {
        $portfolio = Portfolio::find($id);
    
            if($portfolio->image && File::exists(raw_image_path($portfolio->image))){
                unlink(raw_image_path($portfolio->image));
            }
        $delete = $portfolio->delete();
        if($delete){
            showMessage('success','deleted');
        }
        return redirect()->back();
        
    }



}
