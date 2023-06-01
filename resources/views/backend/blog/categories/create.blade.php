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
                        <div class="nk-block-head-sub"><a class="back-to" href="{{route('admin.blog-categories.create')}}"><em class="icon ni ni-arrow-left"></em><span>Categories Create</span></a></div>
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
                                    <form action="{{route('admin.blog-categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.blog-categories.store')}}" method="POST" enctype="multipart/form-data">
                                    @endisset
                                        @csrf
                                   
                                        <div class="row gy-4">
                                            <div class="col-xxl-8 col-md-8">
                                                <div class="form-group">
                                                    <label class="form-label">Add Category</label>
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
                                            <!--col-->
                                            <div class="col-2 mt-3">
                                                <div class="nk-block-head-content mt-3">
                            
                                                    <button type="submit" class="btn btn-primary d-none d-md-inline-flex"><span>Submit</span></button>
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
                                                            <td>{{\Carbon\Carbon::parse($value->created_at)->format('Y-m-d')}}</td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($value->updated_at)->format('Y-m-d')}}
                                                            </td>
                                                            <td>
                                                                <div class="tb-odr-btns d-none d-md-inline">
                                                                    <a href="{{route('admin.blog-categories.edit',$value->id)}}" class="text-warning">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </a>
                                                                    <a href="{{route('admin.blog-categories.delete',$value->id)}}" class="text-danger">
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
    if (input.files && input.files[0]) {
    
      var reader = new FileReader();
      reader.onload = function (e) { 
        document.querySelector("#img").setAttribute("src",e.target.result);
      };
      const el = document.querySelector("#img");
      if (el.classList.contains("d-none")) {
            el.classList.remove("d-none");

        }
      reader.readAsDataURL(input.files[0]); 
    }
  }

    </script>
@endpush