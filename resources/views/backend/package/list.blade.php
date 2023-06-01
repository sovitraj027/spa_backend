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
                            <h2 class="nk-block-title fw-normal">Package</h2>
                         
                        </div>
                    </div><!-- .nk-block-head -->
                   <!-- .nk-menu-item -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Package List</h4>
                                <a href="{{route('admin.package.create')}}" class="btn btn-primary" >Add Package</a>
        
                                <div class="nk-block-des">
                                    {{-- <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p> --}}
                                </div>
                            </div>
                        </div>
                         <!-- Modal Form -->
                        <div class="modal fade" id="modalForm">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Package</h5>
                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                            <em class="icon ni ni-cross"></em>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin.package.store')}}" method="post" class="form-validate is-alter">
                                            @csrf
                                            <input type="hidden" name="type" value="Package">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name">Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" name="title_1" class="form-control" id="full-name" required>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label class="form-label" for="phone-no">Description</label>
                                                <div class="form-control-wrap">
                                                  <textarea name="description" class="form-control" id="" cols="20" rows="5"></textarea>
                                                </div>
                                            </div>
                                         
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Save Informations</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-light">
                                        <span class="sub-text">Create Package</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                    
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Actions</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @isset($packages)
                                            @foreach ($packages as $package)
                                            <tr>
                                                <td>{{$package->title}}</td>
                                                <td>{{$package->price}}</td>
                                                <td>{{$package->per}}</td>
                                                <td>{{$package->category->name ?? ''}}</td>
                                                <td>{{\Carbon\Carbon::parse($package->created_at)->format('Y-m-d')}}</td>
                                                <td>
                                                    {{\Carbon\Carbon::parse($package->updated_at)->format('Y-m-d')}}
                                                </td>
                                                <td>
                                                    <div class="tb-odr-btns d-none d-md-inline">
                                                        <a href="{{route('admin.package.edit',$package->id)}}" class="text-warning">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <a href="{{route('admin.package.delete',$package->id)}}" class="text-danger">
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