<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Trait\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    //
    use ImageTrait;
    //
    public function ckImage(Request $request)
    {
        
        $path = $this->imageUpload($request->upload,'ckeditor');

        return response()->json([
            'url'=> image_path($path)
        ],200);
    }
    public function dropZoneImage(Request $request)
    {
        
        $path = $this->imageUpload($request->file,'dropzone');

        return response()->json([
            'url'=> $path
        ],200);
    }

    public function deleteImage(Request $request)
    {
        if($request->url && File::exists(raw_image_path($request->url))){
            unlink(raw_image_path($request->url));
        }

        return response()->json(['message'=>$request->url]);
    }
}
