<!-- ========== Left Sidebar Start ========== -->
<style>
    #sidebar-menu > ul > li > a {
        padding: 5px 10px !important;}
</style>
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
                 class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                   data-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{route('dashboard')}}">
                        <i data-feather="airplay"></i>
                        <span> {{__('Dashboard')}} </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('users.index')}}">
                        <i data-feather="rss"></i>
                        <span>  {{__('Users')}} </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('clients.index')}}">
                        <i data-feather="users"></i>
                        <span>  {{__('Clients')}} </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('courts.index')}}">
                        <i data-feather="briefcase"></i>
                        <span>  {{__('Courts')}} </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('services.index')}}">
                        <i data-feather="book-open"></i>
                        <span>  {{__('Services')}} </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('employees.index')}}">
                        <i data-feather="user-check"></i>
                        <span>  {{__('Employees')}} </span>
                    </a>
                </li>
                <li class="menu-title mt-2">{{__('General Expenses')}}</li>

                <li>
                    <a href="{{route('general-expenses.show',['Assets'])}}">
                        <i data-feather="shopping-cart"></i>
                        <span>  {{__('Assets')}} </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('general-expenses.show',['Maintenances'])}}">
                        <i data-feather="zap"></i>
                        <span>  {{__('Maintenances')}} </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('general-expenses.show',['Expenses'])}}">
                        <i data-feather="truck"></i>
                        <span>  {{__('Expenses')}} </span>
                    </a>
                </li>
                <li class="menu-title mt-2">{{__('Reports')}}</li>
                <li>
                    <a href="{{route('reports.salaries')}}">
                        <i data-feather="truck"></i>
                        <span>  {{__('Salaries')}} </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('reports.generalExpenses')}}">
                        <i data-feather="truck"></i>
                        <span>  {{__('General Expenses')}} </span>
                    </a>
                </li>
  <li>
                    <a href="{{route('reports.cases')}}">
                        <i data-feather="truck"></i>
                        <span>  {{__('Cases')}} </span>
                    </a>
                </li>
  <li>
                    <a href="{{route('reports.casePayments')}}">
                        <i data-feather="truck"></i>
                        <span>  {{__('Case Payments')}} </span>
                    </a>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
