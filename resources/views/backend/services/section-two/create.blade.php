@extends('backend.master')
@section('content')
  <!-- content @s -->
  <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
    
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ isset($section_two) ? 'Update Section Two' : 'Add Section Two'}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($section_two) ? 'Update Section Two' : 'Add Section Two'}}</h5>
                                        {{-- <p>Create Section Two. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                   @isset($section_two)
                                    <form action="{{route('admin.services.update',$section_two->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.services.store')}}" method="POST" enctype="multipart/form-data">
                                   @endisset
                                        @csrf
                                        <input type="hidden" name="type" value="section_two">
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Section Two Title</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_1" value="{{isset($section_two) ? $section_two->title_1 : ''}}" placeholder="Section Two Title 1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Section Two Title 2</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_2" value="{{isset($section_two) ? $section_two->title_2 : ''}}" placeholder="Section Two Title 2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Section Two Title 3</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_3" value="{{isset($section_two) ? $section_two->title_3 : ''}}" placeholder="Section Two Title 2">
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Section Two Description </label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description"  class="form-control" cols="15" rows="5">{{isset($section_two) ? $section_two->description : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Section Two Description 2</label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description_2"  class="form-control" id="editor" cols="15" rows="5">{{isset($section_two) ? $section_two->description_2 : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                          
                                            <!--col-->
                                            
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Background Image</label>
                                                    <div class="form-control-wrap " style="max-height: 250px; height: 200px"  >
                                                        <div class="custom-file">
                                                            

                                                            <input type="file"  onchange="readURL(this)" name="image"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                        <div class="image mt-2">
                                                            @if( isset($section_two) && $section_two->image)
                                                            <img src="{{image_path($section_two->image)}}" alt="" class="previewImage " height="150px">

                                                            @else
                                                            <img src="" alt="" class="previewImage " height="150px">
                                                                
                                                            @endisset

                                                        </div>

                                                
                                                      

                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        
                                            
                                            {{-- <div class="col-md-6">
                                                @isset($section_two)
                                                <img src="{{image_path($section_two->image)}}" alt="No Image"  id="img" style='height:150px;'>

                                                @else
                                                <img src="" alt="No Image" class="d-none" id="img" style='height:150px;'>
                                                @endisset
                                            </div>
                                         
                                            <div class="col-md-6">
                                                @isset($section_two)
                                                <img src="{{image_path($section_two->image)}}" alt="No Image"  id="img" style='height:150px;'>

                                                @else
                                                <img src="" alt="No Image" class="d-none" id="img" style='height:150px;'>
                                                @endisset
                                            </div> --}}
                                         
                                    
                                            <!--col-->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ isset($section_two) ? 'Update Section Two' : 'Add Section Two'}}</button>
                                                </div>
                                            </div>
                                            <!--col-->
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
  })

</script>
@endpush