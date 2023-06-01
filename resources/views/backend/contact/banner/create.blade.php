@extends('backend.master')
@section('content')
  <!-- content @s -->
  <div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
    
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ isset($banner) ? 'Update Banner' : 'Add Banner'}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
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
                                   @isset($banner)
                                    <form action="{{route('admin.contact.update',$banner->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.contact.store')}}" method="POST" enctype="multipart/form-data">
                                   @endisset
                                        @csrf
                                        <input type="hidden" name="type" value="banner">
                                        <div class="row gy-4">
                                            {{-- <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Banner Title 1</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_1" value="{{isset($banner) ? $banner->title_1 : ''}}" placeholder="Banner Title 1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Banner Title 2</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_2" value="{{isset($banner) ? $banner->title_2 : ''}}" placeholder="Banner Title 1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <div class="form-control-wrap " >
                                                       <textarea name="description" class="form-control" id="" cols="3" rows="3">{{isset($banner) ? $banner->description : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div> --}}
                           
                                            
                                            <div class="col-xxl-8 col-md-8">
                                                <div class="form-group">
                                                    <label class="form-label">Banner Image</label>
                                                    <div class="form-control-wrap " style="max-height: 250px; height: 200px"  >
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
            </div>
        </div>
    </div>
</div>
<!-- content @e -->

@endsection
@push('js')
<script>
    var el = document.getElementById('div-03');
    var r1 = el.nextSibling;
    r1.remove();
</script>
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