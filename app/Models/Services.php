<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = ['title_1','title_2','title_3','description','description_2','icon','image','type'];

    public function serviceValue()
    {
        return $this->hasMany(ServiceValue::class,'service_id');
    }
    
}
