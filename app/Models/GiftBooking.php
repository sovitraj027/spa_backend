<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftBooking extends Model
{
    use HasFactory;

    protected $fillable=['from_name','email','from_phone','package_name','booking_date','message','gift_id','to_phone','to_name'];
}
