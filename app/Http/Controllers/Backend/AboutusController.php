<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutusController extends Controller
{
    //
    use ImageTrait;

    public function bannerCreate()
    {
        if(AboutUs::where('type','banner')->exists()){
            $banner = AboutUs::where('type','banner')->first();
            return view('backend.about-us.banner.create',compact('banner'));
        }
        return view('backend.about-us.banner.create'); 
    }

    public function store(Request $request)
    {
        
        if($request->file('image')){
            $path =  $this->imageUpload($request->image,'aboutus');

        }
      
        $aboutus = AboutUs::create([
            'title'=>$request->title,
            'title_2'=>$request->title_2,
            'title_3'=>$request->title_3,
            'description'=>$request->description,
            'description_2'=>$request->description_2, 
            'description_3'=>$request->description_3, 
            'image'=>$path ?? null,
            'progress_percent'=>$request->progress_percent,
            'type'=>$request->type,
            ]);

        
      

       if($aboutus){
        showMessage('success','created');
       }
    
       return redirect()->back(); 
    }

    public function update(Request $request,$id)
    {
        
        $aboutus = AboutUs::find($id);
        if($request->file('image')){
            if($aboutus->image && File::exists(raw_image_path($aboutus->image))){
                unlink(raw_image_path($aboutus->image));
            }
            $path = $this->imageUpload($request->image,'sliders');
        }

        $update = $aboutus->update([
            'title'=>$request->title,
            'title_2'=>$request->title_2,
            'title_3'=>$request->title_3,
            'description'=>$request->description,
            'description_2'=>$request->description_2, 
            'description_3'=>$request->description_3, 
            'image'=>$path ??  $aboutus->image,
            'progress_percent'=>$request->progress_percent,
            'type'=>$request->type,
           ]);
        if($update){
            showMessage('success','updated');
        }
        return redirect()->back();

    }
    //section One
    public function createSectionOne()
    {
        if(AboutUs::where('type','section_one')->exists()){
            $section_one = AboutUs::where('type','section_one')->first();
            return view('backend.about-us.section-one.create',compact('section_one'));
        }
        return view('backend.about-us.section-one.create');
    }
    //section two
    public function createSectionTwo()
    {
        if(AboutUs::where('type','section_two')->exists()){
            $data['section_two'] = AboutUs::where('type','section_two')->first();
          
        
            $data['section_two_category'] = AboutUs::where('type','section_two_category')->get();
         
          
        }
        if(AboutUs::where('type','section_three')->exists()){
            $data['section_three'] = AboutUs::where('type','section_three')->first();
          
        
          
         
           
        }

        if(isset($data)){
            return view('backend.about-us.section-two.create',$data);
        }
      
        return view('backend.about-us.section-two.create');
    }

    public function delete($id)
    {
        $slider = AboutUs::find($id);
    
            if($slider->image && File::exists(raw_image_path($slider->image))){
                unlink(raw_image_path($slider->image));
            }
        $delete = $slider->delete();
        if($delete){
            showMessage('success','deleted');
        }
        return redirect()->back();
        
    }
    
}
