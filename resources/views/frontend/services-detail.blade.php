@extends('frontend.master')
@section('content')
    @if (isset($banner) && $service->same_as_portfolio)
    <section id="breadcrumb-container" style="
    background-image: url({{image_path($banner->image)}});
  ">
  
  @elseif ($service->banner_image)
  @else
  <section id="breadcrumb-container" style="
  background-image: url({{image_path($service->banner_image)}});
">
    @endif

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
                  Services Detail
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@if ($service)

<section id="service__detail-container" class="section-padding">
    <div class="container">
    <div class="service__detail-title text-center mb-3">
    <h1>{{$service->title_1}}</h1>
    </div>
    <div class="service__short-desc d-flex justify-content-center text-center">
    <div class="col-md-10">
      <p>
        {{$service->description}}
      </p>
    </div>
    </div>
    <div class="row">
    <div class="col-md-5 mt-5">
        @if ($service->feature_image)
        <img src="{{image_path($service->feature_image)}}"
        alt="image" width="100%" />
        @else
        <img src="https://img.grouponcdn.com/bynder/WMjEMapAkR1m1NA4HksMWo3rFSp/WM-2048x1229/v1/c870x524.jpg"
        alt="image" width="100%" />
        @endif
   
    </div>
    <div class="col-md-7 d-flex align-items-center">
   

          {!!$service->description_2!!}


    </div>
    </div>
    <div class="service__desc ">
    <p>
        {{$service->description}}
    </p>
    </div>
    
    <div class="service__detail-title text-center mb-3 mt-5">
    {!!$service->description_4!!}
    </div>
    </section>
@else
<section id="service__detail-container" class="section-padding">
    <div class="container">
      <div class="service__detail-title text-center mb-3">
        <h1>Swedish Massage</h1>
      </div>
      <div class="service__short-desc d-flex justify-content-center text-center">
        <div class="col-md-10">
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et
            doloremque dolor, explicabo magnam harum expedita iusto at
            voluptates beatae iure ad libero architecto repudiandae deleniti
            quia aliquid incidunt perferendis nesciunt. lorem100
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <img src="https://img.grouponcdn.com/bynder/WMjEMapAkR1m1NA4HksMWo3rFSp/WM-2048x1229/v1/c870x524.jpg"
            alt="image" width="100%" />
        </div>
        <div class="col-md-7 d-flex align-items-center">
          <div class="service__long-desc">
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit.
              Repudiandae magni quam, et error quasi odio ex vel soluta! Fuga
              a labore, nihil neque beatae voluptas ratione inventore aliquam
              dolores debitis voluptatem at tempore molestiae iste ipsum
              mollitia quaerat quidem delectus eum vero expedita qui! Cumque
              reiciendis maxime autem molestiae corporis? Lorem ipsum, dolor
              sit amet consectetur adipisicing elit. Perspiciatis, magnam
              temporibus nobis eveniet modi odio harum in totam, ad
              exercitationem tenetur non minima iusto cumque quo blanditiis
              incidunt fugiat! Voluptatum quos corporis nulla, iste itaque
              asperiores aspernatur, quisquam totam dolorum tenetur,
              voluptates est maxime. Velit id blanditiis eaque vero dolorem,
              quos maxime perspiciatis temporibus accusantium tempore et
              repellendus cumque nam sunt dolores optio. Dolorum natus
              explicabo omnis asperiores, quasi vel amet quis dignissimos
              ipsam labore! Provident, fuga recusandae. Eligendi quia
              voluptatem hic aliquid cumque error magnam, ex molestiae unde,
              nulla odio veritatis qui ratione, tempora animi? Voluptas
              molestiae commodi quis.
            </p>
          </div>
        </div>
      </div>
      <div class="service__desc mt-3">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat,
          deserunt suscipit eius id, ad molestias asperiores, dolor laboriosam
          fuga sed magni officia. Impedit doloribus suscipit sint temporibus
          officia minima odit commodi, beatae alias dolorem dicta earum amet
          corporis quibusdam optio incidunt totam aliquid neque. Provident,
          veritatis vel sapiente alias totam eius officia, voluptatibus saepe
          possimus soluta inventore, ratione dolores. Vel.
        </p>
      </div>

      <div class="service__detail-title text-center mb-3 mt-5">
        <h1>Pricing</h1>
      </div>
      <div class="priceing__holder d-flex justify-content-center">
        <ul class="w-75">
          <li class="services__pricing-table d-flex justify-content-between">
            <div class="service__center">
              <span>Signature Swedish Massage</span>
            </div>
            <span class="line_holder">----------------------------------------------------------------------------------------------</span>
            <div class="service__price">
              <span>Rs. 5500</span>
            </div>
          </li>
          <li class="services__pricing-table d-flex justify-content-between">
            <div class="service__center">
              <span>Swedish Massage</span>
            </div>
            <span class="line_holder">----------------------------------------------------------------------------------------------------------</span>
            <div class="service__price">
              <span>Rs. 5500</span>
            </div>
          </li>
          <li class="services__pricing-table d-flex justify-content-between">
            <div class="service__center">
              <span>Normal Swedish Massage</span>
            </div>
            <span class="line_holder">-------------------------------------------------------------------------------------------------</span>
            <div class="service__price">
              <span>Rs. 5500</span>
            </div>
          </li>
          <li class="services__pricing-table d-flex justify-content-between">
            <div class="service__center">
              <span>Normal Swedish Massage</span>
            </div>
            <span class="line_holder">--------------------------------------------------------------------------------------------------</span>
            <div class="service__price">
              <span>Rs. 5500</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>

@endif

@endsection