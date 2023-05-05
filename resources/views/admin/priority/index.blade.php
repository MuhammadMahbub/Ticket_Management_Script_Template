@extends('layouts.app_backend')

@section('title') |
@php
    echo App\Models\Navigation::where('route','priority.index')->first()->name;
@endphp
@endsection

@section('priority.index')
    active
@endsection

@section('content')

<div class="container-fluid px-4">
    <!--=====MODAL FOR CREATE Priority=====-->
    <div class="modal fade" id="createPriority" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 modal_header">
                    <h5 style="color: #6C7BFF;" class="modal-title" id="exampleModalLabel">{{ __('Create Priority') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('priority.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button  type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
    <!--=====MODAL FOR CREATE Priority End =====-->

    <!--==========Priority Header==========-->
    <div class="team_header d-sm-flex justify-content-between flex-wrap mt-3 mb-3">
        <div class="team_header__left">
        </div>
        <div class="team_header__right">
            <button data-bs-toggle="modal" data-bs-target="#createPriority" data-bs-whatever="@mdo" class="w-100 w-sm-auto">
                <span><i class="fa-solid fa-circle-plus me-2"></i></span>
                {{ __('Create Priority') }}
            </button>
        </div>
    </div>
    <!--==========Priority Table==========-->
    <div class="row my-2">
        <div class="col-xl-8">
            <div class="row align-items-end">
                <div class="col-md">
                    <div class="form-group mb-3">
                        <label class="form-label" for="from__date">From</label>
                        <input type="date" name="from_date" id="from__date" class="form-control">
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group mb-3">
                        <label class="form-label" for="to__date">To</label>
                        <input type="date" name="to_date" id="to__date" class="form-control">
                    </div>
                </div>
                <div class="col-md-auto">
                    <div class="form-group mb-3">
                        <button class="btn btn-primary w-100 w-sm-auto" id="filter__date">filter</button>
                        <button class="btn btn-danger w-100 w-sm-auto mt-2 mt-sm-0 d-none" id="clear__filter__date">Clear filter</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="row align-items-end">
                <div class="col-md">
                    <div class="current_tickets_heading__right d-flex align-items-center">
                        <div class="input-group mb-3" style="margin-top: 32px">
                            <button class="btn bg-white" id="button-addon1">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <input type="text" id="search_priority" class="form-control border-0" placeholder="Search Here.."  name="Search Keyword">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user_list user-page table-responsive table-overflow-none">
        <table class="table table-hover dataTable">
            <thead>
                <tr>
                    <th scope="col">{{ __('Serial') }}</th>
                    <th scope="col">{{ __('Name') }}</th>
                    <th scope="col">{{ __('Created Date') }}</th>
                    <th scope="col">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody id="render_priority">
                @include('includes.priority.index')
            </tbody>
        </table>
    </div>
    <!-- other content -->
</div>
@endsection

@section('js')

    {{-- search wise tickets --}}
    <script>
        $(document).ready(function() {
                $('#search_priority').on('keyup',function(){
                    let search_value = $(this).val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('search.wise.priority') }}",
                        data: {
                            search_value: search_value,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_priority').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                            } else {
                                $('#render_priority').html(response.data);
                            }


                        }
                    })

                });
            });
    </script>

    {{-- filter by date js --}}
    <script>
        $(document).ready(function() {
                $('#filter__date').on('click',function(){
                    let from_date = $('#from__date').val();
                    let to_date = $('#to__date').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('date.wise.priority') }}",
                        data: {
                            from_date: from_date,
                            to_date: to_date,
                        },
                        success: function(response) {
                            console.log(response);
                            if ((response.count)*1 <  1) {
                                $('#render_priority').html('<tr ><td colspan="1000" class="text-danger text-center py-3">No Data Found</td></tr>');
                            } else {
                                $('#render_priority').html(response.data);
                            }

                            // if ((1*response.count) < 5) {
                            //     $('.load_more_button').hide();
                            // }else{
                            //     $('.load_more_button').show();

                            // }

                            $("#clear__filter__date").removeClass("d-none");
                        }
                    })

                });
                // clear filter
                $("#clear__filter__date").on("click", function(){
                    $(this).addClass("d-none");
                    $("#from__date").val("");
                    $("#to__date").val("");

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('date.clear.wise.priority') }}",

                        success: function(response) {
                            $('#render_priority').html(response.data);

                            // if ((1*response.count) < 5) {
                            //     $('.load_more_button').hide();
                            // }else{
                            //     $('.load_more_button').show();

                            // }
                        }
                    })
                });
            });
    </script>
    
@endsection


