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

    <section class="banner-main-section py-5 all-pages-input" id="main">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('User') }} </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table  class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="table_header_show">
                                                                {{ __('Name') }}
                                                            </th>
                                                            <td>
                                                                {{ $all_user_data->name ?? '' }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th class="table_header_show">
                                                                {{ __('Role') }}
                                                            </th>
                                                            <td>
                                                                {{ $all_user_data->getRole->role }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th class="table_header_show">
                                                                {{ __('Permission') }}
                                                            </th>
                                                            <td>
                                                                @php
                                                                    $all_data = json_decode($all_user_data->permission);
                                                                @endphp
                                                                @foreach ($all_data as $item)
                                                                    {{ App\Models\Navigation::find($item)->name }}
                                                                    @if (!$loop->last) | @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th class="table_header_show">
                                                                {{ __('Phone') }}
                                                            </th>
                                                            <td>
                                                                {{ $all_user_data->phone }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="table_header_show">
                                                                {{ __('Email') }}
                                                            </th>
                                                            <td>
                                                                {{ $all_user_data->email }}
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <a class="btn mt-1 btn-success" href="{{ route('users.index') }}">{{ __('Return Back') }}</a>
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
