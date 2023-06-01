@extends('frontend.master')
@section('content')
<section id="breadcrumb-container"
style="background-image: url(https://spalabdev.wpengine.com/wp-content/themes/spalab/images/breadcrumb-default-bg.jpg)">
<div class="container">
  <div class="row d-flex align-items-center">
    <div class="col-md-6">
      <div class="breadcrumb-left text-start">
        <div class="page-title">
          <h1>Album</h1>
        </div>
        <div class="current-page" style="--bs-breadcrumb-divider:'>>' ;" aria-label="breadcrumb">
          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="index.html"><strong>Home</strong> </a></li>
            <li class="breadcrumb-item active" aria-current="page">Album</li>
          </ol>
        </div>
      </div>

    </div>
  </div>
</div>
</section>

<section id="gallery-section" class="section-padding" >
@if (isset($galleries) && $galleries->isNotEmpty())
<div class="container">
  <div class="row flex-wrap ">
    @php
    $i = 500
  @endphp
    @foreach ($galleries as $gallery )

    <div class="col-md-4 mb-4 p-0" data-aos="flip-left" data-aos-duration="{{$i}}">
      <div class="content border">
        <a href="{{route('gallery.detail',$gallery->id)}}">
          <img class="content-image"
            src="{{image_path($gallery->feature_image)}}">
        </a>
        <div class="album-caption text-center">
          {{$gallery->title}}
        </div>
      </div>
    </div>
    @php
      $i +=500;
    @endphp
    @endforeach
 

  </div>
</div>
@else
<div class="container">
  <div class="row flex-wrap ">
    <div class="col-md-4 mb-4 p-0" data-aos="flip-left" data-aos-duration="500">
      <div class="content border">
        <a href="gallery-detail.html">
          <img class="content-image"
            src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery32-420x291.jpg">
        </a>
        <div class="album-caption text-center">
          Caption goes here
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4 p-0" data-aos="flip-left" data-aos-duration="1000">
      <div class="content border">
        <a href="gallery-detail.html">
          <img class="content-image"
            src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery71-420x291.jpg">
        </a>
        <div class="album-caption text-center">
          Caption goes here
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4 p-0" data-aos="flip-left" data-aos-duration="1500">
      <div class="content border">
        <a href="gallery-detail.html">
          <img class="content-image"
            src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery81-420x291.jpg">
        </a>
        <div class="album-caption text-center">
          Caption goes here
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4 p-0" data-aos="flip-left" data-aos-duration="500">
      <div class="content border">
        <a href="gallery-detail.html">
          <img class="content-image"
            src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery14-420x291.jpg">
        </a>
        <div class="album-caption text-center">
          Caption goes here
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4 p-0" data-aos="flip-left" data-aos-duration="1000">
      <div class="content border">
        <a href="gallery-detail.html">
          <img class="content-image"
            src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/gallery2-420x291.jpg">
        </a>
        <div class="album-caption text-center">
          Caption goes here
        </div>
      </div>
    </div>
  </div>
</div>

@endif
</section>
@endsection