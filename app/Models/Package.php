<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = ['title','price','per','description','package_category_id'];


    public function category(){
        return $this->belongsTo(PackageCategory::class,'package_category_id');
    }
}
