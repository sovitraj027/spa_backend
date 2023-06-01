<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Homepage;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomePageController extends Controller
{
    use ImageTrait;
    //
    public function index()
    {
       
        return view('backend.homepage.section-one.list');
    }

    public function create()
    {
        $data['section_one_category'] = Homepage::where('type','section_one_category')->get();
        $data['section_one_title'] = Homepage::where('type','section_one_title')->first();
    
        return view('backend.homepage.section-one.create',$data);
    }

    

    public function store(Request $request)
    {
        
        if($request->file('image')){
            $path =  $this->imageUpload($request->image,'sliders');

        }
        if($request->file('image_2')){
           
            $path2 = $this->imageUpload($request->image_2,'homepage');
        }
      
        $homepage = Homepage::create([
            'title'=>$request->title,
            'title_2'=>$request->title_2,
            'title_3'=>$request->title_3,
            'icon'=>$request->icon,
            'description'=>$request->description,
            'description_2'=>$request->description_2,
            'image'=>$path ?? null,
            'image_2'=>$path2 ?? null,
            'btn_link'=>$request->btn_link,
            'author'=>$request->author,
            'designation'=>$request->designation,
            'type'=>$request->type,
            ]);

        
      

       if($homepage){
        showMessage('success','created');
       }
    
       return redirect()->back(); 

    }

    public function edit($id)
    {
        $slider = Homepage::find($id);
     
        return view('backend.homepage.section-one.create',compact('slider'));
    }

    public function update(Request $request,$id)
    {
        $homepage = Homepage::find($id);
        if($request->file('image')){
            if($homepage->image && File::exists(raw_image_path($homepage->image))){
                unlink(raw_image_path($homepage->image));
            }
            $path = $this->imageUpload($request->image,'sliders');
        }
        if($request->file('image_2')){
            if($homepage->image_2 && File::exists(raw_image_path($homepage->image_2))){
                unlink(raw_image_path($homepage->image_2));
            }
            $path2 = $this->imageUpload($request->image_2,'homepage');
        }
        $update = $homepage->update([
            'title'=>$request->title,
            'title_2'=>$request->title_2,
            'title_3'=>$request->title_3,
            'icon'=>$request->icon,
            'description'=>$request->description,
            'description_2'=>$request->description_2,
            'image'=>$path ?? $homepage->image,
            'image_2'=>$path2 ?? $homepage->image2,
            'btn_link'=>$request->btn_link,
            'author'=>$request->author,
            'designation'=>$request->designation,
            'type'=>$request->type,
           ]);
           
        if($update){
            showMessage('success','updated');
        }
        return redirect()->back();

    }

    public function delete($id)
    {
        $slider = Homepage::findOrFail($id);
    
            if($slider->image && File::exists(raw_image_path($slider->image))){
                unlink(raw_image_path($slider->image));
            }
        $delete = $slider->delete();
        if($delete){
            showMessage('success','deleted');
        }
        return redirect()->back();
        
    }

    //section two
    public function createSectionTwo()
    {
        if(Homepage::where('type','section_two')->exists()){
            $section_two = Homepage::where('type','section_two')->first();
            return view('backend.homepage.section-two.create',compact('section_two'));
        }
        return view('backend.homepage.section-two.create');
    }

    public function createSectionThree()
    {
        if(Homepage::where('type','section_three')->exists()){
            $section_three = Homepage::where('type','section_three')->first();
            return view('backend.homepage.section-three.create',compact('section_three'));
        }
        return view('backend.homepage.section-three.create'); 
    }
    public function createSectionFour()
    {
        if(Homepage::where('type','section_four')->exists()){
            $section_four = Homepage::where('type','section_four')->first();
            return view('backend.homepage.section-four.create',compact('section_four'));
        }
        return view('backend.homepage.section-four.create'); 
    }
    public function createSectionFive()
    {
        if(Homepage::where('type','section_five')->exists()){
            $section_five = Homepage::where('type','section_five')->first();
            return view('backend.homepage.section-five.create',compact('section_five'));
        }
        return view('backend.homepage.section-five.create'); 
    }

    


    
}
