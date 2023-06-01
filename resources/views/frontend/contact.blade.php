@extends('frontend.master')
@section('content')

<section id="breadcrumb-container"
@if (typeExists('contact','banner'))
style="background-image: url({{image_path(contact('banner')->image)}})"
@else
style="background-image: url(https://spalabdev.wpengine.com/wp-content/themes/spalab/images/breadcrumb-default-bg.jpg)"
@endif
>
<div class="container">
  <div class="row d-flex align-items-center">
    <div class="col-md-6">
      <div class="breadcrumb-left text-start">
        <div class="page-title">
          <h1>Contact</h1>
        </div>
        <div class="current-page" style="--bs-breadcrumb-divider:'>>' ;" aria-label="breadcrumb">
          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="index.html"><strong>Home</strong> </a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
          </ol>
        </div>
      </div>

    </div>
    <div class="col-md-6">
    </div>
  </div>
</div>
</section>

<section id="contact-form" class="section-padding">
<div class="container">
  <div class="row">
    <div class="col-md-4" data-aos="fade-up" data-aos-duration="500">
      <div class="column-title">
        <h6>Get In Touch</h6>
      </div>

      <div class="address-holder">
        <div class="holder d-flex align-items-center">
          <div class="icon pe-2">
            <i class="fa-solid fa-location-arrow"></i>
          </div>
          <div class="description">
            <span>{{contact('branch_address') ? contact('branch_address')->description : 'Z- Street, Paknajol Marg,
              Kathmandu 44600'}}</span>
          </div>
        </div>
        <div class="holder d-flex align-items-center">
          <div class="icon pe-2">
            <i class="fa-solid fa-phone"></i>
          </div>
          <div class="description">
            <span>{{contact('contact_phone') ? contact('contact_phone')->description : ''}}</span>
          </div>
        </div>
        <div class="holder d-flex align-items-center">
          <div class="icon pe-2">
            <i class="fa-solid fa-envelope-open-text"></i>
          </div>
          <div class="description">
            <span>
              {{contact('contact_email_address') ? contact('contact_email_address')->description  : 'info@serenityspa.com.np'}}
            </span>
          </div>
        </div>
        <div class="holder d-flex align-items-center">
          <div class="icon pe-2">
            <i class="fa-solid fa-clock"></i>
          </div>
          <div class="description">
            <span>{{ typeExists('contact','timing')? contact('timing')->description : '7am - 10pm'}}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-8" data-aos="fade-up" data-aos-duration="1000">
      <div class="column-title">
        <h6>Connect With Us</h6>
      </div>
      <form action="{{route('store.contact')}}" method="post">
        @csrf
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="first_name" class="form-control" id="inputName4" placeholder="Your First Name (required)"
                   />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="last_name" class="form-control" id="inputLname4" placeholder="Your Last Name (required)"
                   />
              </div>
            </div>
          </div>
        </div>

        <div class="form-group mb-3">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" name="subject" class="form-control" id="inputName4" placeholder="Your Subject (required)"
                   />
              </div>
            </div>
          </div>
        </div>

        <div class="form-group mb-2">
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"
            placeholder="Your Message (required)" name="message" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
          Mail us Now
        </button>
      </form>

    </div>
  </div>

  <div class="col-md-12" data-aos="fade-up" data-aos-duration="1000">
    <div class="column-title">
      <h6>Locate Us in Map</h6>
    </div>

    <div class="g-map mt-4">
      @if (typeExists('contact','contact_map'))
  
      {!!contact('contact_map')->map!!}
      @else
      <iframe
      src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11797.229729577171!2d85.32325781863142!3d27.694028898496324!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x555f75f700300c01!2sMaitighar%20Mandala!5e0!3m2!1sen!2snp!4v1644405903134!5m2!1sen!2snp"
      width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      @endif

    </div>
  </div>
</div>
</section>
@endsection