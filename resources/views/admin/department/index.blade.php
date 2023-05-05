@extends('layouts.app_backend')

@section('title') |
    @php
        echo App\Models\Navigation::where('route','department.index')->first()->name;
    @endphp
@endsection

@section('department.index')
    active
@endsection

@section('content')
<div class="container-fluid px-4">
    <!--===== MODAL FOR CREATE USER =====-->
    <div class="modal fade" id="createDepartment" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 modal_header">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Create Department') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">{{ __('Name') }} <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @error("name")
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role_id" class="col-form-label">  {{ __('Assign') }} </label>
                            <select name="role_id" id="role_dropdown" class="form-select mt-1 form-control" style="width: 100%">
                                <option selected disabled>{{ __('Select Agent') }}</option>
                                @foreach ($roles as $item)
                                    @if ($item->id == 2)
                                        <option value="{{ $item->id }}">{{ $item->role }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="user_id" class="mt-1 col-form-label"> {{ __('Assignee Name') }}
                            @php
                                $show_users = [];
                            @endphp
                            @if (count($users) == 0)
                                <span style="color:#8b8989; font-size:13px">({{ __('If do not have agent, then create an agent') }}) | <a href="{{ route('users.index') }}" style="text-decoration: none"> {{ __('create agent') }} </a></span>
                            @endif
                        </label>
                        <select name="user_id[]" id="user_dropdown" class="form-select mt-1" aria-label="Default select example" multiple="multiple" style="width: 100%">
                            @include('includes.user_dropdown')
                        </select>
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
    <!--==========Team Header==========-->
    <div class="team_header d-sm-flex justify-content-between flex-wrap mt-3 mb-3">
        <div class="team_header__left">
        </div>
        <div class="team_header__right">
            <button data-bs-toggle="modal" class="w-100 w-sm-auto" data-bs-target="#createDepartment" data-bs-whatever="@mdo">
                <a>
                    <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                    {{ __('Create Department') }}</a>
            </button>

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
                <div class="col-md">
                    <div class="current_tickets_heading__right d-flex align-items-center">
                        <div class="input-group mb-3" style="margin-top: 32px">
                            <button class="btn bg-white" id="button-addon1">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <input type="text" id="search_department" class="form-control border-0" placeholder="Search Here.."  name="Search Keyword">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user_list user-page table-responsive table-overflow-none">
        <table class="table table-hover dataTable">
            <thead>
                <tr>
                    <th scope="col">{{ __('Serial') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Created Date') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody id="render_department">

                @include('includes.department.index')
                
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')

@foreach ($departments as $department)
    <script>
        $(document).ready(function() {
            $('#user_drop{{ $department->id }}').select2({theme: "classic"});
        });
    </script>
@endforeach

<script>
    $(document).ready(function() {
        $('#user_dropdown').select2({theme: "classic"});
        $('#role_dropdown').change(function() {

            var role_id = $(this).val();

            $.ajax({
                type: 'POST',
                url: "{{ route('get.users') }}",
                data: {
                    role_id: role_id
                },
                success: function(data) {
                    $('#user_dropdown').html(data.data)
                }
            })
        });
    });
</script>

@foreach ($departments as $department)
<script>
    $(document).ready(function() {
        $('#role_drop{{ $department->id }}').change(function() {

            var role_id = $(this).val();

            $.ajax({
                type: 'POST',
                url: "{{ route('edit.department') }}",
                data: {
                    role_id: role_id
                },
                success: function(data) {
                    $('#user_drop{{ $department->id }}').html(data.data)
                }
            })
        });
    });
</script>
@endforeach

    {{-- search wise status --}}
    <script>
        $(document).ready(function() {
                $('#search_department').on('keyup',function(){
                    let search_value = $(this).val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('search.wise.department') }}",
                        data: {
                            search_value: search_value,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_department').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                            } else {
                                $('#render_department').html(response.data);
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

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('date.wise.department') }}",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_department').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                            } else {
                                $('#render_department').html(response.data);
                            }

                            // if ((1*response.count) < 5) {
                            //     $('.load_more_button').hide();
                            // }else{
                            //     $('.load_more_button').show();

                            // }

                            $("#clear__filter__date").removeClass("d-none");
                        }
                    })

                });
                // clear filter
                $("#clear__filter__date").on("click", function(){
                    $(this).addClass("d-none");
                    $("#from__date").val("");
                    $("#to__date").val("");

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('date.clear.wise.department') }}",

                        success: function(response) {
                            $('#render_department').html(response.data);

                            // if ((1*response.count) < 5) {
                            //     $('.load_more_button').hide();
                            // }else{
                            //     $('.load_more_button').show();

                            // }
                        }
                    })
                });
            });
    </script>

@endsection


