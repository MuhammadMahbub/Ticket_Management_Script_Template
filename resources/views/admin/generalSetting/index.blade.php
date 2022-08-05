@extends('layouts.app_backend')

@section('title') |
    General Settings
@endsection


@section('generalSettings.index')
    active
@endsection

{{-- Page Content --}}
@section('content')
    <section id="basic-vertical-layouts">
        <div class="row">
            <div class="col-md-11 col-12 m-auto">
                <div class="color__plate mt-5"  style="height: 100vh">
                    <div class="card" style="width: 100%">
                        <div class="card-header">
                            <h4 class="card-title">{{ __('General Settings') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('generalSettings.update', $generalSettings->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="primary_color" class="mb-1"> {{ __('Site Logo') }} <span class="text-danger">*</span></label>
                                            <input type="file" name="logo" id="logo" class="form-control"/>
                                            @error('logo')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div> 

                                        <div class="form-group mt-3">
                                            <label for="primary_color">{{ __('Preview Logo') }}</label>
                                            <img src="{{ asset('uploads/generalSetting') }}/{{ $generalSettings->logo }}" alt="not found" width="180" height="70" style="object-fit: contain;">
                                        </div>               
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mt-3">{{ __('Submit') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
@endsection