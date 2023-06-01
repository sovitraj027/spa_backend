<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    //
    use ImageTrait;
    
    public function index()
    {
        $blogs = Blog::with('category')->where('type','blog')->get();
        return view('backend.blog.blog-list',compact('blogs'));
    }

    public function banner()
    {
        if(Blog::where('type','banner')->exists()){
            $banner = Blog::where('type','banner')->first();
            return view('backend.blog.banner.create',compact('banner'));
         }
        return view('backend.blog.banner.create');
    }



    public function create()
    {
        $categories = BlogCategory::get();
        return view('backend.blog.create-blog',compact('categories'));
    }


    public function store(Request $request)
    {
        if($request->type !='banner'){
            $request->validate([
                'category_id'=>'required',
                'image'=>'required',
                'title_1'=>'required',
            ],[
                'category_id.required'=>'Category is Required',
                'image.required'=>' Image is Required',
                'title_1.required'=>'Title is Required',
            ]);
        }


        if($request->file('image')){
            $path =  $this->imageUpload($request->image,'blogs');

        }
   
      
        $blog = Blog::create([
            'title_1'=>$request->title_1,
            'title_2'=>$request->title_2,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'author'=>$request->author,
            'category_id'=>$request->category_id,
            'image'=>$path ?? null,
            'type'=>$request->type,
            ]);

        
      

       if($blog){
        showMessage('success','created');
       }
    
       return redirect()->back(); 
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        $categories = BlogCategory::get();
        return view('backend.blog.create-blog',compact('categories','blog'));
    }

    public function update(Request $request,$id)
    {
        $blog = Blog::findOrFail($id);
        $input = $request->all();
        if($request->file('image')){
            $input['image'] =  $this->imageUpload($request->image,'blogs');
        }else{
            $input['image'] = $blog->image;
        }
   
      
        $blog = $blog->update($input);

        
      

       if($blog){
        showMessage('success','created');
       }
    
       return redirect()->back(); 
    }

    public function delete($id)
    {
        $slider = Blog::findOrFail($id);
    
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
