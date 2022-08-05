@extends('layouts.app_backend')

@section('title') |
    @php
    echo App\Models\Navigation::where('route','user_role.index')->first()->name;
    @endphp
@endsection

@section('user_role.index')
    active
@endsection

@section('content')

    <section class="banner-main-section py-5 all-pages-input" id="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('User Role Details') }}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table  class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="table_header_show">{{ __('Role') }}</th>
                                                            <td>{{ $single_role_info->role }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_header_show">{{ __('Permissions') }}</th>
                                                            <td>
                                                                @php
                                                                    $permission = json_decode($single_role_info->permission);
                                                                @endphp
                                                                @foreach ($permission as $data)
                                                                    {{ App\Models\Navigation::find($data)->name ?? '' }}
                                                                    @if (!$loop->last) , @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <a class="btn mt-1 btn-success" href="{{ route('user_role.index') }}">{{ __('Return Back') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection
