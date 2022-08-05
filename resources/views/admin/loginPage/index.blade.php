@extends('layouts.app_backend')

@section('title')
   | {{ __('Login Page') }}
@endsection

@section('login_page.index')
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
                    <th scope="col">{{ __('Title') }}</th>
                    <th scope="col">{{ __('Sub title') }}</th>
                    <th scope="col">{{ __('image') }}</th>
                    <th scope="col">{{ __('Created Date') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                {{-- @if (count($login_page_infos) > 0) --}}
                        <tr>
                            <td>
                                <a href="{{ route('login_page.show', $login_page_infos->id) }}" style="text-decoration:none; color:#7b7f90">
                                    {{ \Str::limit($login_page_infos->title, 50)  }}
                                </a>
                                
                            </td>
                            <td>{{ \Str::limit($login_page_infos->subtitle, 50)  }}</td>
                            <td>
                                <img src="{{ asset('uploads/loginPage') }}/{{ $login_page_infos->image }}" width="100" height="50" alt="not found">
                            </td>
                            <td>{{ $login_page_infos->created_at->Format('Y-m-d') ?? '' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="{{ route('login_page.show', $login_page_infos->id) }}" style="cursor: pointer"> <i class="fa-solid fa-eye"></i> {{ __('Show') }}</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle='modal' data-bs-target='#updateLoginPage{{ $login_page_infos->id }}' style="cursor: pointer"> <i class="fa-solid fa-edit"></i> {{ __('Update') }}</a></li>
                                    </ul>

                                </div>
                            </td>
                        </tr>

                        <!--=====MODAL FOR UPDATE USER=====-->
                        <div class="modal fade" id="updateLoginPage{{ $login_page_infos->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 modal_header">
                                        <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Update Login Page') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('login_page.update', $login_page_infos->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="form-group mt-2">
                                                <label class="form-label">{{ __('Title') }} <span class="text-danger"> *</span></label>
                                                <input type="text" name="title" class="form-control" value="{{ $login_page_infos->title }}">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-2">
                                                <label class="form-label">{{ __('Sub Title') }} </label>
                                                <textarea name="subtitle" class="form-control" cols="20" rows="4">{{ $login_page_infos->subtitle }}</textarea>
                                                @error('subtitle')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                             </div>

                                             <div class="form-group mt-2">
                                                <label class="form-label">{{ __('Image Title') }} </label>
                                                <input type="text" name="img_title" class="form-control" value="{{ $login_page_infos->img_title }}">
                                                @error('img_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                             </div>

                                             <div class="form-group mt-2">
                                                <label class="form-label">{{ __('Image Sub Title') }} </label>
                                                <textarea name="img_subtitle" class="form-control" cols="20" rows="4">{{ $login_page_infos->img_subtitle }}</textarea>
                                                @error('img_subtitle')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                             </div>

                                             <div class="form-group mt-2">
                                                <label class="form-label">{{ __('Image') }} </label>
                                                <input type="file" name="image" class="form-control">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                             </div>

                                             <div class="form-group mt-2">
                                                <label class="form-label">{{ __('Preview Image') }}</label>
                                                <img src="{{ asset('uploads/loginPage') }}/{{ $login_page_infos->image }}" alt="" width="150" height="100">
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
                        {{-- @empty
                        <tr><td colspan="4"> <h3 class="text-center text-danger">{{ __('No Data Available Here!') }}</h3></td></tr> --}}
                {{-- @endif --}}
            </tbody>
        </table>
    </div>
    <!-- other content -->
</div>
@endsection
