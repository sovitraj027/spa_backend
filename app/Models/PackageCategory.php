<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','image','description'];

    public function package()
    {
        return $this->hasMany(Package::class,'package_category_id');
    }
}
