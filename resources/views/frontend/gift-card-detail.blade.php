@extends('frontend.master')

@section('content')
    @if (isset($banner))
        <section id="breadcrumb-container" style="
    background-image: url({{ image_path($banner->image) }});
  ">
        @else
            <section id="breadcrumb-container"
                style="
        background-image: url(https://spalabdev.wpengine.com/wp-content/themes/spalab/images/breadcrumb-default-bg.jpg);
      ">
    @endif
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <div class="breadcrumb-left text-start">
                    <div class="page-title">
                        <h1>Gift Card</h1>
                    </div>
                    <div class="current-page" style="--bs-breadcrumb-divider: '>>'" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html"><strong>Home</strong> </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="service.html"><strong>Gift Card</strong></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $service->title }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    @if ($service)
        <section id="service__gift-container" class="section-padding">
            <div class="container">
                <div class="service__detail-title text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
                    <h1>{{ $service->title }}</h1>
                </div>

                <div class="service__short-desc d-flex justify-content-center text-center mb-3" data-aos="fade-down"
                    data-aos-duration="1000">
                    {!! $service->long_description !!}
                    {{-- <div class="col-md-10">
      
      </div> --}}
                </div>

                <div class="service__gift-section" data-aos="fade-up" data-aos-duration="1000">
                    <div class="gift-container">
                        <form action="" method="POST" id="booking_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="gift_id" value="{{ $service->id }}" />
                            <input type="hidden" name="package_name" value="{{ $service->title }}" />

                            <div class="row mb-5">
                                <div class="col-md-3">
                                    <label>Full Name( From )</label>
                                    <input type="text" class="form-control" name="from_name" id="from_name"
                                        placeholder="Your name" aria-label="Fullname" />
                                    <p id="error_id" class="text-white error"></p>
                                </div>
                                <div class="col-md-3">
                                    <label>Phone No( From )</label>
                                    <input type="number" class="form-control" id="from_phone" name="from_phone"
                                        placeholder="phone" aria-label="Phone" />
                                    <p class="text-white error"></p>
                                </div>
                                <div class="col-md-3">
                                    <label>Full Name( To )</label>
                                    <input type="text" class="form-control" id="to_name" name="to_name"
                                        placeholder=" Name" aria-label="name" />
                                    <p class="text-white error"></p>
                                </div>
                                <div class="col-md-3">
                                    <label>phone No.( To )</label>
                                    <input type="number" class="form-control" id="to_phone" name="to_phone"
                                        placeholder="phone" aria-label="Phone" />
                                </div>
                            </div>
                            <div class="row mb-5">

                                <div class="col-md-6 mb-6">
                                    <label>Email.</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Your Email" aria-label="email" />
                                    <p class="text-danger error"></p>
                                </div>

                                <div class="col-md-6">
                                    <label>Book the Date</label>
                                    <input type="date" class="form-control" id="booking_date" name="booking_date"
                                        placeholder="Pick a Date" aria-label="date" />
                                    <p class="text-white error"></p>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6 ">
                                    <label>message</label>
                                    <textarea rows="4" cols="30" id="message" class="form-control" name="message"
                                        placeholder="Enter Your Message Here"></textarea>
                                    <p class="text-white error"></p>

                                </div>

                            </div>
                            <div class="package__btn text-center ">
                                <button class="btn btn-primary" type="submit">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    @else
        <section id="service__gift-container" class="section-padding">
            <div class="container">
                <div class="service__detail-title text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
                    <h1>Craft Your Gifts & Cards</h1>
                </div>

                <div class="service__short-desc d-flex justify-content-center text-center mb-3" data-aos="fade-down"
                    data-aos-duration="1000">
                    <div class="col-md-10">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et
                            doloremque dolor, explicabo magnam harum expedita iusto at
                            voluptates beatae iure ad libero architecto repudiandae deleniti
                            quia aliquid incidunt perferendis nesciunt. lorem100
                        </p>
                    </div>
                </div>
                <div class="service__gift-section" data-aos="fade-up" data-aos-duration="1000">
                    <div class="gift-container">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label>Full Name</label>
                                <input type="text" class="form-control" placeholder="Your name" id="name"
                                    aria-label="Fullname" />
                            </div>
                            <div class="col-md-6">
                                <label>Email ID</label>
                                <input type="email" class="form-control" placeholder="Email" id="email"
                                    aria-label="Email" />
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label>Phone NO.</label>
                                <input type="number" class="form-control" placeholder="Your contact"
                                    aria-label="contact" />
                            </div>
                            <div class="col-md-6">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Yout Address"
                                    aria-label="address" />
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label>Packages (Default)</label>
                                <input type="text" class="form-control" placeholder="Comfort Package"
                                    aria-label="package" />
                            </div>
                            <div class="col-md-6">
                                <label>Book the Date</label>
                                <input type="date" class="form-control" placeholder="Pick a Date"
                                    aria-label="date" />
                            </div>
                        </div>
                        <div class="package__btn text-center">
                            <button class="btn btn-primary">Create Package</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#booking_form').submit(function(e) {
                e.preventDefault();
                const bookingData = new FormData(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });


                jQuery.ajax({
                    url: "{{ route('booking.store') }}",
                    method: 'post',
                    data: bookingData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(response) {

                        if (response.success == true) {
                            toastr.success(response.message);
                        }

                        $("#booking_form")[0].reset();
                        $(".error").html('');
                    },
                    error: function(response) {
                        
                        console.log(response.responseJSON.errors);
                        $.each(response.responseJSON.errors, function(index, key) {


                            if (index == 'from_name') {
                                console.log(key[0]);
                                $('#from_name').parent().find(".error").html(key[0]);

                            }
                            if (index == 'to_name') {
                                console.log(key[0]);
                                $('#to_name').parent().find(".error").html(key[0]);
                            }
                            if (index == 'email') {
                                console.log(key[0]);
                                $('#email').parent().find(".error").html(key[0]);
                            }

                            if (index == 'message') {
                                console.log(key[0]);
                                $('#message').parent().find(".error").html(key[0]);
                            }
                            if (index == 'from_phone') {
                                console.log(key[0]);
                                $('#from_phone').parent().find(".error").html(key[0]);
                            }
                            if (index == 'booking_date') {
                                console.log(key[0]);
                                $('#booking_date').parent().find(".error").html(key[0]);
                            }

                        })
                    }
                });
            });
        });
    </script>
@endpush
