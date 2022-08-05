@extends('layouts.app_backend')

@section('title') |
@php
    echo App\Models\Navigation::where('route','priority.index')->first()->name;
@endphp
@endsection

@section('priority.index')
    active
@endsection

@section('content')

<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE Priority=====-->
    <div class="modal fade" id="createPriority" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 modal_header">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Create Priority') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('priority.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
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
    <!--=====MODAL FOR CREATE Priority End =====-->

    <!--==========Priority Header==========-->
    <div class="team_header d-flex justify-content-between flex-wrap mt-3 ">
        <div class="team_header__left">
            <div class="input-group mb-3">

            </div>
        </div>
        <div class="team_header__right">
            <button data-bs-toggle="modal" data-bs-target="#createPriority" data-bs-whatever="@mdo" class="mb-4 mt-2">
                <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                {{ __('Create Priority') }}
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
                    <th scope="col">{{ __('Created Date') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @if (count($all_priorities) > 0)
                    @forelse ($all_priorities as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                {{ $item->name ?? '' }}
                            </td>
                            <td>{{ $item->created_at->format('d-m-Y') ?? '' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li class="mb-1"><a style="cursor: pointer" class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#editPriority{{ $item->id }}"><i class="fa-solid fa-edit" class="mr-50"></i> {{ __('Edit') }}</a></li>
                                        <li>

                                            <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#deletePriority{{ $item->id }}" style="cursor: pointer"> <i class="fa-solid fa-trash"></i> {{ __('Delete') }} </a>
                                        </li>
                                    </ul>

                                </div>
                            </td>
                        </tr>

                        {{-- delete modal --}}
                        <div class="modal fade" id="deletePriority{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0 modal_header">
                                            <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Delete Priority') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6>{{ __('Are You Sure?') }}</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('No') }}</button>
                                            <form action="{{ route('priority.destroy', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                        </div>

                        <div class="modal fade" id="editPriority{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 modal_header">
                                        <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Edit Priority') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('priority.update',$item->id) }}">
                                            @csrf
                                            @method("PUT")
                                            <div class="mb-3">
                                                <label for="name" class="col-form-label">{{ __('Priority') }}<span class="text-danger"> *</span></label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ $item->name }}">
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }}</span>
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


