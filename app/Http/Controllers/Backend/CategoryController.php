<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Trait\ImageTrait;
use App\Trait\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //
   use MessageTrait,ImageTrait;

    public function create()
    {
        $categories = Category::get();

        return view('backend.portfolio.categories.create',compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::get();
        return view('backend.portfolio.categories.create',compact('category','categories'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'title'=>'required'
        ]);
        if($request->image){
            $image = $this->imageUpload($request->file('image'),'categories');
        }
        if($request->icon){
            $icon = $this->imageUpload($request->file('icon'),'categories');
            
        }
        $category = Category::create([
            'title'=>$request->title,
            'image'=>$image ?? null,
            'icon'=>$icon ?? null
        ]);

        if($category){
            $this->showMessage('success');
        }
        
        return redirect()->back();
        


    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required'
        ]);
     
        $category = Category::find($id);
        if($request->file('image')){
            if($category->image && File::exists(raw_image_path($category->image))){
                unlink(raw_image_path($category->image));
            }
           
            $image = $this->imageUpload($request->file('image'),'categories');
        }
        if($request->file('icon')){
            if($category->icon && File::exists(raw_image_path($category->icon))){
                unlink(raw_image_path($category->icon));
            }
           
            $icon = $this->imageUpload($request->file('icon'),'categories');
            
        }
        $category = $category->update([
            'title'=>$request->title,
            'image'=>$image ?? $category->image,
            'icon'=>$icon ?? $category->icon
        ]);
        if($category){
            $this->showMessage('success');
        }

        return redirect()->back();

    }

    public function delete($id)
    {
        $category = Category::find($id);

        if($category->image && File::exists(raw_image_path($category->image))){
            unlink(raw_image_path($category->image));
        }
        if($category->icon && File::exists(raw_image_path($category->icon))){
            unlink(raw_image_path($category->icon));
        }
     
        $category = Category::destroy($id);
        if($category){
         
            $this->showMessage('success');
        }

        return redirect()->back();
    }
}
