@extends('backend.master')
@push('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
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
                                    <h2 class="nk-block-title fw-normal">PopUp</h2>

                                </div>
                            </div><!-- .nk-block-head -->
                            <!-- .nk-menu-item -->
                            <div class="nk-block nk-block-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">PopUp List</h4>
                                        <a href="{{ route('admin.homepage.popups.create') }}" class="btn btn-primary">Add
                                            PopUp</a>
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
                                                    {{-- <th>Title</th> --}}
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Created at</th>
                                                    <th>Updated at</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($popups)
                                                    @foreach ($popups as $popup)
                                                        <tr>
                                                            {{-- <td>{{$popup->title_1}}</td> --}}
                                                            <td>
                                                                <img src="{{ image_path($popup->image) }}" alt=""
                                                                    height="30px">
                                                            </td>
                                                            <td>
                                                                <input data-id="{{ $popup->id }}" class="toggle-class"
                                                                    type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                                    data-toggle="toggle" data-on="Active" data-off="InActive"
                                                                    {{ $popup->status ? 'checked' : '' }}>
                                                            </td>
                                                            <td>{{ \Carbon\Carbon::parse($popup->created_at)->format('Y-m-d') }}
                                                            </td>
                                                            <td>
                                                                {{ \Carbon\Carbon::parse($popup->updated_at)->format('Y-m-d') }}
                                                            </td>
                                                            <td>
                                                                <div class="tb-odr-btns d-none d-md-inline">
                                                                    <a href="{{ route('admin.homepage.popups.edit', $popup->id) }}"
                                                                        class="text-warning">
                                                                        <i class="bi bi-pencil"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.homepage.popups.delete', $popup->id) }}"
                                                                        class="text-danger">
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
    @push('js')
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <script>
            $(function() {
                $('.toggle-class').change(function() {
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var popup_id = $(this).data('id');

                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: '/backend/homepage/popups/changeStatus',
                        data: {
                            'status': status,
                            'popup_id': popup_id
                        },
                        success: function(response) {
                            
                            NioApp.Toast(
                                    '<h5>Success</h5><p>'+response.message+'</p>',
                                    'info', {
                                        position: 'top-right',
                                        ui: 'is-dark'
                                    });
                            ;
                        }
                    });
                })
            })
            
        </script>
    
    @endpush
