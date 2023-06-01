@extends('backend.master')
@push('css')
    <style>
        .has-error {    color: #e85347;
    font-size: 11px;
    font-style: italic;}
    </style>
@endpush
@section('content')
  <!-- content @s -->
  <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-lg wide-sm">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a class="back-to" href="{{route('admin.portfolio.realstate.index')}}"><em class="icon ni ni-arrow-left"></em><span>Gallery List</span></a></div>
                    </div>
                </div>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ isset($gallery) ? 'Update Gallery' : 'Add Gallery'}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($gallery) ? 'Update Gallery' : 'Add Gallery'}}</h5>
                                        {{-- <p>Create Gallery. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                   @isset($gallery)
                                    <form action="{{route('admin.gallery.update',$gallery->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.gallery.store')}}" method="POST" enctype="multipart/form-data">
                                   @endisset
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-xxl-4 col-md-8">
                                                <div class="form-group">
                                                    <label class="form-label">Gallery Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control  @error('title')
                                                        error
                                                        @enderror" id="" name="title" value="{{isset($gallery) ? $gallery->title : ''}}" placeholder="Gallery Title ">
                                                        @error('title')
                                                        <span id="fv-full-name-error" class="invalid">{{$errors->first('title')}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>  
                                            <!--col-->
                                        </div>
                                  
                                        <div class="row gy-4">
                                            <div class=" col-xxl-3 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Gallery Feature Image</label>
                                                    <div class="form-control-wrap" style="max-height: 250px">
                                                        <div class="custom-file">
                                                            <input type="file"   name="feature_image"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                      
                                                        @error('feature_image')
                                                        <span class="has-error">{{$errors->first('feature_image')}}</span>
                                                        @enderror
                                                    
                                                        <div class="image mt-2">
                                                            @if( isset($gallery) && $gallery->feature_image)
                                                            <img src="{{image_path($gallery->feature_image)}}" alt="" class="previewImage " height="150px">

                                                            @else
                                                            <img src="" alt="" class="previewImage " height="150px">
                                                                
                                                            @endisset
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class=" col-xxl-3 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Gallery Banner Image</label>
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file"  name="banner_image"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                        @error('banner_image')
                                                        <span class="has-error">{{$errors->first('banner_image')}}</span>
                                                        @enderror
                                                        <div class="image mt-2">
                                                            @if( isset($gallery) && $gallery->banner_image)
                                                            <img src="{{image_path($gallery->banner_image)}}" alt="" class="previewImage " height="150px">

                                                            @else
                                                            <img src="" alt="" class="previewImage " height="150px">
                                                                
                                                            @endisset

                                                        </div>

                                                    </div>
                                                 
                                                </div>
                                            </div> 
                                            <div class=" col-xxl-3 col-md-3 mt-5">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="same_as_gallery" id="customCheck1" value="1" @if(isset($gallery) && $gallery->same_as_gallery) checked @endif>
                                                    <label class="custom-control-label" for="customCheck1">Same as Gallery Banner</label>
                                                </div>
                                            </div>
                                         
                                        </div>
                                        <div class="row gy-4">
                                          
                                            
                                            <div class="col-xxl-12 col-md-12">
                                                <label class="form-label">Other Image</label>
                                              
                                                <div class="upload-zone">
                                                    <div class="dz-message" data-dz-message>
                                                        <span class="dz-message-text">Drag and drop file</span>
                                                        <span class="dz-message-or">or</span>
                                                        <button type="button" class="btn btn-primary">SELECT</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (isset($gallery) && $gallery->related_images)
                                            <div class="d-flex justify-content-evenly">
                                              
                                            @foreach (json_decode($gallery->related_images,true) as $image_key=> $image )
                                            <input type="hidden" name="other_images[]" value="{{$image}}">
                                            <form action=""></form>
                                            <form  action="{{route('admin.gallery.delete.image',$gallery->id)}}" id="image_form{{$image_key+1}}" method="post">
                                                @csrf
                                                <input type="hidden" name="image" value="{{$image_key}}">
                                            </form>
                                            <img src="{{image_path($image)}}" alt="" width="20%">
                                            <a href="{{route('admin.gallery.delete.image',$gallery->id)}}" onclick="event.preventDefault(); document.getElementById('image_form{{$image_key+1}}').submit()" class="text-danger">
                                                <i class="bi bi-trash fs-2x"></i>
                                            </a>
                                       
                                            @endforeach
                                             </div>
                                            @endif
                                         
                                           
                                            
                                      
                                      

                     
                                        
                                      
                                            
                                         
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ isset($gallery) ? 'Update Gallery' : 'Add Gallery'}}</button>
                                                </div>
                                            </div>
                                        </div>
                                     </form>
                                    <!--row-->
                                </div>
                            </div><!-- .card-inner -->
                        </div>
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
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
    <script>
        
  NioApp.Dropzone.init = function () {
   
    NioApp.Dropzone('.upload-zone', {
        addRemoveLinks: true,
      url: "/backend/dropzone/image",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    init: function() {

    this.on("removedfile", file => {
        var token =  $('meta[name="csrf-token"]').attr('content');
        const obj = JSON.parse(file.xhr.response);
        $.ajax({
            method:'post',
            url:"{{route('admin.delete.image')}}",
            data: {url:obj.url,_token:token},
            success:function(response){
                document.getElementById(response.message).remove();
                // $('#'.response.message).remove();
            }
        });
        
    });
  },
  success:function(file,response){
    $('.upload-zone').append(`<input type="hidden" name="other_images[]" id="${response.url}" value="${response.url}">`)
  }
    });
  
   
  }; // Wizard @v1.0
    </script>
@endpush