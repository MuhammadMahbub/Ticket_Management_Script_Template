@extends('layouts.app_backend')

@section('title') |
    @php
    echo App\Models\Navigation::where('route','user_role.index')->first()->name;
    @endphp
@endsection

@section('user_role.index')
    active
@endsection

@section('css')
    <style>
        .form-check{
        margin-left: 70px !important;
    }
    .form-check-input{
        cursor: pointer;
        font-size: 18px;
    }
    .form-check-label{
        cursor: pointer;
    }
    .select_all_checkbox{
        margin-left: 45px !important;
        margin-bottom: 10px !important;
    }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <!--=====MODAL FOR CREATE ROLE=====-->
        <!-- Vertically centered modal -->

        <div class="modal fade" id="createRole" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0 modal_header">
                        <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Create Role') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('user_role.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="role" class="col-form-label">{{ __('Role') }}<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control" name="role" id="role" value="{{ old('role') }}">
                                @error('role')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button permission_class" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <span style="    color: #080808;font-size: 20px;margin-right: 10px;margin-top: -2px;"><i class="fa-solid fa-lock"></i> </span>  {{ __('Permission') }} <span style="margin-left: 5px;margin-top: -2px;"> * </span>
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                                <div class="form-check form-switch select_all_checkbox">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="checkAll(this)">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">{{ __('Select All') }}</label>
                                                </div>
                                                @php
                                                    $all_navigations = App\Models\Navigation::all();
                                                @endphp

                                                @foreach ($all_navigations as $item)
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input inner-checkbox" name="permission[]" value="{{ $item->id }}" type="checkbox" id="flexSwitchCheckDefault{{ $item->id }}">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault{{ $item->id }}"> {{ $item->name }}</label>
                                                    </div>
                                                @endforeach
                                        </div>
                                    
                                    </div>
                                    
                                </div>
                                @error('permission')
                                        <span class="text-danger"> {{ $message }}</span>
                                @enderror
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
        <div class="team_header d-flex justify-content-between flex-wrap mt-3">
            <div class="team_header__left">
                <div class="input-group mb-3">
                </div>
            </div>
            <div class="team_header__right">
                <button data-bs-toggle="modal" class="mb-4 mt-2" data-bs-target="#createRole" data-bs-whatever="@mdo">
                    <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                    {{ __('Create Role') }}
                </button>
            </div>
        </div>
        <!--==========User Table==========-->
        <div class="user_list user-page table-responsive">
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Serial') }}</th>
                        <th scope="col">{{ __('Role') }}</th>
                        <th scope="col">{{ __('Permission') }}</th>
                        <th scope="col">{{ __('Created Date') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if($roles->count() > 0)
                        @forelse($roles as $item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>
                                <a href="{{ route('user_role.show', $item->id) }}" style="text-decoration:none; color:#7b7f90">{{$item->role}}</a>
                                </td>
                                <td>
                                    @php
                                        $permission = json_decode($item->permission);
                                    @endphp
                                    @foreach ($permission as $data)
                                        {{ App\Models\Navigation::find($data)->name ?? '' }}
                                        @if (!$loop->last) , @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->created_at->format('d-M-Y') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li class="mb-1"><a style="cursor: pointer" class="dropdown-item" href="{{ route('user_role.show', $item->id) }}"><i class="fa-solid fa-eye" class="mr-50"></i> {{ __('Show') }}</a></li>
                                            <li class="mb-1"><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}"><i class="fa-solid fa-edit" class="mr-50"></i> {{ __('Edit') }}</a></li>
                                            @if ($item->id != 1 && $item->id != 2 && $item->id != 3)
                                                <li class="mb-1"><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}"><i class="fa-solid fa-edit" class="mr-50"></i> {{ __('Delete') }}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Delete Role -->
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header modal_header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Role') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6>{{ __('Are You Sure?') }}</h6>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                <form action="{{ route('user_role.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}
                                                </form>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <!--=====MODAL FOR EDIT ROLE=====-->
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0 modal_header">
                                            <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Update Role') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('user_role.update',$item->id) }}">
                                                @csrf
                                                @method("PUT")
                                                <div class="mb-3">
                                                    <label for="role" class="col-form-label">{{ __('Role') }}<span class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control" name="role" id="role" value="{{ $item->role }}">
                                                    @error('role')
                                                        <span class="text-danger"> {{ $message }}</span>
                                                    @enderror
                                                </div>
                                                @php
                                                    $selected_permission = json_decode($item->permission);
                                                @endphp
                                                <div>
                                                    @include('includes.user_update_role')
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
                            <tr><td colspan="4"> <h3 class="text-center text-danger">{{ __('No Data Available Here!') }}</h3></td></tr>
                        @endforelse
                        
                    @endif
                </tbody>
            </table>
        </div>
        <!-- other content -->
    </div>
@endsection

@section('js')
    <script>
        function checkAll(myCheckbox){

        var checkboxes = document.querySelectorAll(".inner-checkbox");

        if(myCheckbox.checked){
            checkboxes.forEach(function(checkbox){
                checkbox.checked = true;
            });
        }
        else{
            checkboxes.forEach(function(checkbox){
                checkbox.checked = false;
            });
        }
        }
    </script>
@endsection
