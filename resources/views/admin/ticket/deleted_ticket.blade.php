
@extends('layouts.app_backend')

@section('title') |
   @php
    echo App\Models\Navigation::where('route','ticket.index')->first()->name;
   @endphp
@endsection

@section('ticket.index')
    active
@endsection

@section('soft_deleted_tickets')
    active
@endsection

@section('content')

    @if(Auth::user()->role_id == 1)
        <div class="container-fluid px-4">
            <!--==========Team Header==========-->
            <div class="current_ticket mt-2 flex-wrap">
                @include('includes.inside_nav')
            </div>
{{-- 
            <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
                <div class="current_tickets_heading__left">
                    <h3>{{ __('Deleted Tickets') }}</h3>
                    <span style="color:#8b8989; font-size:14px"> ({{ __('If you want to see the details of these tickets, go to Action and restore') }})  <a style="text-decoration: none"> </a></span>
                </div>
                <div class="current_tickets_heading__right">
                    <div class="input-group mb-3">

                    </div>
                </div>
            </div> --}}
            <div class="current_tickets_heading d-sm-flex justify-content-between mt-5 mb-0">
                <div class="current_tickets_heading__left">
                    <h3>{{ __('Deleted Tickets') }}</h3>
                    <span style="color:#8b8989; font-size:14px"> ({{ __('If you want to see the details of these tickets, go to Action and restore') }})  <a style="text-decoration: none"> </a></span>
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
    
            <div class="row my-2">
                <div class="col-xl-8">
                    <div class="row align-items-end">
                        <div class="col-md">
                            <div class="form-group mb-3">
                                <label class="form-label" for="from__date">From</label>
                                <input type="date" name="from_date" id="from__date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group mb-3">
                                <label class="form-label" for="to__date">To</label>
                                <input type="date" name="to_date" id="to__date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-auto">
                            <div class="form-group mb-3">
                                <button class="btn btn-primary w-100 w-sm-auto" id="filter__date">filter</button>
                                <button class="btn btn-danger w-100 w-sm-auto mt-2 mt-sm-0 d-none" id="clear__filter__date">Clear filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="row align-items-end">
                        <div class="col-md mb-3">
                            <div class="form-group">
                                <label class="form-label" for="agent_id">Agents</label>
                                <select name="agent_id[]" id="agent_id" class="form-control">     
                                    <option value="">-- Select One --</option>                         
                                    @foreach ($all_agents as $agent)   
                                        <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-auto mb-3">
                            <div class="form-group">
                                <button class="btn btn-primary w-100 w-sm-auto" id="filter__agents">filter</button>
                                <button class="btn btn-danger w-100 w-sm-auto mt-2 mt-sm-0 d-none" id="clear__filter__agents">Clear filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--==========Current Ticket Table===========-->
            <div class="current_tickets_table mt-3">
                <div class="support_ticket ">
                    <div class="col-md-auto mb-3">
                       
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3 ticket_export_delete d-none">                  
                                    <form action="{{ route('selected.soft.ticket.restore') }}" method="POST" enctype="multipart/form-data" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="ticket_id" class="restore_selected_ticket">
                                        <button type="submit" class="btn btn-primary btn-sm">{{ __('Resotre') }}</button>
                                    </form>

                                    <button class="btn btn-danger d-inline btn-sm" data-bs-toggle="modal" data-bs-target="#delete_soft_tickets">{{ __('Permanent Delete') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 ">
                        <div class="support ">
                            <div class="user_list user-page table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox" cursorshover="true">
                                                    <input type="checkbox" name="check_all" value="1" data-status="all" id="customCheck" class="check_all custom-control-input" style="cursor:pointer">
                                                    <label class="custom-control-label" for="customCheck" cursorshover="true"></label>
                                                </div>
                                            </th>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Assignee') }}</th>
                                            <th>{{ __('Department') }}</th>
                                            <th>{{ __('Subjects') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Priority') }}</th>
                                            <th>{{ __('Created Date') }}</th>
                                            <th>{{ __('Message') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="render_tickets">
                                        @include('includes.tickets.soft_deleted_ticket');
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

                    @push('modals')

                        {{-- Delete selected Ticket --}}
                        <div class="modal fade" id="delete_soft_tickets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Soft Ticket') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('selected.soft.ticket.delete') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="ticket_id" class="ticket_id_checked">
                                            <p class="text-danger text center">{{ __('Are you sure delete?') }}</p>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endpush
                </div>
            </div>
        </div>

    @elseif(Auth::user()->role_id == 2)
        @include('admin.agent.index')
    @else
        @include('admin.customer.index')
    @endif

@endsection

@section('js')

    @foreach ($tickets as $item)
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
        $(document).ready(function(){
            var ticket_array = [];
            $('.check_all').on('click', function(){
                ticket_array = [];
                if(this.checked){
                    
                    $('.ticket_export_delete').removeClass('d-none');

                    $('.ticket_check').each(function(){
                        $(this).prop('checked', true);
                        ticket_array.push($(this).attr('data-id'));
                        $('.ticket_id_checked').val(ticket_array);
                        $('.restore_selected_ticket').val(ticket_array);
                    });

                }else{

                    $('.ticket_export_delete').addClass('d-none');
                    
                    $('.ticket_check').each(function(){

                        $(this).prop('checked', false); 
                        $('.ticket_id_checked').val(ticket_array);
                        $('.restore_selected_ticket').val(ticket_array);

                    });
                }

                if(ticket_array.length == 0)
                { 
                    $('.ticket_export_delete').addClass('d-none');

                }else{
                    $('.ticket_export_delete').removeClass('d-none'); 
                }

                // Ajax Setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('filter.by.all.soft.tickets') }}",
                    data: {
                        ticket_array : ticket_array,
                    },
                    success: function (response) {
                        console.log(response);
                        toastr.success("Showing Filtered Result");
                    },
                    error: function(response) {

                    }   
                });

                console.log(ticket_array);

            });


            $('body').on("click", ".ticket_check", function(){

                var data_id = $(this).attr('data-id');

                $('.ticket_check').each(function(){ 
                    if($(this).is(':checked')){
                        $('.check_all').prop('checked', true) 
                    } else{
                        $('.check_all').prop('checked', false) 
                        return false;
                    }
                });

                if(ticket_array.indexOf(data_id)  != -1){
                    ticket_array = ticket_array.filter(item => item !== data_id) 
                    $('.ticket_id_checked').val(ticket_array);
                    $('.restore_selected_ticket').val(ticket_array);
                }
                else{
                    ticket_array.push(data_id);
                    $('.ticket_id_checked').val(ticket_array);
                    $('.restore_selected_ticket').val(ticket_array);
                }


                if(ticket_array.length == 0)
                { 
                    $('.ticket_export_delete').addClass('d-none');
                }else{
                    $('.ticket_export_delete').removeClass('d-none'); 
                }


                // Ajax Setup
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "{{ route('filter.by.single.soft.ticket') }}",
                    data: {
                        ticket_array : ticket_array,
                    },
                    success: function (response) {
                        console.log(response);
                        toastr.success("Showing Filtered Result");
                    },
                    error: function(response) {

                    }   
                });

                console.log(ticket_array);

            });

        });

    </script>

    {{-- deleted ticket search wise tickets --}}
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
                        url: "{{ route('search.wise.deleted.tickets') }}",
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
                        url: "{{ route('date.wise.deleted.tickets') }}",
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
                        url: "{{ route('date.clear.wise.deleted.tickets') }}",

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
                        url: "{{ route('agent.wise.deleted.tickets') }}",
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
                        url: "{{ route('agent.clear.wise.deleted.tickets') }}",

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
                    url: "{{ route('deleted.tickets.load-more') }}",
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
@endsection
