<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="{{ asset(Auth::user()->photo_user ?? Auth::guard('operator')->user()->operator_photo)  }}" alt="user-img" title="{{ Auth::user()->name ?? Auth::guard('operator')->user()->name }}"
                class="rounded-circle avatar-md">
            <div class="dropdown">

                <a href="javascript: void(0);" class="text-dark font-weight-normal dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">   {{ Auth::user()->name ?? Auth::guard('operator')->user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="{{ route('users.show', Auth::user()->id ??  Auth::guard('operator')->user()->id) }}" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>{{ __('translation.My Account') }}</span>
                    </a>

                    <!-- item-->
                    <a href="{{ route('users.index') }}" class="dropdown-item notify-item">
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
            <p class="text-muted">
                @forelse (Auth::user()->assigned_agency as $i => $agencies)
                    {{$agencies->agencia}}
                    @empty
                    <span class="badge badge-dark">Sin agencia</span>
                @endforelse
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">{{ __('translation.Navigation') }}</li>
                <li>
                    <a href="{{ route('home') }}">
                        <i data-feather="home" class="icon-dual-warning"></i>
                        <span> {{ __('translation.Dashboard') }} </span>
                    </a>
                </li>
                <li class="menu-title mt-2">{{ __('translation.Apps') }}</li>

                @can('read_settings')
                    <li>
                        <a href="{{ route('settings.index') }}">
                            <i data-feather="settings" class="icon-dual-dark"></i>
                            <span> {{ __('translation.Administrator') }} </span>
                        </a>
                    </li>
                @endcan

                @can('read_registers')
                    <li>
                        <a href="#sidebarRegisters" data-toggle="collapse">
                            <i data-feather="book-open" class="icon-dual-info"></i>
                            {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                            <span class="menu-arrow"></span>
                            <span> @lang('translation.Registers') </span>
                        </a>
                        <div class="collapse" id="sidebarRegisters">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('registers.index') }}">Servicios</a>
                                </li>
                                <li>
                                    <a href="{{ route('assign.index') }}">Asignaciones</a>
                                </li>
                                <li>
                                    <a href="{{ route('operations.index') }}">Operaciones</a>
                                </li>
                                <li>
                                    <a href="{{ route('canceled.index') }}">Cancelados</a>
                                </li>
                                <li>
                                    <a href="#sidebarMultilevel2" data-toggle="collapse">
                                        Second Level <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarMultilevel2">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a href="javascript: void(0);">Item 1</a>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);">Item 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endcan
                @can('read_bookings')
                    <li>
                        <a href="{{ route('bookings.index') }}">
                            <i data-feather="calendar" class="icon-dual-success"></i>
                            <span> {{ __('translation.Bookings') }} </span>
                        </a>
                    </li>
                @endcan
                @can('read_tariff')
                <li>
                    <a href="#sidebarTariff" data-toggle="collapse">
                        <i data-feather="trending-up" class="icon-dual-pink"></i>
                        <span class="menu-arrow"></span>
                        <span> Tarifas </span>
                    </a>
                    <div class="collapse" id="sidebarTariff">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('taf_agencies.index') }}">Tarifas Agencias </a>
                            </li>
                            <li>
                                <a href="{{ route('taf_hotels.index') }}">Tarifas Hoteles</a>
                            </li>
                        </ul>
                    </div>
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
                @can('read_services')
                <li>
                    <a href="{{ route('type_services.index') }}">
                        <i data-feather="layers" class="icon-dual-warning"></i>
                        <span> Tipo de servicios </span>
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
