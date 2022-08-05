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

<section class="banner-main-section py-5 all-pages-input" id="main">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Department') }} </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table  class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th> {{ __('Name') }} </th> 
                                                        <td> {{ ucwords($department->name) ?? '' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <th>{{ __('Role') }}</th>
                                                        <td> {{ $department->get_role->role ?? 'Not appointee' }} </td>
                                                    </tr>

                                                    <tr>
                                                        <th>
                                                            {{ __('Assignee') }}
                                                        </th>
                                                        <td>
                                                            @php
                                                                $dept = json_decode($department->user_id);
                                                            @endphp
                                                            @if ($dept)
                                                                @foreach ($dept as $item)
                                                                    {{ ucwords(App\Models\User::find($item)->name) ?? '' }}
                                                                    @if (!$loop->last) , @endif
                                                                @endforeach
                                                            @else
                                                             {{ 'Not appointee' }}
                                                            @endif
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <a class="btn mt-1 btn-success" href="{{ route('department.index') }}">{{ __('Return Back') }}</a>
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
