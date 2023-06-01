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
                        <div class="nk-block-head-sub"><a class="back-to" href="{{route('admin.blog.index')}}"><em class="icon ni ni-arrow-left"></em><span>Blog List</span></a></div>
                    </div>
                </div>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ isset($blog) ? 'Update Blog' : 'Add Blog'}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($blog) ? 'Update Blog' : 'Add Blog'}}</h5>
                                        {{-- <p>Create Blog. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                        @isset($blog)
                                            <form action="{{route('admin.blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                                                @method('put')
                                            @else
                                            <form action="{{route('admin.blog.store')}}" method="POST" enctype="multipart/form-data">
                                        @endisset
                                        @csrf
                                        <input type="hidden" name="type" value="blog">
                                        <div class="row gy-4">
                                            <div class="col-xxl-4 col-md-8">
                                                <div class="form-group">
                                                    <label class="form-label">Blog Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control  @error('title_1')
                                                        error
                                                        @enderror" id="" name="title_1" value="{{isset($blog) ? $blog->title_1 : ''}}" placeholder="Blog Title ">
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
                                                        <select class="form-select" name="category_id" id="" data-search="on">
                                                            <option value=" ">Select Category</option>
                                                            @foreach ($categories as $category )
                                                                <option value="{{$category->id}}" @if(isset($blog) && $blog->category_id == $category->id) selected @endif>{{$category->title}}</option> 
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
                                            <div class=" col-xxl-3 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Blog Feature Image</label>
                                                    <div class="form-control-wrap" style="max-height: 250px">
                                                        <div class="custom-file">
                                                            <input type="file"   name="image"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                      
                                                        @error('image')
                                                        <span class="has-error">{{$errors->first('image')}}</span>
                                                        @enderror
                                                    
                                                        <div class="image mt-2">
                                                            @if( isset($blog) && $blog->image)
                                                            <img src="{{image_path($blog->image)}}" alt="" class="previewImage " height="150px">

                                                            @else
                                                            <img src="" alt="" class="previewImage " height="150px">
                                                                
                                                            @endisset
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                           
                                         
                                        </div>
                                        <div class="row gy-4">
                                          
                                            {{-- <form action="/file-upload" class="dropzone">
                                                <div class="fallback">
                                                  <input name="file" type="file" multiple />
                                                </div>
                                              </form> --}}
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Short Description</label>
                                                    <div class="form-control-wrap " >
                                                       <textarea name="short_description" class="form-control" id="" cols="3" rows="3">{{isset($blog) ? $blog->short_description : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                      
                                      

                                           
                                                <div class="col-xxl-12 col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Author:</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="" name="author" value="{{isset($blog) ? $blog->author : ''}}" placeholder="Enter Author">
                                                        </div>
                                                    </div>
                                                </div>  
                                           
                                        
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description </label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description"  class="form-control" id="editor" cols="15" rows="5">{{isset($blog) ? $blog->description : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ isset($blog) ? 'Update Blog' : 'Add Blog'}}</button>
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
  	ClassicEditor
		.create( document.querySelector( '#editor' ), {
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