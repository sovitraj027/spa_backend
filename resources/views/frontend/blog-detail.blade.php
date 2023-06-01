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
                        <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                    </ol>
                </div>
            </div>

        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>
</section>


<section id="blog-detail-container" class="section-padding">
<div class="container">
    <div class="blog-box w-100 ">
        <div class="entry-meta w-0">
            <a href="" class="entry_format"><i class="fa-solid fa-file-lines"></i></a>
            <div class="date">
                <p>{{\Carbon\Carbon::parse($blog->created_at)->format('M D')}} <span> {{\Carbon\Carbon::parse($blog->created_at)->format('Y')}}</span></p>
            </div>
            {{-- <a class="comments"><span class="fa fa-comment"> </span> 2</a> --}}
        </div>
        <div class="blog-content ms-3">
            <div class="image">
                <a href="{{route('blog.detail',$blog->id)}}">
                    <img src="{{image_path($blog->image)}}" alt=""
                        width="100%" height="auto" />
                </a>
            </div>
            <div class="entry-details">
                <div class="entry-title mt-4">
                    <h4>
                        <a>{{$blog->title_1}}</a>
                    </h4>
                </div>
                <div class="entry-metadata mt-4 d-flex align-items-center">
                    <p class="author">
                        <span class="fa fa-user me-1"> </span><a>{{$blog->author}}</a>
                    </p>
                    <p class="tags">
                        <span class="fa fa-tags me-1"> </span><a rel="tag">{{$blog->category->title}}</a>
                    </p>
                    {{-- <p class="categories">
                        <span class="fa fa-folder-open me-1"> </span><a>wellness-center,
                            Yoga</a>
                    </p> --}}
                </div>
                <!-- .entry-metadata -->
            </div>
            <div class="blog-detail-description mt-3">
                <span>
                    <p>
                      {{$blog->short_description}}
                    </p>
                </span>
                {!!$blog->description!!}
                {{-- <div class="row">
                    <div class="col-md-7">
                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem aspernatur
                            reiciendis est vitae voluptate quos, autem distinctio vero voluptatum mollitia ipsam
                            ab
                            at dolorum ea atque necessitatibus quae commodi inventore? autem distinctio vero
                            voluptatum mollitia ipsam
                            abautem distinctio vero voluptatum mollitia ipsam
                        </p>
                    </div>
                    <div class="col-md-5">
                        <div class="bold-detail-desc">
                            <strong>
                                <p>" Lorem ipsum dolor, sit amet consectetur adipisicing elit autem distinctio
                                    vero voluptatum mollitia ipsam ab
                                    at dolorum ea atque necessitatibus. "</p>
                            </strong>
                        </div>
                    </div>
                </div>
                <div class="second-paragraph ">
                    <div class="div-secondary-title">
                        <span>
                            <p>
                                " Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error ipsum
                                arc consequatur odio quae? Lorem ipsum dolor sit amet,
                                "
                            </p>
                        </span>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Est amet odit,
                        dignissimos
                        consectetur libero corrupti voluptates, dicta vero facere officiis aliquam vitae
                        eum
                        dolor et ipsum magni consequatur odio quae? Lorem ipsum dolor sit amet,
                        consectetur
                        adipisicing elit. Deleniti magni enim minima nisi earum ea numquam aliquam
                        necessitatibus? Commodi porro officia vero sequi facere, repudiandae optio dolor
                        error
                        laboriosam ducimus. Commodi porro officia vero sequi facere, repudiandae optio
                        dolor
                        error
                        laboriosam ducimus. Deleniti magni enim minima nisi earum ea numquam aliquam
                        necessitatibus? Commodi porro officia vero sequi facere, repudiandae optio dolor
                        error
                        laboriosam ducimus. Commodi porro officia vero sequi facere, repudiandae optio
                        dolor
                        error
                        laboriosam ducimus.
                    </p>
                </div>

                <div class="col-md-12">
                    <div class="final-paragraph">
                        <p>" Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, neque eius iste ea
                            odio ex "</p>
                    </div>
                </div> --}}

                <!-- <div class="col-md-12 mt-4">
                    <div class="author-comment-card">
                        <div class="detail-author-title">
                            <h4>Author Info</h4>
                        </div>

                        <div class="card mb-3" style="max-width: 100%;padding:15px 20px 0 20px;">
                            <div class="row g-0">
                                <div class="col-md-1 p-0 m-0">
                                    <img src="https://secure.gravatar.com/avatar/ec22c65216a7a00e86a95568f5682037?s=96&d=mm&r=g"
                                        class="img-fluid " alt="author img">
                                </div>
                                <div class="col-md-11 p-0 m-0">
                                    <div class="card-body">
                                        <h5 class="card-title">admin</h5>
                                        <p class="card-text">It is a long established fact that a reader will be
                                            distracted by the readable content of a page when looking at its
                                            layout. The point of using Lorem Ipsum is that it has a more-or-less
                                            normal.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
<!-- 
    <section id="blog-comment-container">
        <div class="blog-comment-title">
            <h4>Comments ( 2 )</h4>
        </div>
        <div class="display-comment-section">
            <div class="card mb-3 mt-4" style="max-width: 100%;padding:15px 20px 0 0;">
                <div class="row g-0">
                    <div class="col-md-1 p-0 m-0">
                        <img src="https://secure.gravatar.com/avatar/ec22c65216a7a00e86a95568f5682037?s=96&d=mm&r=g"
                            class="img-fluid " alt="author img">
                    </div>
                    <div class="col-md-11 p-0 m-0">
                        <div class="card-body">
                            <div class="card-main-container d-flex justify-content-between mb-2">
                                <div class="card-group-one">
                                    <h5 class="card-title"><i class="fa-solid fa-user"></i> &nbsp; Vennila</h5>
                                    <p class="card-text"><small class="text-muted">16 Feb 2015</small></p>
                                </div>
                                <div class="card-group-two">
                                    <button type="button" class="btn btn-primary">Reply</button>
                                </div>
                            </div>
                            
                            <p class="card-text">sit amet sem. Nullam dignissim convallis est. Quisque aliquam.
                                Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Praesent mattis,
                                massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam
                                eget metus. Lorem ipsum dolor sit amet, consectetur ad</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 mt-4" style="max-width: 100%;padding:15px 20px 0 0;">
                <div class="row g-0">
                    <div class="col-md-1 p-0 m-0">
                        <img src="https://secure.gravatar.com/avatar/ec22c65216a7a00e86a95568f5682037?s=96&d=mm&r=g"
                            class="img-fluid " alt="author img">
                    </div>
                    <div class="col-md-11 p-0 m-0">
                        <div class="card-body">
                            <div class="card-main-container d-flex justify-content-between mb-2">
                                <div class="card-group-one">
                                    <h5 class="card-title"><i class="fa-solid fa-user"></i> &nbsp; Admin</h5>
                                    <p class="card-text"><small class="text-muted">16 Feb 2015</small></p>
                                </div>
                                <div class="card-group-two">
                                    <button type="button" class="btn btn-primary">Reply</button>
                                </div>
                            </div>
                            
                            <p class="card-text">sit amet sem. Nullam dignissim convallis est. Quisque aliquam.
                                Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Praesent mattis,
                                massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam
                                eget metus. Lorem ipsum dolor sit amet, consectetur ad</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="comment-form-container">
            <div class="blog-comment-title">
                <h4>Post a Comment</h4>
            </div>
            <form>
            <div class="mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Your Message" rows="8" cols="5"></textarea>
              </div>
              <div class="row mb-0">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Your Name" aria-label="Your Name">
                </div>
                <div class="col">
                  <input type="email" class="form-control" placeholder="email" aria-label="Your Email">
                </div>
              </div>
              <div class="mb-3">
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Website">
              </div>
              <button type="button" class="btn btn-primary"><a href="#"> Comment </a></button>
            </form>
        </div>
    </section> -->

</div>
</section>
@endsection