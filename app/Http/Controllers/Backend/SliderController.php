<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Trait\ImageTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class SliderController extends Controller
{
    use ImageTrait;
    //
    public function index()
    {
        $sliders = Slider::get();
      
        return view('backend.homepage.slider.slider-list',compact('sliders'));
    }

    public function create()
    {
        
        return view('backend.homepage.slider.create-slider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required'
        ]);
       $path =  $this->imageUpload($request->image,'sliders');
       $slider = Slider::create([
        'title_1'=>$request->title_1,
        'title_2'=>$request->title_2,
        'title_3'=>$request->title_3,
        'btn_link'=>$request->btn_link_1,
        'btn_link_2'=>$request->btn_link_2,
        'image'=>$path
       ]);
       if($slider){
        showMessage('success','Successfully Created!!');
       }
    
       return redirect()->route('admin.homepage.sliders.index'); 

    }

    public function edit($id)
    {
        $slider = Slider::find($id);
     
        return view('backend.homepage.slider.create-slider',compact('slider'));
    }

    public function update(Request $request,$id)
    {
        $slider = Slider::find($id);
        if($slider->image && $request->file('image')){
            if(File::exists(raw_image_path($slider->image))){
                unlink(raw_image_path($slider->image));
            }
            $path = $this->imageUpload($request->image,'sliders');
        }
        $update = $slider->update([
            'title_1'=>$request->title_1,
            'title_2'=>$request->title_2,
            'title_3'=>$request->title_3,
            'btn_link'=>$request->btn_link_1,
            'btn_link_2'=>$request->btn_link_2,
            'image'=>$path ?? $slider->image
        ]);
        if($update){
            showMessage('success','updated');
        }
        return redirect()->back();

    }

    public function delete($id)
    {
        $slider = Slider::find($id);
    
            if(File::exists(raw_image_path($slider->image))){
                unlink(raw_image_path($slider->image));
            }
        $delete = $slider->delete();
        if($delete){
            showMessage('success','deleted');
        }
        return redirect()->back();
        
    }
}
