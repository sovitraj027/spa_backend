@extends('backend.master')
@section('content')
  <!-- content @s -->
  <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                @if (isset($category))
                <div class="nk-block-head nk-block-head-lg wide-sm">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a class="back-to" href="{{route('admin.portfolio.category.create')}}"><em class="icon ni ni-arrow-left"></em><span>Categories Create</span></a></div>
                    </div>
                </div>
                @endif
           
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ isset($category) ? 'Update ' : 'Add Categories '}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($category) ? 'Update categories' : 'Add Categories'}}</h5>
                                        {{-- <p>Create categories. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                   @isset($category)
                                    <form action="{{route('admin.portfolio.category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.portfolio.category.store')}}" method="POST" enctype="multipart/form-data">
                                    @endisset
                                        @csrf
                                        <div class="row gy-4">
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Category Title</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control  @error('title')
                                                        error
                                                        @enderror"  id="" name="title" value="{{isset($category) ? $category->title : ''}}" placeholder="Create Category">
                                                        @error('title')
                                                        <span id="fv-full-name-error" class="invalid">{{$errors->first('title')}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Feature Image</label>
                                                    <div class="form-control-wrap " style="max-height: 250px; height: 200px"  >
                                                        <div class="custom-file">
                                                            

                                                            <input type="file"  onchange="readURL(this)" name="image"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                        <div class="image mt-2">
                                                            @if( isset($category) && $category->image)
                                                            <img src="{{image_path($category->image)}}" alt="" class="previewImage " height="150px">

                                                            @else
                                                            <img src="" alt="" class="previewImage " height="150px">
                                                                
                                                            @endisset

                                                        </div>

                                                
                                                      

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                    
                           
                                            
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Icon Image</label>
                                                    <div class="form-control-wrap " style="max-height: 250px; height: 200px"  >
                                                        <div class="custom-file">
                                                            

                                                            <input type="file"  onchange="readURL(this)" name="icon"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                        <div class="image mt-2">
                                                            @if( isset($category) && $category->icon)
                                                            <img src="{{image_path($category->icon)}}" alt="" class="previewImage " height="150px">

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
                                                    <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update Category' : 'Add Category'}}</button>
                                                </div>
                                            </div>
                                            <!--col-->

                                        </div>
                                  
                                     </form>
                                 
                              
                                    <div class="card card-preview mt-2">
   
                                        <div class="card-inner">
                                            <table class="datatable-init table">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Image</th>
                                                        <th>Icon</th>
                                                        <th>Created at</th>
                                                        <th>Updated at</th>
                                                        <th>Actions</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            
                                                    @isset($categories)
                                                        @foreach ($categories as $value)
                                                        <tr>
                                                            <td>{{$value->title}}</td>
                                                            <td>
                                                                @if ($value->image)
                                                                    <img src="{{image_path($value->image)}}" height="80px">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($value->icon)
                                                                <img src="{{image_path($value->icon)}}" height="80px">
                                                                 @endif
                                                            </td>
                                                            <td>{{\Carbon\Carbon::parse($value->created_at)->format('Y-m-d')}}</td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($value->updated_at)->format('Y-m-d')}}
                                                            </td>
                                                            <td>
                                                                <div class="tb-odr-btns d-none d-md-inline">
                                                                    <a href="{{route('admin.portfolio.category.edit',$value->id)}}" class="text-warning">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </a>
                                                                    <a href="{{route('admin.portfolio.category.delete',$value->id)}}" class="text-danger">
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
  function readURL(input) {
    var file = $("input[type=file]").get(0).files[0];
 
 if(file){
     var reader = new FileReader();

     reader.onload = function(){
        $(this).closest('.form-control-wrap').find('img').attr("src", reader.result);
     
        //  $(".previewImage")
     }

     reader.readAsDataURL(file);
    }
  }
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