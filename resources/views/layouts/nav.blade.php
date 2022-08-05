<nav class="navbar navbar-expand-lg navbar-light px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3 icon" id="menu-toggle"></i>
        <div class="input-group m-0">
        </div>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="dropdown nav-item ms-auto border-0">
            @php
                $locale= \App::getLocale();
            @endphp

            @if ($locale == 'fr')
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="me-2 flag-icon">
                        <img src="{{ asset('dashboard_assets/assets') }}/images/lang2.png" alt="lang.png">
                    </span>
                    French
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
            @else
                <button class="btn text-white dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2 flag-icon">
                            <img src="{{ asset('dashboard_assets/assets') }}/images/lang.png" alt="lang.png">
                        </span>
                        Eng
                        <i class="fa-solid fa-chevron-down"></i>
                </button>
            @endif

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item" href="{{ route('locale','en') }}">
                        <span class="me-2 flag-icon">
                            <img src="{{ asset('dashboard_assets/assets') }}/images/lang.png" alt="lang.png">
                        </span>
                        Eng
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('locale','fr') }}">
                        <span class="me-2 flag-icon">
                            <img src="{{ asset('dashboard_assets/assets') }}/images/lang2.png" alt="lang2.png">
                        </span>
                        French
                    </a>
                </li>
            </ul>
        </div>
        
        @if (Auth::User()->role_id == 1)
            <div class="nav-item mx-2 dropdown">
                <button type="button" class="btn position-relative bell_icon text-white p-0 dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class=" fa-solid fa-bell"></i>
                    <span style="background-color: #FCB045; widht:20px; height:20px; line-height:12px"
                        class="position-absolute top-0 start-100 translate-middle p-1 border border-light rounded-circle">
                        <span class="visually-hidden">{{ __('New alerts') }}</span>
                        <span id="adminNotificationCount">
                            {{ admin_notification_count_for_bel_icon() }}
                        </span>
                    </span>
                </button>

                <ul class="dropdown-menu dropdown-scroll dropdown-menu-end mt-2" aria-labelledby="dropdownMenuButton1"  id="adminNotificationRender"> 
                    
                </ul>
            </div>
        
        @elseif(Auth::User()->role_id == 2)
            <div class="nav-item me-2 ms-2 dropdown">
                <button type="button" class="btn position-relative bell_icon p-0 dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class=" fa-solid fa-bell"></i>
                    <span style="background-color: #FCB045; widht:20px; height:20px; line-height:12px"
                        class="position-absolute top-0 start-100 translate-middle p-1 border border-light rounded-circle">
                        <span class="visually-hidden">{{ __('New alerts') }}</span>
                        <span id="agentNotificationCount">
                           {{ agent_notification_count_for_bel_icon() }}
                        </span>
                    </span>
                </button>

                <ul class="dropdown-menu dropdown-scroll dropdown-menu-end mt-2" aria-labelledby="dropdownMenuButton1"  id="agentNotificationRender"> 
                    
                </ul>
            </div>
        @else
            <div class="nav-item me-2 ms-2 dropdown">
                <button type="button" class="btn position-relative bell_icon p-0 dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class=" fa-solid fa-bell"></i>
                    <span style="background-color: #FCB045; widht:20px; height:20px; line-height:12px"
                        class="position-absolute top-0 start-100 translate-middle p-1 border border-light rounded-circle">
                        <span class="visually-hidden">{{ __('New alerts') }}</span>
                        <span id="customerNotificationCount">
                            {{ customer_notification_count_for_bel_icon() }}
                        </span>
                    </span>
                </button>

                <ul class="dropdown-menu dropdown-scroll dropdown-menu-end mt-2" aria-labelledby="dropdownMenuButton1"  id="customerNotificationRender"> 
                    
                </ul>
            </div>
        @endif

        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img width="35" height="35" class="rounded-circle" src="{{ Auth::user()->profile_photo_url }}"> {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ url('user/profile') }}"><i class="mr-50"
                        data-feather="user"></i> {{ __('Profile') }}</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit();"><i class="mr-50"
                                data-feather="power"></i>{{ __('Logout') }}</a>
                    </form>
                </ul>
            </li>
        </ul>
    </div>
</nav>
