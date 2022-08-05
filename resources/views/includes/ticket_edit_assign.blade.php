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

                        <label class="mt-3" for="#">{{ __('ID') }} <span class="text-danger">*</span></label>
                        <input type="text" name="ticket_id" class="form-control mt-1" value="#{{ $item->id }}">
                        @error('ticket_id')
                            <span class="text-danger">{{ $message }}</span> <br>
                        @enderror

                        <label class="mt-3" for="#">{{ __('Status') }}
                        @if (count($status) == 0)
                            <span style="color:#8b8989; font-size:13px">(If do not have status, then create a status.) | <a href="{{ route('status.index') }}" style="text-decoration: none"> create status </a></span>
                        @endif
                         </label>

                        <select name="status" class="form-select mt-1" aria-label="Default select example">
                            <option value="" disabled selected>--{{ __('Select One') }}--</option>
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
                            <option value="" disabled selected>--{{ __('Select One') }}--</option>
                            @foreach ($priority as $prio)
                            <option value="{{ $prio->id }}" {{ $prio->id == $item->priority ? 'selected':'' }}> {{ $prio->name }} </option>
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

   {{-- assign admin cutomer ticket  --}}
<div class="modal fade" id="assign_admin_customer_Ticket_{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 modal_header">
                <h5 style="color: #6C7BFF;" class="modal-title" id="editModalLabel">{{ __('Update Ticket') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ticket.assign', $item->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="offcanvas-body">

                        <label class="mt-3" for="#">{{ __('ID') }} <span class="text-danger">*</span></label>
                        <input type="text" name="ticket_id" class="form-control mt-1" value="#{{ $item->id }}">
                        @error('ticket_id')
                            <span class="text-danger">{{ $message }}</span> <br>
                        @enderror


                            <label class="mt-3" for="#">{{ __('Department') }} <span class="text-danger">*</span>
                                @if (count($department) == 0)
                                <span style="color:#8b8989; font-size:13px">(If do not have department, then create a department) | <a href="{{ route('department.index') }}" style="text-decoration: none"> create department </a></span>
                                @endif
                            </label>
                            <select name="department" id="dept_dropdown" class="form-select mt-1 dept_dropdown" aria-label="Default select example">
                                <option selected disabled>{{ __('Select Department') }}</option>

                                @foreach ($department as $single_dept)
                                    @if ($item->department)
                                        <option value="{{ $single_dept->id }}" {{ $single_dept->id == $item->get_department->id ? 'selected' : '' }}>{{ $single_dept->name }}</option>
                                    @else
                                        <option value="{{ $single_dept->id }}">{{ $single_dept->name }}</option>
                                    @endif

                                @endforeach
                            </select>
                            @error('department')
                                <span class="text-danger">{{ $message }}</span> <br>
                            @enderror

                            <label for="get_agent_dropdown" class="mt-3 col-form-label"> {{ __('Assignee') }} <span class="text-danger">*</span></label>
                            <select name="agent_id[]" id="get_agent_dropdown" class="form-select mt-1 get_agent_dropdown" aria-label="Default select example" multiple="multiple" style="width: 100%">
                                @php
                                    $agents = [];
                                @endphp
                                @include('includes.agent_dropdown')
                            </select>
                            @error('agent_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            {{-- @foreach ($department as $single_dept)
                            <option value="{{ $item->get_department->id }}">{{ $single_dept->name }}</option>
                            @endforeach --}}
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
