        <!--=====Jquery=====-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script src="{{ asset('dashboard_assets/assets') }}/plugins/jquery/jquery-git.min.js"></script> --}}
        <!--=====Bootstrap Js=====-->
        <script src=" {{ asset('dashboard_assets/assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"> </script>
        <!--=====Icon Js=====-->
        <script src="{{ asset('dashboard_assets/assets') }}/icons/js/all.js">
        </script>
        <!--====Chart====-->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <!--=====Vmap Js=====-->
        {{-- <script src="{{ asset('dashboard_assets/assets') }}/plugins/vmap/js/jquery.vmap.js"></script> --}}
        {{-- <script src="{{ asset('dashboard_assets/assets') }}/plugins/vmap/js/jquery.vmap.world.js"></script> --}}
        @include('includes.vmap_js')
        @include('includes.vmap_world_js')
        <!--==========Data Tables==========-->
        <script src="{{ asset('dashboard_assets/assets') }}/js/jquery.dataTables.min.js"></script>
        {{-- <script src="{{ asset('dashboard_assets/assets') }}/plugins/simplebar/js/simplebar.min.js"></script> --}}
        <!--=====Main Js====-->
        <script src="{{ asset('dashboard_assets/assets') }}/js/script.js"></script>
        {{-- select 2 --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            // $(function () {
            //     $('.selectpicker').selectpicker();
            // });
        </script>

        {{-- toastr js--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {{-- trix js --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


        <script>
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: '#fff',
                borderColor: '#818181',
                borderOpacity: 0.25,
                borderWidth: 1,
                color: '#DADFE2',
                enableZoom: true,
                hoverColor: '#c9dfaf',
                hoverOpacity: null,
                normalizeFunction: 'linear',
                scaleColors: ['#b6d6ff', '#005ace'],
                selectedColor: '#c9dfaf',
                selectedRegions: null,
                enableZoom: true,

                onRegionClick:function(event, code, region) {
                    // alert(region);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('get_country') }}",
                        type: "POST",
                        data: {
                            country_name: region,
                        },
                        success: function(data){
                            // console.log(data);
                            $('.map_heading').html(data.data);
                        },
                    });

                },
                normalizeFunction: 'polynomial'
            });

            $('#myTable').DataTable();
            $('.dataTables_filter').hide();
            $('.dataTables_length').hide();
            $('.previous').text('');
            $('.previous').append('<i class="fa-solid fa-caret-left"></i>');
            $('.next').text('');
            $('.next').append('<i class="fa-solid fa-caret-right"></i>');
        </script>

        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
        @endif

        @if (session()->get('danger'))
        <script>
            toastr.error('{{ session()->get('danger') }}');
        </script>
        @endif

        @if (session()->get('success'))
        <script>
            toastr.success('{{ session()->get('success') }}');
        </script>
        @endif
        <script>
            $(document).ready( function() {
                $('.dataTable').DataTable();
                $('.dataTables_filter input').attr("placeholder", "Search Here");
            } );
        </script>

        <script>
        $(".password-wrapper__toggler").on("click", function(){
            let currentType = $(this).closest(".password-wrapper").find(".password-wrapper__input").attr("type");
            if(currentType == "password"){
                $(this).closest(".password-wrapper").find(".password-wrapper__input").attr("type", "text");
                $(this).closest(".password-wrapper").find(".password-wrapper__toggler__icon").addClass("fa-eye-slash");
            }else{
                $(this).closest(".password-wrapper").find(".password-wrapper__input").attr("type", "password");
                $(this).closest(".password-wrapper").find(".password-wrapper__toggler__icon").removeClass("fa-eye-slash");
                $(this).closest(".password-wrapper").find(".password-wrapper__toggler__icon").addClass("fa-eye");
            }
        })
        </script>


        {{-- Admin Notification Render js --}}
        <script>
            $(document).ready(function(){

                renderNotification();

                function renderNotification(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('get.render.notification') }}",
                        success: function(data) {
                         $("#adminNotificationRender").html(data.data);
                         $("#adminNotificationCount").html(data.admin_notification_count);
                        }
                    })
                }

                setInterval(() => {
                    renderNotification()
                }, 2000);

            });
        </script>

        {{-- Agent Notification Render js --}}
        <script>
            $(document).ready(function(){

                renderNotification();

                function renderNotification(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('get.agent.render.notification') }}",
                        success: function(data) {
                         $("#agentNotificationRender").html(data.data);
                         $("#agentNotificationCount").html(data.agent_notification_count);
                        }
                    })
                }

                setInterval(() => {
                    renderNotification()
                }, 2000);

            });
        </script>

        {{-- Customer Notification Render js --}}
        <script>
            $(document).ready(function(){

                renderNotification();

                function renderNotification(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('get.customer.render.notification') }}",
                        success: function(data) {
                         $("#customerNotificationRender").html(data.data);
                         $("#customerNotificationCount").html(data.customer_notification_count);
                        }
                    })
                }

                setInterval(() => {
                    renderNotification()
                }, 2000);

            });
        </script>

        {{-- view all notification page rander --}}

        <script>
            $(document).ready(function(){

                renderNotification();

                function renderNotification(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('render.view.all.notification') }}",
                        success: function(data) {
                         $("#viewAllNotificationRender").html(data.data);
                        }
                    })
                }

                setInterval(() => {
                    renderNotification()
                }, 2000);


            });
        </script>

        {{-- <script>
            $(document).ready(function () {
                $('.dropdown_list').each((index, element) => new SimpleBar(element, {
                    autoHide: true
                }));
            });
        </script> --}}

        @yield('js')

    </body>
</html>

