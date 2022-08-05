
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

            <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
                <div class="current_tickets_heading__left">
                    <h3>{{ __('Deleted Tickets') }}</h3>
                    <span style="color:#8b8989; font-size:14px"> ({{ __('If you want to see the details of these tickets, go to Action and restore') }})  <a style="text-decoration: none"> </a></span>
                </div>
                <div class="current_tickets_heading__right">
                    <div class="input-group mb-3">

                    </div>
                </div>
            </div>
            <!--==========Current Ticket Table===========-->
            <div class="current_tickets_table mt-3">
                <div class="support_ticket ">
                    <div class="col-lg-12 ">
                        <div class="support ">
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
                                            <th>{{ __('Message') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- for ticket replay condition divided customer ticket rep --}}
                                        @foreach ($softDeletedTickets as $item)
                                            <tr id="tr1 ">
                                                <td>
                                                    <a>#{{ $item->id }}</a>
                                                </td>
                                                <td>

                                                    <a style="text-decoration:none; color:#7b7f90">{{ $item->get_customer->name ?? 'No Exists'}}</a>
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

                                                <td>{{ $item->get_department->name ?? 'NULL'}}</td>
                                                <td>
                                                    <a style="text-decoration:none; color:#7b7f90">{{ \Str::limit($item->subject, 30) }}</a>
                                                </td>
                                                <td>{{ $item->get_status->name ?? 'Pending'}}</td>
                                                <td>{{ $item->get_priority->name ?? 'NULL' }}</td>
                                                <td>{{ $item->created_at->format('d-M-Y') }}</td>

                                                <td>
                                                    @php
                                                        $all_replies = App\Models\Ticket_reply::where('ticket_id', $item->id)->get();
                                                    @endphp
                                                    <a  style="text-decoration: none">  <span>  <i class="fa-brands fa-rocketchat"></i> {{ count($all_replies) }} </span> </a>
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
                                                                <a style="cursor: pointer" class="dropdown-item" href="{{ route('ticket_restore', $item->id) }}">
                                                                    <span><i class="fa-solid fa-eye me-2"></i></span>
                                                                    {{ __('Restore') }}
                                                                </a>
                                                            </li>

                                                            <li class="m-2">
                                                                <a style="cursor: pointer" data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteTicket_{{ $item->id }}">
                                                                    <span><i class="fa-solid fa-trash me-2"></i></span>
                                                                    {{ __('Delete') }}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>

                                            {{-- ######## Delete Data ####### --}}
                                            <div class="modal fade" id="deleteTicket_{{ $item->id }}" tabindex="-1" aria-labelledby="daleteModalLabel" aria-hidden="true">
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
                                                                <form action="{{ route('permanent_delete', $item->id) }}" method="POST">
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
                    </div>
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
@endsection
