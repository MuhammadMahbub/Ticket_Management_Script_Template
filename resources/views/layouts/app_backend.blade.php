@include('layouts.dashboard_css')

    <div class="d-flex" id="wrapper">
        
        @include('layouts.sidebar')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            
            @include('layouts.nav')
            
            @yield('content')

            
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
@stack('modals')

    @include('layouts.dashboard_js')