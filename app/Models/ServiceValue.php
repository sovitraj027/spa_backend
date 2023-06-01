<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceValue extends Model
{
    use HasFactory;

   protected $fillable = ['title_1','title_2','title_3','description','description_2','description_3','description_4','service_id','icon','image','type'];
}
