<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealState extends Model
{
    use HasFactory;

    protected $fillable = ['title_1','feature_image','description','description_2','description_3','description_4','client','year','category_id','location'
    ,'roi','social_link_1','social_link_2','social_link_3','related_images','banner_image','same_as_portfolio'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
