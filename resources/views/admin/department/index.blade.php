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
    <div class="team_header d-flex justify-content-between flex-wrap mt-3 ">
        <div class="team_header__left">
            <div class="input-group mb-3">

            </div>
        </div>
        <div class="team_header__right">
            <button data-bs-toggle="modal" class="mt-2 mb-4" data-bs-target="#createDepartment" data-bs-whatever="@mdo">
                <a>
                    <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                    {{ __('Create Department') }}</a>
            </button>

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
            <tbody>

                @forelse($departments as $department)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                            <a href="{{ route('department.show', $department->id) }}" style="text-decoration:none; color:#7b7f90"> {{ $department->name ?? '' }} </a>
                        </td>
                        <td>{{ $department->created_at->format('d-m-Y') ?? '' }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('department.show', $department->id) }}" style="cursor: pointer"> <i class="fa-solid fa-eye"></i> {{ __('Show') }} </a></li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateDepartment{{ $department->id }}" style="cursor:pointer"> <i class="fa-solid fa-edit"> </i> {{ __('Edit') }}</a></li>
                                    <li>
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteDepartment{{ $department->id }}" style="cursor:pointer"> <i class="fa-solid fa-trash"> </i> {{ __('Delete') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="deleteDepartment{{ $department->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 modal_header">
                                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Delete Department') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>{{ __('Are You Sure?') }}</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('No') }}</button>
                                    <form action="{{ route('department.destroy', $department->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--=====MODAL FOR UPDATE USER=====-->
                    <div class="modal fade" id="updateDepartment{{ $department->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 modal_header">
                                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Update Department') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('department.update', $department->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group mt-2">
                                            <label class="form-label">{{ __('Name') }} <span class="text-danger"> *</span></label>
                                            <input type="text" name="name" class="form-control" value="{{ $department->name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="role_id" class="col-form-label mt-1"> {{ __('Assign') }} </label>
                                            <select name="role_id" id="role_drop{{ $department->id }}" class="form-select mt-1">
                                                @if ($department->role_id)
                                                    <option value="{{ $department->role_id }}">{{ $department->get_role->role }}</option>
                                                @else
                                                    <option disabled selected>--{{ __('Select Agent') }}--</option>
                                                    @foreach ($roles as $item)
                                                        @if ($item->id == 2)
                                                            <option value="{{ $item->id }}">{{ $item->role }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error("role_id")
                                                <span class="text-danger"> {{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            @php
                                                $user_role = App\Models\User::where('role_id', $department->role_id)->get();
                                            @endphp

                                            <label for="user_id" class="mt-1 col-form-label"> {{ __('Assignee Name') }} 
                                                <span style="color:#8b8989; font-size:13px">({{ __('If do not have agent, then create an agent') }}) | <a href="{{ route('users.index') }}" style="text-decoration: none"> {{ __('create agent') }} </a></span>
                                            </label>
                                            <select name="user_id[]" multiple id="user_drop{{ $department->id }}" class="form-select mt-1" aria-label="Default select example">

                                                @if (json_decode($department->user_id))
                                                    @foreach ($user_role as $all_agent_name)
                                                        <option value="{{ $all_agent_name->id }}" {{ in_array($all_agent_name->id, json_decode($department->user_id)) ? 'selected':'' }}> {{ $all_agent_name->name }} </option>
                                                    @endforeach
                                                @else

                                                    @php
                                                        // $show_users = [];
                                                        $user_role = App\Models\User::where('role_id', 2)->get()
                                                    @endphp
                                                    {{-- @include('includes.user_dropdown') --}}
                                                    @foreach ($user_role as $agent)
                                                        <option value="{{ $agent->id }}">{{ $agent->name }} </option>
                                                    @endforeach
                                                @endif

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
                @empty
                    <tr><td colspan="4"> <h5 class="text-center">{{ __('No Data Available Here!') }}</h5></td></tr>
                @endforelse
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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

@endsection


