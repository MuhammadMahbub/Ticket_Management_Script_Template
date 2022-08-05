@extends('layouts.app_backend')

@section('title') |
    {{ __('Edit Language') }}
@endsection

@section('lang_edit')
    active
@endsection

@section('content')
<div class="container-fluid px-4">

    <!--==========Priority Table==========-->
    <div class="user_list user-page table-responsive table-overflow-none">
        <table class="table table-hover dataTable">
            <thead>
                <tr>
                    <th scope="col">{{ __('Key') }}</th>
                    <th scope="col" class="w-50">{{ __('French') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$item)
                <tr>
                    <form action="{{ route('lang_update') }}" method="POST">
                        @csrf
                        <td><span>{{ $key}}</span></td>
                        <input type="hidden" name="key" value="{{ $key }}">
                        <td><input class="form-control" name="value" type="text" value="{{ $item }}"></td>
                        <td>
                            <button class="btn btn-primary" type="submit">{{ __('Update') }}</button>
                        </td>
                    </form>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

