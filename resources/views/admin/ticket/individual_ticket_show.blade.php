@extends('layouts.app_backend')

@section('title') |
@php
echo App\Models\Navigation::where('route','ticket.index')->first()->name;
@endphp
@endsection

@section('ticket.index')
    active
@endsection

@section($status_info->name)
    active
@endsection


@section('content')
    <div class="container-fluid px-4">
        <!--==========Team Header==========-->
        <div class="current_ticket mt-3">

            @include('includes.inside_nav')
        </div>


        <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
            <div class="current_tickets_heading__left">
                <h3>{{ $status_info->name }} {{ __('Tickets') }}</h3>
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
        <!--==========Current Ticket Table===========-->
        <div class="current_tickets_table mt-3">
            <div class="support_ticket ">
                <div class="col-lg-12 ">
                    <div class="support ">
                        <div class="user_list user-page table-responsive">
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
                                    <input type="hidden" name="stat_id" id="stat_id" class="stat_id" value="{{ $status_id }}">
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
                        <div class="mt-10 text-center">
                        <a id="load-more" data-count="5" class="load__more__btn load_more bg-accent shadow-accent-volume hover:bg-accent-dark inline-block rounded-full text-center font-semibold text-white transition-all">
                            Load More
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    @foreach ($all_tickets as $item)
        <script>

            $(document).ready(function() {
                $('#get_agent_dropdown{{ $item->id }}').select2({theme: "classic"});
            });

        </script>
    @endforeach

    <script>
        $(document).ready(function() {

            $('.dept_dropdown').change(function() {

                var dept_id = $(this).val();
                // alert(dept_id);
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
                        // console.log(data);
                    }
                })
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#agent_id').select2({theme: "classic"});
            
        });
    </script>

    {{-- filter by date js --}}
    <script>
        $(document).ready(function() {
                $('#filter__date').on('click',function(){
                    let from_date = $('#from__date').val();
                    let to_date = $('#to__date').val();

                    let stat_id = $('#stat_id').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('individual_date.wise.tickets') }}",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                            stat_id: stat_id,
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
                    let stat_id   = $('#stat_id').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('individual_agent.wise.tickets') }}",
                        data: {
                            agents_id: agents_id,
                            stat_id: stat_id,
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


    {{-- individual search wise tickets --}}
    <script>
        $(document).ready(function() {
                $('#search_tickets').on('keyup',function(){
                    let search_value = $(this).val();
                    let stat_id = $('#stat_id').val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('individual_search.wise.tickets') }}",
                        data: {
                            search_value: search_value,
                            stat_id: stat_id,
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
                let stat_id = $('#stat_id').val();


                let load_more = $(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('individual_tickets.load-more') }}",
                    type: "post",
                    data:{
                        count:count,
                        search_value:search_value,
                        from_date:from_date,
                        to_date:to_date,
                        agents_id:agents_id,
                        stat_id:stat_id,
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



@endsection

