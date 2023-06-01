<div class="nk-header nk-header-fixed nk-header-fluid is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="{{route('admin.index')}}" class="logo-link">
                    
                    @if ($fav = setting('site-logo'))
                    <img class="logo-light logo-img" src="{{image_path($fav )}}" srcset="{{image_path($fav )}} 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{image_path($fav )}}" srcset="{{image_path($fav )}} 2x" alt="logo-dark">
                    @else
                    <img class="logo-light logo-img" src="{{asset('backend/images/logo-small.png')}}" srcset="{{asset('backend/images/logo-small2x.png')}} 2x" alt="logo">
                    <img class="logo-dark logo-img" src="{{asset('backend/images/logo-dark-small.png')}}" srcset="{{asset('backend/images/logo-dark-small2x.png')}} 2x" alt="logo-dark">
                    @endif
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-search ml-3 ml-xl-0">
                <em class="icon ni ni-search"></em>
                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search anything">
            </div><!-- .nk-header-news -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    
                
                
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <div class="dropdown-inner user-card-wrap bg-lighter">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>{{substr(strtoupper(Auth::user()->name), 0, 1)}}</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{Auth::user()->name}}</span>
                                        <span class="sub-text">{{Auth::user()->email}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="{{route('admin.settings.index')}}"><em class="icon ni ni-setting-alt"></em><span>Site Setting</span></a></li>
                                    
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit() "><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
   
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>