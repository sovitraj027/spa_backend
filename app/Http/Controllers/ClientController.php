<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\GiftBooking;
use App\Models\Team;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    //
    use ImageTrait;
    //
    public function index()
    {
        $clients = Client::get();
        return view('backend.client.client-list',compact('clients'));
    }

    //Gift booking List
    public function bookingList()
    {
        $bookings = GiftBooking::latest()->get();
        return view('backend.giftbooking.booking-list',compact('bookings'));
    }

    public function create()
    {
        
        return view('backend.client.create-client');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
            'title'=>'required'
        ]);
       $path =  $this->imageUpload($request->image,'gifts');
       $client = Client::create([
    
        'title'=>$request->title,
        'short_description'=>$request->short_description,
        'long_description'=>$request->long_description,
        'image'=>$path
       ]);
       if($client){
        showMessage('success','Successfully Created!!');
       }
    
       return redirect()->back();

    }

    public function edit($id)
    {
        $client = Client::find($id);
     
        return view('backend.client.create-client',compact('client'));
    }

    public function update(Request $request,$id)
    {
        $client = Client::find($id);
        if($client->image && $request->file('image')){

            deleteImage($client->image);

            $path = $this->imageUpload($request->image,'gifts');
        }
        $update = $client->update([
            
            'image'=>$path ?? $client->image,
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
        ]);
        if($update){
            showMessage('success','updated');
        }
        return redirect()->back();

    }

    public function delete($id)
    {
        $client = Client::find($id);
    
            deleteImage($client->image);

        $delete = $client->delete();
        if($delete){
            showMessage('success','deleted');
        }
        return redirect()->back();
        
    }

    //gift booking delete
     public function deleteBooking($id){

        $booking = GiftBooking::find($id);

        $delete = $booking->delete();

        if($delete){
            showMessage('success','deleted');
        }
        return redirect()->back();
     }
}
