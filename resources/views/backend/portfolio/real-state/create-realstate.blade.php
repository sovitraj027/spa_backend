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
                        <div class="nk-block-head-sub"><a class="back-to" href="{{route('admin.portfolio.realstate.index')}}"><em class="icon ni ni-arrow-left"></em><span>Services List</span></a></div>
                    </div>
                </div>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ isset($realstate) ? 'Update Services' : 'Add Services'}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($realstate) ? 'Update Services' : 'Add Services'}}</h5>
                                        {{-- <p>Create Services. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                   @isset($realstate)
                                    <form action="{{route('admin.portfolio.realstate.update',$realstate->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.portfolio.realstate.store')}}" method="POST" enctype="multipart/form-data">
                                   @endisset
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-xxl-4 col-md-8">
                                                <div class="form-group">
                                                    <label class="form-label">Services Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control  @error('title_1')
                                                        error
                                                        @enderror" id="" name="title_1" value="{{isset($realstate) ? $realstate->title_1 : ''}}" placeholder="Services Title ">
                                                        @error('title_1')
                                                        <span id="fv-full-name-error" class="invalid">{{$errors->first('title_1')}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-xxl-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Select Category</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select  " name="category_id" id="" data-search="on">
                                                            <option value=" ">Select Category</option>
                                                            @foreach ($categories as $category )
                                                                <option value="{{$category->id}}" @if(isset($realstate) && $realstate->category_id == $category->id) selected @endif>{{$category->title}}</option> 
                                                            @endforeach
                                                      
                                                        </select>
                                                       
                                                       
                                                    </div>

                                                    @error('category_id')
                                                    <span class="has-error">{{$errors->first('category_id')}}</span>
                                                    @enderror
                                                
                                                </div>
                                               

                                            </div>
                                       
                                        

                                          
                                         
                                            <!--col-->
                                        </div>
                                  
                                        <div class="row gy-4">
                                            <div class=" col-xxl-3 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Services Feature Image</label>
                                                    <div class="form-control-wrap" style="max-height: 250px">
                                                        <div class="custom-file">
                                                            <input type="file"   name="feature_image"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                      
                                                        @error('feature_image')
                                                        <span class="has-error">{{$errors->first('feature_image')}}</span>
                                                        @enderror
                                                    
                                                        <div class="image mt-2">
                                                            @if( isset($realstate) && $realstate->feature_image)
                                                            <img src="{{image_path($realstate->feature_image)}}" alt="" class="previewImage " height="150px">

                                                            @else
                                                            <img src="" alt="" class="previewImage " height="150px">
                                                                
                                                            @endisset
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class=" col-xxl-3 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Services Banner Image</label>
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file"  name="banner_image"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                        @error('banner_image')
                                                        <span class="has-error">{{$errors->first('banner_image')}}</span>
                                                        @enderror
                                                        <div class="image mt-2">
                                                            @if( isset($realstate) && $realstate->banner_image)
                                                            <img src="{{image_path($realstate->banner_image)}}" alt="" class="previewImage " height="150px">

                                                            @else
                                                            <img src="" alt="" class="previewImage " height="150px">
                                                                
                                                            @endisset

                                                        </div>

                                                    </div>
                                                 
                                                </div>
                                            </div> 
                                            <div class=" col-xxl-3 col-md-3 mt-5">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="same_as_portfolio" id="customCheck1" value="1" @if(isset($realstate) && $realstate->same_as_portfolio) checked @endif>
                                                    <label class="custom-control-label" for="customCheck1">Same as Services Banner</label>
                                                </div>
                                            </div>
                                         
                                        </div>
                                        <div class="row gy-4">
                                          
                                            
                                            {{-- <div class="col-xxl-12 col-md-12">
                                                <label class="form-label">Other Image</label>
                                              
                                                <div class="upload-zone">
                                                    <div class="dz-message" data-dz-message>
                                                        <span class="dz-message-text">Drag and drop file</span>
                                                        <span class="dz-message-or">or</span>
                                                        <button type="button" class="btn btn-primary">SELECT</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (isset($realstate) && $realstate->related_images)
                                            <div class="d-flex justify-content-evenly">
                                            @foreach (json_decode($realstate->related_images) as $image_key=> $image )
                                            <form action=""></form>
                                            <form  action="{{route('admin.portfolio.realstate.delete.image',$realstate->id)}}" id="image_form{{$image_key+1}}" method="post">
                                                @csrf
                                                <input type="hidden" name="image" value="{{$image_key}}">
                                            </form>
                                            <img src="{{image_path($image)}}" alt="" width="20%">
                                            <a href="{{route('admin.portfolio.realstate.delete.image',$realstate->id)}}" onclick="event.preventDefault(); document.getElementById('image_form{{$image_key+1}}').submit()" class="text-danger">
                                                <i class="bi bi-trash fs-2x"></i>
                                            </a>
                                       
                                            @endforeach
                                             </div>
                                            @endif
                                          --}}
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Short Description</label>
                                                    <div class="form-control-wrap " >
                                                       <textarea name="description" class="form-control" id="" cols="3" rows="3">{{isset($realstate) ? $realstate->description : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                      
                                      

{{--                                            
                                                <div class="col-xxl-4 col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Client:</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="" name="client" value="{{isset($realstate) ? $realstate->client : ''}}" placeholder="Enter Client">
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-xxl-4 col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Year:</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="" name="year" value="{{isset($realstate) ? $realstate->year : ''}}" placeholder="Enter Year">
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-xxl-4 col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Location</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="" name="location" value="{{isset($realstate) ? $realstate->location : ''}}" placeholder="Enter Location">
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="col-xxl-4 col-md-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Roi:</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="" name="roi" value="{{isset($realstate) ? $realstate->roi : ''}}" placeholder="Real Roi">
                                                        </div>
                                                    </div>
                                                </div>   --}}
                     
                                        
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description </label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description_2"  class="form-control editor" id="" cols="15" rows="5">{{isset($realstate) ? $realstate->description_2 : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description 2 </label>
                                                    <div class="form-control-wrap">
                                                        <textarea name="description_3"  class="form-control " cols="15" rows="5">{{isset($realstate) ? $realstate->description_3 : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description 3</label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description_4"  class="form-control editor"  cols="15" rows="5">{{isset($realstate) ? $realstate->description_4 : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            {{-- <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Facebook Link</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="social_link_1" value="{{isset($realstate) ? $realstate->social_link_1 : ''}}" placeholder="Services Link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Twitter Link</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="social_link_2" value="{{isset($realstate) ? $realstate->social_link_2 : ''}}" placeholder="Services Link">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Linkedin LInk</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="social_link_3" value="{{isset($realstate) ? $realstate->social_link_3 : ''}}" placeholder="Services Link">
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ isset($realstate) ? 'Update Services' : 'Add Services'}}</button>
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
<script src="{{asset('ckeditorv2/build/ckeditor.js')}}"></script>
<script src="{{asset('ckeditorv2/MyUploadAdapter.js')}}"></script>
<script>
       function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            return new MyUploadAdapter( loader );
        };
    }
    $(function(){
    $('.editor').each(function(e){
        ClassicEditor
		.create( this, {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            fontSize: {
                        options: [
                            9,
                            11,
                            13,
                            'default',
                            17,
                            19,
                            21,
                            25,
                            30,
                            35,
                            40,
                            50,
                            60
                        ]
            },
            extraPlugins: [ MyCustomUploadAdapterPlugin ],
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
    });
});
</script>
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