@extends('backend.master')
@section('content')
  <!-- content @s -->
  <div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
    
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">{{ isset($section_one) ? 'Update Section One' : 'Add Section One'}}</h3>
                        
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                {{-- <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                      
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="title nk-block-title">{{ isset($section_one) ? 'Update Section One' : 'Add Section One'}}</h5>
                                       
                                    </div>
                                </div>
                                <div class="nk-block">
                                   @isset($section_one)
                                    <form action="{{route('admin.contact.update',$section_one->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('put')
                                       @else
                                    <form action="{{route('admin.contact.store')}}" method="POST" enctype="multipart/form-data">
                                   @endisset
                                        @csrf
                                        <input type="hidden" name="type" value="section_one">
                                        <div class="row gy-4">
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Section One Title</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control @error('title_1')
                                                        is-invalid
                                                        @enderror " id="" name="title_1" value="{{isset($section_one) ? $section_one->title_1 : ''}}" placeholder="Section One Title 1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Section One Title 2</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="title_2" value="{{isset($section_one) ? $section_one->title_2 : ''}}" placeholder="Section One Title 2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Section One Title 3</label>
                                                    <div class="form-control-wrap " >
                                                        <input type="text" class="form-control" id="" name="name" value="{{isset($section_one) ? $section_one->name : ''}}" placeholder="Section One Title 2">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Section One Description</label>
                                                    <div class="form-control-wrap " >
                                                        <textarea name="description" class="form-control" id="" cols="15" rows="5">{{isset($section_one) ? $section_one->description : ''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            
                                         
                                    
                                            <!--col-->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">{{ isset($section_one) ? 'Update Section One' : 'Add Section One'}}</button>
                                                </div>
                                            </div>
                                            <!--col-->
                                        </div>

                                     </form>
                                    <!--row-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- .nk-block -->
                <div class="nk-block">
                    <div class="row">
                        <div class="col-xl-8">
                            <div id="faqs" class="accordion">
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head" data-toggle="collapse" data-target="#faq-q1">
                                        <h6 class="title">Address</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse show" id="faq-q1" data-parent="#faqs">
                                        <div class="accordion-inner">
                                            <div class="nk-block">
                                            
                                                @if(typeExists('contact','branch_address'))
                                                <form action="{{route('admin.contact.update',contact('branch_address')->id)}}" class="form-settings" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    @else
                                                    <form action="{{route('admin.contact.store')}}" class="form-settings" method="POST">
                                                    @csrf
                                                    @endisset
                                                    <input type="hidden" name="type" value="branch_address">
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-name">Branch Name</label>
                                                                <span class="form-note">Specify the name of the Branch Name.</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" value="{{contact('branch_address')->name ?? '' }}" name="name" id="site-name" placeholder="London">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 align-center">
                                                        <div class="col-lg-5">
                                                            <div class="form-group">
                                                                <label class="form-label" for="site-email">Branch Address</label>
                                                                <span class="form-note">Specify the key of your Branch address</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7">
                                                            <div class="form-group">
                                                                <div class="form-control-wrap">
                                                                    <textarea name="description" class="form-control" placeholder="Bloomsbury Square,London WC1B 4EA" id="" cols="5" rows="5">{{contact('branch_address') ? contact('branch_address')->description : '' }}</textarea>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-lg-7">
                                                            <div class="form-group mt-2">
                                                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .accordion-item -->
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#faq-q3">
                                        <h6 class="title">Email Address</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="faq-q3" data-parent="#faqs">
                                        <div class="accordion-inner">
                                            @if(typeExists('contact','contact_email_address'))
                                            <form action="{{route('admin.contact.update',contact('contact_email_address')->id)}}" class="form-settings" method="POST">
                                                @csrf
                                                @method('put')
                                                @else
                                                <form action="{{route('admin.contact.store')}}" class="form-settings" method="POST">
                                                @csrf
                                                @endif
                                                <input type="hidden" name="type" value="contact_email_address">
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="site-email">Email Address</label>
                                                            <span class="form-note">Specify the key of your Email address</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                {{-- <input type="text" class="form-control" id="site-email" placeholder="Bloomsbury Square,London WC1B 4EA"> --}}
                                                                <textarea name="description"  class="form-control" placeholder="Bloomsbury Square,London WC1B 4EA" id="" cols="5" rows="5">{{contact('contact_email_address')->description ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                
                                                
                                                <div class="row g-3">
                                                    <div class="col-lg-7">
                                                        <div class="form-group mt-2">
                                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- .accordion-item -->
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#faq-q5">
                                        <h6 class="title">Map</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="faq-q5" data-parent="#faqs">
                                        <div class="accordion-inner">
                                            @if(typeExists('contact','contact_map'))
                                            <form action="{{route('admin.contact.update',contact('contact_map')->id)}}" class="form-settings" method="POST">
                                                @csrf
                                                @method('put')
                                                @else
                                                <form action="{{route('admin.contact.store')}}" class="form-settings" method="POST">
                                                @csrf
                                                @endif
                                                <input type="hidden" name="type" value="contact_map">
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="site-name">Map</label>
                                                            <span class="form-note">Specify the name of the Map Key.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <textarea name="map" class="form-control" id="" cols="5" rows="5">{{contact('contact_map')->map ?? ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3">
                                                    <div class="col-lg-7">
                                                        <div class="form-group mt-2">
                                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- .accordion-item -->
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#faq-q4">
                                        <h6 class="title">Contact</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="faq-q4" data-parent="#faqs">
                                        <div class="accordion-inner">
                                            @if(typeExists('contact','contact_phone'))
                                            <form action="{{route('admin.contact.update',contact('contact_phone')->id)}}" class="form-settings" method="POST">
                                                @csrf
                                                @method('put')
                                                @else
                                                <form action="{{route('admin.contact.store')}}" class="form-settings" method="POST">
                                                @csrf
                                                @endif
                                                <input type="hidden" name="type" value="contact_phone">
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="site-name">Phone Number</label>
                                                            <span class="form-note">Specify the name of the Branch Name.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <textarea name="description" class="form-control" id="" cols="5" rows="5">{{ contact('contact_phone') ? contact('contact_phone')->description : ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3">
                                                    <div class="col-lg-7">
                                                        <div class="form-group mt-2">
                                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- .accordion-item -->
                                <div class="accordion-item">
                                    <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#faq-q6">
                                        <h6 class="title">Timing</h6>
                                        <span class="accordion-icon"></span>
                                    </a>
                                    <div class="accordion-body collapse" id="faq-q6" data-parent="#faqs">
                                        <div class="accordion-inner">
                                            @if(typeExists('contact','timing'))
                                            <form action="{{route('admin.contact.update',contact('timing')->id)}}" class="form-settings" method="POST">
                                                @csrf
                                                @method('put')
                                                @else
                                                <form action="{{route('admin.contact.store')}}" class="form-settings" method="POST">
                                                @csrf
                                                @endif
                                                <input type="hidden" name="type" value="timing">
                                                <div class="row g-3 align-center">
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label class="form-label" for="site-name">Timing</label>
                                                            <span class="form-note">Specify the timing of the Branch .</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <textarea name="description" class="form-control" id="" cols="5" rows="5">{{ typeExists('contact','timing') ? contact('timing')->description : ''}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3">
                                                    <div class="col-lg-7">
                                                        <div class="form-group mt-2">
                                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- .accordion-item -->
                            </div><!-- .accordion -->
                        </div>
                        <div class="col-xl-4">
                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="align-center flex-wrap g-4 text-center">
                                        <div class="nk-block-image w-120px flex-shrink-0 mx-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                                <path d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z" transform="translate(0 -1)" fill="#f6faff" />
                                                <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff" />
                                                <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe" />
                                                <path d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z" transform="translate(0 -1)" fill="#798bff" />
                                                <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="#6576ff" />
                                                <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2" />
                                                <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round" />
                                                <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                                <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10" />
                                            </svg>
                                        </div>
                                        <div class="nk-block-content">
                                            <div class="nk-block-content-head">
                                                <h5>We’re here to help you!</h5>
                                                <p class="text-soft">Ask a question or file a support ticket, manage request, report an issues. Our team support team will get back to you by email.</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-content flex-shrink-0 mt-lg-4 mx-auto">
                                            <a href="https://allstar.com.np" target="__blank" class="btn btn-lg btn-outline-primary">Get Support Now</a>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div>
                    </div>
                </div>
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