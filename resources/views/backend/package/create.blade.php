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
                            <h3 class="nk-block-title page-title">{{ isset($package) ? 'Update Package' : 'Add Package'}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($package) ? 'Update Package' : 'Add Package'}}</h5>
                                        {{-- <p>Create Package. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                   @isset($package)
                                    <form action="{{route('admin.package.update',$package->id)}}" method="POST" >
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.package.store')}}" method="POST" >
                                   @endisset
                                        @csrf
                                        
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Package Title</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title" value="{{isset($package) ? $package->title : ''}}" placeholder="Package Title ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Package Price</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="" name="price" value="{{isset($package) ? $package->price : ''}}" placeholder="Package Price">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Package Type</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="" name="per" value="{{isset($package) ? $package->per : ''}}" placeholder="Per Day">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Select Category</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="package_category_id" id="" data-search="on">
                                                            <option value=" ">Select Category</option>
                                                            @foreach ($categories as $category )
                                                            <option value="{{$category->id}}" @if (isset($package) && $package->package_category_id == $category->id)
                                                                selected
                                                            @endif>{{$category->name}}</option>   
                                                            @endforeach
                                                          
                                                        </select>
                                                    </div>

                                                    @error('package_category_id')
                                                    <span class="text-danger">{{$errors->first('package_category_id')}}</span>
                                                    @enderror
                                                
                                                </div>
                                               

                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Package Description </label>
                                                    <div class="form-control-wrap">
                                                        <textarea name="description"  class="form-control" cols="15" rows="5">{{isset($package) ? $package->description : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
             
                                          
                                            <!--col-->
                                            
                                           

                                        
                                            
                                            {{-- <div class="col-md-6">
                                                @isset($package)
                                                <img src="{{image_path($package->image)}}" alt="No Image"  id="img" style='height:150px;'>

                                                @else
                                                <img src="" alt="No Image" class="d-none" id="img" style='height:150px;'>
                                                @endisset
                                            </div>
                                         
                                            <div class="col-md-6">
                                                @isset($package)
                                                <img src="{{image_path($package->image)}}" alt="No Image"  id="img" style='height:150px;'>

                                                @else
                                                <img src="" alt="No Image" class="d-none" id="img" style='height:150px;'>
                                                @endisset
                                            </div> --}}
                                         
                                    
                                            <!--col-->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ isset($package) ? 'Update Package' : 'Add Package'}}</button>
                                                </div>
                                            </div>
                                            <!--col-->
                                        </div>
                                     </form>
                                     <div class="modal fade" tabindex="-1" role="dialog" id="addAppointment">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                <div class="modal-body modal-body-md">
                                                    <h5 class="modal-title">Add Categories</h5>
                                                    <form action="{{route('admin.package.category.store')}}" class="mt-4" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="type" value="section_three_category">
                                                        <div class="row g-gs">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="name">Title</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Title">
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                      
                                                        </div>
                                                        <div class="row g-gs">
                                                            <div class="col-xxl-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label">Background Image</label>
                                                                    <div class="form-control-wrap "  >
                                                                        <div class="custom-file">
                                                                            
                
                                                                            <input type="file"  onchange="readURL(this)" name="image"  class="custom-file-input" id="testReport">
                
                                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                                        </div>
                                                                        <div class="image mt-2">
                                                                            @if( isset($package) && $package->image)
                                                                            <img src="{{image_path($package->image)}}" alt="" class="previewImage " height="150px">
                
                                                                            @else
                                                                            <img src="" alt="" class="previewImage " height="150px">
                                                                                
                                                                            @endisset
                
                                                                        </div>
                
                                                                
                                                                      
                
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                      
                                                         
                                                        </div>
                                                        <div class="row g-gs">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="name">Description</label>
                                                                    <div class="form-control-wrap">
                                                                        <textarea name="description" id="" cols="5" rows="5" class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                   
                                                        </div>
                                                        <div class="row g-gs">
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
                                                        <th>Image</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Created at</th>
                                                        <th>Updated at</th>
                                                        <th>Actions</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($categories)
                                                        @foreach ($categories as $value)
                                                     
                                                        <tr>
                                                            <td>
                                                                <img src="{{image_path($value->image)}}" alt="" height="80px">
                                                            </td>
                                                        
                                                            <td>
                                                               {{$value->name}}
                                                            </td>
                                                            <td>
                                                               {{$value->description}}
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
                                                                    <a href="{{route('admin.package.category.edit',$value->id)}}"  data-toggle="modal" data-target="#addAppointment{{$value->id}}" class="text-warning">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </a>
                                                                    <a href="{{route('admin.package.category.delete',$value->id)}}"  class="text-danger">
                                                                        <i class="bi bi-trash"></i>
                                                                    </a>
                                                                    {{-- <a href="#" class="btn btn-sm btn-primary"></a>
                                                                    <a href="#" class="btn btn-sm btn-primary"></a> --}}
                                                                </div>
                                                            </td>
                                                        
                                                        </tr>
                                                        <div class="modal fade" tabindex="-1" role="dialog" id="addAppointment{{$value->id}}">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                                    <div class="modal-body modal-body-md">
                                                                        <h5 class="modal-title">Add Categories</h5>
                                                                        <form action="{{route('admin.package.category.update',$value->id)}}" class="mt-4" method="post" enctype="multipart/form-data">
                                                                            @method('put')
                                                                            @csrf
                                                                            <input type="hidden" name="type" value="section_three_category">
                                                                            <div class="row g-gs">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="name">Title</label>
                                                                                        <div class="form-control-wrap">
                                                                                            <input type="text" class="form-control" id="name" value="{{$value->name}}" name="name" placeholder="Title">
                                                                                        </div>
                                                                                    </div>
                                                                                </div><!-- .col -->
                                                                          
                                                                            </div>
                                                                            <div class="row g-gs">
                                                                                <div class="col-xxl-6 col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label">Background Image</label>
                                                                                        <div class="form-control-wrap "  >
                                                                                            <div class="custom-file">
                                                                                                
                                    
                                                                                                <input type="file"  onchange="readURL(this)" name="image"  class="custom-file-input" id="testReport">
                                    
                                                                                                <label class="custom-file-label" for="testReport">Choose files</label>
                                                                                            </div>
                                                                                            <div class="image mt-2">
                                                                                                @if( isset($value) && $value->image)
                                                                                                <img src="{{image_path($value->image)}}" alt="" class="previewImage " height="150px">
                                    
                                                                                                @else
                                                                                                <img src="" alt="" class="previewImage " height="150px">
                                                                                                    
                                                                                                @endisset
                                    
                                                                                            </div>
                                    
                                                                                    
                                                                                          
                                    
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                          
                                                                             
                                                                            </div>
                                                                            <div class="row g-gs">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="name">Description</label>
                                                                                        <div class="form-control-wrap">
                                                                                            <textarea name="description" id="" cols="5" rows="5" class="form-control">{{$value->description}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div><!-- .col -->
                                                                       
                                                                            </div>
                                                                            <div class="row g-gs">
                                                                                <div class="col-12">
                                                                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                                                        <li>
                                                                                            <button type="submit" class="btn btn-primary">Updated Category</button>
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
  })

</script>
@endpush