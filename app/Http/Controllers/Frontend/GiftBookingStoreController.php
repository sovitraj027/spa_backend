<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\gift_booking;
use App\Models\GiftBooking;
use Illuminate\Http\Request;

class GiftBookingStoreController extends Controller
{
    public function store(Request $request){
   
        if(GiftBooking::where('from_name',$request->from_name)->where('gift_id',$request->gift_id)
        ->where('to_name',$request->to_name)->where('from_phone',$request->from_phone)->exists()){

            return response()->json([
                'success'=> true,
                'message' => 'You already booked this gift for your loved once. Please try next one.'
            ]); 
        }
        else{
            $request->validate([
                'from_name'=>'required',
                'from_phone'=>'required|min:10|max:10',
                'message'=>'required',
                'booking_date'=>'required|date|date_format:Y-m-d|after:yesterday',
                'to_name'=>'required',
                'to_phone'=>'max:10',
            ]);
    
             GiftBooking::create($request->all());
            
             return response()->json([
                'success'=> true,
                'message' => 'Successfully Booked Your Gift.'
            ]);
        }
        return redirect()->back();
    }
}
