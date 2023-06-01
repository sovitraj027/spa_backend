<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\SiteSettingValue;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    //
    use ImageTrait;

    public function index()
    {
        $settings = SiteSetting::with('settingValue')->orderBy('order_level','asc')->get();
        return view('backend.setting.index',compact('settings'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'type'=>'required',
            'key'=>'required',

        ]);
        $input = $request->all();

        $setting = SiteSetting::updateOrCreate(['key'=>$input['key']],$input);
        if($setting){
            showMessage('success');
        }
   

        return redirect()->back();

    }

    public function update(Request $request)
    {
        if(isset($request->value)){
            foreach($request->value as $key=>$value)
            {
                $setting_value = SiteSettingValue::updateOrCreate(['setting_id'=>$key],['value'=>$value]);
            }
        }
        
       
        if(isset($request->image)){
            foreach($request->image as $key=>$value)
            {
                if($value){
                    $path = $this->imageUpload($value,'sitesetting');
    
                }
                $setting_value = SiteSettingValue::updateOrCreate(['setting_id'=>$key],['value'=>$path ?? null]);
            }
    
        }
    

        if($setting_value){
            showMessage('success','created');
        }

        return redirect()->back();
    }

    public function delete($id)
    {   
        $setting = SiteSetting::with('settingValue')->findOrFail($id);
        if($setting->settingValue && $setting->settingValue->value && File::exists(raw_image_path($setting->settingValue->value))){
            unlink(raw_image_path($setting->settingValue->value));
        }
        if($setting->delete()){
            showMessage('success','deleted');
        }

        return redirect()->back();

    }
}
