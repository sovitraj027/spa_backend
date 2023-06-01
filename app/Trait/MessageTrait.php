<?php

namespace App\Trait;

use Brian2694\Toastr\Facades\Toastr;

trait MessageTrait 
{
   public function showMessage($type,$text = 'Successfully Created')
   {
      switch($type){
          case('success'):
            Toastr::success($text,'Success', ["positionClass" => "toast-top-center"]);
            default:

          
      }
   } 



}