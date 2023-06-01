<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-bar">
        <div class="nk-apps-brand">
            <a href="{{route('admin.index')}}" class="logo-link">
                @if ($fav = setting('favicon'))
                <img class="logo-light logo-img" src="{{image_path($fav )}}" srcset="{{image_path($fav )}} 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{image_path($fav )}}" srcset="{{image_path($fav )}} 2x" alt="logo-dark">
                @else
                <img class="logo-light logo-img" src="{{asset('backend/images/logo-small.png')}}" srcset="{{asset('backend/images/logo-small2x.png')}} 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('backend/images/logo-dark-small.png')}}" srcset="{{asset('backend/images/logo-dark-small2x.png')}} 2x" alt="logo-dark">
                @endif
             
            </a>
        </div>
        <div class="nk-sidebar-element">
            <div class="nk-sidebar-body">
                <div class="nk-sidebar-content" data-simplebar>
                    <div class="nk-sidebar-menu" >
                        <!-- Menu -->
                        <ul class="nk-menu apps-menu ">
                            <li class="nk-menu-item active" data-toggle="tooltip" data-placement="right" title="Homepage">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navHospital">
                                    <span class="nk-menu-icon"><em class="icon ni ni-plus-medi"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-item " data-toggle="tooltip" data-placement="right" title="About us">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navDashboards">
                                    <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-item" data-toggle="tooltip" data-placement="right" title="Gallery">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navApps">
                                    <span class="nk-menu-icon"><em class="icon ni ni-menu-circled"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-item" data-toggle="tooltip" data-placement="right" title="Services">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navPages" >
                                    <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-item" data-toggle="tooltip" data-placement="right" title="Blogs">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navMisc">
                                    <span class="nk-menu-icon"><em class="icon ni ni-server"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-item" data-toggle="tooltip" data-placement="right" title="Gift Cards">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navError">
                                    <span class="nk-menu-icon"><em class="icon ni ni-alert-c"></em></span>
                                </a>
                            </li>
                            <li class="nk-menu-hr"></li>
                            <li class="nk-menu-item" data-toggle="tooltip" data-placement="right" title="Contact">
                                <a href="#" class="nk-menu-link nk-menu-switch" data-target="navComponents">
                                    <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="nk-sidebar-footer">
                        <ul class="nk-menu nk-menu-md apps-menu">
                            <li class="nk-menu-item" >
                                <a href="{{route('admin.settings.index')}}" class="nk-menu-link" title="Settings">
                                    <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="nk-sidebar-profile nk-sidebar-profile-fixed dropdown">
                    <a href="#" data-toggle="dropdown" data-offset="50,-50">
                        <div class="user-avatar">
                            <span>{{substr(strtoupper(Auth::user()->name), 0, 1)}}</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md ml-4">
                        <div class="dropdown-inner user-card-wrap d-none d-md-block">
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
                                <li><a href=""><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="{{route('admin.settings.index')}}"><em class="icon ni ni-setting-alt"></em><span>Site Setting</span></a></li>
                            </ul>
                        </div>
                        <div class="dropdown-inner">
                            <ul class="link-list">
                                <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit() "><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nk-sidebar-main is-light">
        <div class="nk-sidebar-inner" data-simplebar>
            <div class="nk-menu-content  menu-active" data-content="navHospital">
                <h5 class="title">Homepage</h5>
                
                <ul class="nk-menu">
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('admin.homepage.sliders.index')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Sliders</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.homepage.sliders.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Slider</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.homepage.sliders.index')}}" class="nk-menu-link"><span class="nk-menu-text">Slider List</span></a>
                            </li>
                         
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('admin.homepage.popups.index')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Popop</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.homepage.popups.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Popup</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.homepage.popups.index')}}" class="nk-menu-link"><span class="nk-menu-text">Popup List</span></a>
                            </li>
                         
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('admin.homepage.reviews.index')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Review</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.homepage.reviews.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Review</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.homepage.reviews.index')}}" class="nk-menu-link"><span class="nk-menu-text">Review List</span></a>
                            </li>
                         
                        </ul><!-- .nk-menu-sub -->
                    </li>
                   
                    {{-- <li class="nk-menu-item">
                        <a href="{{route('admin.homepage.section-one.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Section 1</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('admin.homepage.section-two.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Section 2</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('admin.homepage.section-three.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Section 3</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('admin.homepage.section-four.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Section 4</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('admin.homepage.section-five.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Section 5</span>
                        </a>
                    </li><!-- .nk-menu-item --> --}}
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navDashboards">
                <h5 class="title">About</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('admin.about-us.banner.create')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">About us</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.about-us.banner.create')}}" class="nk-menu-link"><span class="nk-menu-text">Banner </span></a>
                            </li>
                            {{-- <li class="nk-menu-item">
                                <a href="{{route('admin.about-us.section-one.create')}}" class="nk-menu-link"><span class="nk-menu-text">Company History</span></a>
                            </li> --}}
                            <li class="nk-menu-item">
                                <a href="{{route('admin.about-us.section-two.create')}}" class="nk-menu-link"><span class="nk-menu-text">About Us Section</span></a>
                            </li>
                         
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    {{-- <li class="nk-menu-item has-sub">
                        <a href="{{route('admin.teams.banner.create')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Teams</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.teams.banner.create')}}" class="nk-menu-link"><span class="nk-menu-text">Banner</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.teams.list')}}" class="nk-menu-link"><span class="nk-menu-text">Team List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.teams.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Team</span></a>
                            </li>
                         
                        </ul><!-- .nk-menu-sub -->
                    </li> --}}
                    <!-- .nk-menu-item -->
    
                </ul><!-- .nk-menu -->
            </div>
           
            <div class="nk-menu-content" data-content="navApps">
                <h5 class="title">Gallery</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{route('admin.services.banner.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-inbox-fill"></em></span>
                            <span class="nk-menu-text">Banner</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.services.list')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                            <span class="nk-menu-text">Gallery List</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.services.section-three.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-template-fill"></em></span>
                            <span class="nk-menu-text">Create Gallery</span>
                        </a>
                    </li> 
                    {{-- <li class="nk-menu-item">
                        <a href="{{route('admin.services.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                            <span class="nk-menu-text">Create Services</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.services.section-one.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                            <span class="nk-menu-text">Section One</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.services.section-two.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-calender-date-fill"></em></span>
                            <span class="nk-menu-text">Section Two</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.services.section-three.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-template-fill"></em></span>
                            <span class="nk-menu-text">Section Three</span>
                        </a>
                    </li> --}}
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navPages">
                <h5 class="title">Services</h5>
                
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{route('admin.portfolio.banner.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-img-fill"></em></span>
                            <span class="nk-menu-text">Banner</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('admin.portfolio.category.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-col-fill"></em></span>
                            <span class="nk-menu-text">Services Categories</span>
                        </a>
                    </li><!-- .nk-menu-item -->
               
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('admin.portfolio.realstate.index')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>
                            <span class="nk-menu-text">Services</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.portfolio.realstate.index')}}" class="nk-menu-link"><span class="nk-menu-text">Services List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.portfolio.realstate.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add Services </span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('admin.package.create')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-col-fill"></em></span>
                            <span class="nk-menu-text">Create Package</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('admin.package.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-col-fill"></em></span>
                            <span class="nk-menu-text">Package List</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('admin.package.bookings')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-col-fill"></em></span>
                            <span class="nk-menu-text">Package Booking List</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navMisc">
                <h5 class="title">Blogs</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{route('admin.blog.banner')}}" class="nk-menu-link" ><span class="nk-menu-text">Blog Banner</span></a>
                    </li>
                  
                    <li class="nk-menu-item">
                        <a href="{{route('admin.blog-categories.create')}}" class="nk-menu-link" ><span class="nk-menu-text">Create Blog Category</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.blog.index')}}" class="nk-menu-link" ><span class="nk-menu-text">Blog List</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.blog.create')}}" class="nk-menu-link" ><span class="nk-menu-text">Create Blog</span></a>
                    </li>
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navError">
                <h5 class="title">Gift Card</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{route('admin.client.index')}}"  class="nk-menu-link"><span class="nk-menu-text">Gift List</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.client.create')}}"  class="nk-menu-link"><span class="nk-menu-text">Gift Create</span></a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('admin.client.bookings')}}"  class="nk-menu-link"><span class="nk-menu-text">Gift Bookings</span></a>
                    </li>
                 
                </ul><!-- .nk-menu -->
            </div>
            <div class="nk-menu-content" data-content="navComponents">
                <h5 class="title">Contact</h5>
                <ul class="nk-menu">
                
                    <li class="nk-menu-item">
                        <a href="{{route('admin.contact.banner')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-menu-circled"></em></span>
                            <span class="nk-menu-text">Banner</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{route('admin.contact.section-one')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-menu-circled"></em></span>
                            <span class="nk-menu-text">Section One</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="{{route('admin.contact.contacts')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-template-fill"></em></span>
                            <span class="nk-menu-text">Contacts</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div>
        </div>
    </div>
</div>