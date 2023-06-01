<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','type','key','order_level'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($sitesetting) {
            //
            $order_level = SiteSetting::orderBy('order_level','desc')->first();
            if($order_level){
                $sitesetting->order_level = $order_level->order_level + 1;

            }else{
                $sitesetting->order_level = 1;
            }
        });
    }

    public function settingValue()
    {
        return $this->hasOne(SiteSettingValue::class,'setting_id');
    }
}
