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
                            <h3 class="nk-block-title page-title">{{ isset($section_two) ? 'Update About us Section' : 'Add About us Section'}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($section_two) ? 'Update About us Section' : 'Add About us Section'}}</h5>
                                        {{-- <p>Create About us Section. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                   @isset($section_two)
                                    <form action="{{route('admin.about-us.update',$section_two->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.about-us.store')}}" method="POST" enctype="multipart/form-data">
                                   @endisset
                                        @csrf
                                        <input type="hidden" name="type" value="section_two">
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">About us Section Title</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title" value="{{isset($section_two) ? $section_two->title : ''}}" placeholder="About us Section Title 1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">About us Section Title 2</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_2" value="{{isset($section_two) ? $section_two->title_2 : ''}}" placeholder="About us Section Title 2">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">About us Section Title 3</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_3" value="{{isset($section_two) ? $section_two->title_3 : ''}}" placeholder="About us Section Title 2">
                                                    </div>
                                                </div>
                                            </div> --}}
                                          
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">About us Section Description</label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description"  class="form-control editor" id="" cols="15" rows="5">{{isset($section_two) ? $section_two->description : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">About us Section Description 2</label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description_2"  class="form-control editor" id="" cols="15" rows="5">{{isset($section_two) ? $section_two->description_2 : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">About us Section Description 3</label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description_3"  class="form-control editor" id="" cols="15" rows="5">{{isset($section_two) ? $section_two->description_3 : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div> --}}
                                          
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
                                                    <button type="submit" class="btn btn-primary">{{ isset($section_two) ? 'Update About us Section' : 'Add About us Section'}}</button>
                                                </div>
                                            </div>
                                            <!--col-->
                                        </div>
                                     </form>
                                     {{-- <div class="modal fade" tabindex="-1" role="dialog" id="addAppointment">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                <div class="modal-body modal-body-md">
                                                    <h5 class="modal-title">Add Progress</h5>
                                                    <form action="{{route('admin.about-us.store')}}" class="mt-4" method="post">
                                                        @csrf
                                                        <input type="hidden" name="type" value="section_two_category">
                                                        <div class="row g-gs">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="name">Title</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="name" name="title" placeholder="Title">
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                   
                                                        </div>
                                                        <div class="row g-gs">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="mobile">Progress</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="mobile" name="progress_percent" placeholder="Progress Percent">
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                      
                                                         
                                                            <div class="col-12">
                                                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                                    <li>
                                                                        <button type="submit" class="btn btn-primary">Add Progress</button>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="link link-light" data-dismiss="modal">Cancel</a>
                                                                    </li>
                                                                </ul>
                                                            </div><!-- .col -->
                                                        </div>
                                                    </form>
                                                </div><!-- .modal-body -->
                                            </div><!-- .modal-content -->
                                        </div><!-- .modal-dialog -->
                                    </div> --}}
                                    <!--row-->
                                    {{-- <div class="nk-block-head-content mt-3">
                                        <a href="#" data-toggle="modal" data-target="#addAppointment" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        <a href="#" data-toggle="modal" data-target="#addAppointment" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Progress</span></a>
                                    </div> --}}
                                    {{-- <div class="card card-preview mt-2">
   
                                        <div class="card-inner">
                                            <table class="datatable-init table">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Progress</th>
                                                        <th>Created at</th>
                                                        <th>Updated at</th>
                                                        <th>Actions</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($section_two_category)
                                                        @foreach ($section_two_category as $value)

                                                        <tr>
                                                            <td>{{$value->title}}</td>
                                                            <td>
                                                               {{$value->progress_percent}}
                                                            </td>
                                                            <td>{{\Carbon\Carbon::parse($value->created_at)->format('Y-m-d')}}</td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($value->updated_at)->format('Y-m-d')}}
                                                            </td>
                                                            <td>
                                                                <div class="tb-odr-btns d-none d-md-inline">
                                                                    <a href="" class="text-warning">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </a>
                                                                    <a href="{{route('admin.about-us.delete',$value->id)}}" class="text-danger">
                                                                        <i class="bi bi-trash"></i>
                                                                    </a>
                                                                    <a href="#" class="btn btn-sm btn-primary"></a>
                                                                    <a href="#" class="btn btn-sm btn-primary"></a>
                                                                </div>
                                                            </td>
                                                        
                                                        </tr>
                                                        @endforeach
                                                    @endisset
                                                  
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> --}}
                                    <!-- .card-preview -->
                                    <!--row-->
                                </div>
                            </div><!-- .card-inner -->
                        </div>
                    </div><!-- .card -->
                </div><!-- .nk-block -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($section_three) ? 'Update About us Section Two' : 'Add About us Section Two'}}</h5>
                                        {{-- <p>Create About us Section. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                    @isset($section_three)
                                    <form action="{{route('admin.about-us.update',$section_three->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.about-us.store')}}" method="POST" enctype="multipart/form-data">
                                   @endisset
                                        @csrf
                                        <input type="hidden" name="type" value="section_three">
                                        <div class="col-xxl-12 col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">About us Section Description</label>
                                                <div class="form-control-wrap " >
                                                    <textarea name="description"  class="form-control editor" id="" cols="15" rows="5">{{isset($section_three) ? $section_three->description : ''}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Background Image</label>
                                                <div class="form-control-wrap " style="max-height: 250px; height: 200px"  >
                                                    <div class="custom-file">
                                                        
    
                                                        <input type="file"  onchange="readURL(this)" name="image"  class="custom-file-input" id="testReport">
    
                                                        <label class="custom-file-label" for="testReport">Choose files</label>
                                                    </div>
                                                    <div class="image mt-2">
                                                        @if( isset($section_three) && $section_three->image)
                                                        <img src="{{image_path($section_three->image)}}" alt="" class="previewImage " height="150px">
    
                                                        @else
                                                        <img src="" alt="" class="previewImage " height="150px">
                                                            
                                                        @endisset
    
                                                    </div>
    
                                            
                                                  
    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">{{ isset($section_three) ? 'Update About us Section' : 'Add About us Section'}}</button>
                                            </div>
                                        </div>
                                    </form>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
  })

</script>
@endpush