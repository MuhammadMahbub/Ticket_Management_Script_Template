@extends('layouts.app_backend')

@section('title') |
@php
echo App\Models\Navigation::where('route','ticket.index')->first()->name;
@endphp
@endsection

@section('ticket.index')
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
                                <h4 class="card-title"> {{ __('Ticket Detailsfff') }} </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table  class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                             {{ __('Tickets Id') }}
                                                        </th>
                                                        <td>
                                                            #{{ $single_ticket_details->id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                             {{ __('Name') }}
                                                        </th>
                                                        <td>
                                                            @php
                                                                $customer_name = App\Models\User::find($single_ticket_details->customer);
                                                            @endphp
                                                            {{ $customer_name->name ?? 'No Exists' }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>
                                                            {{ __('Department') }}
                                                        </th>
                                                        <td>
                                                            {{ $single_ticket_details->get_department->name ?? 'NULL'  }}

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th>
                                                            {{ __('Subject') }}
                                                        </th>
                                                        <td>
                                                            {{ $single_ticket_details->subject }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ __('Status') }}
                                                        </th>
                                                        <td>
                                                            {{ $single_ticket_details->get_status->name ?? __('Pending') }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            {{ __('Ticket Body') }}
                                                        </th>
                                                        <td>
                                                            {{ $single_ticket_details->ticket_body }}
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <a class="btn mt-1 btn-success" href="{{ route('ticket.index') }}">{{ __('Return Back') }}</a>
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
