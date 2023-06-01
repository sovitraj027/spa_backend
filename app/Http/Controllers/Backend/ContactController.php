<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Trait\ImageTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    //
    use ImageTrait;

    public function banner()
    {
        if(Contact::where('type','banner')->exists()){

            $banner = Contact::where('type','banner')->first();

            return view('backend.contact.banner.create',compact('banner'));
         }
        return view('backend.contact.banner.create');
    }

    public function contacts()
    {
        $contacts = Contact::where('type','contact')->orderBy('id','desc')->get();
    
        return view('backend.contact.contacts',compact('contacts'));
    }

    public function store(Request $request)
    {
     
        if($request->file('image')){

            $path =  $this->imageUpload($request->image,'contacts');
        }
        
        $contact = Contact::create([
            'title_1'=>$request->title_1,
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'description'=>$request->description,
            'image'=>$path ?? null,
            'title_2'=>$request->title_2,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'map'=>$request->map,
            'type'=>$request->type
        ]);

        if($contact){
            showMessage('success');
        }

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        # code...
        $contact  = Contact::findOrFail($id);

        if($request->file('image'))
        {
            if($contact->image && File::exists(raw_image_path($contact->image)))
            {
                unlink(raw_image_path($contact->image));
            }
            $path =  $this->imageUpload($request->image,'contacts');
        }

        $update = $contact->update([
            'title_1'=>$request->title_1,
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'description'=>$request->description,
            'image'=>$path ?? $contact->image,
            'title_2'=>$request->title_2,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'map'=>$request->map,
            'type'=>$request->type
        ]);

        if($update){
            showMessage('success','updated');
        }

        return redirect()->bacK();
    }
    
    public function sectionOne()
    {
        if(Contact::where('type','section_one')->exists()){
            $section_one = Contact::where('type','section_one')->first();
 
            return view('backend.contact.section-one',compact('section_one'));
         }
        
        return view('backend.contact.section-one');
    }

    public function delete($id)
    {
        $contact = Contact::destroy($id);
        if($contact){
            showMessage('success','deleted');
        }
        return redirect()->back();
    }
}
