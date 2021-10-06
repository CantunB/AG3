<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="../assets/images/users/user-6.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark font-weight-normal dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">   {{ Auth::user()->name ?? Auth::guard('operator')->user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>{{ __('translation.My Account') }}</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>{{ __('translation.Settings') }}</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>{{ __('translation.Lock Screen') }}</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>@lang('translation.Logout')</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


                </div>
            </div>
            <p class="text-muted">{{ Auth::user()->roles[0]->name  ?? 'OPERADOR'}}</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">{{ __('translation.Navigation') }}</li>
                <li>
                    <a href="{{ route('home') }}">
                        <i data-feather="home" class="icon-dual-dark"></i>
                        <span> {{ __('translation.Dashboard') }} </span>
                    </a>
                </li>
                <li class="menu-title mt-2">{{ __('translation.Apps') }}</li>

                @can('read_administrators')
                    <li>
                        <a href="{{ route('settings.users') }}">
                            <i data-feather="settings" class="icon-dual-dark"></i>
                            <span> {{ __('translation.Administrator') }} </span>
                        </a>
                    </li>
                @endcan

                @can('read_registers')
                    <li>
                        <a href="{{ route('registers.index') }}">
                            <i data-feather="book-open" class="icon-dual-info"></i>
                            <span>@lang('translation.Registers')</span>
                        </a>
                    </li>
                @endcan

                @can('read_agencies')
                    <li>
                        <a href="{{ route('agencies.index') }}">
                            <i data-feather="package" class="icon-dual-blue"></i>
                            <span> {{ __('translation.Agencies') }} </span>
                        </a>
                    </li>
                @endcan
                @can('read_airlines')
                <li>
                    <a href="{{ route('airlines.index') }}">
                        <i data-feather="figma" class="icon-dual-pink"></i>
                        <span> {{ __('translation.Airlines') }} </span>
                    </a>
                </li>
                @endcan
                @can('read_services')
                <li>
                    <a href="{{ route('services.index') }}">
                        <i data-feather="layers" class="icon-dual-warning"></i>
                        <span> {{ __('translation.Services') }} </span>
                    </a>
                </li>
                @endcan
                @can('read_operators')
                    <li>
                        <a href="{{ route('operators.index') }}">
                            <i data-feather="users" class="icon-dual-danger"></i>
                            <span> {{ __('translation.Operators') }} </span>
                        </a>
                    </li>
                @endcan

                @can('read_units')
                    <li>
                        <a href="{{ route('units.index') }}">
                            <i data-feather="truck" class="icon-dual-success"></i>
                            <span> {{ __('translation.Units') }} </span>
                        </a>
                    </li>
                @endcan


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
