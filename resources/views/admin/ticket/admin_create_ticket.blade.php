@extends('layouts.app_backend')

@section('title') |
    @php
    echo App\Models\Navigation::where('route','ticket.index')->first()->name;
    @endphp
@endsection

@section('ticket.index')
    active
@endsection

@section('admin_ticket_show')
    active
@endsection

@section('content')
    <div class="container-fluid px-4">
        <!--==========Team Header==========-->
        <div class="current_ticket mt-3 d-flex justify-content-between flex-wrap">
            <div class="current_ticket__left">
                @include('includes.inside_nav')
            </div>
        </div>

        <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-3">
            <div class="current_tickets_heading__left">
                <h3>{{ __('View Tickets') }}</h3>
            </div>
        </div>
        <div class="user_list user-page table-responsive table-overflow-none">
            <table class="table table-hover dataTable admin_ticket_table">
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
                        <th>{{ __('Reply') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($tickets as $item)
                        @if ($item->creator == 1)
                            <tr id="tr1" class="bg-white">
                                <td>
                                    <a href="{{ route('ticket.show', $item->id) }}">#{{ $item->id }}</a>
                                </td>
                                <td>
                                    {{ $item->get_customer->name ?? ''}}
                                </td>
                                <td>
                                @if ($item->agent_id)
                                    @foreach (json_decode($item->agent_id) as $agent_id)
                                        @php
                                            $agent_name = App\Models\User::find($agent_id)->name;
                                        @endphp
                                        {{ $agent_name ?? 'NULL'}}
                                        @if(!$loop->last) , @endif
                                    @endforeach
                                    @else
                                        {{ 'Not appointee' }}
                                @endif
                                </td>

                                <td>{{ $item->get_department->name ?? '' }}</td>
                                <td>{{ $item->subject ?? '' }}</td>
                                <td>{{ $item->get_status->name ?? 'Pending'}}</td>
                                <td>{{ $item->get_priority->name ?? 'NULL' }}</td>
                                <td>{{ $item->created_at->format('d-M-Y') }}</td>

                                <td>
                                    @php
                                        $all_replies = App\Models\Ticket_reply::where('ticket_id', $item->id)->get();
                                    @endphp
                                    <a href=" {{ route('ticket.reply', $item->id) }} "> <i class="fa-solid fa-reply-all" class="replay-icon-css"></i> <span> ( {{ count($all_replies) }} )</span> </a>
                                </td>
                                <td class="text-center ">
                                    <div class="dropdown">

                                        <a class="btn bg-transparent dropdown-toggle" href="#"
                                            role="button" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li class="m-2">
                                                <a style="cursor: pointer" class="dropdown-item" href="{{ route('ticket.show', $item->id) }}">
                                                    <span><i class="fa-solid fa-eye me-2"></i></span>
                                                    {{ __('Show') }}
                                                </a>
                                            </li>
                                            <li class="m-2">

                                                <a style="cursor: pointer" data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editTicket_{{ $item->id }}" data-bs-whatever="@mdo">
                                                    <span><i class="fa-solid fa-edit me-2"></i></span>
                                                    {{ __('Edit') }}
                                                </a>
                                            </li>
                                            <li class="m-2">
                                                <a style="cursor: pointer" data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteTicket_{{ $item->id }}" data-bs-whatever="@mdo">
                                                    <span><i class="fa-solid fa-trash me-2"></i></span>
                                                    {{ __('Delete') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endif


                        {{-- ######## Edit admin create ticket Data ####### --}}
                        <div class="modal fade" id="editTicket_{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 modal_header">
                                        <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">{{ __('Update Ticket') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin_ticket.update', $item->id) }}" method="post">
                                            @csrf
                                            @method("PUT")
                                            <div class="offcanvas-body">

                                                <label for="#">{{ __('Role') }} <span class="text-danger">*</span></label>
                                                <select class="form-select mt-1">

                                                    @foreach ($roles as $role)
                                                        @if ($item->get_customer->role_id == $role->id)
                                                            <option value="{{ $item->get_customer->role_id }}">{{ $role->role }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                                                <label class="mt-3" for="#">{{ __('Name') }} <span class="text-danger">*</span></label>
                                                <select name="customer" id="" class="form-control">
                                                    <option value="{{ $item->get_customer->id }}">{{ $item->get_customer->name }}</option>
                                                </select>

                                                <label class="mt-3" for="#">{{ __('Subject') }} <span class="text-danger">*</span></label>

                                                <input type="text" name="subject" class="form-control mt-2" value="{{ $item->subject }}">
                                                @error('subject')
                                                    <span class="text-danger">{{ $message }}</span> <br>
                                                @enderror

                                                <label class="mt-3" for="#">{{ __('Department') }} <span class="text-danger">*</span></label>
                                                <select name="department" id="" class="form-control">
                                                    @foreach ($department as $dept)

                                                        @if( $item->get_department->id == $dept->id )
                                                            <option value="{{ $item->get_department->id }}">{{ $dept->name }}</option>
                                                        @endif

                                                    @endforeach
                                                </select>

                                                <label class="mt-3" for="agent_id">{{ __('Assignee') }}</label>
                                                <select name="agent_id[]" id="agent_drop{{ $item->id }}" class="form-select mt-1" aria-label="Default select example" multiple="multiple" style="width: 100%">
                                                @if ($item->department)

                                                    @php
                                                        $all_agent = json_decode($item->get_department->user_id);
                                                    @endphp

                                                    @if ($all_agent)
                                                        @foreach ($all_agent as $agent)
                                                        @php
                                                            $agent_name = App\Models\User::find($agent)->name;
                                                            $agent_id = App\Models\User::find($agent)->id;
                                                            $agent_email = App\Models\User::find($agent)->email;
                                                            $selected_agent = json_decode($item->agent_id);
                                                        @endphp

                                                                @if($selected_agent)
                                                                    @foreach ($selected_agent as $agent)
                                                                    <option value="{{ $agent_id }}"  {{ $agent_id == $agent ? 'selected':'' }}>{{ ucwords($agent_name) }} </option>
                                                                    @endforeach
                                                                @else
                                                                <option value="{{ $agent_id }}">{{ ucwords($agent_name) }} </option>
                                                                @endif
                                                        @endforeach

                                                        </select>

                                                        @foreach ($all_agent as $agent)
                                                            @php
                                                                $agent_email = App\Models\User::find($agent)->email;
                                                            @endphp

                                                            <input type="hidden" value="{{ $agent_email }}" name="agent_email[]">

                                                        @endforeach
                                                    @endif
                                                @endif

                                                <label class="mt-3" for="#">{{ __('Status') }}</label>
                                                <select name="status" class="form-select mt-1" aria-label="Default select example">
                                                    <option value="">{{ __('Select Ticket Status') }}</option>
                                                    @foreach ($status as $stat)
                                                    <option value="{{ $stat->id }}" {{ $stat->id == $item->status ? 'selected' : '' }}>{{ $stat->name }}</option>
                                                    @endforeach
                                                </select>

                                                <label class="mt-3" for="#">{{ __('Priority') }}</label>
                                                <select name="priority" class="form-select mt-1" aria-label="Default select example">
                                                    <option value="">{{ __('Select Ticket Priority') }}</option>
                                                    @foreach ($priority as $prio)
                                                        <option value="{{ $prio->id }}" {{ $prio->id == $item->id ? 'selected' : '' }}>{{ $prio->name }}</option>
                                                    @endforeach
                                                </select>

                                                <label class="mt-3" for="#">{{ __('Ticket Body') }} <span class="text-danger">*</span></label>
                                                <textarea name="ticket_body" class="form-control" id="ticket_body" cols="30" rows="4">{{ $item->ticket_body }}</textarea>
                                                @error('ticket_body')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                <button  type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>


                        {{-- ######## Delete Ticket ####### --}}
                        <div class="modal fade" id="deleteTicket_{{ $item->id }}" tabindex="-1" aria-labelledby="daleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal_header">
                                        <h5 class="modal-title" id="daleteModalLabel">{{ __('Delete Ticket') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>{{ __('Are You Sure?') }}</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('No') }}</button>
                                            <form action="{{ route('ticket.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}
                                            </form>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')

    @foreach ($tickets as $item)
    <script>

        $(document).ready(function() {
            $('#agent_drop{{ $item->id }}').select2({theme: "classic"});
        });

    </script>
    @endforeach

@endsection
