@extends('backend.master')
@push('css')
@endpush
@section('content')
  <!-- content @s -->
  <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            {{-- <div class="nk-block-head-sub"><a class="back-to" href="html/components.html"><em class="icon ni ni-arrow-left"></em><span>Components</span></a></div> --}}
                            <h2 class="nk-block-title fw-normal">Real State</h2>
                         
                        </div>
                    </div><!-- .nk-block-head -->
                   <!-- .nk-menu-item -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Real State List</h4>
                                <a href="{{route('admin.portfolio.realstate.create')}}" class="btn btn-primary">Add Real State</a>
                                <div class="nk-block-des">
                                    {{-- <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Actions</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($realstates)
                                            @foreach ($realstates as $slider)
                                            <tr>
                                                <td>{{$slider->title_1}}</td>
                                                <td>
                                                    <img src="{{image_path($slider->feature_image)}}" alt="" height="30px">
                                                </td>
                                                <td>
                                                    {{$slider->category->title}}
                                                </td>
                                                <td>{{\Carbon\Carbon::parse($slider->created_at)->format('Y-m-d')}}</td>
                                                <td>
                                                    {{\Carbon\Carbon::parse($slider->updated_at)->format('Y-m-d')}}
                                                </td>
                                                <td>
                                                    <div class="tb-odr-btns d-none d-md-inline">
                                                        <a href="{{route('admin.portfolio.realstate.edit',$slider->id)}}" class="text-warning">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <a href="{{route('admin.portfolio.realstate.delete',$slider->id)}}" class="text-danger">
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
                    </div> <!-- nk-block -->
               
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>
<!-- content @e -->
@endsection