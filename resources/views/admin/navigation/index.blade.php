@extends('layouts.app_backend')

@section('title')
   | {{ __('Navigation') }}
@endsection

@section('navigation.index')
    active
@endsection

@section('content')

<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE User=====-->


    <!--=====MODAL FOR CREATE User End =====-->
    <div class="team_header d-flex justify-content-between flex-wrap mt-3 ">
        <div class="team_header__left">
            <div class="input-group mb-3">

            </div>
        </div>
    </div>

    <!--==========Navigation Table==========-->
    <div class="user_list user-page table-responsive table-overflow-none">
        <table class="table table-hover dataTable">
            <thead>
                <tr>
                    <th scope="col">{{ __('Serial') }}</th>
                    <th scope="col">{{ __('Icon') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Created Date') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @if (count($all_navigation_data) > 0)
                    @forelse($all_navigation_data as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                {!! $item->icon !!}
                            </td>

                            <td>{{ $item->name  }}</td>
                            <td>{{ $item->created_at->Format('Y-m-d') }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" data-bs-toggle='modal' data-bs-target='#updateNavigation{{ $item->id }}' style="cursor: pointer"> <i class="fa-solid fa-edit"></i> {{ __('Edit') }}</a></li>
                                    </ul>

                                </div>
                            </td>
                        </tr>

                        <!--=====MODAL FOR UPDATE USER=====-->
                        <div class="modal fade" id="updateNavigation{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 modal_header">
                                        <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Update Navigation') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('navigation.update', $item->id) }}" method="POST">
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
                                                <label class="form-label">{{ __('Icon') }} <span class="text-danger"> *</span></label>
                                                <input type="text" name="icon" class="form-control" value="{{ $item->icon }}">
                                                @error('icon')
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
