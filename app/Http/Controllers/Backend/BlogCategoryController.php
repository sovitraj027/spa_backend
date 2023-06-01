<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Trait\MessageTrait;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    //
  

    public function index()
    {
        
    }
    
    public function create()
    {
        $categories = BlogCategory::get();
        return view('backend.blog.categories.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        BlogCategory::create([
            'title'=>$request->title
        ]);
         showMessage('success');
        return redirect()->back();
    }

    public function edit($id)
    {

        $category = BlogCategory::find($id);
        $categories = BlogCategory::get();
        return view('backend.blog.categories.create',compact('categories','category'));


    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required'
        ]);

        $update = BlogCategory::findOrFail($id)->update([
            'title'=>$request->title
        ]);
        if($update){
            showMessage('success','updated');

        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $blog = BlogCategory::findOrFail($id);
    
     
        $delete = $blog->delete();
        if($delete){
            showMessage('success','deleted');
        }
    return redirect()->back();

    }
}
