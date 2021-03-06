 <!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">



            <li class="dropdown d-inline-block d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>


            <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if (App::isLocale('ar'))
                        <img src="{{asset('assets/images/008-saudi-arabia.svg')}}" class="mr-2" height="12" alt=""/> العربية <span class="mdi mdi-chevron-down"></span>
                    @else
                        <img src="{{asset('assets/images/flags/us.jpg')}}" class="mr-2" height="12" alt=""/> English <span class="mdi mdi-chevron-down"></span>
                    @endif

                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    @if (App::isLocale('ar'))
                        <a class="dropdown-item" href="{{route('chang-lang',['lang'=>'en'])}}">
                            <img src="{{asset('assets/images/flags/us.jpg')}}"  class="mr-1"  alt="" height="16" />
                            <span> English </span>
                        </a>
                    @else
                        <a class="dropdown-item" href="{{route('chang-lang',['lang'=>'ar'])}}">
                            <img src="{{asset('assets/images/flags/008-saudi-arabia.svg')}}" class="mr-1"   alt="" height="16" />
                            <span> العربية </span>
                        </a>
                    @endif

                </div>
            </li>




            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        {{auth()->user()->name}} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Lock Screen</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item notify-item"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                    >
                        <i class="fe-log-out"></i>
                        <span>Logout</span>

                    </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    @csrf
                </form>

                </div>
            </li>


        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('dashboard')}}" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{asset('assets/images/icon.png')}}"alt="" height="40">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-lg">
                    <img src="{{asset('assets/images/logo.png')}}"alt="" height="80">
                    <!-- <span class="logo-lg-text-light">U</span> -->
                </span>
            </a>

            <a href="{{route('dashboard')}}" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{asset('assets/images/icon.png')}}"alt="" height="40">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('assets/images/logo.png')}}"alt="" height="80">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<!-- end Topbar -->
