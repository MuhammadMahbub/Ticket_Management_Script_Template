
<div class="current_ticket__left">
    <div class="current_ticket__left__btn">
       <div class="top__menubar mt-4">
           <div class="top__menubar--left">
                <a href="{{ route('ticket.index') }}" class="btn item btn-white @yield('all_tickets')">
                {{ __('All Tickets') }} ({{ count($tickets) }})
                </a>

                @foreach ($status as $item)
                    <a href="{{ route('individual_ticket.show', $item->id) }}" class="btn item btn-white @yield($item->name)" >
                        @php
                            $ticket_data = App\Models\Ticket::where('status', $item->id)->get();
                        @endphp
                        {{ $item->name }} Tickets ({{ count($ticket_data) }})
                    </a>
                @endforeach

                <a href="{{ route('soft_deleted_tickets') }}" class="btn item btn-white @yield('soft_deleted_tickets')">
                {{ __('Deleted Tickets') }} ({{ count($softDeletedTickets) }})
                </a>
           </div>
       </div>

        <div class="current_ticket__right float-right" style="float:right">
            <div class="current_ticket__right__btn current_ticket__right__btn__div create_btn d-flex">
                <div class="current_ticket__right__btn__div me-1">

                <!--=====Create Tickets=====-->
                <div class="modal fade" id="createTicket" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header modal_header border-bottom-0">
                                <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Create Ticket') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('ticket.store') }}" method="post">
                                    @csrf
                                    <div class="offcanvas-body">
                                        <label for="#">{{ __('Select Role') }} <span class="text-danger">*</span></label>
                                        <select id="role_dropdown" name="select_role" class="form-select mt-1">
                                            <option value="">{{ __('Select Role') }}</option>
                                            @foreach ($roles as $item)
                                                @if ($item->id == 1)

                                                @else
                                                     @if ($item->id == 2)

                                                     @else
                                                     <option value="{{ $item->id }}">{{ $item->role }}</option>
                                                     @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('select_role')
                                            <span class="text-danger">{{ $message }}</span> <br>
                                        @enderror
                                        <label class="mt-3" for="#">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <select name="name" id="user_dropdown" class="form-select mt-1" aria-label="Default select example">

                                            @php
                                                $show_users = [];
                                            @endphp
                                            @include('includes.user_dropdown')
                                        </select>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span> <br>
                                        @enderror

                                        <label class="mt-3" for="#">{{ __('Subject') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="subject" class="form-control mt-2" value="{{ old('subject') }}">
                                        @error('subject')
                                            <span class="text-danger">{{ $message }}</span> <br>
                                        @enderror

                                        <label class="mt-3" for="#">{{ __('Department') }} <span class="text-danger">*</span></label>
                                        <select name="department" id="dept_dropdown" class="form-select mt-1" aria-label="Default select example">
                                            <option selected disabled>{{ __('Select Department') }}</option>
                                            @foreach ($department as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <span class="text-danger">{{ $message }}</span> <br>
                                        @enderror

                                        <label for="get_agent_dropdown" class="mt-3 col-form-label"> {{ __('Assignee') }} </label>
                                        <select name="agent_id[]" id="get_agent_dropdown" class="form-select mt-1" aria-label="Default select example" multiple="multiple" style="width: 100%">
                                            @php
                                                $agents = [];
                                            @endphp
                                            @include('includes.agent_dropdown')
                                        </select>


                                        <label class="mt-3" for="#">{{ __('Status') }}</label>
                                        <select name="status" class="form-select mt-1" aria-label="Default select example">
                                            <option selected disabled>{{ __('Select Ticket Status') }}</option>
                                            @foreach ($status as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                        <label class="mt-3" for="#">{{ __('Priority') }}</label>
                                        <select name="priority" class="form-select mt-1" aria-label="Default select example">
                                            <option selected disabled>{{ __('Select Ticket Priority') }}</option>
                                            @foreach ($priority as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>

                                        <label class="mt-3" for="#">{{ __('Ticket Body') }}</label>
                                        <textarea name="ticket_body" class="form-control" id="ticket_body" cols="30" rows="4">{{ old('ticket_body') }}</textarea>
                                        @error('ticket_body')
                                            <span class="text-danger">{{ $message }}</span> <br>
                                        @enderror

                                        <input type="hidden" name="creator" class="form-control mt-2" value="1">


                                        {{-- <button class="btn w-100 create_ticket_btn mt-3">{{ __('Create Ticket') }}</button> --}}
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
</div>
