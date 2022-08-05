<div class="container-fluid px-4">
    <!--==========Team Header==========-->
    <div class="current_ticket mt-3 d-flex justify-content-between flex-wrap">
        <div class="current_ticket__left">

        </div>

        <div class="current_ticket__right">
            <div class="current_ticket__right__btn d-flex">
                <div class="current_ticket__right__btn__div me-2">
                    <button class="btn top__menubar--right--btn" data-bs-toggle="modal" data-bs-target="#createTicket" data-bs-whatever="@mdo">
                        <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                        {{ __('Create Ticket') }}
                    </button>
                </div>

                <!--=====Create Tickets=====-->
                <div class="modal fade" id="createTicket" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 modal_header">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Create Ticket') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('customer_ticket.store') }}" method="post">
                                    @csrf
                                    <div class="offcanvas-body">
                                        <label class="mt-3" for="#">{{ __('Subject') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="subject" class="form-control mt-2" value="{{ old('subject') }}">
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span> <br>
                                        @enderror

                                        <label class="mt-3" for="#">{{ __('Ticket Body') }} <span class="text-danger">*</span></label>
                                        <input type="hidden" name="ticket_body" id="ticket_body" class="form-control mt-2">
                                        <textarea name="ticket_body" class="form-control" id="ticket_body" cols="30" rows="4">{{ old('ticket_body') }}</textarea>
                                        @error('ticket_body')
                                            <span class="text-danger">{{ $message }}</span> <br>
                                        @enderror
                                        <input type="hidden" name="creator" class="form-control mt-2" value="2">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                        <button  type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!--======End Create Tickets=====-->
            </div>
        </div>

    </div>

    <div class="current_tickets_heading d-flex justify-content-between mt-5 mb-0">
        <div class="current_tickets_heading__left">

            <h3>{{ __('Your Tickets') }}</h3>
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
                        {{-- Divided Ticket For Individual Customers and also show all ticket for Admin --}}
                        @php
                            $customer_ticket = App\Models\Ticket::where('customer', Auth::id())->get();
                        @endphp
                        <div class="user_list user-page table-responsive table-overflow-none">
                        <table class="table table-hover dataTable">
                            @if ($customer_ticket)
                                <thead>
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Department') }}</th>
                                        <th>{{ __('Subjects') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Created Date') }}</th>
                                        <th>{{ __('Message') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer_ticket as $item)
                                        <tr>

                                            <td>
                                                <a href="{{ route('customer_ticket.show', $item->id) }}">#{{ $item->id ?? ''}}</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('customer_ticket.show', $item->id) }}">{{ $item->get_customer->name ?? '' }}</a>
                                            </td>
                                            <td>{{ $item->get_department->name ?? 'NULL' }}</td>
                                            <td>
                                                <a href="{{ route('customer_ticket.show', $item->id) }}">{{ \Str::limit($item->subject, 30) }}</a>
                                            </td>

                                            <td>{{ $item->get_status->name ?? __("Pending") }}</td>
                                            <td>{{ $item->created_at->format('d-M-Y') }}</td>

                                            <td>
                                                <a href=" {{ route('ticket.reply', $item->id) }}">
                                                    <i class="fa-brands fa-rocketchat"></i>
                                                    <span>{{ count(App\Models\Ticket_reply::where('ticket_id', $item->id)->get()) }}</span>
                                                </a>
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
                                                            <a style="cursor: pointer; text-decoration:none; color:#000" href="{{ route('customer_ticket.show', $item->id) }}" data-bs-whatever="@mdo">
                                                                <span><i class="fa-solid fa-eye me-2"></i></span>
                                                                {{ __('Show') }}
                                                            </a>
                                                        </li>
                                                        
                                                        <li class="m-2">
                                                            <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#editCustomerTicket_{{ $item->id }}" data-bs-whatever="@mdo">
                                                                <span><i class="fa-solid fa-edit me-2"></i></span>
                                                                {{ __('Edit') }}
                                                            </a>
                                                        </li>
                                                        <li class="m-2">
                                                            <a style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#deleteCustomerTicket_{{ $item->id }}" data-bs-whatever="@mdo">
                                                                <span><i class="fa-solid fa-trash me-2"></i></span>
                                                                {{ __('Delete') }}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                    {{-- delete customer ticket modal --}}
                                    <div class="modal fade" id="deleteCustomerTicket_{{ $item->id }}" tabindex="-1" aria-labelledby="daleteModalLabel"
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
                                                        <form action="{{ route('customer_ticket.destroy', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}
                                                        </form>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ######## Edit Customer page ticket Data ####### --}}
                                    <div class="modal fade" id="editCustomerTicket_{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                                        aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header border-bottom-0 modal_header">
                                                        <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">{{ __('Update Ticket') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('customer_ticket.update', $item->id) }}" method="post">
                                                            @csrf
                                                            @method("PUT")
                                                            <div class="offcanvas-body">

                                                                <label class="mt-3" for="#">{{ __('Subject') }} <span class="text-danger">*</span></label>
                                                                <input type="text" name="subject" class="form-control mt-2" value="{{ $item->subject }}">
                                                                @error('subject')
                                                                    <span class="text-danger">{{ $message }}</span> <br>
                                                                @enderror

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
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
