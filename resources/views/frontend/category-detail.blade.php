@extends('frontend.master')
@section('content')
<section id="breadcrumb-container" style="
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
        <li class="breadcrumb-item active" aria-current="page">
          Services
        </li>
      </ol>
    </div>
  </div>
</div>
</div>
</div>
</section>

<section id="service__main-container" class="section-padding">
<div class="container">
<div class="service__title text-center">
<h1>Massage Therapy</h1>
<img src="images/flowericon.png" alt="" width="11%" class="text-center" />
</div>

<div class="service__section mt-5">
<div class="row">
  <div class="col-md-3 border-end">
    <div class="side__menu-bar">
      <div class="side__menu-title wow fadeInLeft" data-wow-delay="0.1s"
        style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
        <h4>Categories</h4>
        <ul>
          @if ($categories->isNotEmpty())
          @foreach ($categories as $category )
          <li class="side__menu-list @if (isset($services) && $category->id == $services->first()->category_id)
            active
          @endif">
            <a href="{{route('category.detail',$category->id)}}" class="d-flex align-items-center">
              <div class="icon">
                @if ($category->icon)
                <img src="{{image_path($category->icon)}}" alt="" width="100%">

                  @else
                <img src="{{asset('frontend/images/massage.png')}}" alt="" width="100%">

                @endif
              </div>
              <div class="side__menu-text">
                <span>{{$category->title}}</span>
              </div>
            </a>
          </li>
          <li class="side__menu-list">
            <a href="{{route('package')}}" class="d-flex align-items-center">
              <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/679/679720.png" alt="" width="100%">
              </div>
              <div class="side__menu-text">
                <span>Packages</span>
              </div>
            </a>
          </li>
          <li class="side__menu-list">
            <a href="{{route('gift.card')}}" class="d-flex align-items-center">
              <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/324/324687.png" alt="" width="100%">
              </div>
              <div class="side__menu-text">
                <span>Gift Cards </span>
              </div>
            </a>
          </li>
          @endforeach
      
          @else
          <li class="side__menu-list active">
            <a href="service.html" class="d-flex align-items-center">
              <div class="icon">
                <img src="images/massage.png" alt="" width="100%">
              </div>
              <div class="side__menu-text">
                <span>Massage Therapy</span>
              </div>
            </a>
          </li>
          <li class="side__menu-list">
            <a href="hydro-service.html" class="d-flex align-items-center">
              <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/430/430470.png" alt="" width="100%">
              </div>
              <div class="side__menu-text">
                <span>Hydro Therapy</span>
              </div>
            </a>
          </li>
          <li class="side__menu-list">
            <a href="beauty-service.html" class="d-flex align-items-center">
              <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/4614/4614127.png" alt="" width="100%">
              </div>
              <div class="side__menu-text">
                <span>Beauty Therapy</span>
              </div>
            </a>
          </li>
          <li class="side__menu-list">
            <a href="package.html" class="d-flex align-items-center">
              <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/679/679720.png" alt="" width="100%">
              </div>
              <div class="side__menu-text">
                <span>Packages</span>
              </div>
            </a>
          </li>
          <li class="side__menu-list">
            <a href="gift-cards.html" class="d-flex align-items-center">
              <div class="icon">
                <img src="https://cdn-icons-png.flaticon.com/512/324/324687.png" alt="" width="100%">
              </div>
              <div class="side__menu-text">
                <span>Gift Cards </span>
              </div>
            </a>
          </li>
          @endif
      
        </ul>
      </div>
    </div>
  </div>
  @if ($services)
  <div class="col-md-9">
    <div class="service__card-holder">
      <div class="row">
        @foreach ($services as $service )
     
        <div class="col-md-6">
          <div class="service__card p-2 wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
            <div class="service__card-img">
              @if ($service->feature_image)
              <img src="{{image_path($service->feature_image)}}" alt=""
              width="100%">
              @else
              <img src="https://www.cdaresort.com/assets/images/gallery/photo_gallery_spa_6.jpg" alt=""
              width="100%">
              @endif
         
            </div>
            <div class="service__card-content text-center p-2">
              <h4>{{$service->title_1}}</h4>
              <p>
               {{$service->description}}
              </p>
              <a href="{{route('services.detail',$service->id)}}" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        @endforeach

    
      </div>
    </div>
  </div>
  @else
  <div class="col-md-9">
    <div class="service__card-holder">
      <div class="row">
        <div class="col-md-6">
          <div class="service__card p-2 wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
            <div class="service__card-img">
              <img src="https://www.cdaresort.com/assets/images/gallery/photo_gallery_spa_6.jpg" alt=""
                width="100%">
            </div>
            <div class="service__card-content text-center p-2">
              <h4>Swedish Massage</h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cum! Voluptates maxime
                laborum ea temporibus, omnis tempore? Nesciunt, maxime earum.
              </p>
              <a href="service-detail.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="service__card p-2 wow fadeInUp" data-wow-delay="0.3s"
            style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
            <div class="service__card-img">
              <img
                src="https://img.grouponcdn.com/bynder/WMjEMapAkR1m1NA4HksMWo3rFSp/WM-2048x1229/v1/c870x524.jpg"
                alt="" width="100%">
            </div>
            <div class="service__card-content text-center p-2">
              <h4>Swedish Massage</h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cum! Voluptates maxime
                laborum ea temporibus, omnis tempore? Nesciunt, maxime earum.
              </p>
              <a href="service-detail.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="service__card p-2 wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
            <div class="service__card-img">
              <img src="https://www.orionspa.in/wp-content/uploads/2019/04/blog18.jpg" alt="" width="100%">
            </div>
            <div class="service__card-content text-center p-2">
              <h4>Swedish Massage</h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cum! Voluptates maxime
                laborum ea temporibus, omnis tempore? Nesciunt, maxime earum.
              </p>
              <a href="service-detail.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="service__card p-2 wow fadeInUp" data-wow-delay="0.3s"
            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
            <div class="service__card-img">
              <img src="https://www.sukhothai.in/wp-content/uploads/2017/03/Full-Body-Massage.jpg" alt=""
                width="100%">
            </div>
            <div class="service__card-content text-center p-2">
              <h4>Swedish Massage</h4>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cum! Voluptates maxime
                laborum ea temporibus, omnis tempore? Nesciunt, maxime earum.
              </p>
              <a href="service-detail.html" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

</div>
</div>
</div>
</section>
@endsection