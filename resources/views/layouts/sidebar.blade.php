
<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">

    <div class="sidebar-heading text-center primary-text me-auto fw-bold text-uppercase">
        <a style="text-decoration: none;" href="{{ route('dashboard') }}">
            <img src="{{ asset('uploads/generalSetting') }}/{{ generalSettings()->logo }}" alt="logo" width="180" height="70" class="ml-2 main-logo">
        </a>
    </div>

    <div class="list-group list-group-flush my-3">

    @php
        $users_permission = json_decode(Auth::user()->permission);
        $role_id = Auth::user()->role_id;
    @endphp

    @if ($role_id == 1)
        <a href="{{ route('notification.index') }}" class="list-group-item @yield('notification_active') list-group-item-action bg-transparent second-text">
            <i class="fa-solid fa-bell me-2"></i> {{ __(' Notifications') }} ({{ count(App\Models\Notification::where('user_id', '!=', 1)->get()) }})
        </a>
    @elseif($role_id == 2)
        <a href="{{ route('agent_notification.index') }}" class="list-group-item @yield('notification_active') list-group-item-action bg-transparent second-text">
            <i class="fa-solid fa-bell me-2"></i> {{ __(' Notifications') }} ({{ get_agent_notification_count() }})
        </a>
    @else
        <a href="{{ route('customer_notification.index') }}" class="list-group-item @yield('notification_active') list-group-item-action bg-transparent second-text">
            <i class="fa-solid fa-bell me-2"></i> {{ __(' Notifications') }} ({{ get_customer_notification_count() }})
        </a>
    @endif

    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-transparent second-text @yield('dashboard_active')">
        <i class="fa-solid fa-house me-2"></i> {{ __('Dashboard') }}
    </a>

    @if ($users_permission)
        @foreach ($users_permission as $item)
            @php
                $navigation_data = App\Models\Navigation::find($item);
                $all_tickets     = App\Models\Ticket::all();
            @endphp
            
            <a href="{{ route($navigation_data->route) }}" class="list-group-item @yield($navigation_data->route) list-group-item-action bg-transparent second-text"><span class="me-2">{!! $navigation_data->icon !!}</span>{{ $navigation_data->name }} 
                
                @if (route($navigation_data->route) == route('ticket.index'))
                    @if (App\Models\User::find(Auth::id())->role_id == 1)   
                        <span>({{  count($all_tickets) }})</span>
                    @elseif(App\Models\User::find(Auth::id())->role_id == 2)
                        @php
                            $count = 0;
                            foreach ($all_tickets as $key => $ticket) {
                                if ($ticket->agent_id != null) {
                                    $agent_id = json_decode($ticket->agent_id,true);
                                    if (in_array(Auth::id(),$agent_id)) {
                                         $count++;
                                    }
                                }
                            }
                        @endphp
                        ({{ $count }})
                    @else
                        @php
                            $customer_ticket = App\Models\Ticket::where('customer', Auth::id())->get();
                        @endphp
                        <span>({{  count($customer_ticket) }})</span>
                    @endif
                @endif
            </a>
        @endforeach
    @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="list-group-item list-group-item-action bg-transparent text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();"><i
                class="fas fa-power-off me-2"></i>{{ __('Logout') }}</a>
        </form>
    </div>
</div>

