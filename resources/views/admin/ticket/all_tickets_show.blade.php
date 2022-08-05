@extends('layouts.app_backend')

@section('title') |
    @php
    echo App\Models\Navigation::where('route','ticket.index')->first()->name;
    @endphp
@endsection

@section('all_tickets')
    active
@endsection

@section('content')

<div class="container-fluid px-4">
    <!--==========Team Header==========-->
    <div class="current_ticket mt-2 flex-wrap">
        @include('includes.inside_nav')
    </div>

    <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
        <div class="current_tickets_heading__left">
            <h3>{{ __('All Tickets') }}</h3>
        </div>
    </div>

    <!--==========Current Ticket Table===========-->
    <div class="current_tickets_table mt-3">
        <div class="support_ticket ">
            <div class="col-lg-12 ">
                <div class="support">
                    <div class="user_list user-page table-responsive">
                        <table class="table table-hover dataTable">
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
                                {{-- for ticket replay condition divided customer ticket rep --}}
                                @foreach ($tickets as $item)
                                    <tr id="tr1 ">
                                        <td>
                                            <a href="{{ route('ticket.show', $item->id) }}">#{{ $item->id }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('ticket.show', $item->id) }}" style="text-decoration:none; color:#7b7f90">{{ $item->get_customer->name ?? 'No Exists'}}</a>
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

                                        <td>{{ $item->get_department->name ?? 'NULL' }}</td>
                                        <td>
                                            <a href="{{ route('ticket.show', $item->id) }}" style="text-decoration:none; color:#7b7f90">{{ \Str::limit($item->subject, 30) }}</a>
                                        </td>
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
                                                        <a style="cursor: pointer" data-bs-toggle="modal" class="dropdown-item" data-bs-target="#edit_admin_customer_Ticket_{{ $item->id }}" data-bs-whatever="@mdo">
                                                            <span><i class="fa-solid fa-edit me-2"></i></span>
                                                            {{ __('Assignee') }}
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

                                    {{-- ######## Delete Data ####### --}}
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

                                    {{-- edit admin cutomer ticket  --}}
                                    <div class="modal fade" id="edit_admin_customer_Ticket_{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                                    aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header border-bottom-0 modal_header">
                                                    <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">{{ __('Assign Ticket') }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('ticket.update', $item->id) }}" method="post">
                                                        @csrf
                                                        @method("PUT")
                                                        <div class="offcanvas-body">

                                                            <label class="mt-3" for="#">{{ __('ID') }} <span class="text-danger">*</span></label>
                                                            <input type="text" name="ticket_id" class="form-control mt-1" value="#{{ $item->id }}">
                                                            @error('ticket_id')
                                                                <span class="text-danger">{{ $message }}</span> <br>
                                                            @enderror

                                                            <label class="mt-3" for="#">{{ __('Status') }}</label>
                                                            <select name="status" class="form-select mt-1" aria-label="Default select example">
                                                                <option value="" disabled selected>--{{ __('Select One') }}--</option>
                                                                @foreach ($status as $stat)
                                                                    <option value="{{ $stat->id }}" {{ $stat->id == $item->status ? 'selected':'' }}>{{ $stat->name }}</option>
                                                                @endforeach
                                                            </select>

                                                            <label class="mt-3" for="#">{{ __('Priority') }}</label>
                                                            <select name="priority" class="form-select mt-1" aria-label="Default select example">
                                                                <option value="" disabled selected>--{{ __('Select One') }}--</option>
                                                                @foreach ($priority as $prio)
                                                                    <option value="{{ $prio->id }}" {{ $prio->id == $item->priority ? 'selected':'' }}> {{ $prio->name }} </option>
                                                                @endforeach
                                                            </select>
                                                        
                                                            @if ($item->department)
                                                                <label class="mt-3" for="department">{{ __('Department') }} <span class="text-danger">*</span></label>
                                                                <select name="department" id="department" class="form-control">
                                                                    @foreach ($department as $single_dept)
                                                                        <option value="{{ $single_dept->id }}" {{ $item->get_department->id == $single_dept->id ? 'selected':'' }}>{{ $single_dept->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('department')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror


                                                                <label class="mt-3" for="agent_id">{{ __('Agent') }} <span class="text-danger">*</span></label>
                                                                <select name="agent_id[]" id="agent_dropdown{{ $item->id }}" class="form-select mt-1 get_agent_dropdown_three" aria-label="Default select example" multiple="multiple" style="width: 100%">
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
                                                                        @error('agent_id')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        @enderror

                                                                @endif

                                                            @else
                                                                <label class="mt-3" for="#">{{ __('Department') }} <span class="text-danger">*</span></label>
                                                                <select name="department" id="dept_dropdown" class="form-select mt-1 dept_dropdown_two" aria-label="Default select example">
                                                                    <option selected disabled>{{ __('Select Department') }}</option>
                                                                    @foreach ($department as $item)
                                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('department')
                                                                    <span class="text-danger">{{ $message }}</span> <br>
                                                                @enderror

                                                                <label for="get_agent_dropdown" class="mt-3 col-form-label"> {{ __('Assignee') }} <span class="text-danger">*</span></label>
                                                                <select name="agent_id[]" class="form-select mt-1 get_agent_dropdown" aria-label="Default select example" multiple="multiple" style="width: 100%">
                                                                    @php
                                                                        $agents = [];
                                                                    @endphp
                                                                    @include('includes.agent_dropdown')
                                                                </select>
                                                                @error('agent_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            @endif
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {

            $('.get_agent_dropdown').select2({theme: "classic"});
            $('.get_agent_dropdown_three').select2({theme: "classic"});

            $('.dept_dropdown_two').change(function() {

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
@endsection
