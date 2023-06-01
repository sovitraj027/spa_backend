<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactStoreController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        $input = $request->all();
        $input['type'] = 'contact';
        $input['name'] = $request->first_name.' '.$request->last_name;
        $input['description'] = $request->message;
        
        $contact = Contact::create($input);

        if($contact){
            Toastr::success('Successfully Sent!!');
        }
     
        return redirect()->back();



    }
}
