@extends('layouts.app_backend')

@section('title') |
Google API
@endsection

@section('google_api_key')
    active
@endsection

@section('content')
<div class="container-fluid px-4">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 modal_header">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Update API') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('update_api_key') }}">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="api_key" class="col-form-label">Client ID<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" name="client_id" id="client_id" value="{{ socialite()->client_id }}">
                        @error('role')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="client_secret" class="col-form-label">Client Secret<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" name="client_secret" id="client_secret" value="{{ socialite()->client_secret }}">
                        @error('role')
                            <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="redirect" class="col-form-label">Redirect<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" name="redirect" id="redirect" value="{{ socialite()->redirect }}">
                        @error('role')
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



@endsection

