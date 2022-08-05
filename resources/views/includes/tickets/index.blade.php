
@foreach ($tickets as $item)
    <tr id="tr1">
        <td>
            <a href="{{ route('ticket.show', $item->id) }}">#{{ $item->id }}</a>
        </td>
        <td>
            <a href="{{ route('ticket.show', $item->id) }}">{{ $item->get_customer->name ?? 'No Exists'}}</a>
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
            <a href="{{ route('ticket.show', $item->id) }}">{{ \Str::limit($item->subject, 30) }}</a>
        </td>
        <td>{{ $item->get_status->name ?? 'Pending'}}</td>
        <td>{{ $item->get_priority->name ?? 'NULL' }}</td>
        <td>{{ $item->created_at->format('d-M-Y') }}</td>
        {{-- ->format('d-M-Y') --}}

        <td>
            @php
                $all_replies = App\Models\Ticket_reply::where('ticket_id', $item->id)->get();
            @endphp
            <a href=" {{ route('ticket.reply', $item->id) }} " style="text-decoration: none">  <span>  <i class="fa-brands fa-rocketchat"></i> {{ count($all_replies) }} </span> </a>
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
                        <a style="cursor: pointer" data-bs-toggle="modal" class="dropdown-item" data-bs-target="#edit_admin_customer_Ticket_{{ $item->id }}">
                            <span><i class="fa-solid fa-edit me-2"></i></span>
                            {{ __('Assignee') }}
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
    <div class="modal fade" id="edit_admin_customer_Ticket_{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 modal_header">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">{{ __('Update Ticket') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ticket.update', $item->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <div class="offcanvas-body">

                            <label class="mt-3" for="#">{{ __('ID') }} </label>
                            <input type="text" name="ticket_id" disabled class="form-control mt-1" value="#{{ $item->id }}">
                            @error('ticket_id')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror

                            <input type="hidden" name="customer_id" class="form-control mt-1" value="{{ $item->customer }}">
                        

                            <label class="mt-3" for="#">{{ __('Status') }}
                            @if (count($status) == 0)
                                <span style="color:#8b8989; font-size:13px">(If do not have status, then create a status) | <a href="{{ route('status.index') }}" style="text-decoration: none"> create status </a></span>
                            @endif
                                </label>
                            <select name="status" class="form-select mt-1" aria-label="Default select example">
                                <option value="">--{{ __('Select One') }}--</option>
                                @foreach ($status as $stat)
                                    <option value="{{ $stat->id }}" {{ $stat->id == $item->status ? 'selected':'' }}>{{ $stat->name }}</option>
                                @endforeach
                            </select>

                            <label class="mt-3" for="#">{{ __('Priority') }}
                                @if (count($priority) == 0)
                                    <span style="color:#8b8989; font-size:13px">(If do not have priority, then create a priority) | <a href="{{ route('priority.index') }}" style="text-decoration: none"> create priority </a></span>
                                @endif
                            </label>
                            <select name="priority" class="form-select mt-1" aria-label="Default select example">
                                <option value="">--{{ __('Select One') }}--</option>
                                @foreach ($priority as $prio)
                                    <option value="{{ $prio->id }}" {{ $prio->id == $item->priority ? 'selected':'' }}> {{ $prio->name }} </option>
                                @endforeach
                            </select>

                            <label class="mt-3" for="#">{{ __('Department') }}
                                @if (count($department) == 0)
                                    <span style="color:#8b8989; font-size:13px">({{ __('If do not have department, then create a department') }}) | <a href="{{ route('department.index') }}" style="text-decoration: none"> {{ __('Create Department') }} </a></span>
                                @endif
                            </label>
                            <select name="department" id="dept_dropdown" class="form-select mt-1 dept_dropdown" aria-label="Default select example">
                                <option value="">{{ __('Select Department') }}</option>
                                @foreach ($department as $dept)
                                    <option value="{{ $dept->id }}" {{ $item->department == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                                @endforeach
                            </select>
                            @error('department')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror
                            <label for="get_agent_dropdown" class="mt-3 col-form-label"> {{ __('Assignee') }}
                                <span style="color:#8b8989; font-size:13px">({{ __('If do not have Agent, then create an agent') }}) | <a href="{{ route('users.index') }}" style="text-decoration: none"> {{ __('Create Agent') }} </a></span>
                            </label>
                            <select name="agent_id[]" id="get_agent_dropdown{{ $item->id }}" class="form-select mt-1 get_agent_dropdown" aria-label="Default select example" multiple="multiple" style="width: 100%">
                                @php
                                    $agents = [];
                                @endphp
                                @include('includes.agent_dropdown')
                            </select>
                            @error('agent_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label class="mt-3" for="#">{{ __('Expire Date') }} </label>
                            <input type="date" name="expire_date" class="form-control mt-1" value="{{ $item->expire_date }}">
                            @error('ticket_id')
                                <span class="text-danger">{{ $message }}</span> <br>
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
@endforeach
