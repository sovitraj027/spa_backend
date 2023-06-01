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
        <h1>Packages</h1>
        <img src="images/flowericon.png" alt="" width="11%" class="text-center" />
    </div>

    <div class="service__section mt-5">
        <div class="row">
            <div class="col-md-3 border-end">
                <div class="side__menu-bar">
                    <div class="side__menu-title wow fadeInLeft" data-wow-delay="0.1s"
                        style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                        <h4>Categories</h4>
                        @if ($categories)
                        <ul>
                            
                            @foreach ($categories as $category )
                            <li class="side__menu-list">
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
                            @endforeach
                            <li class="side__menu-list active">
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
                        </ul>
                            @else
                            <ul>
                            
                                <li class="side__menu-list">
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
                                            <img src="https://cdn-icons-png.flaticon.com/512/430/430470.png" alt=""
                                                width="100%">
                                        </div>
                                        <div class="side__menu-text">
                                            <span>Hydro Therapy</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="side__menu-list">
                                    <a href="beauty-service.html" class="d-flex align-items-center">
                                        <div class="icon">
                                            <img src="https://cdn-icons-png.flaticon.com/512/4614/4614127.png"
                                                alt="" width="100%">
                                        </div>
                                        <div class="side__menu-text">
                                            <span>Beauty Therapy</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="side__menu-list active">
                                    <a href="package.html" class="d-flex align-items-center">
                                        <div class="icon">
                                            <img src="https://cdn-icons-png.flaticon.com/512/679/679720.png" alt=""
                                                width="100%">
                                        </div>
                                        <div class="side__menu-text">
                                            <span>Packages</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="side__menu-list">
                                    <a href="gift-cards.html" class="d-flex align-items-center">
                                        <div class="icon">
                                            <img src="https://cdn-icons-png.flaticon.com/512/324/324687.png" alt=""
                                                width="100%">
                                        </div>
                                        <div class="side__menu-text">
                                            <span>Gift Cards </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        @endif
                     
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="service__card-holder">
                    <div class="row">
                     
                        @if ($package_category->isNotEmpty())
                        @foreach ($package_category as $category )
                        <div class="col-md-6">
                            <div class="service__card p-2 wow fadeInUp" data-wow-delay="0.1s"
                                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                <div class="service__card-img">
                                    @if ($category->image)
                                    <img src="{{image_path($category->image)}}"
                                    alt="" width="100%">
                                        @else
                                        <img src="https://miro.medium.com/max/612/1*GS0ohg3qm14E4Ya7fljicw.jpeg"
                                        alt="" width="100%">
                                    @endif
                                
                                </div>
                                <div class="service__card-content text-center p-2">
                                    <h4>{{$category->name}}</h4>
                                    <p>
                                        {{$category->description}}
                                    </p>
                                    <a href="{{route('package.detail',$category->id)}}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach   
                        @else
                        <div class="col-md-6">
                            <div class="service__card p-2 wow fadeInUp" data-wow-delay="0.1s"
                                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                <div class="service__card-img">
                                    <img src="https://miro.medium.com/max/612/1*GS0ohg3qm14E4Ya7fljicw.jpeg"
                                        alt="" width="100%">
                                </div>
                                <div class="service__card-content text-center p-2">
                                    <h4>Package</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cum!
                                        Voluptates maxime
                                        laborum ea temporibus, omnis tempore? Nesciunt, maxime earum.
                                    </p>
                                    <a href="{{route('package.detail')}}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service__card p-2 wow fadeInUp" data-wow-delay="0.3s"
                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                <div class="service__card-img">
                                    <img src="https://miro.medium.com/max/612/1*GS0ohg3qm14E4Ya7fljicw.jpeg"
                                        alt="" width="100%">
                                </div>
                                <div class="service__card-content text-center p-2">
                                    <h4>Package</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cum!
                                        Voluptates maxime
                                        laborum ea temporibus, omnis tempore? Nesciunt, maxime earum.
                                    </p>
                                    <a href="{{route('package.detail')}}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="service__card p-2 wow fadeInUp" data-wow-delay="0.1s"
                                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                <div class="service__card-img">
                                    <img src="https://miro.medium.com/max/612/1*GS0ohg3qm14E4Ya7fljicw.jpeg"
                                        alt="" width="100%">
                                </div>
                                <div class="service__card-content text-center p-2">
                                    <h4>Package</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, cum!
                                        Voluptates maxime
                                        laborum ea temporibus, omnis tempore? Nesciunt, maxime earum.
                                    </p>
                                    <a href="{{route('package.detail')}}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    
                     

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection