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
                                   @isset($teams_title)
                                    <form action="{{route('admin.teams.update',$teams_title->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.teams.store')}}" method="POST" enctype="multipart/form-data">
                                    @endisset
                                        @csrf
                                        <input type="hidden" name="type" value="teams_title">
                                        <div class="row gy-4">
                                            <div class="col-xxl-4 col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Title 1</label>
                                                    <div class="form-control-wrap">
                                                        
                                                        <input type="text" class="form-control" id="" name="title" value="{{isset($teams_title) ? $teams_title->title : ''}}" placeholder="Main Title ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4 col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Title 2</label>
                                                    <div class="form-control-wrap">
                                                        
                                                        <input type="text" class="form-control" id="" name="title_2" value="{{isset($teams_title) ? $teams_title->title_2 : ''}}" placeholder=" Title 2 ">
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
                              
                                    <!--row-->
                                    <div class="nk-block-head-content mt-3">
                                        <a href="{{route('admin.teams.create')}}" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        <a href="{{route('admin.teams.create')}}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Teams</span></a>
                                    </div>
                                    <div class="card card-preview mt-2">
   
                                        <div class="card-inner">
                                            <table class="datatable-init table">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Designation</th>
                                                    
                                                        <th>Created at</th>
                                                        <th>Updated at</th>
                                                        <th>Actions</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($teams)
                                                        @foreach ($teams as $value)
                                                        <tr>
                                                            <td>{{$value->title}}</td>
                                                            <td>
                                                               {{$value->designation}}
                                                            </td>
                                                            <td>{{\Carbon\Carbon::parse($value->created_at)->format('Y-m-d')}}</td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($value->updated_at)->format('Y-m-d')}}
                                                            </td>
                                                            <td>
                                                                <div class="tb-odr-btns d-none d-md-inline">
                                                                    <a href="{{route('admin.teams.edit',$value->id)}}" class="text-warning">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </a>
                                                                    <a href="{{route('admin.teams.delete',$value->id)}}" class="text-danger">
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