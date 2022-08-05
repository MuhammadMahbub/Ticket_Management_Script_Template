@extends('layouts.app_backend')

@section('title') |
  Register Page
@endsection

@section('register_page.index')
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
                                <h4 class="card-title"> {{ __('Register Page Details') }} </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table  class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                             {{ __('Title') }}
                                                        </th>
                                                        <td>
                                                            {{ $registerPage->title ?? '' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                             {{ __('Subtitle') }}
                                                        </th>
                                                        <td>                                                        
                                                            {{ $registerPage->subtitle ?? '' }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>
                                                            {{ __('Img Title') }}
                                                        </th>
                                                        <td>
                                                            {{ $registerPage->img_title ?? ''  }}

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>
                                                            {{ __('Img Sub Title') }}
                                                        </th>
                                                        <td>
                                                            {{ $registerPage->img_subtitle ?? '' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ __('image') }}
                                                        </th>
                                                        <td>
                                                            <img src="{{ asset('uploads/registerPage') }}/{{ $registerPage->image }}"  alt="not found">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <a class="btn mt-1 btn-success" href="{{ route('register_page.index') }}">{{ __('Return Back') }}</a>
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
