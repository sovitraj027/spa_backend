@extends('backend.master')
@section('content')
  <!-- content @s -->
  <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                {{-- <div class="nk-block-head nk-block-head-lg wide-sm">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a class="back-to" href="{{route('admin.homepage.section-one.index')}}"><em class="icon ni ni-arrow-left"></em><span>Section One List</span></a></div>
                    </div>
                </div> --}}
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ isset($slider) ? 'Update ' : 'Add Section One '}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($slider) ? 'Update Slider' : 'Add Section One'}}</h5>
                                        {{-- <p>Create Slider. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                   @isset($section_one_title)
                                    <form action="{{route('admin.homepage.section-one.update',$section_one_title->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.homepage.section-one.store')}}" method="POST" enctype="multipart/form-data">
                                    @endisset
                                        @csrf
                                        <input type="hidden" name="type" value="section_one_title">
                                        <div class="row gy-4">
                                            <div class="col-xxl-8 col-md-8">
                                                <div class="form-group">
                                                    <label class="form-label">Main Title</label>
                                                    <div class="form-control-wrap">
                                                        
                                                        <input type="text" class="form-control" id="" name="title" value="{{isset($section_one_title) ? $section_one_title->title : ''}}" placeholder="Main Title ">
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
                                     <div class="modal fade" tabindex="-1" role="dialog" id="addAppointment">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                <div class="modal-body modal-body-md">
                                                    <h5 class="modal-title">Add Categories</h5>
                                                    <form action="{{route('admin.homepage.section-one.store')}}" class="mt-4" method="post">
                                                        @csrf
                                                        <input type="hidden" name="type" value="section_one_category">
                                                        <div class="row g-gs">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="name">Title</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="name" name="title" placeholder="Title">
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="mobile">Icon</label>
                                                                    <div class="form-control-wrap">
                                                                        <input type="text" class="form-control" id="mobile" name="icon" placeholder="Icon">
                                                                    </div>
                                                                </div>
                                                            </div><!-- .col -->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="" class="form-label">Description</label>
                                                                    <textarea name="description" class="form-control" id="" cols="2" rows="2"></textarea>
                                                                </div>
                                                            </div>
                                                         
                                                            <div class="col-12">
                                                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                                    <li>
                                                                        <button type="submit" class="btn btn-primary">Add Categories</button>
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
                                                            <td>{{$value->title}}</td>
                                                            <td>
                                                               {{$value->icon}}
                                                            </td>
                                                            <td>{{\Carbon\Carbon::parse($value->created_at)->format('Y-m-d')}}</td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($value->updated_at)->format('Y-m-d')}}
                                                            </td>
                                                            <td>
                                                                <div class="tb-odr-btns d-none d-md-inline">
                                                                    {{-- <a href="{{route('admin.homepage.sliders.edit',$value->id)}}" class="text-warning">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </a> --}}
                                                                    <a href="{{route('admin.homepage.delete',$value->id)}}" class="text-danger">
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