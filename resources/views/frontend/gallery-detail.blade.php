@extends('frontend.master')
@push('css')
<link rel="stylesheet" href="{{asset('frontend/css/lightbox.css')}}" />
@endpush
@section('content')
<section id="breadcrumb-container"
style="background-image: url(https://spalabdev.wpengine.com/wp-content/themes/spalab/images/breadcrumb-default-bg.jpg)">
<div class="container">
    <div class="row d-flex align-items-center">
        <div class="col-md-12">
            <div class="breadcrumb-left text-start">
                <div class="page-title">
                    <h1>Gallery</h1>
                </div>
                <div class="current-page" style="--bs-breadcrumb-divider:'>>' ;" aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html"><strong>Home</strong> </a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="gallery.html">Album</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
<section id="gallery-detail-section" class="section-padding">
<div class="container">
 
    @if (isset($gallery) && $gallery->related_images)
    <div class="gallery-display">
        <div class="row">
            @php
                $i=1;
            @endphp
            @foreach (json_decode($gallery->related_images) as $image )
          
            <div class="col-xxl-4 col-md-4 wow fadeInLeft" data-wow-delay="0.{{$i}}s" style="visibility: visible; -webkit-animation-delay: 0.{{$i}}s; -moz-animation-delay: 0.{{$i}}s; animation-delay: 0.{{$i}}s;">
                <a href="{{image_path($image)}}"
                    data-lightbox="roadtrip"><img
                        src="{{image_path($image)}}"
                        alt="" width="100%"></a>
            </div>
            @php
                $i++;
            @endphp
            @endforeach
         
        
        </div>
    </div>
    @else
    <div class="gallery-display">
        <div class="row">

            <div class="col-xxl-4 col-md-6 wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                <a href="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery2-420x291.jpg"
                    data-lightbox="roadtrip"><img
                        src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery2-420x291.jpg"
                        alt="" width="100%"></a>
            </div>
            <div class=" col-xxl-4 col-md-6 wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; -webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                <a href="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery2-420x291.jpg"
                    data-lightbox="roadtrip"><img
                        src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery2-420x291.jpg"
                        alt="" width="100%"></a>
            </div>
            <div class=" col-xxl-4 col-md-6 wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                <a href="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery2-420x291.jpg"
                    data-lightbox="roadtrip"><img
                        src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery2-420x291.jpg"
                        alt="" width="100%"></a>
            </div>
            <div class=" col-xxl-4 col-md-6 wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                <a href="images/as.jpg"
                    data-lightbox="roadtrip"><img
                        src="images/as.jpg"
                        alt="" width="100%"></a>
            </div>
        </div>
    </div>
    @endif
</div>
</section>
@endsection
@push('js')
<script type="text/javascript" src="{{asset('frontend/js/lightbox.js')}}"></script>
@endpush