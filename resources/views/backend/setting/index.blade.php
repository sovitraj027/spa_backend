@extends('backend.master')
@push('css')
<link rel="stylesheet" href="{{asset('backend/assets/css/libs/fontawesome-icons.css?ver=2.9.1')}}">
@endpush
@section('content')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            {{-- <div class="nk-block-head-sub"><a class="back-to" href="html/components.html"><em class="icon ni ni-arrow-left"></em><span>Components</span></a></div> --}}
                            <h2 class="nk-block-title fw-normal">Site Setting</h2>
                         
                        </div>
                    </div><!-- .nk-block -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Add Setting</h4>
                                <div class="nk-block-des">
                                    <p>You can allow display form website.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Add Setting</h5>
                                </div>
                                <form action="{{route('admin.settings.store')}}" method="post">
                                    @csrf
                                    <div class="row g-4">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name-1">Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="title" id="full-name-1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label class="form-label" for="email-address-1">Key</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="key" id="email-address-1">
                                                </div>
                                            </div>
                                        </div>
                                 
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="pay-amount-1">Description</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="description" id="pay-amount-1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="preview-block">
                                                <span class="preview-title overline-title">Type</span>
                                                <div class="g-4 align-center flex-wrap">
                                                    <div class="g">
                                                        <div class="custom-control custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="textbox" name="type" id="customRadio7" checked>
                                                            <label class="custom-control-label" for="customRadio7">Textbox</label>
                                                        </div>
                                                    </div>
                                                    <div class="g">
                                                        <div class="custom-control custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="image" name="type" id="customRadio8">
                                                            <label class="custom-control-label" for="customRadio8">Image</label>
                                                        </div>
                                                    </div>
                                                    <div class="g">
                                                        <div class="custom-control custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" value="description" name="type" id="customRadio9">
                                                            <label class="custom-control-label" for="customRadio9">Description</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                 
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Setting</h4>
                                <div class="nk-block-des">
                                    <p>You can make style out your setting related form as per below example.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Website Setting</h5>
                                </div>
                                <form action="{{route('admin.settings.update')}}" class="gy-3" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    @foreach ($settings as $setting )
                                  
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="site-name">{{$setting->title}}</label>
                                                <span class="text-danger">{{$setting->key}}</span>
                                                <span class="form-note">{{$setting->description}}.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    @if ($setting->type == 'description')
                                                    <textarea name="value[{{$setting->id}}]" id="" cols="10" rows="5" class="form-control">{{isset($setting->settingValue) ? $setting->settingValue->value : '' }}</textarea>
                                                    @elseif($setting->type == 'image')
                                                    <div class="custom-file">
                                                        <input type="file"   name="image[{{$setting->id}}]"  class="custom-file-input" id="testReport">

                                                        <label class="custom-file-label" for="testReport">Choose files</label>
                                                    </div>
                                                    <div class="image mt-2">
                                                        @if( isset($setting->settingValue) && $setting->settingValue->value)
                                                        <img src="{{image_path($setting->settingValue->value)}}" alt="" class="previewImage " height="150px">

                                                        @else
                                                        <img src="" alt="" class="previewImage " height="150px">
                                                            
                                                        @endisset

                                                    </div>
                                                    @else  
                                                    <input type="text" class="form-control" value="{{isset($setting->settingValue) ? $setting->settingValue->value : '' }}" name="value[{{$setting->id}}]" id="site-name" placeholder="{{$setting->description}}">
                                                    @endif
                                     

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <a href="{{route('admin.settings.delete',$setting->id)}}"><em class="icon ni ni-trash"></em></a>
                                        </div>
                                    </div>
                                    @endforeach
                                 
                                  
                                    <div class="row g-3">
                                        <div class="col-lg-7 offset-lg-5">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- card -->
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    
    $('.custom-file-input').on('change',function(){
        var file = $(this).get(0).files[0];
        var myThis = $(this);
        if(file){
         var reader = new FileReader();
    
         reader.onload = function(){
     
            myThis.closest('.form-control-wrap').find('.previewImage').attr("src", reader.result);
    
         
            // $(".previewImage").attr("src", reader.result);
         }
    
         reader.readAsDataURL(file);
        }
      });
        </script>
@endpush