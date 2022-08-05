@extends('layouts.app_backend')

@section('dashboard_active')
    active
@endsection

@section('content')

@if(Auth::user()->role_id == 1)
    <div class="container-fluid px-4">
        <div class="row row-cols-xxl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1 g-3 my-2">
            <div class="col">
                <a href="{{ route('all_tickets.show') }}" style="text-decoration: none">

                    <div class="p-3 bg-white d-flex justify-content-around align-items-center rounded cards">
                            <div class="left-icon purple-clr">
                                <i class="bi bi-person-fill tickets-card-icons"></i>
                            </div>
                        <div>
                            <p class="fs-5">{{ __('Total Tickets') }}</p>
                            <h3 class="fs-2">{{ count($tickets) }}</h3>
                        </div>
                    </div>
                </a>
            </div>
            @foreach ($status as $item)
                <div class="col">
                    <a href="{{ route('individual_ticket.show', $item->id) }}" style="text-decoration: none">
                        <div class="p-3 bg-white d-flex justify-content-around align-items-center rounded cards">
                                <div class="left-icon purple-clr">
                                    <i class="bi bi-person-fill tickets-card-icons"></i>
                                </div>
                            <div>
                                <p class="fs-5">{{ $item->name }} {{ __('Tickets') }}</p>
                                @php
                                    $ticket_data = App\Models\Ticket::where('status', $item->id)->get();
                                @endphp
                                <h3 class="fs-2">{{ count($ticket_data) }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            <div class="col">
                <a href="{{ route('soft_deleted_tickets') }}" style="text-decoration: none">
                    <div
                        class="p-3 bg-white d-flex justify-content-around align-items-center rounded cards">
                            <div class="left-icon purple-clr">
                                <i class="bi bi-person-fill tickets-card-icons"></i>
                            </div>
                        <div>
                            <p class="fs-5">{{ __('Deleted Tickets') }}</p>
                            <h3 class="fs-2">{{ count($softDeletedTickets) }}</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!--Other Chart Here -->
        <div class="chart mt-3">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="chart__left bg-white p-3 rounded">
                        <div class=" chart__left__heading d-flex justify-content-between">
                            <div class="chart_left_heading_left">
                                <h4>{{ __('Ticket Analytics') }}</h4>
                            </div>
                            <div class="chart_left_heading_right">
                                <select class="form-select chart_left_heading_right--select border-0 ticket_analytics_admin" aria-label="Default select example">
                                    <option selected value="year">{{ __('Yearly') }}</option>
                                    <option value="month">{{ __('Month') }}</option>
                                </select>
                            </div>
                        </div>
                        <div id="chart_ticket"></div>
                    </div>
                </div>

                {{-- <div class="col-lg-4">
                    <div class="chart__right bg-white p-3">
                        <div class="chart__right__heading d-flex justify-content-between align-items-center">
                            <div class="chart_right_heading_left">
                                <h4>Current Issues</h4>
                            </div>
                            <div class="chart_right_heading_right">
                                <select class="form-select border-0 current_issues_chart" aria-label="Default select example">
                                    <option selected value="current_year">Current Year</option>
                                    <option value="previous_year">previous Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="chart2"></div>
                    </div>
                </div> --}}
            </div>
        </div>

        <!--=====Ticket & Map=====-->

        <div class="cutomerTicket">
            <div class="row g-0">
                <div class="col-lg-8">
                    <div class="customerTicket__tickets bg-white mt-3 rounded p-3">
                        <div class="customerTicket__tickets_heading_dropdown d-flex justify-content-between">
                            <div class="heading">
                                <h3>Customers With Most Ticket</h3>
                            </div>
                            <div class="day">
                                <div class="dropdown">
                                    <button
                                        class="btn btn-secondary bg-transparent text-dark border-0 dropdown-toggle"
                                        type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Today
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Tommorow</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="customerTicket_table table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Tickets</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Last Reply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Ashley Donald Mortez</th>
                                        <td>17</td>
                                        <td>
                                            <div class="rounded-circle" style="width: 30%;">
                                                <img src="{{ asset('dashboard_assets/assets/images/flag-icon/1png.png') }}" alt="1">
                                            </div>
                                        </td>
                                        <td>12:30 P:M</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ashley Donald</th>
                                        <td>17</td>
                                        <td>
                                            <div class="rounded-circle" style="width: 30%;">
                                                <img src="{{ asset('dashboard_assets/assets/images/flag-icon/2.png') }}" alt="2">
                                            </div>
                                        </td>
                                        <td>12:30 P:M</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ashley Donald</th>
                                        <td>17</td>
                                        <td>
                                            <div class="rounded-circle" style="width: 30%;">
                                                <img src="{{ asset('dashboard_assets/assets/images/flag-icon/3.png') }}" alt="3">
                                            </div>
                                        </td>
                                        <td>12:30 P:M</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ashley Donald</th>
                                        <td>17</td>
                                        <td>
                                            <div class="rounded-circle" style="width: 30%;">
                                                <img src="{{ asset('dashboard_assets/assets/images/flag-icon/4.png') }}" alt="4">
                                            </div>
                                        </td>
                                        <td>12:30 P:M</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ashley Donald</th>
                                        <td>17</td>
                                        <td>
                                            <div class="rounded-circle" style="width: 30%;">
                                                <img src="{{ asset('dashboard_assets/assets/images/flag-icon/5.png') }}" alt="5">
                                            </div>
                                        </td>
                                        <td>12:30 P:M</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ashley Donald</th>
                                        <td>17</td>
                                        <td>
                                            <div class="rounded-circle" style="width: 30%;">
                                                <img src="{{ asset('dashboard_assets/assets/images/flag-icon/6.png') }}" alt="6">
                                            </div>
                                        </td>
                                        <td>12:30 P:M</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="map bg-white p-3 mt-3">
                        <div class="map__map_heading text-center">
                            <p class="p-0 m-0 map_heading">China</p>
                            <h5 class="mt-3">55</h5>
                        </div>
                        <div class="customer_count d-flex justify-content-between text-center">
                            <div class=" customer_count_total cmn_style">
                                <p class="mb-2">Total Customer</p>
                                <h3 style="color: #6C7BFF;">{{ $all_customers->count() }}</h3>
                            </div>
                            <div class="divider"></div>
                            <div class="customer_count_active cmn_style">
                                <p class="mb-2">Active Tickets</p>
                                <h3 style="color: #34DDAA;">{{ $active_tickets->count() }}</h3>
                            </div>
                        </div>
                        <div class="map_show">
                            <div id="vmap" style="height: 276px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- support ticket --}}
        <div class="support_ticket">
            <div class="col-lg-12">
                <div class="support mt-5">

                    <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
                        <div class="current_tickets_heading__left mb-4">
                            <h3>{{ __('All Support Tickets') }}</h3>
                        <p>{{ __('List of ticket open by customers') }}</p>

                        </div>
                        <div class="current_tickets_heading__right d-flex align-items-center">
                            <div class="input-group mb-3 me-2">
                                <button class="btn bg-white" id="button-addon1">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                <input type="text" id="search_tickets" class="form-control border-0" placeholder="Search Tickets.."
                                    aria-label="Example text with button addon"  aria-describedby="button-addon1" name="Search Keyword">
                            </div>

                        </div>
                    </div>
                    <div class="row align-items-end mt-2 mb-5">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="from__date">From</label>
                                <input type="date" name="from_date" id="from__date" class="form-control">
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label for="to__date">To</label>
                                <input type="date" name="to_date" id="to__date" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-auto">
                            <div class="form-group">
                                <button class="btn btn-primary" id="filter__date">filter</button>
                                <button class="btn btn-danger d-none" id="clear__filter__date">Clear filter</button>
                            </div>
                        </div>

                        <div class="col-md">
                            <div class="form-group">
                                <label for="to__date">Agents</label>
                                <select name="agent_id[]" id="agent_id" class="form-control" multiple="">
                                    @foreach ($all_agents as $agent)
                                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group">
                                <button class="btn btn-primary" id="filter__agents">filter</button>
                                <button class="btn btn-danger d-none" id="clear__filter__agents">Clear filter</button>
                            </div>
                        </div>
                        {{-- <form> --}}

                        {{-- </form> --}}
                    </div>

                    <div class="user_list user-page table-responsive table-overflow-none">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Assignee') }}</th>
                                    <th>{{ __('Department') }}</th>
                                    <th>{{ __('Subjects') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Priority') }}</th>
                                    <th>{{ __('Created Date') }}</th>
                                    <th>{{ __('Message') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody id="render_tickets">
                                @include('includes.tickets.index')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <!-- Load More -->
                <div class="load_more_button">
                    <div class="mt-5 mb-5 text-center">
                    <a id="load-more" data-count="5" class="load__more__btn load_more bg-accent shadow-accent-volume hover:bg-accent-dark inline-block rounded-full text-center font-semibold text-white transition-all">
                        Load More
                    </a>
                    </div>
                </div>
            </div>
        </div>



        <!--=====Ticket & Map=====-->

        <div class="cutomerTicket">
            <div class="row g-0">
            </div>
        </div>
        <!--=====Support Tickets=====-->

        <div class="support_tickets_modal">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <!-- <h5 class="modal-title" id="exampleModalLabel">New message</h5> -->
                            <div class="modal_btn">
                                <button class="modal_btn__ind">{{ __('Assign individually') }}</button>
                                <button class="modal_btn_team bg-transparent border-0">{{ __('Assign To Team') }}</button>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label"><b>{{ __('Select') }}</b></label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn modal_close_btn"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="button" class="btn modal_save_btn">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@elseif(Auth::user()->role_id == 2)
    @include('admin.agent.dashboard')
@else
    @include('admin.customer.dashboard')
@endif


@endsection

@section('js')

    <script>
        var options = {
            series: [{
            name: 'Total tickets',
            data: @json($total_ticket)
            }, {
            name: 'Opended ticket',
            data: @json($opened_ticket)
            }, {
            name: 'Pending Tickets',
            data: @json($pending_ticket)
            }, {
            name: 'Solved ticket',
            data: @json($solved_ticket)
            }],
            chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: false,
            }
            },
            plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
            },
            dataLabels: {
            enabled: true
            },
            stroke: {
            show: true,
            width:1,
            colors: ['transparent']
            },
            xaxis: {
            categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            fill: {
            opacity: 0.8
            },
            tooltip: {
            y: {
                formatter: function (val) {
                return val
                }
            }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart_ticket"), options);
        chart.render();
    </script>

    <script>
        var options = {
            series: [{
            name: 'Total tickets',
            data: @json($customer_total_ticket)
            }, {
            name: 'Opended ticket',
            data: @json($customer_opened_ticket)
            }, {
            name: 'Pending Tickets',
            data: @json($customer_pending_ticket)
            }, {
            name: 'Solved ticket',
            data: @json($customer_solved_ticket)
            }],
            chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: false,
            }
            },
            plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
            },
            dataLabels: {
            enabled: true
            },
            stroke: {
            show: true,
            width:1,
            colors: ['transparent']
            },
            xaxis: {
            categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            fill: {
            opacity: 0.8
            },
            tooltip: {
            y: {
                formatter: function (val) {
                return val
                }
            }
            }
        };

        var chart = new ApexCharts(document.querySelector("#customer_chart_ticket"), options);
        chart.render();
    </script>

    <script>
        var options = {
            series: [{
            name: 'Total tickets',
            data: @json($agent_total_ticket)
            }, {
            name: 'Opended ticket',
            data: @json($agent_opened_ticket)
            }, {
            name: 'Pending Tickets',
            data: @json($agent_pending_ticket)
            }, {
            name: 'Solved ticket',
            data: @json($agent_solved_ticket)
            }],
            chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: false,
            }
            },
            plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
            },
            dataLabels: {
            enabled: true
            },
            stroke: {
            show: true,
            width:1,
            colors: ['transparent']
            },
            xaxis: {
            categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            },
            fill: {
            opacity: 0.8
            },
            tooltip: {
            y: {
                formatter: function (val) {
                return val
                }
            }
            }
        };

        var chart = new ApexCharts(document.querySelector("#agent_chart_ticket"), options);
        chart.render();
    </script>


    @foreach ($tickets as $item)
        <script>

            $(document).ready(function() {
                $('#get_agent_dropdown{{ $item->id }}').select2({theme: "classic"});
            });

        </script>
    @endforeach

    <script>
        $(document).ready(function() {
            $('#agent_id').select2({theme: "classic"});

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.dept_dropdown').change(function() {

                var dept_id = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('get.agents') }}",
                    data: {
                        dept_id: dept_id
                    },
                    success: function(data) {
                        $('.get_agent_dropdown').html(data.data)
                    }
                })
            });
        });
    </script>


    {{-- filter by date js --}}
    <script>
        $(document).ready(function() {
                $('#filter__date').on('click',function(){
                    let from_date = $('#from__date').val();
                    let to_date = $('#to__date').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('date.wise.tickets') }}",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_tickets').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Ticket Found</td></tr>');
                            } else {
                                $('#render_tickets').html(response.data);
                            }

                            if ((1*response.count) < 5) {
                                $('.load_more_button').hide();
                            }else{
                                $('.load_more_button').show();

                            }

                            $("#clear__filter__date").removeClass("d-none");


                        }
                    })

                });
                // clear filter
                $("#clear__filter__date").on("click", function(){
                    $(this).addClass("d-none");
                    $("#from__date").val("");
                    $("#to__date").val("");

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('date.clear.wise.tickets') }}",

                        success: function(response) {
                            $('#render_tickets').html(response.data);

                            if ((1*response.count) < 5) {
                                $('.load_more_button').hide();
                            }else{
                                $('.load_more_button').show();

                            }
                        }
                    })
                });
            });
    </script>

    {{-- filter by agents js --}}
    <script>
        $(document).ready(function() {
                $('#filter__agents').on('click',function(){
                    let agents_id = $('#agent_id').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('agent.wise.tickets') }}",
                        data: {
                            agents_id: agents_id,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_tickets').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Ticket Found</td></tr>');
                            } else {
                                $('#render_tickets').html(response.data);
                            }

                            if ((1*response.count) < 5) {
                                $('.load_more_button').hide();
                            }else{
                                $('.load_more_button').show();

                            }

                            $("#clear__filter__agents").removeClass("d-none");


                        }
                    })
                });
                // clear filter
                $("#clear__filter__agents").on("click", function(){
                    $(this).addClass("d-none");
                    $("#agent_id").val("");

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('agent.clear.wise.tickets') }}",

                        success: function(response) {
                            $('#render_tickets').html(response.data);

                            if ((1*response.count) < 5) {
                                $('.load_more_button').hide();
                            }else{
                                $('.load_more_button').show();

                            }
                        }
                    })
                });
            });
    </script>


    {{-- search wise tickets --}}
    <script>
        $(document).ready(function() {
                $('#search_tickets').on('keyup',function(){
                    let search_value = $(this).val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('search.wise.tickets') }}",
                        data: {
                            search_value: search_value,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_tickets').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Ticket Found</td></tr>');
                            } else {
                                $('#render_tickets').html(response.data);
                            }

                            if ((1*response.count) < 5) {
                                $('.load_more_button').hide();
                            }else{
                                $('.load_more_button').show();

                            }

                        }
                    })

                });
            });
    </script>

    {{-- Load More Btn js --}}
    <script>
        $(document).ready(function () {
            $('.load_more').click(function () {

                let count = $(this).attr('data-count');
                let search_value = $('#search_tickets').val();

                let from_date = $('#from__date').val();
                let to_date = $('#to__date').val();

                let agents_id = $('#agent_id').val();


                let load_more = $(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('tickets.load-more') }}",
                    type: "post",
                    data:{
                        count:count,
                        search_value:search_value,
                        from_date:from_date,
                        to_date:to_date,
                        agents_id:agents_id,
                    },
                    success: function(data)
                    {
                        console.log(data);
                        $(load_more).attr('data-count', data.count);

                        if ((1*data.ticket_count) < 5) {
                            $('.load_more_button').hide();
                        }else{
                            $('.load_more_button').show();
                        }

                        $('#render_tickets').append(data.data);

                        $("html, body").animate({
                                scrollTop: $('html, body').get(0).scrollHeight
                            }, 10);

                    }
                })

            });
        });
    </script>



    <script>
        $(document).ready(function(){
            $('.ticket_analytics_admin').on('change', function(){
                let data = $(this).val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('ticket.analytics.admin') }}",
                    type: "post",
                    data:{
                        data:data,
                    },
                    success: function(data)
                    {
                        console.log(data);
                        $('#chart_ticket').html(data.data);

                    }
                })

            });
        });
    </script>

    {{-- Current Issues Chart --}}

    <script>
        $(document).ready(function(){
            $('.current_issues_chart').on('change', function(){
                let year = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('current.issues.chart') }}",
                    type: "post",
                    data:{
                        year:year,
                    },
                    success: function(data)
                    {
                        console.log(data);
                        $('#chart2').html(data.data);

                    }
                })

            });
        });
    </script>

<script>
    // Area Chart
    var lineChartOptions = {
        series: [{
            name: 'Total tickets',
            data: @json($total_ticket)
            }, {
            name: 'Opended ticket',
            data: @json($opened_ticket)
            }, {
            name: 'Pending Tickets',
            data: @json($pending_ticket)
            }, {
            name: 'Solved ticket',
            data: @json($solved_ticket)
        }],
        chart: {
            id: 'area-datetime',
            type: 'area',
            height: 350,
            zoom: {
            autoScaleYaxis: true
            },
            toolbar: {
            show: false
            }
        },
        annotations: {
            yaxis: [{
            y: 30,
            borderColor: '#999',
            label: {
                show: true,
                text: 'Support',
                style: {
                color: "#fff",
                background: '#00E396'
                }
            }
            }],
            xaxis: [{
            x: new Date('14 Nov 2012').getTime(),
            borderColor: '#999',
            yAxisIndex: 0,
            label: {
                show: true,
                text: 'Rally',
                style: {
                color: "#fff",
                background: '#775DD0'
                }
            }
            }]
        },
        dataLabels: {
            enabled: false
        },
        markers: {
            size: 0,
            style: 'hollow',
        },
        xaxis: {
            categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        tooltip: {
            x: {
            format: 'dd MMM yyyy'
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 100]
        }
        },
    };

    var chart2 = new ApexCharts(document.querySelector("#chart2"), lineChartOptions);
    chart2.render();
</script>


@endsection
