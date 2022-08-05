@extends('layouts.app_backend')

@section('title') |
    @php
    echo App\Models\Navigation::where('route','ticket.index')->first()->name;
    @endphp
@endsection

@section('ticket.index')
    active
@endsection

@section('content')


<section class="banner-main-section py-3 all-pages-input" id="main">

    @if ($single_ticket_info) 
        <div class="container-fluid px-4">
            <div class="inbox_wrapper">
                <div class="row">
                    <div style="margin-top: 3px" class="col-lg-9">
                        <div class="inbox_left_site_btn">
                            <button class="btn">
                                <i class="fa-solid fa-chevron-left"></i>
                                <a href="{{ route('ticket.index') }}" style="text-decoration:none;">{{ __('Back') }}</a>
                            </button>
                        </div>

                        <div class="inbox_left_site_status bg-white rounded p-3">
                            <div class="inbox_left_site_status_heading">
                                <h5>{{ __('Status') }}</h5>
                                    @if ($single_ticket_info->status)                                           
                                        @foreach ($status as $stat)
                                            @if ($stat->id == $single_ticket_info->status)   
                                                <input value="{{ $stat->name }}" class="form-control" disabled >
                                            @endif
                                        @endforeach
                                    @else
                                        <input value="{{ __('no set') }}" class="form-control" disabled >
                                    @endif
                            </div>
                            <div class="inbox_left_site_status_input mt-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="#">{{ __('Priority') }}</label>
                                            @if ($single_ticket_info->priority)
                                                @foreach ($priority as $pri)
                                                    @if ($pri->id == $single_ticket_info->priority)   
                                                        <input value="{{ $pri->name }}" class="form-control mt-2" disabled >
                                                    @endif
                                                @endforeach
                                            @else
                                                <input value="{{ __('no set') }}" class="form-control mt-2" disabled >
                                            @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="#">{{ __('Assignee') }}</label>
                                        @php
                                            $selected_agent = json_decode($single_ticket_info->agent_id);
                                        @endphp

                                        @if ($selected_agent)
                                            <select class="form-select mt-2" aria-label="Default select example">
                                                @foreach ($selected_agent as $item)
                                                    @php
                                                        $agent = App\Models\User::find($item);
                                                    @endphp
                                                    <option selected>{{ $agent->name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <input value="{{ __('no assign') }}" class="form-control mt-2" disabled >
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="#">{{ __("Expire Date") }}</label>
                                            @if ($single_ticket_info->expire_date)
                                                <input value="{{ $single_ticket_info->expire_date }}" class="form-control mt-2" disabled >
                                            @else
                                                <input value="{{ __('no set') }}" class="form-control mt-2" disabled >
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inbox_left_site_inbox bg-white p-3 mt-3 rounded">
                            <div class="inbox_left_site_inbox__user d-flex justify-content-between">
                                <div class="inbox_left_site_inbox__user__name">
                                    {{-- <img src="{{ asset('dashboard_assets/assets/inbox/inbox-user.png') }}" alt="inbox-user.png"> --}}
                                    <span> {{ __('Customer Name') }}: {{ $single_ticket_info->get_customer->name ?? '' }} </span>
                                </div>
                                <div class="inbox_left_site_inbox__sub">
                                    <p>{{ __('Department') }}: {{ $single_ticket_info->get_department->name ?? 'NULL'}}</p>
                                </div>
                                <div class="inbox_left_site_inbox__priority_type">
                                    <p>{{ __('Priority') }}: {{ $single_ticket_info->get_priority->name ?? 'NULL'}}</p>
                                </div>
                                <div class="inbox_left_site_inbox__id">
                                    <p>ID:#{{ $single_ticket_info->id ?? '' }}</p>
                                </div>
                            </div>
                            <div class="inbox_left_site_inbox__heading mt-2">
                                    <p class="m-0 mb-1">
                                        <span class="tick_sub_problem">Subject : </span>  <span> {{ $single_ticket_info->subject }} </span>
                                    </p>
                                    <p>
                                        <span class="tick_sub_problem">Problem : </span>  <span> {{ $single_ticket_info->ticket_body }} </span>   
                                    </p>
                                    
                            </div>
                        </div>
                        <hr class="m-0 p-0">
                        <div class="bug_fixing_inbox_start bg-white p-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bug_fixing_inbox_start__msg d-flex flex-column get_message_dropdown">
                                        @php
                                            $recent_reply_infos = '';
                                        @endphp
                                        
                                        @include('includes.get_message_dropdown')
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="m-0 p-0">
                        {{-- <form> --}}
                            {{-- @csrf --}}
                            <div class="msg_footer  bg-white">
                                <div class="msg-footer__content d-flex justify-content-around align-items-center p-3">
                                    <input type="hidden" name="ticket_id" value="{{ $id }}" class="form-control ticket_id">
                                    <textarea class="form-control border-0 ml-4 reply" rows="1" aria-label="With textarea"
                                        placeholder="Type a message here..." cols="30" rows="5" name="reply"></textarea>
                                    <button type="submit" class="border-0 bg-transparent p-0 message_submit">
                                        <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>

                    <div class="col-lg-3 px-0 mt-3">
                        <div class="inbox_right_side bg-white mt-4 rounded">

                            <div class="inbox_right_side__profile  p-3">
                                <div class="inbox_right_side__profile__header text-center mb-4">
                                    
                                    <img src="{{ $single_ticket_info->get_customer->profile_photo_url }}" class="me-2" alt="" width="50" height="50" style="border-radius: 50%">
                                    <h6 class="mt-2 mb-0"><b>{{ $single_ticket_info->get_customer->name }}</b></h6> 
                                </div>

                                <div class="inbox_right_side__profile__info">
                                    <div
                                        class="inbox_right_side__profile__info__phone d-flex justify-content-between">
                                        <p>{{ __('Designation') }}: </p>
                                        <p>{{ App\Models\UserRole::find($single_ticket_info->get_customer->role_id)->role ?? '' }}</p>
                                    </div>

                                    <div
                                        class="inbox_right_side__profile__info__phone d-flex justify-content-between">
                                        <p>{{ __('Phone') }}: </p>
                                        <p>+{{ $single_ticket_info->get_customer->phone ?? 'Not Found' }}</p>
                                    </div>
                                    <div
                                        class="inbox_right_side__profile__info__phone d-flex justify-content-between">
                                        <p>{{ __('Email') }}:</p>
                                        <p>{{ $single_ticket_info->get_customer->email }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="right_side_bottom p-3">
                                <div class="right_side_bottom_content d-flex">
                                    <div class="right_side_bottom_content__img">
                                        <img src="{{ asset('dashboard_assets/assets/inbox/attached.png') }}" alt="attached.png">
                                    </div>
                                    <div class="right_side_bottom_content__text ms-2">
                                        <h6 class="m-0">{{ $single_ticket_info->subject }}</h6>
                                        <small>{{ $single_ticket_info->created_at->format('d M Y') ?? '' }} at {{ $single_ticket_info->created_at->format('h:i A') }}</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>

@endsection

@section('js')

    <script>
        $(document).ready(function() {

            setInterval(() => {
                renderReply()
            }, 2000);

            // summit message when enter btn is pressed!
            $(".reply").keypress(function (e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (code == 13) {
                    var reply_message = $('.reply').val();
                    var ticket_id     = $('.ticket_id').val();
                    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('get.message') }}",
                        data: {
                            reply_message: reply_message,
                            ticket_id: ticket_id
                        },
                        success: function(data) {
                            $('.reply').val('');
                            renderReply();
                            $("html, body").animate({
                                scrollTop: $('html, body').get(0).scrollHeight
                            }, 1000);
                        }
                    })
                }
            });

            // summit message when submit btn is pressed!
            $('.message_submit').click(function() {

                var reply_message = $('.reply').val();
                var ticket_id     = $('.ticket_id').val();
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('get.message') }}",
                    data: {
                        reply_message: reply_message,
                        ticket_id: ticket_id
                    },
                    success: function(data) {
                        $('.reply').val('');
                        renderReply();
                        $("html, body").animate({
                            scrollTop: $('html, body').get(0).scrollHeight
                        }, 1000);
                    }
                })
            });

            function renderReply(){

                var ticket_id = $('.ticket_id').val();
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ route('get.message.render') }}",
                    data: {
                        ticket_id: ticket_id
                    },
                    success: function(data) {
                        $('.get_message_dropdown').html(data.data)
                    }
                })
            } 
        });
    </script>
    
@endsection
