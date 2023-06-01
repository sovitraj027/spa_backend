@extends('backend.master')
@push('css')
    <style>
        .has-error {    color: #e85347;
    font-size: 11px;
    font-style: italic;}
    </style>
@endpush
@section('content')
  <!-- content @s -->
  <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-lg wide-sm">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a class="back-to" href="{{route('admin.client.index')}}"><em class="icon ni ni-arrow-left"></em><span>Gift List</span></a></div>
                    </div>
                </div>
                
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ isset($client) ? 'Update Gift' : 'Add Gift'}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($client) ? 'Update Gift' : 'Add Gift'}}</h5>
                                        {{-- <p>Create Gift. </p> --}}
                                    </div>
                                </div>
                                <div class="nk-block">
                                   @isset($client)
                                    <form action="{{route('admin.client.update',$client->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.client.store')}}" method="POST" enctype="multipart/form-data">
                                   @endisset
                                        @csrf
                                        <div class="row gy-4">
                                        
                                        
                                          
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Title </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control  @error('title')
                                                        error
                                                        @enderror" name="title" value="{{isset($client) ? $client->title : ''}}" placeholder="Gift Title">
                                                        @error('title')
                                                        <span id="fv-full-name-error" class="invalid">{{$errors->first('title')}}</span>
                                                        @enderror
                                                    </div>
                                              
                                                </div>
                                            </div>
                                          
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Short Description </label>
                                                    <div class="form-control-wrap">
                                                        <textarea name="short_description"  class="form-control" id="" cols="5" rows="5">{{isset($client) ? $client->short_description : ''}}</textarea>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Description </label>
                                                    <div class="form-control-wrap">
                                                        <textarea name="long_description" id="editor" class="form-control"  cols="5" rows="5">{{isset($client) ? $client->long_description : ''}}</textarea>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <!--col-->
                                            
                                            <div class="col-xxl-4 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Gift Feature Image</label>
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file"  onchange="readURL(this)" name="image"  class="custom-file-input" id="testReport">

                                                            <label class="custom-file-label" for="testReport">Choose files</label>
                                                        </div>
                                                        @error('image')
                                                        <span class="has-error">{{$errors->first('image')}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-12">
                                                @isset($client)
                                                <img src="{{image_path($client->image)}}" alt="No Image"  id="img" style='height:150px;'>

                                                @else
                                                <img src="" alt="No Image" class="d-none" id="img" style='height:150px;'>
                                                @endisset
                                            </div>
                                         
                                        
                                    
                                            <!--col-->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ isset($client) ? 'Update Gift' : 'Add Gift'}}</button>
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
<script src="{{asset('ckeditorv2/build/ckeditor.js')}}"></script>
<script src="{{asset('ckeditorv2/MyUploadAdapter.js')}}"></script>
<script>
       function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            return new MyUploadAdapter( loader );
        };
    }
  	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            fontSize: {
                        options: [
                            9,
                            11,
                            13,
                            'default',
                            17,
                            19,
                            21,
                            25,
                            30,
                            35,
                            40,
                            50,
                            60
                        ]
            },
            extraPlugins: [ MyCustomUploadAdapterPlugin ],
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
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