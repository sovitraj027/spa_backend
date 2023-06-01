@extends('frontend.master')
@section('content')

<section id="breadcrumb-container"
style="background-image: url(https://spalabdev.wpengine.com/wp-content/themes/spalab/images/breadcrumb-default-bg.jpg)">
<div class="container">
    <div class="row d-flex align-items-center">
        <div class="col-md-6">
            <div class="breadcrumb-left text-start">
                <div class="page-title">
                    <h1>Blog</h1>
                </div>
                <div class="current-page" style="--bs-breadcrumb-divider:'>>' ;" aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item"><a href="index.html"><strong>Home</strong> </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </div>
            </div>

        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>
</section>
<section id="blog-container" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="blogger mb-5">
                        @if (isset($blogs) && $blogs->isNotEmpty())
                        @foreach ($blogs->chunk(3) as $blog_data )
                 
                        <div class="row mb-3">
                            @php
                                $int = 500;
                            @endphp
                            @foreach ($blog_data as $blog )
                            <div class="col-md-4" data-aos="fade-up" data-aos-duration="{{$int}}">
                                <div class="blog-box w-100 ">
                                    <div class="blog-content ms-3">
                                        <div class="image">
                                            <a href="{{route('blog.detail',$blog->id)}}">
                                                <img src="{{image_path($blog->image)}}"
                                                    alt="" width="100%" height="auto" />
                                                <p class="blog-des">
                                                    {{$blog->short_description}}
                                                </p>
                                            </a>
                                        </div>
                                        <div class="entry-details">
                                            <div class="entry-title mt-4">
                                                <h4>
                                                    <a href="{{route('blog.detail',$blog->id)}}" style="color: black;">{{$blog->title_1}}</a>
                                                </h4>
                                                <div class="date d-flex  align-items-center">
                                                    <i class="fa-solid fa-calendar-days pe-2"></i>
                                                    <span>{{\Carbon\Carbon::parse($blog->created_at)->format('M d , Y')}}</span>
                                                </div>
                                            </div>

                                            <!-- .entry-metadata -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $int+=500;
                            @endphp
                            @endforeach
                       
                         
                        </div>
                        @endforeach
                         @else
                        <div class="row mb-3">
                            <p>No Result Found!!</p>
                        </div>
                        {{-- <div class="row mb-3">
                            <div class="col-md-4" data-aos="fade-up" data-aos-duration="500">
                                <div class="blog-box w-100 ">
                                    <div class="blog-content ms-3">
                                        <div class="image">
                                            <a href="{{route('blog.detail',$blog->id)}}">
                                                <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                                    alt="" width="100%" height="auto" />
                                                <p class="blog-des">
                                                    Blog info....
                                                </p>
                                            </a>
                                        </div>
                                        <div class="entry-details">
                                            <div class="entry-title mt-4">
                                                <h4>
                                                    <a href="{{route('blog.detail',$blog->id)}}" style="color: black;">Invest in a
                                                        Healthy
                                                        Tomorrow</a>
                                                </h4>
                                                <div class="date d-flex  align-items-center">
                                                    <i class="fa-solid fa-calendar-days pe-2"></i>
                                                    <span>May 21 2014</span>
                                                </div>
                                            </div>

                                            <!-- .entry-metadata -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                                <div class="blog-box w-100 ">
                                    <div class="blog-content ms-3">
                                        <div class="image">
                                            <a href="{{route('blog.detail',$blog->id)}}">
                                                <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                                    alt="" width="100%" height="auto" />
                                                <p class="blog-des">
                                                    Blog Info.......
                                                </p>
                                            </a>
                                        </div>
                                        <div class="entry-details">
                                            <div class="entry-title mt-4">
                                                <h4>
                                                    <a href="blog-detail.html" style="color: black;">Invest in a
                                                        Healthy
                                                        Tomorrow</a>
                                                </h4>
                                                <div class="date d-flex  align-items-center">
                                                    <i class="fa-solid fa-calendar-days pe-2"></i>
                                                    <span>May 21 2014</span>
                                                </div>
                                            </div>
                                            <!-- .entry-metadata -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">
                                <div class="blog-box w-100 ">
                                    <div class="blog-content ms-3">
                                        <div class="image">
                                            <a href="blog-detail.html">
                                                <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                                    alt="" width="100%" height="auto" />
                                                <p class="blog-des">
                                                    Blog Info.......
                                                </p>
                                            </a>
                                        </div>
                                        <div class="entry-details">
                                            <div class="entry-title mt-4">
                                                <h4>
                                                    <a href="blog-detail.html" style="color: black;">Invest in a
                                                        Healthy
                                                        Tomorrow</a>
                                                </h4>
                                                <div class="date d-flex  align-items-center">
                                                    <i class="fa-solid fa-calendar-days pe-2"></i>
                                                    <span>May 21 2014</span>
                                                </div>
                                            </div>
                                            <!-- .entry-metadata -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4" data-aos="fade-up" data-aos-duration="500">
                                <div class="blog-box w-100 ">
                                    <div class="blog-content ms-3">
                                        <div class="image">
                                            <a href="blog-detail.html">
                                                <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                                    alt="" width="100%" height="auto" />
                                                <p class="blog-des">
                                                    Blog info....
                                                </p>
                                            </a>
                                        </div>
                                        <div class="entry-details">
                                            <div class="entry-title mt-4">
                                                <h4>
                                                    <a href="blog-detail.html" style="color: black;">Invest in a
                                                        Healthy
                                                        Tomorrow</a>
                                                </h4>
                                                <div class="date d-flex  align-items-center">
                                                    <i class="fa-solid fa-calendar-days pe-2"></i>
                                                    <span>May 21 2014</span>
                                                </div>
                                            </div>

                                            <!-- .entry-metadata -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000">
                                <div class="blog-box w-100 ">
                                    <div class="blog-content ms-3">
                                        <div class="image">
                                            <a href="blog-detail.html">
                                                <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                                    alt="" width="100%" height="auto" />
                                                <p class="blog-des">
                                                    Blog Info.......
                                                </p>
                                            </a>
                                        </div>
                                        <div class="entry-details">
                                            <div class="entry-title mt-4">
                                                <h4>
                                                    <a href="blog-detail.html" style="color: black;">Invest in a
                                                        Healthy
                                                        Tomorrow</a>
                                                </h4>
                                                <div class="date d-flex  align-items-center">
                                                    <i class="fa-solid fa-calendar-days pe-2"></i>
                                                    <span>May 21 2014</span>
                                                </div>
                                            </div>
                                            <!-- .entry-metadata -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1500">
                                <div class="blog-box w-100 ">
                                    <div class="blog-content ms-3">
                                        <div class="image">
                                            <a href="blog-detail.html">
                                                <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                                    alt="" width="100%" height="auto" />
                                                <p class="blog-des">
                                                    Blog Info.......
                                                </p>
                                            </a>
                                        </div>
                                        <div class="entry-details">
                                            <div class="entry-title mt-4">
                                                <h4>
                                                    <a href="blog-detail.html" style="color: black;">Invest in a
                                                        Healthy
                                                        Tomorrow</a>
                                                </h4>
                                                <div class="date d-flex  align-items-center">
                                                    <i class="fa-solid fa-calendar-days pe-2"></i>
                                                    <span>May 21 2014</span>
                                                </div>
                                            </div>
                                            <!-- .entry-metadata -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        @endif
                    </div>
                    {{-- <nav
                        aria-label="Page navigation example d-flex justify-content-start justify-content-md-end justify-content-sm-end ">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next <i
                                        class="fa-solid fa-angles-right"></i></a></li>
                        </ul>
                    </nav> --}}
                    {{$blogs->links()}}
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12"  data-aos="fade-left" data-aos-duration="1000">
                <form action="{{route('search.blog')}}" method="get">
               
                <div class="blog-search-bar">
                    <div class="search-bar d-flex">
                     
                            <input type="search" value="{{isset($search) ? $search : ''}}" name="search" id="form1" class="form-control" placeholder="Enter Keyword" />
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                       
                  
                    </div>
                </div>
            </form>
                <div class="recent-gallery">
                    <div class="product-sub-header">
                        <h6>Recent Galleries</h6>
                    </div>
                    @if ($latest_gallery->isNotEmpty())
                        @foreach ($latest_gallery as $gallery )
                        <div class="sub-gallery mt-3">
                            <img src="{{image_path($gallery->feature_image)}}"
                                width="40%" height="40%" alt="" />
                            <div class="item ms-3">
                                <h6 class="title">{{$gallery->title}}</h6>
                                {{-- <p>
                                    Lorem Ipsum is simply dummy text of the printing
                                    andtypese...
                                </p> --}}
                            </div>
                            </a>
    
                        </div>
                        @endforeach
                        @else
                        <div class="sub-gallery mt-3">
                            <img src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery2.jpg"
                                width="40%" height="40%" alt="" />
                            <div class="item ms-3">
                                <h6 class="title">Lorem Ipsum</h6>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing
                                    andtypese...
                                </p>
                            </div>
                            </a>
    
                        </div>
    
                        <div class="sub-gallery mt-3">
                            <img src="https://spalabdev.wpengine.com/wp-content/uploads/2015/11/dt-gallery11.jpg"
                                width="40%" height="40%" alt="" />
                            <div class="item ms-3">
                                <h6 class="title">Lorem Ipsum</h6>
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing
                                    andtypese...
                                </p>
                            </div>
                            </a>
    
                        </div>
                    @endif
                 
                </div>
                {{-- <div class="sub-archives" >
                    <div class="product-sub-header">
                        <h6>Archives</h6>
                    </div>
                    <div class="sub-archive-date mt-3">
                        <a href="#"><i class="fa-solid fa-calendar"></i> May 2014</a>
                    </div>

                </div> --}}
                @if ($latest_posts->isNotEmpty())
                <div class="latest-post">
                    <div class="product-sub-header">
                        <h6>Latest Posts</h6>
                    </div>
                    @foreach ($latest_posts as $latest_post )
                    <div class="sub-latest-post">
                        <div class="post-thumb mt-4">
                            <a href="#">
                                <img src="{{image_path($latest_post->image)}}"
                                    alt="" width="30%">
                            </a>
                        </div>

                        <h4>{{$latest_post->title_1}}</h4>
                        <p>{{\Illuminate\Support\Str::limit($latest_post->short_description,50)}}
                        </p>

                        <div class="post-meta d-flex">
                            <p class="author"><i class="fa-solid fa-user"> </i><a href="#"> {{$blog->author}}</a></p>
                            <p class="date"><i class="fa-solid fa-calendar-days"></i> {{\Carbon\Carbon::parse($blog->created_at)->format('M d,Y')}}</p>
                            {{-- <p><a href="#"><i class="fa-solid fa-comments"></i> 2</a></p> --}}
                        </div>
                    </div>
                    @endforeach
                 

                 
                </div>
                @else
                <div class="latest-post">
                    <div class="product-sub-header">
                        <h6>Latest Posts</h6>
                    </div>

                    <div class="sub-latest-post">
                        <div class="post-thumb mt-4">
                            <a href="#">
                                <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                    alt="" width="30%">
                            </a>
                        </div>

                        <h4>Invest in a Healthy...</h4>
                        <p>Lorem ipsum dolor sit amet consetur adipisicing elit. Temporibus
                            necessitatibus
                            illum eius
                            quisquam
                        </p>

                        <div class="post-meta d-flex">
                            <p class="author"><i class="fa-solid fa-user"> </i><a href="#"> admin</a></p>
                            <p class="date"><i class="fa-solid fa-calendar-days"></i> May 21 2014</p>
                            <p><a href="#"><i class="fa-solid fa-comments"></i> 2</a></p>
                        </div>
                    </div>

                    <div class="sub-latest-post">
                        <div class="post-thumb mt-4">
                            <a href="#">
                                <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                    alt="" width="30%">
                            </a>
                        </div>

                        <h4>Invest in a Healthy...</h4>
                        <p>Lorem ipsum dolor sit amet consetur adipisicing elit. Temporibus
                            necessitatibus
                            illum eius
                            quisquam
                        </p>

                        <div class="post-meta d-flex">
                            <p class="author"><i class="fa-solid fa-user"> </i><a href="#"> admin</a></p>
                            <p class="date"><i class="fa-solid fa-calendar-days"></i> May 21 2014</p>
                            <p><a href="#"><i class="fa-solid fa-comments"></i> 2</a></p>
                        </div>
                    </div>
                </div>
                @endif
                {{-- <div class="latest-post">
                    <div class="product-sub-header">
                        <h6>Latest Posts</h6>
                    </div>

                    <div class="sub-latest-post">
                        <div class="post-thumb mt-4">
                            <a href="#">
                                <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                    alt="" width="30%">
                            </a>
                        </div>

                        <h4>Invest in a Healthy...</h4>
                        <p>Lorem ipsum dolor sit amet consetur adipisicing elit. Temporibus
                            necessitatibus
                            illum eius
                            quisquam
                        </p>

                        <div class="post-meta d-flex">
                            <p class="author"><i class="fa-solid fa-user"> </i><a href="#"> admin</a></p>
                            <p class="date"><i class="fa-solid fa-calendar-days"></i> May 21 2014</p>
                            <p><a href="#"><i class="fa-solid fa-comments"></i> 2</a></p>
                        </div>
                    </div>

                    <div class="sub-latest-post">
                        <div class="post-thumb mt-4">
                            <a href="#">
                                <img src="https://spalabdev.wpengine.com/wp-content/uploads/2014/07/blog18.jpg"
                                    alt="" width="30%">
                            </a>
                        </div>

                        <h4>Invest in a Healthy...</h4>
                        <p>Lorem ipsum dolor sit amet consetur adipisicing elit. Temporibus
                            necessitatibus
                            illum eius
                            quisquam
                        </p>

                        <div class="post-meta d-flex">
                            <p class="author"><i class="fa-solid fa-user"> </i><a href="#"> admin</a></p>
                            <p class="date"><i class="fa-solid fa-calendar-days"></i> May 21 2014</p>
                            <p><a href="#"><i class="fa-solid fa-comments"></i> 2</a></p>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</section>
@endsection