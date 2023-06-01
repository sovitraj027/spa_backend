<?php

namespace App\Trait;

trait ImageTrait 
{
   public function imageUpload($image,$dir)
   {
     
       $path = $dir.'/'.date('yms').$image->hashName();
       $image->storeAs('public',$path);
       return $path;

   } 



}