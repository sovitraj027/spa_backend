<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Services;
use App\Trait\ImageTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServicesController extends Controller
{
    //
    use ImageTrait;
    //

    public function servicesList()
    {
        $services = Services::where('type','services')->get();
        $galleries = Gallery::get();
        return view('backend.services.services-list',compact('services','galleries'));
    }
    public function index()
    {
       
        return view('backend.homepage.section-one.list');
    }

    public function bannerCreate()
    {
     
      if(Services::where('type','banner')->exists()){
         $banner = Services::where('type','banner')->first();
         return view('backend.services.banner.create',compact('banner'));

      }
      return view('backend.services.banner.create');


    }

    

    public function store(Request $request)
    {
        
        if($request->file('image')){
            $path =  $this->imageUpload($request->image,'services');

        }
   
      
        $services = Services::create([
            'title_1'=>$request->title_1,
            'title_2'=>$request->title_2,
            'title_3'=>$request->title_3,
            'icon'=>$request->icon,
            'description'=>$request->description,
            'image'=>$path ?? null,
            'description_2'=>$request->description_2,
            'description_3'=>$request->description_3,
            'description_4'=>$request->description_4,
            'type'=>$request->type,
            ]);

        
      

       if($services){
        showMessage('success','created');
       }
    
       return redirect()->back(); 

    }

    public function edit($id)
    {
        $data['service'] = Services::with('serviceValue')->findOrFail($id);
        if( isset($data['service']->serviceValue) &&  $data['service']->serviceValue()->where('type','banner')->exists()){
            $data['banner'] =  $data['service']->serviceValue->where('type','banner')->first();
        }
        if( isset($data['service']->serviceValue) &&  $data['service']->serviceValue()->where('type','section_one')->exists()){
            $data['section_one'] =  $data['service']->serviceValue->where('type','section_one')->first();
        }
        if( isset($data['service']->serviceValue) &&  $data['service']->serviceValue()->where('type','section_one_category')->exists()){
            $data['section_one_category'] =  $data['service']->serviceValue()->where('type','section_one_category')->get();
        }
        if( isset($data['service']->serviceValue) &&  $data['service']->serviceValue()->where('type','section_two')->exists()){
            $data['section_two'] =  $data['service']->serviceValue->where('type','section_two')->first();
        }

        return view('backend.services.create',$data);


    }

    public function update(Request $request,$id)
    {

     
        $service = Services::find($id);
        if($request->type != 'banner'){
            if(!$service->serviceValue()->where('type','banner')->exists() ){
                showErrorMessage('Banner should be added first');
                return redirect()->back();
            }
        }else{
            if(!$request->image){
                showErrorMessage('Banner is required');
                return redirect()->back();
            }
        }
 
        if($request->file('image')){
            if($service->image && File::exists(raw_image_path($service->image))){
                unlink(raw_image_path($service->image));
            }
            $path = $this->imageUpload($request->image,'services');
        }
        if($request->type == 'services' || $request->type == 'banner'){
            $update = $service->update([
                'title_1'=>$request->title_1,
                'title_2'=>$request->title_2,
                'title_3'=>$request->title_3,
                'icon'=>$request->icon,
                'description'=>$request->description,
                'description_2'=>$request->description_2,
                'description_3'=>$request->description_3,
                'description_4'=>$request->description_4,
                'image'=>$path ?? $service->image,
                'type'=>$request->type,
               ]);
        }
        elseif($request->type == 'section_one_category')
        {
            $update = $service->serviceValue()->create([
                'service_id'=>$service->id,
                'title_1'=>$request->title_1,
                'icon'=>$request->icon,
                'type'=>$request->type,
               ]);
        }
        else{
           
            $image =  $service->serviceValue()->where('type',$request->type)->first();
            $update = $service->serviceValue()->updateOrCreate(['type'=>$request->type],[
                'service_id'=>$service->id,
                'title_1'=>$request->title_1,
                'title_2'=>$request->title_2,
                'title_3'=>$request->title_3,
                'icon'=>$request->icon,
                'description'=>$request->description,
                'description_2'=>$request->description_2,
                'description_3'=>$request->description_3,
                'description_4'=>$request->description_4,
                'image'=>$path ?? ($image->image ?? null),
                'type'=>$request->type,
               ]);
             
        }
     
        if($update){
            showMessage('success','updated');
        }
        return redirect()->back();

    }

    public function delete($id)
    {
        $service = Services::find($id);
    
            if($service->image && File::exists(raw_image_path($service->image))){
                unlink(raw_image_path($service->image));
            }
        $delete = $service->delete();
        if($delete){
            showMessage('success','deleted');
        }
        return redirect()->back();
        
    }

    //section two
    public function createSectionOne()
    {
        $data['section_one'] = Services::where('type','section_one')->first();
        $data['section_one_category'] = Services::where('type','section_one_category')->get();
        return view('backend.services.section-one.create',$data);
    }
    public function createSectionTwo()
    {
        if(Services::where('type','section_two')->exists()){
            $section_two = Services::where('type','section_two')->first();
            return view('backend.services.section-two.create',compact('section_two'));
        }
        return view('backend.services.section-two.create'); 
     
    }

    public function createSectionThree()
    {
        $data['section_three'] = Services::where('type','section_three')->first();
        $data['section_three_category'] = Services::where('type','section_three_category')->get();
        return view('backend.services.section-three.create',$data); 
    }

    public function create()
    {
        return view('backend.services.create');
    }
 

}
