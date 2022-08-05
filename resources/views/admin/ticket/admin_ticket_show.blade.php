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
                                    <h4 class="card-title"> {{ __('Ticket Details') }} </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table  class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>
                                                                {{ __('ID') }}
                                                            </th>
                                                            <td>

                                                                #{{ $ticket->id }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ __('Name') }}
                                                            </th>
                                                            <td>
                                                                @php
                                                                    $customer_name = App\Models\User::find($ticket->customer);
                                                                @endphp
                                                                {{ $customer_name->name ?? '' }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                {{ __('Department') }}
                                                            </th>
                                                            <td>
                                                                {{ $ticket->get_department->name ?? 'NULL' }}

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                {{ __('Subject') }}
                                                            </th>
                                                            <td>
                                                                {{ $ticket->subject ?? '' }}

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                {{ __('Status') }}
                                                            </th>
                                                            <td>
                                                                {{ $ticket->get_status->name ?? 'Pending' }}

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                {{ __('Priority') }}
                                                            </th>
                                                            <td>
                                                                {{ $ticket->get_priority->name ?? 'NULL' }}

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th>
                                                                {{ __('Assignee') }}
                                                            </th>
                                                            <td>
                                                                @if ($ticket->agent_id)
                                                                    @foreach (json_decode($ticket->agent_id) as $agent_id)
                                                                        @php
                                                                            $agent_name = App\Models\User::find($agent_id)->name;
                                                                        @endphp
                                                                        {{ $agent_name ?? 'NULL'}},
                                                                    @endforeach
                                                                @else
                                                                    {{ 'Not appointee' }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ __('Ticket Body') }}
                                                            </th>
                                                            <td>
                                                                {{ $ticket->ticket_body ?? '' }}

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                {{ __('Expire Date') }}
                                                            </th>
                                                            <td>
                                                                {{ $single_ticket_details->expire_date ?? 'NULL' }}
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <a class="btn mt-1 btn-success mr-right" href="{{ route('ticket.index') }}">{{ __('Return Back') }}</a>

                                                <a class="btn mt-1 btn-success" href="{{ route('ticket.reply', $ticket->id) }}">{{ __('Send Message') }}</a>

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
