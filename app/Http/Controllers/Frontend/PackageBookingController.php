<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageBooking;
use Illuminate\Http\Request;

class PackageBookingController extends Controller
{


    public function store(Request $request)
    {
        

        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|min:10|max:10',
            'address' => 'required|string',
            'booking_date' => 'required|date|date_format:Y-m-d|after:yesterday',
            'email' => 'required|email',            
        ]);

        PackageBooking::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Successfully Booked Your Package.'
        ]);

        return redirect()->back();
    }
}
