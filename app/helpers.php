<?php

use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Homepage;
use App\Models\Portfolio;
use App\Models\SiteSetting;
use App\Models\Team;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

function image_path($path)
{
    return asset('storage/'.$path);
}
function raw_image_path($path)
{
    return public_path('storage/'.$path);
}

function showMessage($type,$status = 'created',$text = 'Successfully Created')
{
    
   switch($status){
        case('updated'):
            $text =  'Successfully Updated';
            break;
        case('deleted'):
             $text =  'Successfully Deleted';  
             break;
        default:
        
        
   }
  
   switch($type){
       case('success'):
        //  Toastr::success($text,'Success', ["positionClass" => "toast-bottom-right"]);
        Session::flash('success',$text);
         break;
        default:

       
   }


} 

function homepage($type,$multiple = false)
{
    if($multiple){
     $homepage =  Homepage::whereType($type)->get();
    }else{
     $homepage =  Homepage::whereType($type)->first();
    }

    return $homepage;

}

function aboutus($type,$multiple = false)
{
    if($multiple){
        $aboutus =  AboutUs::whereType($type)->get();
       }else{
        $aboutus =  AboutUs::whereType($type)->first();
       }
       return $aboutus;
}

function teams($type,$multiple = false)
{
    if($multiple){
        $team =  Team::whereType($type)->get();
       }else{
        $team =  Team::whereType($type)->first();
       }
       return $team;
}

function contact($type,$multiple = false)
{
    
    if($multiple){
        $contact =  Contact::whereType($type)->get();
       }else{
        $contact =  Contact::whereType($type)->first();
       }
       return $contact;
}

function typeExists($model,$type)
{
 
    $NamespacedModel = '\\App\\Models\\' .ucfirst( $model);

    return $NamespacedModel::whereType($type)->exists();
}

function portfolio($type,$multiple = false)
{
    if($multiple){
        $contact =  Portfolio::whereType($type)->get();
       }else{
        $contact =  Portfolio::whereType($type)->first();
       }

    return $contact;
}
function showErrorMessage($text = 'Something Went Wrong')
{
    Toastr::error($text,'Error', ["positionClass" => "toast-bottom-right"]);
}
function setting($key)
{
    if(SiteSetting::where('key',$key)->exists()){
        $setting = SiteSetting::with('settingValue')->where('key',$key)->first();
        if($setting->settingValue){
            return $setting->settingValue->value;
        }
    }

    return null;
}

function deleteImage($image)
{
    if($image && File::exists(raw_image_path($image))){
        unlink(raw_image_path($image));
    }
   
}








