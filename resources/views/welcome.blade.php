@extends('frontend.master')
@section('content')
    @if ($popups->isNotEmpty())
        @foreach ($popups as $popup)
        <div class="modal fade windowModal" id="myModal{{$popup->id}}">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header text-center p-1">
                      <h6 class="center-title pb-0">{{$popup->title}}</h6>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body p-0">
                      <div class="modal-img">
                          <img src="{{ image_path($popup->image) }}"
                              alt="Popup Image" width="100%" height="100%">
                      </div>
                  </div>
                  <div class="modal-footer">
                  </div>
              </div>
          </div>
      </div>
        @endforeach
    @else
        <div class="modal fade windowModal" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center p-1">
                        <h6 class="center-title pb-0">SPA</h6>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="modal-img">
                            <img src="https://images-platform.99static.com//VPeAgMceVHdYfaKbpnFk4dgePu4=/1014x1011:2016x2013/fit-in/500x500/99designs-contests-attachments/101/101197/attachment_101197750"
                                alt="No Image" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    @endif


    <!-- slider section -->
    <section class="slider">
        <div id="wowslider-container1">
            <div class="ws_images">
                <ul>
                    @if ($sliders->isNotEmpty())
                        @foreach ($sliders as $slider)
                            <li>
                                <a href="{{ $slider->btn_link }}" target="__blank"><img
                                        src="{{ image_path($slider->image) }}" alt="Spa Website 1" title=""
                                        id="wows{{ $slider->id }}" />
                                    <!-- <p>Beauty & Harmony Can Coexist</p>
                    <h5>Looking for a Beauty</h5>
                    <button type="button" class="main-slider-btn ">View More</button> -->
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li><img src="https://icms-image.slatic.net/images/ims-web/88f630ac-6ea5-4371-8f8a-85be2b001e32.jpg_1200x1200.jpg"
                                alt="Spa Website 1" title="" id="wows1_0" />
                            <!-- <p>Beauty & Harmony Can Coexist</p>
                    <h5>Looking for a Beauty</h5>
                    <button type="button" class="main-slider-btn ">View More</button> -->
                        </li>
                        <li><img src="https://nikerishotelgroup.com/wp-content/uploads/2018/07/spa-2.jpg" alt="image slider"
                                title="" id="wows1_1" />
                            <!-- <p>Beauty & Harmony Can Coexist</p>
                    <h5>Looking for a Beauty</h5>


                    <button type="button" class="main-slider-btn">View More</button> -->

                        </li>
                        <li><img src="https://www.daffodilhotel.co.uk/media/2098/spa-facilities-1920x1080-2.jpg?mode=pad&quality=80"
                                alt="SPA WEBSITE" title="" id="wows1_2" />
                            <!-- <p>Beauty & Harmony Can Coexist</p>
                    <h5>Looking for a Beauty</h5>
                    <button type="button" class="main-slider-btn ">View More</button> -->
                        </li>
                    @endif
                </ul>
            </div>
            <div class="ws_bullets">
                <div>
                    @if ($sliders->isNotEmpty())
                        @foreach ($sliders as $slider)
                            <a href="wows{{ $slider->id }}" title="Sap Website"><span>{{ $loop->iteration }}</span></a>
                        @endforeach
                    @else
                        <a href="#" title="Sap Website"><span>1</span></a>
                        <a href="#" title="spa website"><span>2</span></a>
                        <a href="#" title="SPA WEBSITE"><span>3</span></a>
                    @endif

                </div>
            </div>
            <div class="ws_shadow"></div>
        </div>
    </section>
    <!-- end-slider -->

    <!-- highlight -->
    <section id="highlight" class="section-padding">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12 text-center d-flex flex-column align-items-center justify-content-center">
                        <h2>Welcome to Senerity Spa</h2>
                        <!-- <h1>Welcome to your spa lab</h1> -->
                        <img src="images/flowericon.png" alt="" width="11%" class="text-center" />
                        <span>Experience the Art of Caring</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($services->isNotEmpty())
                    @foreach ($services as $service)
                        <div class="col g-md-1 g-lg-1" data-aos="fade-up" data-aos-duration="500">
                            <a href="{{ route('category.detail', $service->id) }}">
                                <div class="highlight-box d-flex align-items-center justify-content-center flex-column">
                                    @if ($service->image)
                                        <img src="{{ image_path($service->image) }}" alt="" />
                                    @else
                                        <img src="https://www.sukhothai.in/wp-content/uploads/2017/03/Full-Body-Massage.jpg"
                                            alt="" />
                                    @endif
                                    <h3>{{ $service->title }}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="col g-md-1 g-lg-1" data-aos="fade-up" data-aos-duration="500">
                        <a href="service.html">
                            <div class="highlight-box d-flex align-items-center justify-content-center flex-column">
                                <img src="https://www.sukhothai.in/wp-content/uploads/2017/03/Full-Body-Massage.jpg"
                                    alt="" />
                                <h3>Massage Therapy</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col g-md-1 g-lg-1" data-aos="fade-up" data-aos-duration="700">
                        <a href="hydro-service.html">
                            <div class="highlight-box d-flex align-items-center justify-content-center flex-column">
                                <img src="https://goodspaguide.co.uk/images/uploads/Features/Resized_for_new_site_/Hydrotherapy-2.jpg"
                                    alt="" />
                                <h3>Hydro Therapy</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col g-md-1 g-lg-1" data-aos="fade-up" data-aos-duration="900">
                        <a href="beauty-service.html">
                            <div class="highlight-box d-flex align-items-center justify-content-center flex-column">
                                <img src="https://www.raycochrane.co.uk/wp-content/uploads/2018/02/Woman-with-facial-mask-in-beauty-salon-629570638_5617x3746-1.jpg"
                                    alt="" />
                                <h3>Beauty Therapy</h3>
                            </div>
                        </a>
                    </div>
                @endif

                <div class="col g-md-1 g-lg-1" data-aos="fade-up" data-aos-duration="1000">
                    <a href="{{ route('package') }}">
                        <div class="highlight-box d-flex align-items-center justify-content-center flex-column">
                            <img src="https://miro.medium.com/max/612/1*GS0ohg3qm14E4Ya7fljicw.jpeg" alt="" />
                            <h3>Packages</h3>
                        </div>
                    </a>
                </div>
                <div class="col g-md-1 g-lg-1" data-aos="fade-up" data-aos-duration="1200">
                    <a href="{{ route('gift.card') }}">
                        <div class="highlight-box d-flex align-items-center justify-content-center flex-column">
                            <img src="https://www.invoguespa.com/wp-content/uploads/2018/01/giftcard.jpg"
                                alt="" />
                            <h3>Gift Cards</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
 
    <!-- end-highlight -->

    <!-- teams -->
    <section id="teams-index" class="section-padding">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-md-12 text-center d-flex flex-column align-items-center justify-content-center mb-4">
                        <h2>Reviews</h2>
                        <div class="flower-image">
                            <img src="images/flowericon.png" alt="" width="20%" class="text-center" />
                        </div>
                        <span>The people of Spa wellness story</span>
                    </div>
                </div>
            </div>
              @if($reviews->isNotEmpty())
              <div class="swiper review">
                <div class="swiper-wrapper">
                  @foreach ($reviews as $review)
                   <div class="swiper-slide">
                    <img src="{{image_path($review->image)}}" alt="" width="100%" height="100%">
                  </div>
                  @endforeach                
                </div>
                <div class="swiper-pagination"></div>
              </div>
              @else
              <div class="swiper review">
                <div class="swiper-wrapper">
                  {{-- <div class="swiper-slide">
                    <div class="trip-advisor-section">
                      <div class="trip-icon">
                        <img
                          src="https://static.tacdn.com/img2/brand_refresh/Tripadvisor_lockup_horizontal_secondary_registered.svg"
                          alt="" width="40%">
                      </div>
                      <div class="card-title">
                        <span>Serenity Spa - Kathmandu</span>
                      </div>
        
                      <div class="card-rating mt-3">
                        <p>Tripadvisor Traveler Rating</p>
                        <div class="star d-flex align-items-center">
                          <svg viewBox="0 0 1000 200" class='rating'>
                            <defs>
                              <polygon id="star"
                                points="100,0 131,66 200,76 150,128 162,200 100,166 38,200 50,128 0,76 69,66 " />
                              <clipPath id="stars">
                                <use xlink:href="#star" />
                                <use xlink:href="#star" x="20%" />
                                <use xlink:href="#star" x="40%" />
                                <use xlink:href="#star" x="60%" />
                                <use xlink:href="#star" x="80%" />
                              </clipPath>
                            </defs>
                            <rect class='rating__background' clip-path="url(#stars)"></rect>
                            <!-- Change the width of this rect to change the rating -->
                            <rect width="90%" class='rating__value' clip-path="url(#stars)"></rect>
                          </svg>
                          <span class="review ps-3">42 reviews</span>
                        </div>
                        <div class="trip-ranking mt-2">
                          <p>Tripadvisor Ranking</p>
                        </div>
                      </div>
        
                      <div class="trip-body-section">
                        <div class="trip-card-title mt-3">
                          <h5># Top Spa & Wellness in Kathmandu</h5>
                        </div>
                        <div class="trip-card-body">
                          <p>Recent Traveler Reviews</p>
                          <p>“Relax your mind and body with an Ayurvedic
                            treatment, Shirodhara, hot stone massage
                            and Singing ball an” <a href="#">Read more</a></p>
                          <!-- <p>“Relax your mind and body with an Ayurvedic
                            treatment, Shirodhara” <a href="#">Read more</a></p>
                          <p>“Relax your mind and body with an Ayurvedic
                            treatment, Shirodhara, hot stone ” <a href="#">Read more</a></p> -->
                        </div>
        
                        <div class="review-links d-flex">
                          <a href="#" class="me-2">Read reviews</a>
                          |
                          <a href="#" class="ms-2">Write a review</a>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                  <div class="swiper-slide">
                    <div class="trip-advisor-section">
                      <div class="trip-icon d-flex align-items-center">
                        <img src="https://www.rowanspringfield.com/wp-content/uploads/2016/08/facebook-logo-png.png" alt=""
                          width="8%">
                        <span style="color: black; font-weight: bold;font-size: 24px; margin-left: 5px;">Facebook</span>
                      </div>
                      <div class="card-title">
                        <span>Serenity Spa - Kathmandu</span>
                      </div>
        
                      <div class="card-rating mt-3">
                        <p>Tripadvisor Traveler Rating</p>
                        <div class="star d-flex align-items-center">
                          <svg viewBox="0 0 1000 200" class='rating'>
                            <defs>
                              <polygon id="star"
                                points="100,0 131,66 200,76 150,128 162,200 100,166 38,200 50,128 0,76 69,66 " />
                              <clipPath id="stars">
                                <use xlink:href="#star" />
                                <use xlink:href="#star" x="20%" />
                                <use xlink:href="#star" x="40%" />
                                <use xlink:href="#star" x="60%" />
                                <use xlink:href="#star" x="80%" />
                              </clipPath>
                            </defs>
                            <rect class='rating__background' clip-path="url(#stars)"></rect>
                            <!-- Change the width of this rect to change the rating -->
                            <rect width="90%" class='rating__value' clip-path="url(#stars)"></rect>
                          </svg>
                          <span class="review ps-3">42 reviews</span>
                        </div>
                        <div class="trip-ranking mt-2">
                          <p>Tripadvisor Ranking</p>
                        </div>
                      </div>
        
                      <div class="trip-body-section">
                        <div class="trip-card-title mt-3">
                          <h5># Top Spa & Wellness in Kathmandu</h5>
                        </div>
                        <div class="trip-card-body">
                          <p>Recent Traveler Reviews</p>
                          <p>“Relax your mind and body with an Ayurvedic
                            treatment, Shirodhara, hot stone massage
                            and Singing ball an” <a href="#">Read more</a></p>
                          <!-- <p>“Relax your mind and body with an Ayurvedic
                            treatment, Shirodhara” <a href="#">Read more</a></p>
                          <p>“Relax your mind and body with an Ayurvedic
                            treatment, Shirodhara, hot stone ” <a href="#">Read more</a></p> -->
                        </div>
        
                        <div class="review-links d-flex">
                          <a href="#" class="me-2">Read reviews</a>
                          |
                          <a href="#" class="ms-2">Write a review</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="trip-advisor-section">
                      <div class="trip-icon d-flex align-items-center">
                        <img src="https://www.transparentpng.com/thumb/logo-instagram/z75gfy-instagram-logo-png.png" alt=""
                          width="8%">
                        <span style="color: black; font-weight: bold;font-size: 24px; margin-left: 5px;">Instagram</span>
                      </div>
                      <div class="card-title">
                        <span>Serenity Spa - Kathmandu</span>
                      </div>
        
                      <div class="card-rating mt-3">
                        <p>Tripadvisor Traveler Rating</p>
                        <div class="star d-flex align-items-center">
                          <svg viewBox="0 0 1000 200" class='rating'>
                            <defs>
                              <polygon id="star"
                                points="100,0 131,66 200,76 150,128 162,200 100,166 38,200 50,128 0,76 69,66 " />
                              <clipPath id="stars">
                                <use xlink:href="#star" />
                                <use xlink:href="#star" x="20%" />
                                <use xlink:href="#star" x="40%" />
                                <use xlink:href="#star" x="60%" />
                                <use xlink:href="#star" x="80%" />
                              </clipPath>
                            </defs>
                            <rect class='rating__background' clip-path="url(#stars)"></rect>
                            <!-- Change the width of this rect to change the rating -->
                            <rect width="90%" class='rating__value' clip-path="url(#stars)"></rect>
                          </svg>
                          <span class="review ps-3">42 reviews</span>
                        </div>
                        <div class="trip-ranking mt-2">
                          <p>Tripadvisor Ranking</p>
                        </div>
                      </div>
        
                      <div class="trip-body-section">
                        <div class="trip-card-title mt-3">
                          <h5># Top Spa & Wellness in Kathmandu</h5>
                        </div>
                        <div class="trip-card-body">
                          <p>Recent Traveler Reviews</p>
                          <p>“Relax your mind and body with an Ayurvedic
                            treatment, Shirodhara, hot stone massage
                            and Singing ball an” <a href="#">Read more</a></p>
                          <!-- <p>“Relax your mind and body with an Ayurvedic
                            treatment, Shirodhara” <a href="#">Read more</a></p>
                          <p>“Relax your mind and body with an Ayurvedic
                            treatment, Shirodhara, hot stone ” <a href="#">Read more</a></p> -->
                        </div>
        
                        <div class="review-links d-flex">
                          <a href="#" class="me-2">Read reviews</a>
                          |
                          <a href="#" class="ms-2">Write a review</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-pagination"></div>
              </div>
              @endif
              
          
      

           

        </div>
    </section>
    <!-- end-teams -->

    <!-- blog -->
    <section id="blog-index" class="section-padding">
        <div class="container">
            <div class="section-title mb-5">
                <div class="row">
                    <div class="col-md-12 text-center d-flex flex-column align-items-center justify-content-center">
                        <h2>Latest Blog</h2>
                        <!-- <h1>Welcome to your spa lab</h1> -->
                        <img src="images/flowericon.png" alt="" width="11%" class="text-center" />
                        <span>We love to share our Story & Experience</span>
                    </div>
                </div>
            </div>
            <!-- <div class="row">

                <div class="col-md-6 mt-5">
                  <div class="blog-box d-flex w-100 ">
                    <div class="entry-meta">
                      <a href="" class="entry_format"><i class="fa-solid fa-file-lines"></i></a>
                      <div class="date">
                        <p>May 21 <span> 2014</span></p>
                      </div>
                      <a class="comments"><span class="fa fa-comment"> </span> 2</a>
                    </div>
                    <div class="blog-content ms-3">
                      <div class="image">
                        <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg" alt="" width="100%"
                          height="100%" />
                        <p class="blog-des">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                          Etiam id augue vitae odio accumsan condimentum id in urna.
                          Integer sit amet felis sit amet magna…
                        </p>
                      </div>
                      <div class="entry-details">
                        <div class="entry-title mt-4">
                          <h4>
                            <a>Invest in a Healthy Tomorrow</a>
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-5">
                  <div class="blog-box d-flex w-100">
                    <div class="entry-meta">
                      <a href="" class="entry_format"><i class="fa-solid fa-link"></i>
                      </a>
                      <div class="date">
                        <p>May 21 <span> 2014</span></p>
                      </div>
                      <a class="comments"><span class="fa fa-comment"> </span> 2</a>
                    </div>
                    <div class="blog-content ms-3">
                      <div class="image">
                        <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg" alt="" width="100%"
                          height="100%" />
                        <p class="blog-des">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                          Etiam id augue vitae odio accumsan condimentum id in urna.
                          Integer sit amet felis sit amet magna…
                        </p>
                      </div>
                      <div class="entry-details">
                        <div class="entry-title mt-4">
                          <h4>
                            <a>Invest in a Healthy Tomorrow</a>
                          </h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div> -->
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-box d-flex w-100 ">
                            <div class="blog-content ms-3">
                                <div class="image">
                                    <div class="new-blog-holder">
                                        New Blog
                                    </div>
                                    <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                        alt="" width="100%" />
                                </div>
                                <div class="entry-details">
                                    <div class="entry-title mt-4 text-start">
                                        <span><i class="fa-solid fa-calendar-days"></i> 22 Feb, 2022</span>
                                        <h4>
                                            <a href="blog.html">Invest in a Healthy Tomorrow</a>
                                        </h4>
                                    </div>
                                    <!-- .entry-metadata -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-box d-flex w-100 ">
                            <div class="blog-content ms-3">
                                <div class="image">
                                    <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                        alt="" width="100%" />
                                </div>
                                <div class="entry-details">
                                    <div class="entry-title mt-4 text-start">
                                        <span><i class="fa-solid fa-calendar-days"></i> 22 Feb, 2022</span>
                                        <h4>
                                            <a href="blog.html">Invest in a Healthy Tomorrow</a>
                                        </h4>
                                    </div>
                                    <!-- .entry-metadata -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-box d-flex w-100 ">
                            <div class="blog-content ms-3">
                                <div class="image">
                                    <div class="new-blog-holder">
                                        New Blog
                                    </div>
                                    <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                        alt="" width="100%" />
                                </div>
                                <div class="entry-details">
                                    <div class="entry-title mt-4 text-start">
                                        <span><i class="fa-solid fa-calendar-days"></i> 22 Feb, 2022</span>
                                        <h4>
                                            <a href="blog.html">Invest in a Healthy Tomorrow</a>
                                        </h4>
                                    </div>
                                    <!-- .entry-metadata -->
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section>
    <!-- end-blog -->
@endsection
@push('js')

    <script>
        var swiper = new Swiper(".review", {
            spaceBetween: 50,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script type="text/javascript">
        @foreach($popups as $popup)
          var myModal = new bootstrap.Modal(document.getElementById('myModal{{$popup->id}}'), {})
        myModal.toggle();
        @endforeach

    </script>
@endpush
