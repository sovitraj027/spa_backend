<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\RealState;
use App\Trait\ImageTrait;
use App\Trait\MessageTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class RealStateController extends Controller
{
    //
    use ImageTrait;
    
    public function index()
    {
        $realstates = RealState::with('category')->get();
      
        return view('backend.portfolio.real-state.realstate-list',compact('realstates'));
    }

    public function create()
    {
        $categories = Category::get();
    
        return view('backend.portfolio.real-state.create-realstate',compact('categories'));
    }
    
    public function store(Request $request)
    {
        
        $request->validate([
            'category_id'=>'required',
            'feature_image'=>'required',
            'title_1'=>'required',
            'banner_image'=>'exclude_if:same_as_portfolio,1|required'
        ],[
            'category_id.required'=>'Category is Required',
            'feature_image.required'=>'Feature Image is Required',
            'title_1.required'=>'Title is Required',
        ]);

        if($request->hasFile('feature_image')){
           $feature_image =  $this->imageUpload($request->file('feature_image'),'real_state');
        }
        if($request->hasFile('banner_image')){
           $banner_image =  $this->imageUpload($request->file('banner_image'),'real_state');
        }

        $create = RealState::create([
            'title_1'=>$request->title_1,
            'feature_image'=>$feature_image,
            'description'=>$request->description,
            'description_2'=>$request->description_2,
            'description_3'=>$request->description_3,
            'description_4'=>$request->description_4,
            'client'=>$request->client,
            'year'=>$request->year,
            'category_id'=>$request->category_id,
            'location'=>$request->location,
            'roi'=>$request->roi,
            'social_link_1'=>$request->social_link_1,
            'social_link_2'=>$request->social_link_2,
            'social_link_3'=>$request->social_link_3,
            'related_images'=>json_encode($request->other_images) ?? null,
            'banner_image'=>$banner_image ?? null,
            'same_as_portfolio'=>$request->same_as_portfolio ?? 0,
        ]);
        if($create){
            showMessage('success');
        }

        return redirect()->back();



    }

    public function update(Request $request,$id)
    {

        $input = $request->all();
   
        $request->validate([
            'category_id'=>'required',
            'title_1'=>'required',
            'banner_image'=>'exclude_if:same_as_portfolio,1|required'
        ],[
            'category_id.required'=>'Category is Required',
            'feature_image.required'=>'Feature Image is Required',
            'title_1.required'=>'Title is Required',
        ]);
        $realstate = RealState::findOrFail($id);
        if($request->hasFile('feature_image')){
            if($realstate->feature_image && File::exists(raw_image_path($realstate->feature_image))){
                unlink(raw_image_path($realstate->feature_image));
            }
           $input['feature_image'] =  $this->imageUpload($request->file('feature_image'),'real_state');
        }else{
            $input['feature_image'] = $realstate->feature_image;
        }

        if($request->hasFile('banner_image')){
            if($realstate->image && File::exists(raw_image_path($realstate->banner_image))){
                unlink(raw_image_path($realstate->banner_image));
            }
           $input['banner_image'] =  $this->imageUpload($request->file('banner_image'),'real_state');
        }
        else{
            $input['banner_image'] = $realstate->banner_image;
        }

        $input['other_images'] = json_encode($request->other_images) ?? null;

        $create = $realstate->update($input);
        if($create){
            showMessage('success');
        }

        return redirect()->back();

    }

    public function edit($id)
    {
        $realstate = RealState::findOrFail($id);
        $categories = Category::get();
        return view('backend.portfolio.real-state.create-realstate',compact('realstate','categories'));
    }

    public function delete()
    {


    }

    public function deleteImage(Request $request,$id)
    {
        $realstate = RealState::find($id);

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
