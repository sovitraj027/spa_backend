<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homepage extends Model
{
    use HasFactory;

    protected $fillable = ['title','title_2','title_3','icon','description','description_2','image','image_2','btn_link','author','designation','type'];

    
}
