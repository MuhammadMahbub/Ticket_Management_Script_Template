@extends('layouts.app_backend')

@section('title') |
    Color Settings
@endsection


@section('colorSettings.index')
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
                            <h4 class="card-title">{{ __('Color Settings') }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('colorSettings.update', $colorSettings->id) }}" method="POST" class="form form-vertical">
                                @csrf
                                {{ method_field('PUT') }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="primary_color">{{ __('Theme Color') }}</label>
                                            <input type="color" name="theme_color" value="{{ colorSettings()->theme_color }}" id="theme_color" class="form-control"/>
                                            @error('theme_color')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
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