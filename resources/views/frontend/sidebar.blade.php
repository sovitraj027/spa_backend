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
          @endforeach
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