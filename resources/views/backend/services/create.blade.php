@extends('backend.master')
@section('content')
  <!-- content @s -->
  <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-lg wide-sm">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a class="back-to" href="{{route('admin.services.list')}}"><em class="icon ni ni-arrow-left"></em><span>Services List</span></a></div>
                    </div>
                </div>
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ isset($service) ? 'Edit '.$service->title_1 : 'Add Services'}}</h3>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($service) ? 'Update Service' : 'Add Service'}}</h5>
                                        {{-- <p>Create Banner. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                   @isset($service)
                                    <form action="{{route('admin.services.update',$service->id)}}" method="POST" >
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.services.store')}}" method="POST" >
                                   @endisset
                                        @csrf
                                        <input type="hidden" name="type" value="services">
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Title</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_1" value="{{isset($service) ? $service->title_1 : ''}}" placeholder="Banner Title 1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <div class="form-control-wrap " >
                                                       <textarea name="description" class="form-control" id="" cols="5" rows="5">{{isset($service) ? $service->description : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <!--col-->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ isset($service) ? 'Update Service' : 'Add Service'}}</button>
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
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($banner) ? 'Update Banner' : 'Add Banner'}}</h5>
                                        {{-- <p>Create Banner. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                              
                                    <form action="{{route('admin.services.update',$service->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                               
                                        @csrf
                                        <input type="hidden" name="type" value="banner">
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Banner Title </label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_1" value="{{isset($banner) ? $banner->title_1 : ''}}" placeholder="Banner Title 1">
                                                    </div>
                                                </div>
                                            </div>
                                            
                           
                                            
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Banner Image</label>
                                                    <div class="form-control-wrap " >
                                                        <div class="custom-file">
                                                            

                                                            <input type="file"  onchange="readURL(this)" name="image"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                        <div class="image mt-2">
                                                            @if( isset($banner) && $banner->image)
                                                            <img src="{{image_path($banner->image)}}" alt="" class="previewImage " height="150px">

                                                            @else
                                                            <img src="" alt="" class="previewImage " height="150px">
                                                                
                                                            @endisset

                                                        </div>

                                                
                                                      

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <!--col-->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ isset($banner) ? 'Update Banner' : 'Add Banner'}}</button>
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

                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($section_one) ? 'Update Section One' : 'Add Section One'}}</h5>
                                        {{-- <p>Create Section One. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                              
                                    <form action="{{route('admin.services.update',$service->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                     
                               
                             
                                        @csrf
                                        <input type="hidden" name="type" value="section_one">
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Section One Title</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_1" value="{{isset($section_one) ? $section_one->title_1 : ''}}" placeholder="Section One Title 1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Section One Title 2</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_2" value="{{isset($section_one) ? $section_one->title_2 : ''}}" placeholder="Section One Title 2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Section One Title 3</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_3" value="{{isset($section_one) ? $section_one->title_3 : ''}}" placeholder="Section One Title 2">
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Section One Description</label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description"  class="form-control editor" id="" cols="15" rows="5">{{isset($section_one) ? $section_one->description : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <!--col-->
                                            
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Background Image</label>
                                                    <div class="form-control-wrap " >
                                                        <div class="custom-file">
                                                            

                                                            <input type="file"  onchange="readURL(this)" name="image"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                        <div class="image mt-2">
                                                            @if( isset($section_one) && $section_one->image)
                                                            <img src="{{image_path($section_one->image)}}" alt="" class="previewImage " height="150px">

                                                            @else
                                                            <img src="" alt="" class="previewImage " height="150px">
                                                                
                                                            @endisset

                                                        </div>

                                                
                                                      

                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        
                                            
                                            {{-- <div class="col-md-6">
                                                @isset($section_one)
                                                <img src="{{image_path($section_one->image)}}" alt="No Image"  id="img" style='height:150px;'>

                                                @else
                                                <img src="" alt="No Image" class="d-none" id="img" style='height:150px;'>
                                                @endisset
                                            </div>
                                         
                                            <div class="col-md-6">
                                                @isset($section_one)
                                                <img src="{{image_path($section_one->image)}}" alt="No Image"  id="img" style='height:150px;'>

                                                @else
                                                <img src="" alt="No Image" class="d-none" id="img" style='height:150px;'>
                                                @endisset
                                            </div> --}}
                                         
                                    
                                            <!--col-->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ isset($section_one) ? 'Update Section One' : 'Add Section One'}}</button>
                                                </div>
                                            </div>
                                            <!--col-->
                                        </div>
                                     </form>
                                     <div class="modal fade" tabindex="-1" role="dialog" id="addAppointment">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                <div class="modal-body modal-body-md">
                                                    <h5 class="modal-title">Add Categories</h5>
                                                    <form action="{{route('admin.services.update',$service->id)}}" class="mt-4" method="post">
                                                        @method('put')
                                                        @csrf
                                                        <input type="hidden" name="type" value="section_one_category">
                                                        <div class="row g-gs">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="name">Title</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="name" name="title_1" placeholder="Title">
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                   
                                                        </div>
                                                        <div class="row g-gs">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="mobile">Icon</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="mobile" name="icon" placeholder="Icon">
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                      
                                                         
                                                            <div class="col-12">
                                                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                                    <li>
                                                                        <button type="submit" class="btn btn-primary">Add Category</button>
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
                                    </div>
                                    <!--row-->
                                    <div class="nk-block-head-content mt-3">
                                        <a href="#" data-toggle="modal" data-target="#addAppointment" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        <a href="#" data-toggle="modal" data-target="#addAppointment" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Categories</span></a>
                                    </div>
                                    <div class="card card-preview mt-2">
   
                                        <div class="card-inner">
                                            <table class="datatable-init table">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Icon</th>
                                                        <th>Created at</th>
                                                        <th>Updated at</th>
                                                        <th>Actions</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($section_one_category)
                                                        @foreach ($section_one_category as $value)

                                                        <tr>
                                                            <td>{{$value->title_1}}</td>
                                                            <td>
                                                               {{$value->icon}}
                                                            </td>
                                                            <td>{{\Carbon\Carbon::parse($value->created_at)->format('Y-m-d')}}</td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($value->updated_at)->format('Y-m-d')}}
                                                            </td>
                                                            <td>
                                                                <div class="tb-odr-btns d-none d-md-inline">
                                                                    {{-- <a href="" class="text-warning">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </a> --}}
                                                                    <a href="{{route('admin.services.delete',$value->id)}}" class="text-danger">
                                                                        <i class="bi bi-trash"></i>
                                                                    </a>
                                                                    {{-- <a href="#" class="btn btn-sm btn-primary"></a>
                                                                    <a href="#" class="btn btn-sm btn-primary"></a> --}}
                                                                </div>
                                                            </td>
                                                        
                                                        </tr>
                                                        @endforeach
                                                    @endisset
                                                  
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
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
                                        <h5 class="title nk-block-title">{{ isset($section_two) ? 'Update Section Two' : 'Add Section Two'}}</h5>
                                        {{-- <p>Create Section Two. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                 
                                    <form action="{{route('admin.services.update',$service->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                              
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
                                                        <textarea name="description_2"  class="form-control editor"  cols="15" rows="5">{{isset($section_two) ? $section_two->description_2 : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Section Two Description 3</label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description_3"  class="form-control editor"  cols="15" rows="5">{{isset($section_two) ? $section_two->description_3 : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Section Two Description 4</label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description_4"  class="form-control editor"  cols="15" rows="5">{{isset($section_two) ? $section_two->description_4 : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                          
                                            <!--col-->
                                            
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Background Image</label>
                                                    <div class="form-control-wrap "  >
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