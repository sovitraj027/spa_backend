<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{asset('frontend/css/index.css')}}" />
  <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@stack('css')
  <title>{{setting('site-title')}}</title>
</head>

<body>
  <!-- header -->
  <header id="header">
    <div class="topBar">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-md-6">
            <div class="topBar-left">
              <span>"{{setting('site-slogan') ?? ''}}"</span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="topBar-right d-flex align-items-center justify-content-end">
              <i class="fa fa-phone-square me-2"> </i> {{setting('site-phone')}}
              <a href=""><i class="fa-solid fa-envelope"> </i> {{setting('site-email')}} </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
          <!-- <img src="images/serenity-logo.png" alt="" /> -->
          <h1 class="m-0">
              @if ($logo = setting('logo'))
              <img src="{{asset($logo)}}" alt="">

              @else

              <img src="{{asset('frontend/images/serenity-logo.png')}}" alt="">
                  
              @endif
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="{{url('/')}}">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'aboutus') ? 'active' : '' }}" href="{{route('aboutus')}}">About Us </a>
            </li>
            <li class="nav-item">
              <a href="{{route('services')}}" class="nav-link {{ (\Request::route()->getName() == 'services') ? 'active' : '' }} " href="service.html">Services </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'gallery') ? 'active' : '' }}" href="{{route('gallery')}}"> Gallery </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'contact') ? 'active' : '' }}" href="{{route('contact')}}"> Contact </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (\Request::route()->getName() == 'blog') ? 'active' : '' }}" href="{{route('blog')}}"> Blog </a>
            </li>
          </ul>
        </div>
        <!-- navbar-collapse.// -->
      </div>
      <!-- container-fluid.// -->
    </nav>
  </header>
  <!-- end-header -->
@yield('content')

  <!-- footer -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12 logo-footer d-flex justify-content-center">
            @if ($logo )
            <img src="{{asset($logo)}}" alt="">

            @else

            <img src="{{asset('frontend/images/serenity-logo.png')}}" alt="">
                
            @endif
           
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 pt-2 pb-5">
            <div class="ico-border d-flex align-items-center">
              <span></span>
              <i class="fas fa-fan me-3 ms-3"></i>
              <span></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-4">
            <div class="footer-box">
              <h3 class="widgettitle">
                Spa Lab Location<i class="fas fa-fan"></i>
              </h3>
              <div class="footer-content">
                <p class="address d-flex">
                  <i class="fa fa-location-arrow"></i>
                  <span class="ms-1">{{setting('site-title') ? setting('site-title')  : 'Serenity Spa'}}<br />{{setting('site-phone') ? setting('site-phone')  : '+977 981-013-567'}} <br />
                    {{setting('site-address') ? setting('site-address')  : 'Maitidevi, Kathmandu'}} <br />{{setting('site-branch') ? setting('site-branch')  : ''}}</span>
                </p>
                <p class="contact-info">
                  <i class="fa fa-envelope"></i>
                  <a href="#">{{setting('site-email') ? setting('site-email')  : ''}}</a>
                </p>
                <a class="footer-btn" href="{{route('contact')}}">Give us a Message</a>
              </div>
            </div>
          </div>
         
          <div class="col-md-3 mb-4">
            <div class="footer-box">
              <h3 class="widgettitle">
                Our Gallery<i class="fas fa-fan"></i>
              </h3>
              <div class="footer-content">
                @if (isset($galleries))
                <ul class="gallery">
                  @foreach ($galleries as $gallery )
                  <li>
                    <a href="{{route('gallery.detail',$gallery->id)}}" target="__blank">
                      <img src="{{image_path($gallery->feature_image)}}" width="100%"
                        height="100%" alt="" />
                      <div class="item ms-3">
                        <h6 class="title">{{$gallery->title}}</h6>
                        <p>
                          {{-- Lorem Ipsum is simply dummy text of the printing
                          andtypesetting... --}}
                        </p>
                      </div>
                    </a>
                  </li>
                  @endforeach
           
                </ul>
                @else
                <ul class="gallery">
                  <li>
                    <a href="">
                      <img src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery2.jpg" width="100%"
                        height="100%" alt="" />
                      <div class="item ms-3">
                        <h6 class="title">Lorem Ipsum</h6>
                        <p>
                          Lorem Ipsum is simply dummy text of the printing
                          andtypesetting...
                        </p>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="">
                      <img src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery2.jpg" width="100%"
                        height="100%" alt="" />
                      <div class="item ms-3">
                        <h6 class="title">Lorem Ipsum</h6>
                        <p>
                          Lorem Ipsum is simply dummy text of the printing
                          andtypesetting...
                        </p>
                      </div>
                    </a>
                  </li>
                </ul>
                @endif
            
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="footer-box">
              <h3 class="widgettitle">
                Find us and Say HI<i class="fas fa-fan"></i>
              </h3>
              <div class="footer-content">
                <ul class="social-links">
                  <li>
                    <a target="__blank" href="{{setting('facebook-url') }}"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a target="__blank" href="{{setting('youtube-url') }}"><i class="fab fa-youtube"></i> </a>
                  </li>
                  <li>
                    <a target="__blank" href="{{setting('instagram-url') }}"><i class="fab fa-instagram"></i> </a>
                  </li>
                  <li>
                    <a target="__blank" href="{{setting('tiktok-url') }}"><i class="fab fa-tiktok"></i> </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="footer-box">
              <h3 class="widgettitle">
               Blogs<i class="fas fa-fan"></i>
              </h3>
             
              @if (isset($single_blog))
              <div class="footer-content">
                <div class="footer-news">
                  <img src="{{image_path($single_blog->image)}}" alt="" />
                  <div class="promo-details">
                    <p>{{$single_blog->title_1}}</p>
                    <a href="#">Read More....</a>
                  </div>
                </div>
              </div>
              @else
              <div class="footer-content">
                <div class="footer-news">
                  <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/05/spa-promo-ad.jpg" alt="" />
                  <div class="promo-details">
                    <p>Special offers - 15% offer on Spa</p>
                    <a href="#">Read More....</a>
                  </div>
                </div>
              </div>
              @endif
       
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-md-6">
            <div class="copyright-content">
              Copyright © 2022 spa All Rights Reserved |
              <a href="http://themeforest.net/user/designthemes" title="">
                All Star Technology
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <ul>
              <li><a href="{{route('services')}}">Services</a></li>
              {{-- <li><a href="">Policy</a></li> --}}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- slider js -->
  <script type="text/javascript" src="{{asset('frontend/js/jquery.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/js/wowslider.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Counts JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
  <script src="{{asset('frontend/js/main.js')}}"></script>
  <script src="{{asset('frontend/js/animation.js')}}"></script>
  <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  {!! Toastr::message() !!}
  <script>
   
    @if ($errors->any())
        @foreach ( $errors->all() as $error )
          toastr.error("{{$error}}");
        @endforeach
    @endif
    </script>
  @stack('js')
</body>

</html>