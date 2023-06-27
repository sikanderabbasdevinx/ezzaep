<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ezaaep<sup>2</sup></div>
            </a>
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Promocode</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Promocode Screens:</h6>
                        <a class="collapse-item active" href="{{ route('promocode') }}">Promocode</a> -->
                       <!--  <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>       collapsed
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a> -->
                   <!--  </div>
                </div>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href="{{ route('promocode') }}" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Promocode</span>
                </a>
                <div id="collapsePages" class="collapse @if(Request::segment(1) == 'promocode' || Request::segment(1) == 'package_pricing')show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Promocode Screens:</h6>
                        <a class="collapse-item @if(Request::segment(1) == 'promocode')active @endif" href="{{ route('promocode') }}">Promocode</a>
                  
                        <h6 class="collapse-header">Package Pricing Screens:</h6>
                        <a class="collapse-item @if(Request::segment(1) == 'package_pricing')active @endif" href="{{ route('package.pricing') }}">Package Pricing</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('message')}}" data-toggle="collapse" data-target="#collapseMessagePages" aria-expanded="true" aria-controls="collapseMessagePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Message</span>
                </a>
                <div id="collapseMessagePages" class="collapse @if(Request::segment(1) == 'message')show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Message Screens:</h6>
                        <a class="collapse-item @if(Request::segment(1) == 'message')active @endif" href="{{ route('message') }}">Message</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('users.list')}}" data-toggle="collapse" data-target="#collapseUsersPages" aria-expanded="true" aria-controls="collapseUsersPages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Users List</span>
                </a>
                <div id="collapseUsersPages" class="collapse @if(Request::segment(1) == 'users' || Request::segment(1) == 'tutor_review' || Request::segment(1) == 'video_link' || Request::segment(1) == 'social_links')show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Users Screens:</h6>
                        <a class="collapse-item @if(Request::segment(1) == 'users')active @endif" href="{{ route('users.list') }}">Users List</a>
                        <a class="collapse-item @if(Request::segment(1) == 'tutor_review')active @endif" href="{{ route('tutor.review') }}">Tutor Review</a>
                        <a class="collapse-item @if(Request::segment(1) == 'video_link')active @endif" href="{{ route('dashboard.video_link') }}">Video</a>
                        <a class="collapse-item @if(Request::segment(1) == 'social_links')active @endif" href="{{ route('dashboard.social_links') }}">Social Links</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('faq.list')}}" data-toggle="collapse" data-target="#collapseFaqPages" aria-expanded="true" aria-controls="collapseFaqPages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>FAQ List</span>
                </a>
                <div id="collapseFaqPages" class="collapse @if(Request::segment(1) == 'faq')show @endif" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Faq:</h6>
                        <a class="collapse-item @if(Request::segment(1) == 'faq')active @endif" href="{{ route('faq.list') }}">FAQ List</a>
                     
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>