<div class="container-fluid px-4">
    <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
        <div class="current_tickets_heading__left">

            <h3>{{ __('Assignee Tickets') }}</h3>
        </div>
        <div class="current_tickets_heading__right">
        </div>
    </div>
    <!--==========Current Ticket Table===========-->
    <div class="current_tickets_table mt-3">
        <div class="support_ticket ">
            <div class="col-lg-12 ">
                <div class="support ">
                    <div class=" table-responsive" style="overflow: unset">
                        <div class="user_list user-page table-responsive table-overflow-none">
                        <table class="table table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>{{ __('Serial') }}</th>
                                    <th>{{ __('Name') }}</th>
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
                                @foreach ($tickets as $item)
                                    @php
                                        $agent_id = json_decode($item->agent_id);
                                        $loged_in_id = Auth::id();
                                    @endphp
                                    @if ($agent_id)
                                        @foreach ($agent_id as $id)
                                            @if($loged_in_id == $id)
                                                <tr id="tr1 ">
                                                    <td>
                                                        <a href="{{ route('ticket.show', $item->id) }}" style="text-decoration: none">#{{ $item->id }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('ticket.show', $item->id) }}">{{ $item->get_customer->name ?? __('No Exists')}}</a>
                                                        
                                                    </td>
                                                    <td>{{ $item->get_department->name ?? '' }}</td>
                                                    <td>
                                                        <a href="{{ route('ticket.show', $item->id) }}">{{ \Str::limit($item->subject, 30) }}</a>
                                                    </td>
                                                    <td>{{ $item->get_status->name ?? ''}}</td>
                                                    <td>{{ $item->get_priority->name ?? '' }}</td>
                                                    <td>{{ $item->created_at->format('d-M-Y') }}</td>

                                                    <td>
                                                        @php
                                                            $all_replies = App\Models\Ticket_reply::where('ticket_id', $item->id)->get();
                                                        @endphp
                                                        <a href=" {{ route('ticket.reply', $item->id) }} " style="text-decoration: none"> <i class="fa-brands fa-rocketchat"></i> <span>  {{ count($all_replies) }} </span> </a>
                                                    </td>
                                                    <td class="text-center ">
                                                        <div class="dropdown">
                                                            <a class="btn bg-transparent dropdown-toggle" href="#"
                                                                role="button" id="dropdownMenuLink"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                                            </a>

                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <li class="m-2">
                                                                    <a style="cursor: pointer; text-decoration:none; color:#000"  href="{{ route('ticket.show', $item->id) }}">
                                                                        <span><i class="fa-solid fa-eye me-2"></i></span>
                                                                        {{ __('Show') }}
                                                                    </a>
                                                                </li>
                                                                <li class="m-2">
                                                                    <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#edit_agent_customer_Ticket_{{ $item->id }}" data-bs-whatever="@mdo">
                                                                        <span><i class="fa-solid fa-edit me-2"></i></span>
                                                                        {{ __('Update') }}
                                                                    </a>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif

                                            {{-- edit Agent cutomer ticket  --}}
                                            <div class="modal fade" id="edit_agent_customer_Ticket_{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                                            aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-bottom-0 modal_header">
                                                            <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">{{ __('Update Ticket') }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('agent_ticket.update', $item->id) }}" method="post">
                                                                @csrf
                                                                @method("PUT")
                                                                <div class="offcanvas-body">

                                                                    <input type="hidden" name="customer_id" value="{{ $item->customer }}">

                                                                    <label class="mt-3" for="#">{{ __('Status') }}</label>
                                                                    <select name="status" class="form-select mt-1" aria-label="Default select example">
                                                                        <option value="" disabled selected>--{{ __('Select One') }}--</option>
                                                                        @foreach ($status as $stat)
                                                                            <option value="{{ $stat->id }}" {{ $stat->id == $item->status ? 'selected':'' }}>{{ $stat->name }}</option>
                                                                        @endforeach
                                                                    </select>
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
                                    @endif

                                @endforeach

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



