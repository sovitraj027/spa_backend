@extends('backend.master')
@section('content')
    <!-- content @s
        -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to"
                                        href="{{ route('admin.homepage.reviews.index') }}"><em
                                            class="icon ni ni-arrow-left"></em><span>Review List</span></a></div>
                            </div>
                        </div>
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">{{ isset($review) ? 'Update Review' : 'Add Review' }}
                                    </h3>

                                </div><!-- .nk-block-head-content -->
                            </div><!-- .nk-block-between -->
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="card card-bordered">
                                <div class="card-inner-group">

                                    <div class="card-inner">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h5 class="title nk-block-title">
                                                    {{ isset($review) ? 'Update Review' : 'Add Review' }}</h5>
                                                {{-- <p>Create Review. </p> --}}
                                            </div>
                                        </div>
                                        <div class="nk-block">
                                            @isset($review)
                                                <form action="{{ route('admin.homepage.reviews.update', $review->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @method('put')
                                                @else
                                                    <form action="{{ route('admin.homepage.reviews.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                    @endisset
                                                    @csrf
                                                    <div class="row gy-4">
                                                        <div class="col-xxl-3 col-md-4">
                                                            <div class="form-group">
                                                                <label class="form-label">Review Image</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="custom-file">
                                                                        <input type="file" onchange="readURL(this)"
                                                                            name="image" class="custom-file-input"
                                                                            id="testReport">

                                                                        <label class="custom-file-label" for="testReport">Choose
                                                                            files</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            @isset($review)
                                                                <img src="{{ image_path($review->image) }}" alt="No Image"
                                                                    id="img" style='height:150px;'>
                                                            @else
                                                                <img src="" alt="No Image" class="d-none" id="img"
                                                                    style='height:150px;'>
                                                            @endisset
                                                        </div>



                                                        <!--col-->
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="btn btn-primary">{{ isset($review) ? 'Update Review' : 'Add Review' }}</button>
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
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.querySelector("#img").setAttribute("src", e.target.result);
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
