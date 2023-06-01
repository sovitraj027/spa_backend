@extends('frontend.master')
@section('content')
    <section id="breadcrumb-container"
        style="
  background-image: url(https://spalabdev.wpengine.com/wp-content/themes/spalab/images/breadcrumb-default-bg.jpg);
">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <div class="breadcrumb-left text-start">
                        <div class="page-title">
                            <h1>Services</h1>
                        </div>
                        <div class="current-page" style="--bs-breadcrumb-divider: '>>'" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><strong>Home</strong> </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="service.html"><strong>service</strong></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Packages
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="service__package-container" class="section-padding">
        <div class="container">
            <div class="service__detail-title text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
                @if ($package_category)
                    <h1>{{ $package_category->name }}</h1>
                @else
                    <h1>Get Your Spa & Massage Package</h1>
                @endif
            </div>

            <div class="service__short-desc d-flex justify-content-center text-center" data-aos="fade-down"
                data-aos-duration="1000">
                <div class="col-md-10">
                    @if ($package_category)
                        <p>
                            {{ $package_category->description }}
                        </p>
                    @else
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et
                            doloremque dolor, explicabo magnam harum expedita iusto at
                            voluptates beatae iure ad libero architecto repudiandae deleniti
                            quia aliquid incidunt perferendis nesciunt. lorem100
                        </p>
                    @endif
                </div>
            </div>

            <div class="row mt-3">
                @if ($package_category->package)
                    @foreach ($package_category->package as $package)
                        <div class="col-md-4 d-flex justify-content-center mb-2">
                            <div class="card" style="width: 21rem">
                                <div class="card-body text-center">
                                    <h2 class="card-title m-5">{{ $package->title }}</h2>
                                    <p class="card-sub-title mb-4">
                                        <strong>Rs.{{ $package->price }}/</strong> {{ $package->per }}
                                    </p>
                                    <p class="card-text">
                                        {{ $package->description }}
                                    </p>
                                    <button type="button" value="{{ $package->id }}" name="{{ $package->title }}"
                                        class="btn btn-primary modalbtn ">
                                        Book Now
                                    </button>
                                    {{-- <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" id="book" data-item-id="{{ $package->id }}">Book Now</a> --}}
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="package_title">

                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="" method="POST" id="booking_form"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="package_id" id="package_id" value="">

                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <label>Full Name</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Your name" name="name" id="name"
                                                                aria-label="Fullname">
                                                            <p class="text-danger error"></p>
                                                        </div>
                                                        <div class="col">
                                                            <label>Email ID</label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Email" aria-label="Email">
                                                            <p class="text-danger error"></p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <label>Phone NO.</label>
                                                            <input type="number" class="form-control" id="phone_number"
                                                                name="phone_number" placeholder="Your contact"
                                                                aria-label="phone_number">
                                                            <p class="text-danger error"></p>
                                                        </div>
                                                        <div class="col">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="address" placeholder="Yout Address" value=""
                                                                aria-label="address">
                                                            <p class="text-danger error"></p>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">

                                                        <div class="col-6">
                                                            <label>Book the Date</label>
                                                            <input type="date" class="form-control" id="booking_date"
                                                                name="booking_date" placeholder="Pick a Date"
                                                                aria-label="date">
                                                            <p class="text-danger error"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">

                                                    <button type="sumbit" class="btn btn-primary">
                                                        Book Now
                                                    </button>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- modal end  -->
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-4 d-flex justify-content-center mb-2">
                        <div class="card" style="width: 21rem">
                            <div class="card-body text-center">
                                <h2 class="card-title m-5">Comfort Relax</h2>
                                <p class="card-sub-title mb-4">
                                    <strong>Rs.1500/</strong> per day
                                </p>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet
                                    aspernatur, consequuntur eligendi nam rem minus facilis
                                    corporis commodi temporibus quas numquam distinctio
                                    exercitationem unde molestias
                                </p>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center mb-2">
                        <div class="card" style="width: 21rem">
                            <div class="card-body text-center">
                                <h2 class="card-title m-5">Comfort Relax</h2>
                                <p class="card-sub-title mb-4">
                                    <strong>Rs.1500/</strong> per day
                                </p>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet
                                    aspernatur, consequuntur eligendi nam rem minus facilis
                                    corporis commodi temporibus quas numquam distinctio
                                    exercitationem unde molestias
                                </p>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center mb-2">
                        <div class="card" style="width: 21rem">
                            <div class="card-body text-center">
                                <h2 class="card-title m-5">Comfort Relax</h2>
                                <p class="card-sub-title mb-4">
                                    <strong>Rs.1500/</strong> per day
                                </p>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet
                                    aspernatur, consequuntur eligendi nam rem minus facilis
                                    corporis commodi temporibus quas numquam distinctio
                                    exercitationem unde molestias
                                </p>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Book Now</a>

                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">
                                                Modal title
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control" placeholder="Your name"
                                                        aria-label="Fullname">
                                                </div>
                                                <div class="col">
                                                    <label>Email ID</label>
                                                    <input type="email" class="form-control" placeholder="Email"
                                                        aria-label="Email">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label>Phone NO.</label>
                                                    <input type="number" class="form-control" placeholder="Your contact"
                                                        aria-label="contact">
                                                </div>
                                                <div class="col">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" placeholder="Yout Address"
                                                        aria-label="address">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label>Packages (Default)</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Comfort Package" aria-label="package">
                                                </div>
                                                <div class="col">
                                                    <label>Book the Date</label>
                                                    <input type="date" class="form-control" placeholder="Pick a Date"
                                                        aria-label="date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">

                                            <button type="button" class="btn btn-primary">
                                                Book Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end  -->
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.modalbtn', function() {
                var package_id = $(this).val();
                var package_title = ($(this).attr("name"));

                $('#bookingModal').modal('show');
                $('#package_id').val(package_id),
                    $('#package_title').html("<h5>" + package_title + "</h5>")
            });

        });
    </script>

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
                    url: "{{ route('package.booking.store') }}",
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


                            if (index == 'name') {
                                console.log(key[0]);
                                $('#name').parent().find(".error").html(key[0]);

                            }
                            if (index == 'email') {
                                console.log(key[0]);
                                $('#email').parent().find(".error").html(key[0]);
                            }
                            if (index == 'address') {
                                console.log(key[0]);
                                $('#address').parent().find(".error").html(key[0]);
                            }

                            if (index == 'booking_date') {
                                console.log(key[0]);
                                $('#booking_date').parent().find(".error").html(key[0]);
                            }
                            if (index == 'phone_number') {
                                console.log(key[0]);
                                $('#phone_number').parent().find(".error").html(key[0]);
                            }


                        })
                    }
                });
            });
        });
    </script>
@endpush
