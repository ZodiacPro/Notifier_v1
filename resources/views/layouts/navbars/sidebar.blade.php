<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('EF') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Notifier') }}</a>
        </div>
        <ul class="nav">
            <!------------------- Dashboard -------------------->
            
            <li>
                <a data-toggle="collapse" href="#dashboardPage" aria-expanded="true">
                    <i class="tim-icons icon-chart-pie-36" ></i>
                    <span class="nav-link-text" >{{ __('Dashboard') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($tab == 'dashboard') show  @endif" id="dashboardPage">
                    <ul class="nav pl-4">
                         <!--- -->
                         <li @if ($pageSlug == 'dashboard') class="active " @endif>
                            <a href="{{ route('home') }}">
                                <i class="fas fa-quidditch"></i>
                                <p>{{ __('Overall Dashboard') }}</p>
                            </a>
                        </li>
                        <!--- -->
                        {{-- <li @if ($pageSlug == 'dashboard_user') class="active " @endif>
                            <a href="{{ route('home.user') }}">
                                <i class="fas fa-dot-circle"></i>
                                <p>{{ __('User Dashboard') }}</p>
                            </a>
                        </li> --}}
                         <!--- -->
                         <li @if ($pageSlug == 'dashboard_area') class="active " @endif>
                            <a href="{{ route('home.area') }}">
                                <i class="fas fa-ship"></i>
                                <p>{{ __('Area Dashboard') }}</p>
                            </a>
                        </li>
                        <!--- -->
                    </ul>
                </div>
            </li>
            <!-------------------- Management Page --------------------->
            <li>
                <a data-toggle="collapse" href="#managementPage" aria-expanded="true">
                    <i class="fa fa-microchip" ></i>
                    <span class="nav-link-text" >{{ __('Data Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($tab == 'data') show  @endif" id="managementPage">
                    <ul class="nav pl-4">
                        <!--- -->
                        <li @if ($pageSlug == 'area') class="active " @endif>
                            <a href="{{ route('data.area')  }}">
                                <i class="far fa-keyboard"></i>
                                <p>{{ __('Area') }}</p>
                            </a>
                        </li>
                        <!--- -->
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('raawa.user')  }}">
                                <i class="far fa-keyboard"></i>
                                <p>{{ __('Field Employee') }}</p>
                            </a>
                        </li>
                         <!--- -->
                        <li @if ($pageSlug == 'expired') class="active " @endif>
                            <a href="{{ route('data.expired')  }}">
                                <i class="fas fa-archive"></i>
                                <p>{{ __('Expired Raawa') }}</p>
                            </a>
                        </li>
                        <!--- -->
                        <li @if ($pageSlug == 'expired_sec') class="active " @endif>
                            <a href="{{ route('data.expired_user')  }}">
                                <i class="fas fa-balance-scale"></i>
                                <p>{{ __('Expired Sec ID') }}</p>
                            </a>
                        </li>
                        <!--- -->
                    </ul>
                </div>
            </li>
            <!--------------------  User Management --------------------->
            <li>
                <a data-toggle="collapse" href="#User_Management" aria-expanded="true">
                    <i class="far fa-user-circle" ></i>
                    <span class="nav-link-text" >{{ __('User Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($tab == 'user') show  @endif" id="User_Management">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
