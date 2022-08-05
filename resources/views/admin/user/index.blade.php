@extends('layouts.app_backend')

@section('title') |
@php
echo App\Models\Navigation::where('route','users.index')->first()->name;
@endphp
@endsection

@section('users.index')
    active
@endsection

@section('content')

    <div class="container-fluid px-4">
        <!--=====MODAL FOR CREATE User=====-->
        <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 modal_header">
                        <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Create User') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="col-form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="col-form-label">{{ __('Phone') }}</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="value" class="col-form-label">{{ __('Email') }} <span class="text-danger">*</span></label></label>
                                <input type="email" name="email" class="form-control" id="value" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="value" class="col-form-label">{{ __('Password') }} <span class="text-danger">*</span></label></label>
                                <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="value" class="col-form-label">{{ __('Select Role') }} <span class="text-danger">*</span></label></label>
                                <select name="role_id" id="role_id_for_create_user"  class="form-control">
                                    <option value="">--{{ __('Select One') }}--</option>
                                    @foreach ($user_role_data as $item)
                                        <option value="{{ $item->id }}">{{ $item->role }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button  type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--=====MODAL FOR CREATE User End =====-->

        <!--==========Priority Header==========-->
        <div class="team_header d-flex justify-content-between flex-wrap mt-3 ">
            <div class="team_header__left">
                <div class="input-group mb-3">

                </div>
            </div>
            <div class="team_header__right">
                <button data-bs-toggle="modal" class="mb-4 mt-2" data-bs-target="#createUser" data-bs-whatever="@mdo">
                    <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                    {{ __('Create User') }}
                </button>
            </div>
        </div>
        <!--==========Priority Table==========-->
        <div class="user_list user-page table-responsive table-overflow-none">
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Serial') }}</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Role') }}</th>
                        <th scope="col">{{ __('Email') }}</th>
                        <th scope="col">{{ __('Created Date') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($all_user_data) > 0)
                        @forelse ($all_user_data as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{ route('users.show', $item->id) }}" style="text-decoration:none; color:#7b7f90">{{ $item->name }}</a>
                                </td>
                                <td>{{ $item->getRole->role ?? '' }}</td>
                                <td>{{ $item->email ?? '' }}</td>
                                <td>{{ $item->created_at->Format('d-M-Y') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="{{ route('users.show', $item->id) }}" style="cursor: pointer"> <i class="fa-solid fa-eye"></i> {{ __('Show') }} </a></li>
                                            <li><a class="dropdown-item" data-bs-toggle='modal' data-bs-target='#updateUser{{ $item->id }}' style="cursor: pointer"> <i class="fa-solid fa-edit"></i> {{ __('Edit') }}</a></li>
                                            <li>
                                                @if($item->role_id == 1)

                                                @else
                                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteUsers{{ $item->id }}" style="cursor: pointer"> <i class="fa-solid fa-trash"></i> {{ __('Delete') }} </a>
                                                @endif

                                            </li>

                                        </ul>

                                    </div>
                                </td>

                            </tr>

                            {{-- modal for delete data --}}
                            <div class="modal fade" id="deleteUsers{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0 modal_header">
                                            <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Delete User') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6>{{ __('Are You Sure?') }}</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('No') }}</button>
                                            <form action="{{ route('users.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--=====MODAL FOR UPDATE USER=====-->
                            <div class="modal fade" id="updateUser{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 modal_header">
                                        <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Update User') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('users.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="form-group mt-2">
                                            <label class="form-label">{{ __('Name') }} <span class="text-danger"> *</span></label>
                                            <input type="text" name="name" class="form-control" value="{{ $item->name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>

                                            <div class="form-group mt-2">
                                            <label class="form-label">{{ __('Phone') }}</label>
                                            <input type="text" name="phone" class="form-control" value="{{ $item->phone }}">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>

                                            <div class="form-group mt-2">
                                                <label class="form-label">{{ __('Email') }} <span class="text-danger"> *</span></label>
                                                <input type="email" name="email" class="form-control" value="{{ $item->email }}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="value" class="col-form-label">{{ __('Role') }}</label>

                                                <select name="role_id" id="role_id_for_update_user" class="form-control">
                                                    <option value="">--{{ __('Select One') }}--</option>

                                                    @foreach ($user_role_data as $user_role_item)
                                                    <option value="{{ $user_role_item->id }}" {{ $user_role_item->id == $item->role_id ? 'selected' : '' }} >{{ $user_role_item->role }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            @php
                                                $selected_permission = json_decode($item->permission);
                                            @endphp
                                            <div>
                                                @include('includes.user_update_role')
                                            </div>
                                            @error('permission')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
                            <tr><td colspan="4"> <h3 class="text-center text-danger">{{ __('No Data Available Here!') }}</h3></td></tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#role_id_for_create_user').on('change', function(){

                var role_id_for_create_user = $(this).val();
                //ajax setup
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('get_permission.users') }}",
                data: {
                    role_id: role_id_for_create_user
                },
                success: function(data) {
                    $('#role_permission_area').html(data.data)
                }
            })
            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#role_id_for_update_user').on('change', function(){

                var role_id_for_create_user = $(this).val();
                //ajax setup
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('get_permission.users') }}",
                data: {
                    role_id: role_id_for_create_user
                },
                success: function(data) {
                    $('#role_permission_area').html(data.data)
                }
            })
            });

        })
    </script>

@endsection


