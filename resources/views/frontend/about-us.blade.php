@extends('frontend.master')
@push('css')
  <style>
.fullwidth-section-two{
  color: #fff !important
}
    </style>
@endpush
@section('content')

    @if (!is_null($section_one))
    <section id="highlight" class="section-padding">
      <div class="container">
          <div class="section-title">
              <div class="row" data-aos="fade-down" data-aos-duration="1000">
                  <div class="col-md-12 text-center d-flex flex-column align-items-center justify-content-center">
                      <h2>{{$section_one->title}}</h2>
                      <!-- <h1>Welcome to your spa lab</h1> -->
                      <img src="images/flowericon.png" alt="" width="11%" class="text-center" />
                      <span>{{$section_one->title_2}}</span>
                  </div>
                  <div class="website-content text-center">
                      {!!$section_one->description!!}
                  </div>
              </div>
          </div>

          <div class="website-info-content">
              <div class="row flex-wrap align-items-center">
                  <div class="col-md-6">
                      <div class="primary-image" data-aos="fade-right" data-aos-duration="1000">
                        @if ($section_one->image)
                        <img
                        src="{{image_path($section_one->image)}}">
                        @else
                        <img
                        src="https://nihaws.com/images/workshop/1630044218woman-soaking-her-hands-bowl-water-flowers-spa-treatment-product-female-feet-hand-spa-massage-pebble-perfumed-flowers-water-candles-relaxation-flat-lay-top-view.jpg">
                        @endif
                         
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="container" data-aos="fade-left" data-aos-duration="1000">
                         {!!$section_one->description_2!!}
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
      @else
      <section id="highlight" class="section-padding">
        <div class="container">
            <div class="section-title">
                <div class="row" data-aos="fade-down" data-aos-duration="1000">
                    <div class="col-md-12 text-center d-flex flex-column align-items-center justify-content-center">
                        <h2>Welcome to your spa lab</h2>
                        <!-- <h1>Welcome to your spa lab</h1> -->
                        <img src="images/flowericon.png" alt="" width="11%" class="text-center" />
                        <span>A Beautiful Lab for Spa & Beauty.</span>
                    </div>
                    <div class="website-content text-center">
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus voluptatibus numquam
                            tenetur necessitatibus mollitia neque, eaque ut sint, dignissimos iusto doloremque, enim
                            amet dicta. Deserunt architecto tempore assumenda voluptate excepturi.</span>
                    </div>
                </div>
            </div>

            <div class="website-info-content">
                <div class="row flex-wrap align-items-center">
                    <div class="col-md-6">
                        <div class="primary-image" data-aos="fade-right" data-aos-duration="1000">
                            <img
                                src="https://nihaws.com/images/workshop/1630044218woman-soaking-her-hands-bowl-water-flowers-spa-treatment-product-female-feet-hand-spa-massage-pebble-perfumed-flowers-water-candles-relaxation-flat-lay-top-view.jpg">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="container" data-aos="fade-left" data-aos-duration="1000">
                            <div class="info-title">
                                <h3>Info – Short about Us</h3>
                            </div>
                            <div class="about-us-description">
                                <span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio ipsam nam
                                    illum
                                    inventore delectus odio dolores blanditiis asperiores voluptates esse magni, quasi
                                    minima aut dolorum illo laborum recusandae quia explicabo?</span>
                                <ul>
                                    <li>Lorem ipsum dolor sit euismod diam e</li>
                                    <li>Lorem ipsum dolor sit euismod diam e</li>
                                    <li>Lorem ipsum dolor sit euismod diam e</li>
                                </ul>
                                <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque quos ullam
                                    voluptate
                                    consequatur impedit labore perspiciatis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
   
    @if (!is_null($section_two))
    <section id="therapy-chart">
      <div class="fullwidth-section-two skin-bg dark-bg dt-sc-parallax-section" @if ($section_two->image)
        style="background-image:url('{{image_path($section_two->image)}}')"
      @endif>
          <div class="overlay">
              {!!$section_two->description!!}
          </div>
      </div>
  </section>
      @else
      <section id="therapy-chart">
        <div class="fullwidth-section-two skin-bg dark-bg dt-sc-parallax-section" >
            <div class="overlay">
                <h4 style="text-align: center; color: #fff;">AN EXTENSIVE RESOURCE OF SPA TREATMENTS. WE ALSO OFFER HAIR
                    SALONS.</h4>
                <h5 style="text-align: center; color: #fff;">We offer various spa solutions to your needs</h5>
            </div>
        </div>
    </section>
    @endif

@endsection
