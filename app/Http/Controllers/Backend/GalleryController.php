<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    use ImageTrait;
    //
    public function store(Request $request)
    {
        $request->validate([
           
            'feature_image'=>'required',
            'title'=>'required',
            'banner_image'=>'exclude_if:same_as_gallery,1|required'
        ],[
            'feature_image.required'=>'Feature Image is Required',
            'title.required'=>'Title is Required',
        ]);

        if($request->hasFile('feature_image')){
           $feature_image =  $this->imageUpload($request->file('feature_image'),'gallery');
        }
        if($request->hasFile('banner_image')){
           $banner_image =  $this->imageUpload($request->file('banner_image'),'gallery');
        }

        $create = Gallery::create([
            'title'=>$request->title,
            'feature_image'=>$feature_image,
            'related_images'=>$request->other_images ? json_encode($request->other_images) : null,
            'banner_image'=>$banner_image ?? null,
            'same_as_gallery'=>$request->same_as_gallery ?? 0,
        ]);
        if($create){
            showMessage('success');
        }

        return redirect()->back();

    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
 
        return view('backend.services.section-three.create',compact('gallery')); 
    }

    public function update(Request $request,$id)
    {

        $input = $request->all();
     
        $request->validate([
         
           
            'title'=>'required',
            'banner_image'=>'exclude_if:same_as_gallery,1|required'
        ],[
           
            
            'title.required'=>'Title is Required',
        ]);
        $realstate = Gallery::findOrFail($id);
        if($request->other_images){
            $other_images = json_encode($request->other_images);
        }else{
            $other_images = null;
        }
        if($request->hasFile('feature_image')){
           
            deleteImage($realstate->feature_image);

           $input['feature_image'] =  $this->imageUpload($request->file('feature_image'),'gallery');
        }else{
            $input['feature_image'] = $realstate->feature_image;
        }

        if($request->hasFile('banner_image')){
            if($realstate->image && File::exists(raw_image_path($realstate->banner_image))){
                unlink(raw_image_path($realstate->banner_image));
            }
           $input['banner_image'] =  $this->imageUpload($request->file('banner_image'),'gallery');
        }
        else{
            $input['banner_image'] = $realstate->banner_image;
        }

        $input['related_images'] = $other_images;

        $create = $realstate->update($input);
        if($create){
            showMessage('success');
        }

        return redirect()->back();

    }

    public function delete($id)
    {

        $realstate = Gallery::find($id);
       
          deleteImage($realstate->feature_image);
        if($realstate->related_images)
        {
            $images = json_decode($realstate->related_images,true);
            foreach($images as $image){
                if( File::exists(raw_image_path($image))){
                    unlink(raw_image_path($image));
                }
            }
         
        }
        $realstate->delete();
        showMessage('success','deleted');
        return redirect()->back();


    }

    public function deleteImage(Request $request,$id)
    {
        $realstate = Gallery::find($id);

        $array = json_decode($realstate->related_images);
        if(array_key_exists($request->image,$array) && File::exists(raw_image_path($array[$request->image]))){
            unlink(raw_image_path($array[$request->image]));
        }
        if(array_key_exists($request->image,$array) ){
            $new_array = Arr::except($array,$request->image);
            $realstate->related_images = json_encode($new_array);
            $realstate->save();
        }
    
        showMessage('success','deleted');
        return redirect()->back();

    }
}
